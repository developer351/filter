<?php
namespace app\Db;

/**
 * class for connection for mysql database
 */
final class Connect implements ConnectInterface
{
    private $db = null;
    private static $instance = null;
    private $host = "localhost";
    private $db_name = "test";
    private $db_user = "root";
    private $db_pass = "";

    private function __construct()
    {
        try{
           $db = new \PDO("mysql:host=" . $this->host . ";dbname=" .
                                           $this->db_name,
                                           $this->db_user,
                                           $this->db_pass);
        }catch (\PDOException $e){
            throw new $e->getMessage();
        }
    }

    private function __clone()
    {
        throw new \Exception("Error clone");
    }

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect()
    {
        return $this->db;
    }

    public function closeConnect()
    {
        $db = null;
    }
}