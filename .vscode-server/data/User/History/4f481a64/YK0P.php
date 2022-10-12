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


    echo '<table border="1">';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>TITLE</td>';
    echo '<td>DESCRIPTION</td>';
    echo '<td>PRICE</td>';
    echo '<td>COUNT</td>';
    echo '<td>ID_CAT</td>';
    echo '</tr>';
    while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td>'.$row['ID'].'</td>';
    echo '<td>'.$row['TITLE'].'</td>';
    echo '<td>'.$row['DESCRIPTION'].'</td>';
    echo '<td>'.$row['PRICE'].'</td>';
    echo '<td>'.$row['COUNT'].'</td>';
    echo '<td>'.$row['ID_CAT'].'</td>';
    echo '</tr>';
  };
    echo '</table>';

?>


