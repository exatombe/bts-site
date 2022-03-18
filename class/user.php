<?php
include "./class/database.php";
/**
 * Classe Utilisateur, (pour créer et ou gérer un utilisateur)
 */
class User extends Database {
    /** @param id  */
    private $id;
    /** @param username */
    private $username;
    /** @param email*/
    private $email;
    /** @param password  */
    private $password;
    public function __construct(int $id=0,string $username = "",string $email = "",string $password ="")
    {
        parent::__construct();
        if($id === 0) {
            $password = password_hash($password,PASSWORD_DEFAULT);
            parent::query('INSERT INTO user (Username,Email,Password) VALUES (?,?,?)', [$username, $email, $password]);
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }else{
            $user = parent::find("user",strval($id));

            $this->id = $id;
            $this->username = count($user) == 1 ? $user[0]["Username"]: null;
            $this->email = count($user) == 1 ? $user[0]["Email"]: null;
            $this->password = count($user) == 1 ? $user[0]["Password"]: null;
        }
    }

    public function setId(int $id){
       return $this->id = $id;
    }
    public function getId(): ?int{
        return $this->id;
    }
    public function setUsername(string $username){
        return $this->username = $username;
    }
    public function getUsername(): ?string {
        return $this->username;
    }
    public function setEmail(string $email){
        return $this->email = $email;
    }
    public function getEmail(): ?string {
        return $this->email;
    }
    public function setPassword(string $password){
        $password = password_hash($password,PASSWORD_DEFAULT);
        return $this->password = $password;
    }
    public function getPassword(): ?string {
        return $this->password;
    }
}