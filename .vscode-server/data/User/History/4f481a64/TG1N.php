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
    ?>

<table border='1' width='100%' cellpadding='5'>
<tr>
 <th>ID</th>
 <th>TITLE</th>
 <th>DESCRIPTION</th>
 <th>PRICE</th>
 <th>COUNT</th>
 <th>ID_CAT</th>
</tr>
<tr>
<th>".<?php echo $row['TITLE'] . ?>" </th>
<th>TITLE</th>
<th>DESCRIPTION</th>
<th>PRICE</th>
<th>COUNT</th>
<th>ID_CAT</th>
</tr>
</table>
;
};
