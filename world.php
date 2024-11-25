<?php




$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country']?? '';


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($results){
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  //print_r($results);

 // foreach($results as $row){
  //echo ($row['name'])."<br>";
 
  //}
}
else{
  echo("ERROR");
}
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php if($results): ?>
 <table>
  <tr>
    <th>Country Name</th>
    <th> Continent</th>
    <th>Independence year</th>
    <th>Head of state</th>

  </tr>
  
  <?php foreach($results as $row): ?>

    <tr>
      <th><?= $row['name']?></th>
      <th><?= $row['continent']?></th>
      <th><?= $row['independence_year']?></th>
      <th><?= $row['head_of_state']?></th>

    </tr>

    <?php endforeach; ?>
 </table>

 <?php elseif(!$results): ?>

  <?php endif; ?>



