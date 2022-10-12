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
if (!empty($_GET['login']) && !empty($_GET['password'])) {
  $login = $_GET['login'];
  $password = $_GET['password'];
  
  $sql = sprintf('SELECT `ID`, `LOGIN` FROM `users` WHERE `LOGIN` LIKE \'%s\' AND `PASSW` LIKE \'%s\' ', $login,$password);
  $result = '{"user":';


  $token = md5(time());
  $expiration = time() + 48*60*60;
  $result .= sprintf('{"id":%d, "token":"%s", "expired":%d}', $id,$token,$expiration);
  $result .= '}';
  $db->exec($sql);

else {
$result = '{"response":{"text": "Пользователь успешно авторизован"}}';
}

}
else {
$result = '{"error":{"text": "не передан логин/пароль"}}';
}

?>