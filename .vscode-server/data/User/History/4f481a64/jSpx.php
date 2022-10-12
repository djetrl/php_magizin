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
$stmt = $db->query("SELECT t.`ID`,t.`TITLE`,`DESCRIPTION`,`PRICE`,`COUNT`,`NAME` AS CAT FROM `tovary` AS t
JOIN `category` AS c on t.ID_CAT=ID;");
    echo '<table border="1" width="100%" cellpadding="5">';
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
    echo '<td>'.$row['NAME'].'</td>';
    echo '</tr>';
  };
    echo '</table>';
?>
