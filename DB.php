<?php
namespace Photos;
use mysqli;


class DB { 
        static $host = "localhost";
        static $user = "root";
        static $password = "";
        static $database = "photos2";
        public $link;

        public function __construct(){
            $this ->link = mysqli_connect(DB::$host, DB::$user, DB::$password, DB::$database);
            $this->link->set_charset("utf8");
        }

        public function get_all_photos(){
            $sql_result = $this->link->query("SELECT * FROM `photos` ORDER BY `id` DESC");
            if ($sql_result->num_rows){
                return $sql_result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
        }

        public function get_all_user_photos($uid){
            $sql_result = $this->link->query("SELECT * FROM `photos` WHERE `Uid` = $uid ORDER BY `id` DESC");
            if ($sql_result->num_rows){
                return $sql_result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
        }
    
        public function check_user($login, $password){
             $sql_result = $this->link->query("SELECT * FROM `user` WHERE `Email` = '$login' and `Password` = '$password'");
            if ($sql_result->num_rows){
                $user = $sql_result->fetch_assoc();
                return $user["id"];
        }
        return false;
        }

        public function check_login($login){
             $sql_result = $this->link->query("SELECT * FROM `user` WHERE `Email` = '$login'");
            if ($sql_result->num_rows){
                return true;
        }
        return false;
        
        }

        public function new_user($login, $password){
            $this->link->query("INSERT INTO `user` (Name, Password, Email) VALUES ('', '$password', '$login')");
            
        }

        public function new_photo($uid, $img, $text){
            $this->link->query("INSERT INTO `photos` (Uid, Image, Text, Tags) VALUES ($uid, '$img', '$text', '')");
        }

        public function get_photo_by_id($photo_id){
            $sql_result = $this->link->query("SELECT `p`.*, `u`.`Name` FROM photos2.photos `p` LEFT JOIN photos2.`user` `u` on `u`.`Id` = `p`.`Uid` WHERE `p`.`Id` = '$photo_id' "); 
            if ($sql_result->num_rows){
                return $sql_result->fetch_array();
            }
            return false;
        }

        public function get_photo_comments($photo_id){
            $sql_result = $this->link->query("SELECT `c`.*, `u`.`Name` FROM photos2.comment `c` LEFT JOIN photos2.`user` `u` on `u`.`Id` = `c`.`Uid` WHERE `c`.`PId` = '$photo_id' ORDER BY `Id` DESC"); 
             if ($sql_result->num_rows){
                return $sql_result->fetch_all(MYSQLI_ASSOC);
            }
            return [];
        }

        public function add_comment($pid, $uid, $text){
            $date = date("Y-m-d");
            $this->link->query("INSERT INTO `comment` (Pid, Uid, Text, Post_date) VALUES ($pid, $uid, '$text', '$date')");
            $last_id = $this->link->insert_id;
            $inserted_comment = $this->link->query("SELECT `c`.*, `u`.`Name` FROM `comment` `c` LEFT JOIN `user` `u` on `u`.`Id` = `c`.`Uid` WHERE `c`.`Id` = '$last_id'");
            return $inserted_comment->fetch_assoc();
        }
    }

?>