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
<?php
include "connect.php";
//Iegūst jaunos datus
$idfromform = $_GET["id"];
$new_piezime = $_GET["piezime"];
//Aizvieto vecos datus ar jaunajiem
$sql = "UPDATE abonenti SET piezime= '$new_piezime' WHERE id='$idfromform'";
$result = $conn->query($sql) or die(mysqli_error($mysqli));
//paradit ko update
$sql = "SELECT id, vards_uzvards, email, telefons, abonenta_veids, atlaide, termins, piezime FROM abonenti WHERE id LIKE '" . $idfromform . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h1 class='text-danger text-center'><strong>Abonementa ID: " . $row["id"]. " piezīme labota!</strong></h1><br>";
        
            echo "<div class='container rounded p-3 col-md-5'>
        <div class='row'>
      <div class='col p-2 text-white text-center'>Vārds Uzvārds: <strong>" . $row["vards_uzvards"]. "</strong> </div>
      <div class='col p-2 text-white text-center'>E-pasts: " . $row["email"]. "</div>
      <div class='col p-2 text-white text-center'>Telefons: " . $row["telefons"]. "</div>
      <div class='w-100'></div>
      <div class='col p-2 text-white text-center'>Abonementa veids: <strong>" . $row["abonenta_veids"]. "</strong></div>
      <div class='col p-2 text-white text-center'>Atlaide: <strong>" . $row["atlaide"]. "</strong></div>
      <div class='col-md-auto p-2 text-white text-center'>Jaunais Abonementa termiņš: <strong>" . $row["termins"]. "</strong></div>
      </div>
      <div class='row pl-4'>
       <div class='col-md-auto p-2 text-white text-center'>Piezīme: <strong>" . $row["piezime"]. "</strong></div>
      </div>
      </div>
       <form action='/index.php' class='p-4 text-center'>
            <button name='submit' type='submit' class='btn btn-danger text-center'>Atgriezties</button>
            </div>
            </form>       
            </div>";
    }
} else {
    echo "Nav rezultātu, ievadījāt pareizu abonementa numuru?";
}
    $conn->close();
?>
</body>
</head>
</html>