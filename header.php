<?php //###### projekt: terminsprøve #########
  //start session som det første


  //session_destroy();
  //slå fejl rapotering til
  error_reporting(E_ALL);
  include('includes/db_connect.php');
  include ("includes/wideimage-11.02.19/lib/WideImage.php");
 ?>
<!DOCTYPE html>
  <html lang="en">
  <!--Bygget på: https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_temp_webpage&stacked=h-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SvendePrøve</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/style-w3.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="includes/my.js"></script>
    <!-- slideshow -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="TopBanner">
        <img src="img/dj_grunk_logo.png" class="TopBanner" alt="TopBanner" width="20%">
      </div>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" class="btn navbar-toggle btn-danger navbar-btn" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand" href="index.php">Forsiden</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><a href="musikbutikken.php">Musikbutikken</a></li>
              <li><a href="#">Anmeldelser</a></li>
              <li><a href="MinSide.php">Min Profil</a></li>
              <li><a href="KontaktFormular/index.php">Kontakt</a></li>
              <li><a href="login.php">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>

    </div>
  </div>
