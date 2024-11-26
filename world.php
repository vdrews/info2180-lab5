<?php




$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country']?? '';
$city = $_GET['city'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt= $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($city == "false"){
  $stmt= $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

elseif($city=="true"){
  $stmt = $conn->query("SELECT c.id, c.name AS city , c.district , c.country_code, cs.name, c.population FROM cities c JOIN countries cs ON c.country_code = cs.code WHERE cs.name LIKE '%$country%'  ");


}
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*

if($results){
  $stmt = $conn->query("SELECT c.name as city,c.district, c.population FROM cities c JOIN countries cs on c.country_code = cs.code WHERE c.population;");



}
else{
  $stmt = $conn->query("SELECT c.name as city,c.district, c.population FROM cities c JOIN countries cs on c.country_code = cs.code WHERE c.population;");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //echo("ERROR");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/

?>


<?php if($city == "false"): ?>
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

 <?php elseif($city=="true"): ?>
  <table>
  <tr>
    <th> Name</th>
    <th> District</th>
    <th>Population</th>
    
  </tr>
  
  <?php foreach($results as $row): ?>

    <tr>
      <th><?= $row['name']?></th>
      <th><?= $row['district']?></th>
      <th><?= $row['population']?></th>
      
    </tr>

    <?php endforeach; ?>
 </table>

  <?php endif; ?>



