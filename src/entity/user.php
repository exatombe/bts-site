<?php
/**
 * Classe Utilisateur, (pour créer et ou gérer un utilisateur)
 */
class User
{
    /** @param id  */
    private $id;
    /** @param username */
    private $username;
    /** @param email*/
    private $email;
    /** @param password  */
    private $password;
    public function __construct(?int $id = null, ?string $username = null, ?string $email = null, ?string $password = null)
    {
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }
    public function getUsername(): ?string
    {
        return $this->username;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setPassword(string $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
        return $this;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }
}
