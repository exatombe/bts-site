<?php
    // include User class
    include './src/entity/user.php';
    trait UserRepository{
        public function __construct(){
            parent::__construct();
        }

        public function insertUser(User $user){
           $this->db->query('INSERT INTO user (Username,Email,Password) VALUES (?,?,?)', [$user->getUsername(),$user->getEmail(),$user->getPassword()]);
        }

        public function findUser(User $user){
            $user = $this->db->find("user", $user->getId());
            return new User($user[0]["ID_USER"], $user[0]["Username"], $user[0]["Email"], $user[0]["Password"]);
        }

        public function deleteUser(User $user){
            $this->db->query("DELETE FROM user WHERE ID_USER = ?", [$user->getId()]);
        }

        public function updateUser(User $user){
            $this->db->query("UPDATE user SET Username = ?, Email = ?, Password = ? WHERE ID_USER = ?", [$user->getUsername(),$user->getEmail(),$user->getPassword(),$user->getId()]);
        }

        public function getUserByEmail(string $email){
            $query = $this->db->findBy("user",["Email"=> $email]);
            $user = $query->fetchAll(); 
            if(count($user) > 0){
                return new User($user[0]["ID_USER"], $user[0]["Username"], $user[0]["Email"], $user[0]["Password"]);
            }else return false;
         }
    }
?>