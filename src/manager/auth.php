<?php
include $_SERVER["DOCUMENT_ROOT"] . '/src/repository/entityRepository.php';
class Auth extends EntityRepository
{
    /** @var User|null $user */
    private $user;
    /** @var string|null $error */
    private $authError;
    /** @var string|null $success */
    private $authSuccess;
    public function ___construct()
    {
        parent::__construct();
        $this->user = null;
        $this->authError = null;
        $this->authSuccess = null;
    }

    /**
     * @param string $email
     * @param string $password
     * @return Auth
     */
    public function Login(string $email, string $password): Auth
    {
        $user = parent::getUserByEmail($email);
        if ($user) {
            if (password_verify($password, $user->getPassword())) {
                $this->user = $user;
                $this->authSuccess = "Logged in successfully";
                return $this;
            } else {
                $this->authError = "Password is incorrect";
                return $this;
            }
        } else {
            $this->authError = "User with this email doesn't exist";
            return $this;
        }
    }
    /**
     *  
     * Met de force un utilisateur dans l'Auth
     * @param User $user
     */
    public function forceSetUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Function to register a new user in the database
     * The function check if the user already exist in the database
     * and if not, it creates a new user
     * Throw an exception if the email is already used
     * Or if the password is not same as the confirmation password
     *
     * @param string $email
     * @param string $username
     * @param string $password
     * @param string $confirmPass
     * @return Auth
     */
    public function Register(string $email, string $username, string $password, string $confirmPass, $file): Auth
    {
        $user = new User();
        if ($password != "") {
            if (strlen($password) >= 8) {
                if (preg_match( "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/" , $password)) {
                    if(preg_match("/(\S+?(?:[\t ]+\S+)*?)([\t ]*)(?:\1\2?){2,}/", $password)){
                        $this->authError = "Password can't have 3 consecutive characters";
                        return $this;
                    }else{
                    if ($confirmPass != "") {
                        if ($confirmPass === $password) {
                            $user->setPassword($password);
                        } else {
                            $this->authError = "Passwords do not match";
                            return $this;
                        }
                    } else {
                        $this->authError = "Confirm password is empty";
                        return $this;
                    }
                    }
                } else {
                    $this->authError = "Password must contain at least one number, one uppercase letter, one lowercase letter and one special character";
                    return $this;
                }
            } else {
                $this->authError = "Password must be at least 8 characters long";
                return $this;
            }
        } else {
            $this->authError = "Password is empty";
            return $this;
        }

        if ($email != "") {
            if (preg_match("/.+\@.+\..+/", $email)) {
                $possibleUser = parent::findOneBy("user", ["Email" => $email]);
                if ($possibleUser) {
                    $this->authError = "User with this email already exist";
                    return $this;
                } else {
                    $user->setEmail($email);
                }
            } else {
                $this->authError = "Email is not valid";
                return $this;
            }
        } else {
            $this->authError = "Email is empty";
            return $this;
        }
        if ($username != "") {
            if (strlen($username) < 5 || strlen($username) > 65) {
                $this->authError = "Username must be between 5 and 65 characters";
                return $this;
            } else {
                $user->setUsername($username);
            }
        } else {
            $this->authError = "Username is empty";
            return $this;
        }
        $newFileName = null;
               // handle the file
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png'); 
        if (in_array($fileActualExt, $allowed)) {   
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                } else {
                    $this->authError = "Your file is too big";
                    return $this;
                }
            } else {
                $this->authError = "There was an error uploading your file";
                return $this;
            }
        } else {
            $this->authError = "You cannot upload files of this type";
            return $this;
        }
        $user_id = parent::insertUser($user);
        $fileNameNew = "user-".$user_id. '.' . $fileActualExt;
        $fileDestination = '/media/users/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);

        $user->setId(intval($user_id));
        $this->user = $user;
        $this->authSuccess = "User created";
        return $this;
    }
    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }
    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->authError;
    }

    /**
     * @param string $error
     * @return Auth
     */
    public function setError(string $error): Auth
    {
        $this->authError = $error;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSuccess(): ?string
    {
        return $this->authSuccess;
    }

    /**
     * @param string $success
     * @return Auth
     */
    public function setSuccess(string $success): Auth
    {
        $this->authSuccess = $success;
        return $this;
    }

    /**
     * @return Auth
     */
    public function logout(): Auth
    {
        $this->user = null;
        return $this;
    }
    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->user != null;
    }
}
