<?php
session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("Location: admin.php");
  }
?>
<html>
<head>
<?php
//get database
$sql = "SELECT id, vards_uzvards, email, telefons, abonenta_veids, atlaide, termins FROM abonenti";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h2 class='text-white text-center'>Jaunais abonenta ID: " . $row["id"]. " Vārds Uzvārds: " . $row["vards_uzvards"]. " Abonenta termiņš: " . $row["termins"]. " Atlaide: " . $row["atlaide"]. " Abonenta Veids: " . $row["abonenta_veids"]. " E-pasts: " . $row["email"]. " Telefons: " . $row["telefons"]. "<br>";
    }
} else {
    echo "0 results";
}
echo "<br>";
$conn->close();
?>
</html>
</head>