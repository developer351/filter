<?php
namespace Filter\Db;

/**
 * class for connection for mysql database
 */
final class Db implements DbInterface
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
            $this->db = $db;
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

    public function select($quantity, $country, $currency, $area, $table)
    {
        if(empty($area)){
            $area = '*';
        }else{
            $area = implode(",",$area);
        }
            if(!empty($quantity)) {
                $query = "SELECT " . $area . " FROM " . $table . " as p
                JOIN countries c ON c.id = p.country_id
                JOIN currency cn ON cn.id = p.currency_id
                WHERE p.price > :quantity and c.name = :cname and cn.name= :cnname";
                $result = $this->connect()->query($query);
                $result->bindParam(':cname', $country);
                $result->bindParam(':cnname', $currency);
                $result->bindParam(':quantity', $quantity);
                $result->execute();
                $row = $result->fetchAll();
                return $row;

            }else{
                print_r($table);
                $query = "SELECT $area FROM $table";
                $result = $this->connect()->query($query);
                $row = $result->fetchAll();
                return $row;
            }



    }

    public function closeConnect()
    {
        $db = null;
    }
}