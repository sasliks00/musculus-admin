<?php
    session_start();
    //Vajadzīgais lietotājvārds
    $username = "administrators"; 
    //Vajadzīgā parole
    $password = "abonementi"; 
    //Kods pārbauda vai ievadītie dati sakrīt
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        header("Location: index.php");
    }
    if (isset($_POST['username']) && isset($_POST['password']) ){
        if ($_POST['username'] == $username && $_POST['password'] == $password){
            $_SESSION['loggedin'] = true;
            //Ja dati sakrīt tad lietotājs tiek novirzīts uz "index.php" lapu
            header("Location: index.php");
        }
    }
      
    include "connect.php";
    $conn->close();
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
<h1 class="text-center text-danger  p-4"><strong>Administratora panelis</strong></h1>
<div class="container rounded text-white col-md-3">
<form class="p-4 text-center" method="post" action="admin.php">
  <div class="form-group">
    <label for="username">Lietotājvārds:</label>
    <input type="text" class="form-control" name="username" placeholder="Lietotājvārds">
  </div>
  <div class="form-group">
    <label for="pass">Parole:</label>
    <input type="password" class="form-control" name="password" placeholder="Parole">
  </div>
  <button type="submit" class="btn btn-danger">Ielogoties</button>
</form>
</div>
</body>
</head>
</html>