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

    $login = $_GET['login'];
    $password = $_GET['password'];

    $sql = sprintf('INSERT INTO `users` (`LOGIN` , `PASSW`) VALUSE("FDSF", "1231")') ;




?>