<?php
include './src/repository/entityRepository.php';
class Auth extends EntityRepository
{
    private $user;

    public function ___construct(?User $user)
    {

        parent::__construct();
        if ($user) {
            $this->user = $user;
        }
    }

    public function Login(string $email, string $password)
    {
        $user = EntityRepository::getUserByEmail($email);
        if ($user) {
            if (password_verify($password, $user->getPassword())) {
                $this->user = $user;
                return true;
            }
        }
        return false;
    }

    public function Register(string $email, string $username, string $password, string $confirmPass)
    {
        $user = new User();
        if ($password === $confirmPass) {
            $user->setPassword($password);
        } else return false;
        if ($email != "") {
            if (preg_match("/.+\@.+\..+/", $email)) {
                $user->setEmail($email);
            } else return false;
        }

        if (strlen($username) < 5 || strlen($username) > 65) {
            return false;
        }else{
            $user->setUsername($username);
        }
        EntityRepository::insertUser($user);
        return true;
    }
}
