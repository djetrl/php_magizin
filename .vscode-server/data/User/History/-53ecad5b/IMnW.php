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


  
  $sql = sprintf('INSERT INTO `users` VALUES (, \'%s\',\'%s\' ',$login, $password);
  $result = '{"user":';
  $stmt = $db->query($sql)->fetch();

  while ($row = $stmt->fetch()) {
  
  $db->exec($sql);
  }

echo $result;

?>