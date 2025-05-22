<?php
namespace Photos;
use mysqli;


class DB { 
        static $host = "localhost";
        static $user = "root";
        static $password = "";
        static $database = "photos";
        public $link;

        public function __construct(){
            $this ->link = mysqli_connect(DB::$host, DB::$user, DB::$password, DB::$database);
            $this->link->set_charset("utf8");
        }

        public function get_all_photos(){
            $sql_result = $this->link->query("SELECT * FROM `photo`");
            if ($sql_result->num_rows){
                return $sql_result->fetch_all(MYSQLI_ASSOC);
        }
        return [];

    }
}

?>