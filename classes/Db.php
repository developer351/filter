<?php

    class Db {
       private $host= 'localhost';
       private $db_user = 'root';
       private $db_name = 'test';
       private $pass = '';
       private static $instance = null;
       private $connection;


       private function __construct(){
           try{
               $this->connection = new PDO(
                   "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                   $this->db_user, $this->pass);
               echo 'connect';
           }catch(RuntimeException $e){
               die('Error connect to database - '. $e->getMessage());
           }
       }
       private function __clone(){}
       private function __wakeup(){}
       public static function get_instance(){
           if(self::$instance === null){
               self::$instance = new self();
           }
           return self::$instance;
       }

       public function connect(){
           return $this->connection;
       }

    }

    $db = Db::get_instance();
    $db->connect();