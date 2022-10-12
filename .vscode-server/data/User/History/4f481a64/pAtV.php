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
$stmt = $db->query("SELECT `ID`,`TITLE`,`DESCRIPTION`,`PRICE`,`COUNT`,`ID_CAT` FROM `tovary`");
while ($row = $stmt->fetch()) {
    echo $row['TITLE'].'----- '.$row['DESCRIPTION'].'----'.$row['PRICE'].'<br>';


echo "<table border = '1'>
<tr><td>1.1</td><td>1.2</td></tr>
<tr><td>". var_dump( $row['TITLE']) ."</td><td>2.2</td></tr>
</table>";
};
?>


