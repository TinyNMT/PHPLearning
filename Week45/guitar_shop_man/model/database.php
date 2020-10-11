<?php
class database
{
private static $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
private static $username='root';
private static $password='';
private static $db;

private function __construct() {}
public static function getDB()
    {
        if(!isset(self::$db))
        {
             try
              {
                self::$db= new PDO(self::$dsn,self::$username,self::$password);
                echo"Kết nối cơ sở dữ liệu thành công!!!!!";
              }
           catch(PDOException $e)
              {
             $error = $e->getMessage();
              include("../loi/loi_db.php");
              exit();
              }
        }
        return self::$db;    
    }
}
?>