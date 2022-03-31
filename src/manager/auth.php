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
     * @return User|string
     */
    public function Login(string $email, string $password)
    {
        $user = EntityRepository::getUserByEmail($email);
        if ($user) {
            if (password_verify($password, $user->getPassword())) {
                $this->user = $user;
                $this->authSuccess = "Logged in successfully";
                return $this;
            }else{
                $this->authError = "Password is incorrect";
                return $this;
            }
        }else {
            $this->authError = "User with this email doesn't exist";
            return $this;
        };
        
    }

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
     * @param string $password
     * @return Auth|string
     */
    public function Register(string $email, string $username, string $password, string $confirmPass)
    {
        $user = new User();
        if ($password != "") {
            if($confirmPass != ""){
               if ($password === $confirmPass) {
                $user->setPassword($password);
            } else{
                $this->authError="Passwords do not match";
                return $this;
            }
            }else {
                $this->authError="Confirm password is empty";
                return $this;
            }
        }else {
            $this->authError="Password is empty";
            return $this;
        }

        if ($email != "") {
            if (preg_match("/.+\@.+\..+/", $email)) {
                $possibleUser = parent::findOneBy("user",["Email"=>$email]);
                if($possibleUser){
                    $this->authError="User with this email already exist";
                    return $this;
                }else{
                    $user->setEmail($email);
                }
            } else {
                $this->authError="Email is not valid";
                return $this;
            }
        } else {
            $this->authError="Email is empty";
            return $this;
        }
        if($username != ""){
            if (strlen($username) < 5 || strlen($username) > 65) {
                $this->authError="Username must be between 5 and 65 characters";
                return $this;
            } else {
                $user->setUsername($username);
            }
        }else {
            $this->authError="Username is empty";
            return $this;
        }
       
        $user_id= EntityRepository::insertUser($user);
        $user->setId(intval($user_id));
        $this->user = $user;
        $this->authSuccess = "User created";
        return $this;
    }
    /**
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @return string|null
     */
    public function getError()
    {
        return $this->authError;
    }
    /**
     * @return string|null
     */
    public function getSuccess()
    {
        return $this->authSuccess;
    }
    /**
     * @return Auth
     */
    public function logout()
    {
        $this->user = null;
        return $this;
    }
    /**
     * @return bool
     */
    public function isLoggedIn()
    {
        return $this->user != null;
    }
}
