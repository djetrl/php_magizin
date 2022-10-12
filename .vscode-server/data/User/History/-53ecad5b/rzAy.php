<?php
$host = 'db';
$db_name = "magazin";
$db_user = 'root';
$db_pas = '1234';

try{
$db = new PDO('mysql:host='. $host. ';dbname='.$db_name,$db_user,$db_pas);
}
catch (PDOException $e) {
print "error:" . $e->getMessage();
die();

}

$result = '';

  $login = $_GET['login'];
  $password = $_GET['password'];
  
  $sql = sprintf('SELECT LAST_INSERT_ID();');
  $result = '{"user":';
  $stmt = $db->query($sql)->fetch();
SELECT LAST_INSERT_ID();
else {
$result = '{"error":{"text": "Неверный логин/пароль}}';
}


else {
$result = '{"error":{"text": "не передан логин/пароль}}';
}
echo $result;
?>