<?php
$dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
$username='root';
$password='';
try{
$db= new PDO($dsn,$username,$password);
echo"Kết nối cơ sở dữ liệu thành công!!!!!";
}
catch(Exception $e)
{
$error_message = $e->getMessage();
echo"<p> Lỗi : $error_message";
}
?>