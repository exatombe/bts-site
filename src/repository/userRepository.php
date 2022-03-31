<?php
    include $_SERVER['DOCUMENT_ROOT'].'/src/entity/user.php';
    trait UserRepository{
        public function __construct(){
            parent::__construct();
        }

        public function insertUser(User $user): string
        {
           parent::query('INSERT INTO user (Username,Email,Password) VALUES (?,?,?)', [$user->getUsername(),$user->getEmail(),$user->getPassword()]);
           return $this->getDb()->lastInsertId();
        }

        public function findUser(User $user): User
        {
            $user = parent::find("user", $user->getId());
            return new User($user[0]["ID_USER"], $user[0]["Username"], $user[0]["Email"], $user[0]["Password"]);
        }

        public function deleteUser(User $user): ?int
        {
            $query = parent::query("DELETE FROM user WHERE ID_USER = ?", [$user->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return null;
            }
        }

        public function updateUser(User $user): ?int
        {
           $query = parent::query("UPDATE user SET Username = ?, Email = ?, Password = ? WHERE ID_USER = ?", [$user->getUsername(),$user->getEmail(),$user->getPassword(),$user->getId()]);
           if($query){
               return $query->rowCount();
           }else{
               return null;
           }
        }

        public function getUserByEmail(string $email): ?User
        {
            $user = parent::findOneBy("user",["Email"=> $email]);
            if($user){
                return new User($user["ID_USER"], $user["Username"], $user["Email"], $user["Password"]);
            }else{
                return null;
            }
         }
    }
