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
//Iegūst Vārdu un Uzvārdu no aizpildītā lauciņa kas ir jāatrod
$keywordfromform = $_GET["keyword"];
////Meklē pēc Vārda, Uzvārda un paņem visu nepieciešamo informāciju
$sql = "SELECT id, vards_uzvards, email, telefons, abonenta_veids, atlaide, termins, piezime FROM abonenti WHERE vards_uzvards LIKE '%" . $keywordfromform . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //Attēlo informāciju par abonementu ar attiecīgo Vārdu Uzvārdu
    while($row = $result->fetch_assoc()) {
         //Kā attēlot atrastos datus
        echo "<h1 class='text-danger text-center'><strong>Abonements pēc ID: " . $row["id"]. "</strong></h1><br>";
    
        echo "<div class='container rounded p-3 col-md-5'>
        <div class='row'>
      <div class='col p-2 text-white text-center'>Vārds Uzvārds: <strong>" . $row["vards_uzvards"]. "</strong> </div>
      <div class='col p-2 text-white text-center'>E-pasts: " . $row["email"]. "</div>
      <div class='col p-2 text-white text-center'>Telefons: " . $row["telefons"]. "</div>
      <div class='w-100'></div>
      <div class='col p-2 text-white text-center'>Abonementa veids: <strong>" . $row["abonenta_veids"]. "</strong></div>
      <div class='col p-2 text-white text-center'>Atlaide: <strong>" . $row["atlaide"]. "</strong></div>
      <div class='col-md-auto p-2 text-white text-center'>Abonementa termiņš: <strong>" . $row["termins"]. "</strong></div>
      </div>
      <div class='row pl-4'>
       <div class='col-md-auto p-2 text-white text-center'>Piezīme: <strong>" . $row["piezime"]. "</strong></div>
      </div>
      </div>
       <form action='/index.php' class='p-4 text-center'>
            <button name='submit' type='submit' class='btn btn-danger text-center'>Atgriezties</button>
            </div>
            </form>       
            </div>
            </div>";
    }
} else {
    echo "<h1 class='text-danger text-center'><strong>Nav rezultātu, ievadījāt pareizi datus?</strong></h1>
    <form action='/index.php' class='p-4 text-center'>
            <button name='submit' type='submit' class='btn btn-danger text-center'>Atgriezties</button>
            </div>
            </form>";
}
//pagarinat terminu----------------------------------------
$sql = "SELECT id, vards_uzvards, email, telefons, abonenta_veids, atlaide, termins, piezime FROM abonenti WHERE vards_uzvards LIKE '%" . $keywordfromform . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h1 class='text-danger text-center'><strong>Pagarināt abonementa ID: " . $row["id"]. " termiņu</strong></h1><br>";
    
        echo '<form action="/update.php">
                 <div class="container rounded p-3 col-md-5">
                 <div class="form-group row">
        <label class="col-md-4 col-form-label text-white text-center" for="id">Abonementa ID:</label> 
        <div class="col-md-8">
         <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-address-card"></i>
        </div> 
        <input id="id" name="id" placeholder=' . $row["id"]. ' type="text" aria-describedby="idHelpBlock" required="required" class="form-control here">
        </div> 
         <span id="idHelpBlock" class="form-text text-white">Katram abonementam tiek izsniegta kluba karte un uz tās ir attiecīgā abonementa unikālais numurs</span>
        </div>
        </div> 
                   <div class="form-group row">
            <label for="example-url-input" class="col-md-4 col-form-label text-center text-white">Abonementa termiņš:</label> 
            <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar-check-o"></i>
                </div> 
                <input id="termins" name="termins" placeholder= ' . $row["termins"]. ' type="date" required="required" class="form-control here">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-4 col-8">
              <button name="submit" type="submit" class="btn btn-danger">Labot</button>
            </div>
          </div>
        </div>
        </div>
        </form>';
    }
} else {
    echo "";
}
//pievinot piezimi----------------------------------------
$sql = "SELECT id, vards_uzvards, email, telefons, abonenta_veids, atlaide, termins, piezime FROM abonenti WHERE vards_uzvards LIKE '%" . $keywordfromform . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h1 class='text-danger text-center'><strong>Pievienot piezīmi abonementam ID: " . $row["id"]. " </strong></h1><br>";
    
        echo '<form action="/update_note.php">
                 <div class="container rounded p-3 col-md-5">
                 <div class="form-group row">
        <label class="col-md-4 col-form-label text-white text-center" for="id">Abonementa ID:</label> 
        <div class="col-md-8">
         <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-address-card"></i>
        </div> 
        <input id="id" name="id" placeholder=' . $row["id"]. ' type="text" aria-describedby="idHelpBlock" required="required" class="form-control here">
        </div> 
         <span id="idHelpBlock" class="form-text text-white">Katram abonementam tiek izsniegta kluba karte un uz tās ir attiecīgā abonementa unikālais numurs</span>
        </div>
        </div> 
                   <div class="form-group row">
            <label for="example-url-input" class="col-md-4 col-form-label text-center text-white">Abonementa termiņš:</label> 
            <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-bookmark"></i>
                </div> 
                <input id="piezime" name="piezime" type="text" class="form-control here">
                </div>
                <span id="idHelpBlock" class="form-text text-white">Šeit var ievadīt piezīmi, abonements iesaldēts u.c, var atstāt tukšu un dzēst esošo piezīmi. Iesaldējot abonementu norādīt iesaldēšanas datumu!</span>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-4 col-8">
              <button name="submit" type="submit" class="btn btn-danger">Labot</button>
            </div>
          </div>
        </div>
        </div>
        </form>';
    }
} else {
    echo "";
}
//LABOT DATUS---------------------------------------------------------------------------
$sql = "SELECT id, vards_uzvards, email, telefons, abonenta_veids, atlaide, termins FROM abonenti WHERE vards_uzvards LIKE '" . $keywordfromform . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h1 class='text-danger text-center'><strong>Labot abonementa ID: " . $row["id"]. " datus</strong></h1><br>";
    
        echo '<form action="/update_full.php">
        <div class="container rounded p-3 col-md-5">
        <div class="form-group row">
        <label class="col-md-4 col-form-label text-white text-center" for="id">Abonementa ID:</label> 
        <div class="col-md-8">
         <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-address-card"></i>
        </div> 
        <input id="id" name="id" placeholder=' . $row["id"]. ' type="text" aria-describedby="idHelpBlock" required="required" class="form-control here">
        </div> 
         <span id="idHelpBlock" class="form-text text-white">Katram abonementam tiek izsniegta kluba karte un uz tās ir attiecīgā abonementa unikālais numurs</span>
        </div>
        </div> 
          <div class="form-group row">
            <label for="vardsuzvards" class="col-md-4 col-form-label text-center text-white">Vārds Uzvārds:</label> 
            <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-address-card"></i>
                </div> 
                <input id="vardsuzvards" name="vardsuzvards" placeholder=' . $row["vards_uzvards"]. 'type="text" required="required" class="form-control here">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-center text-white">E-pasts:</label> 
            <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-at"></i>
                </div> 
                <input id="email" name="email" placeholder=' . $row["email"]. ' type="text" required="required" class="form-control here">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="telefons" class="col-md-4 col-form-label text-center text-white">Telefons:</label> 
            <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-mobile"></i>
                </div> 
                <input id="telefons" name="telefons" placeholder=' . $row["telefons"]. ' type="text" required="required" class="form-control here">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 text-white text-center">Abonenta veids:</label> 
            <div class="col-md-8">
              <label class="custom-control custom-radio">
                <input name="veids" type="radio" required="required" class="custom-control-input" value="Brīvais"> 
                <span class="custom-control-indicator"></span> 
                <span class="custom-control-description text-white">Brīvais</span>
              </label>
              <label class="custom-control custom-radio">
                <input name="veids" type="radio" required="required" class="custom-control-input" value="Dienas"> 
                <span class="custom-control-indicator"></span> 
                <span class="custom-control-description text-white">Dienas</span>
              </label>
              <label class="custom-control custom-radio">
                <input name="veids" type="radio" required="required" class="custom-control-input" value="Nakts"> 
                <span class="custom-control-indicator"></span> 
                <span class="custom-control-description text-white">Nakts</span>
              </label>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 text-white text-center">Students vai pensionārs:</label> 
            <div class="col-md-8">
              <label class="custom-control custom-radio">
                <input name="atlaide" type="radio" required="required" class="custom-control-input" value="Nav"> 
                <span class="custom-control-indicator"></span> 
                <span class="custom-control-description text-white">Nav</span>
              </label>
              <label class="custom-control custom-radio">
                <input name="atlaide" type="radio" required="required" class="custom-control-input" value="Students"> 
                <span class="custom-control-indicator"></span> 
                <span class="custom-control-description text-white">Students</span>
              </label>
              <label class="custom-control custom-radio">
                <input name="atlaide" type="radio" required="required" class="custom-control-input" value="Pensionārs"> 
                <span class="custom-control-indicator"></span> 
                <span class="custom-control-description text-white">Pensionārs</span>
              </label>
            </div>
          </div> 
             <div class="form-group row">
            <label for="example-url-input" class="col-md-4 col-form-label text-center text-white">Abonementa termiņš:</label> 
            <div class="col-md-8">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar-check-o"></i>
                </div> 
                <input id="termins" name="termins" placeholder="date" type="date" required="required" class="form-control here">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-4 col-md-8">
              <button name="submit" type="submit" class="btn btn-danger">Labot</button>
            </div>
          </div>
        </div>
        </form>';
    }
} else {
    echo "";
}
$conn->close();
?>
</body>
</head>
</html>