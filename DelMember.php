<?php include ('AdmHeader.php');?>
<!--############################# adgangs tjekker ###################################-->
<?php if (isset($_GET['logout'])) {
  unset($_SESSION['adgang']);
}
if (!isset($_SESSION['adgang']) && $_SESSION['level'] != 1) {
  die(header('location:index.php'));
} ?>

<br><br><br>
<div class="container">

<section>
<br>
<a href='adm.php' class="btn btn-info btn-block" >til adm forside</a>
<br>

<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
   <title>slet bruger</title>
   <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
<br>

<div class="panel panel-default">
<h4>Vil du slette bruger?</h4>

<?php
  $user_id = $_GET['user_id'];

  $query = "SELECT * FROM users WHERE user_id = $user_id";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));

  $row = mysqli_fetch_assoc ($result);

  	echo "<h3>" . $row['user_name'] ." ". $row['user_email'] ."</h3>";

  //echo $result;
?>
<form method="post">
  <button type="submit" name="JaTakSletElev" class="btn btn-info" id="Button">Ja tak, slet</button>
</form>

<?php
if (isset ($_POST['JaTakSletElev'])){
$query = "DELETE FROM users WHERE user_id = $user_id";
$result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
//sender os tilbage til oversigten efter vi har trykket på "ja tak slet"
header ("location:adm.php");
}
//echo "$user_id";
?>

<br>
<form action="adm.php">
  <button href type="submit" name="NejTakSletIkkeElev" class="btn btn-info" id="Button">Nej tak, fortryd</button>
</form>
<!--################-- -over out- --######################-->
<?php include ('AdmFooter.php');?>
</section>
</div>
</div>
  </body>
</html>
