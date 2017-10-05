<!--################ -SvendeProve- ######################-->
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

<div class="panel panel-default">
<h4>Vil du slette albummet?</h4>

<?php
  $album_id = $_GET['album_id'];

  $query = "SELECT * FROM albums WHERE album_id = $album_id";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));

  $row = mysqli_fetch_assoc ($result);

  	echo "<h3>" . $row['album_title'] ." af ". $row['album_artist'] ."</h3>";

  //echo $result;
?>
<form method="post">
  <button type="submit" name="JaTakSletAlbum" class="btn btn-info" id="Button">Ja tak, slet</button>
</form>

<?php
if (isset ($_POST['JaTakSletAlbum'])){
$query = "DELETE FROM albums WHERE album_id = $album_id";
$result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
//sender os tilbage til oversigten efter vi har trykket på "ja tak slet"
header ("location:adm.php");
}
//echo "$user_id";
?>

<br>

  <button href type="submit" name="NejTakSletIkkeElev" class="btn btn-info" id="Button">Nej tak, fortryd</button>
</form>
<!--################-- -over out- --######################-->
<?php include ('AdmFooter.php');?>
</section>
</div>
</div>
  </body>
</html>
