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
            $query = parent::findBy("user",["Email"=> $email]);
            $user = $query->fetchAll(); 
            if(count($user) > 0){
                return new User($user[0]["ID_USER"], $user[0]["Username"], $user[0]["Email"], $user[0]["Password"]);
            }else{
                return null;
            }
         }
    }
