<?php
session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("Location: admin.php");
  }
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
<link rel="stylesheet" href="css/bootsrap.css">
<link rel="stylesheet" href="css/style.css">
<body>
<div class="col-12 logo-img text-center pt-1">
        <img src="img/admin logo.png" class="img-fluid" alt="Responsive image">
</div>
<h1 class="text-center text-danger  p-4"><strong>Jauns abonements</strong></h1>
<?php
include "connect.php";
//Iegūst datus no aizpildītajiem lauciņiem
$new_vards_uzvards = $_GET["vardsuzvards"];
$new_email = $_GET["email"];
$new_telefons = $_GET["telefons"];
$new_veids = $_GET["veids"];
$new_atlaide = $_GET["atlaide"];
$new_termins = $_GET["termins"];
$new_piezime = $_GET["piezime"];
//Pievieno datus datubāzes tabulā
$sql = "INSERT INTO abonenti (id, vards_uzvards, email, telefons, abonenta_veids, atlaide, termins, piezime) VALUES (NULL, '$new_vards_uzvards', '$new_email', '$new_telefons', '$new_veids', '$new_atlaide', '$new_termins', '$new_piezime' )";
$result = $conn->query($sql) or die(mysqli_error($mysqli));
//Atrod jauno lietotāju pēc ievadītā Vārda un Uzvārda
    $sql = "SELECT id, vards_uzvards, email, telefons, abonenta_veids, atlaide, termins, piezime FROM abonenti WHERE vards_uzvards LIKE '%" . $new_vards_uzvards . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Attēlo jaunā abonementa identifikatoru
        while($row = $result->fetch_assoc()) {
            echo "<h2 class='text-white text-center'>Jaunais abonenta ID: " . $row["id"]. "</h2><br>";
        }
    } else {
        echo "Nav rezultātu, ievadījāt pareizi datus?";
    }
echo "<div class='container rounded p-3 col-md-5'>
    <div class='row'>
  <div class='col p-2 text-white text-center'>Vārds Uzvārds: $new_vards_uzvards</div>
  <div class='col p-2 text-white text-center'>E-pasts: $new_email</div>
  <div class='col p-2 text-white text-center'>Telefons: $new_telefons</div>
  <div class='w-100'></div>
  <div class='col p-2 text-white text-center'>Abonementa veids: $new_veids</div>
  <div class='col p-2 text-white text-center'>Atlaide: $new_atlaide</div>
  <div class='col-md-auto p-2 text-white text-center'>Abonementa termiņš: $new_termins </div>
  </div>
      <div class='row pl-4'>
       <div class='col-md-auto p-2 text-white text-center'>Piezīme: $new_piezime </div>
      </div>
      </div>
    <form action='/index.php' class='p-4 text-center'>
    <button name='submit' type='submit' class='btn btn-danger text-center'>Atgriezties</button>
    </form>
    </div>";                
    $conn->close();
?>
</body>
</head>
</html>