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

  foreach($results as $row){
  echo ($row['name'])."<br>";
 
  }
}
else{
  echo("ERROR");
}
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

 


/*
?>

<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>*/
