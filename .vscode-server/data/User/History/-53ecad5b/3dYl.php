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
    $result = '{"user":';
      if (isset($stmt['ID'])){
        $id = $stmt['ID'];
    $token = md5(time());
    $expiration = time() + 48*60*60;
    $result .= sprintf('{"id":%d, "token":"%s", "expired":%d}', $id,$token,$expiration);
    $result .= '}';
      }
    $sql = sprintf("UPDATE `users` SET `TOKEN` = '%s', `EXPIRED` = FROM_UNIXTIME(%d) WHERE `ID` =%d", $token,$expiration,$id);
  
    $db->exec($sql);
  echo 'работает';
  
}

?>