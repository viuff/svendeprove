<!--################ -SvendeProve userheader.php- ######################-->
<?php
  //start session som det første

  //slå fejl rapotering til
  error_reporting(E_ALL);
  //<!--################## adgangs tjekker ######################-->
if (isset($_GET['logout'])) {
    unset($_SESSION['adgang']);
  }
  if (!isset($_SESSION['adgang']) && $_SESSION['level'] != 0) {
    die(header('location:index.php'));
  }
//  <!--################ include #######################-->
  include ('includes/db_connect.php');
  include ("includes/wideimage-11.02.19/lib/WideImage.php");
 ?>
<!DOCTYPE html>
  <html lang="en">
  <!--Bygget på: Scrolling Nav - Start Bootstrap Template-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Adm. Grunk</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

  <div class="container">
    <div class="row">
<!--#############################-Navigation-###################################-->
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand page-scroll" href="index.php">Grunk</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav">
                  <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                  <li class="hidden">
                      <a class="page-scroll" href="#page-top"></a>
                  </li>
                  <li>
                    <a class="page-scroll" href="musikbutikken.php">Musikbutikken</a>
                  </li>
                  <li>
                      <a class="page-scroll" href="user.php">Min Samling</a>
                  </li>
                  <li>
                      <a class="page-scroll" href="articles.php">Mine Anmeldelser</a>
                  </li>
                  <li>
                      <a class="page-scroll" href="MinSide.php">Min profil</a>
                  </li>
                  <li>
                      <a class="page-scroll" href="LogOut.php">Log ud</a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
        </nav>
      </div>
      <!-- /.container -->
    </div>
