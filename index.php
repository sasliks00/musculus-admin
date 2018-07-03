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
<h1 class="text-center text-danger  p-4"><strong>Datubāze</strong></h1>
<a class="btn btn-warning text-center" href="logout.php" role="button">Izlogoties</a>

<form action="/search_id.php">
    <div class="container rounded p-3 col-md-5">
  <div class="form-group row">
    <label class="col-sm-4 col-form-label text-white text-center" for="id">Meklēt pēc abonementa ID:</label> 
    <div class="col-md-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-address-card"></i>
        </div> 
        <input id="id" name="id" placeholder="Abonementa numurs" type="text" aria-describedby="idHelpBlock" required="required" class="form-control here">
      </div> 
      <span id="idHelpBlock" class="form-text text-white">Katram abonementam tiek izsniegta kluba karte un uz tās ir attiecīgā abonementa unikālais numurs</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-danger">Meklēt</button>
    </div>
  </div>
  </div>
</form>

<form action="/search_keyword.php">
<div class="container rounded p-3 col-md-5">
  <div class="form-group row">
    <label for="keyword" class="col-sm-4 col-form-label text-center text-white">Meklēt pēc Vārda Uzvārda:</label> 
    <div class="col-md-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-address-card-o"></i>
        </div> 
        <input id="keyword" name="keyword" placeholder="Vārds Uzvārds" type="text" aria-describedby="keywordHelpBlock" class="form-control here" required="required">
      </div> 
      <span id="keywordHelpBlock" class="form-text text-white">Vārds Uzvārds jāmeklē lai būtu pareizi uzrakstīts un ar vajadzīgām mīkstinājuma zīmēm. Vārdu un uzvārdu rakstīt ar atstarpi</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-danger">Meklēt</button>
    </div>
  </div>
  </div>
</form>
<hr>
<h1 class="text-center text-danger pb-4"><strong>Reģistrēt jaunu abonementu</strong></h1>
<form action="/add_user.php">
<div class="container rounded p-3 col-md-5">
  <div class="form-group row">
    <label for="vardsuzvards" class="col-4 col-form-label text-center text-white">Vārds Uzvārds:</label> 
    <div class="col-md-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-address-card"></i>
        </div> 
        <input id="vardsuzvards" name="vardsuzvards" placeholder="Vārds Uzvārds" type="text" required="required" class="form-control here">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label text-center text-white">E-pasts:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-at"></i>
        </div> 
        <input id="email" name="email" placeholder="E-pasts" type="text" required="required" class="form-control here">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="telefons" class="col-4 col-form-label text-center text-white">Telefons:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-mobile"></i>
        </div> 
        <input id="telefons" name="telefons" placeholder="Telefons" type="text" required="required" class="form-control here">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4 text-white text-center">Abonenta veids:</label> 
    <div class="col-8">
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
    <label class="col-4 text-white text-center">Students vai pensionārs:</label> 
    <div class="col-8">
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
    <label for="example-url-input" class="col-4 col-form-label text-center text-white">Abonementa termiņš:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar-check-o"></i>
        </div> 
        <input id="termins" name="termins" placeholder="date" type="date" required="required" class="form-control here">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="piezime" class="col-4 col-form-label text-center text-white">Piezīme:</label> 
    <div class="col-md-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-bookmark"></i>
        </div> 
        <input id="piezime" name="piezime" placeholder="Var atstāt tukšu" type="text" class="form-control here">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-danger">Reģistrēt</button>
    </div>
  </div>
</div>
</form>
<?php  
include "connect.php";
$conn->close();
?>
</head>
</body>
</html>