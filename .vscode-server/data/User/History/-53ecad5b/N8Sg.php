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

    $sql = sprintf('INSERT INTO `users` (`LOGIN` , `PASSW`) VALUES(\'%s\', \'%s\')',$login, $password) ;
    $result = '{"user":{"text": "Пользователь успешно авторизован"}}';
    
    $db->exec($sql);
   
    echo $result;
}

?>