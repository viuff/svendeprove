<?php
  include('includes/session_start.php');
  if (isset($_SESSION['adgang'])) {
    include ('UsererHeader.php');
      $user_type = "user";
  } else {
        include ('header.php');
        $user_type = "none";
  }
?>

<br><br><br><br>
<?php

// Get Album data
$album_id = $_GET['album'];
mysqli_query($dbcon, "SET NAMES utf8");
$query = "SELECT * FROM albums WHERE album_id = $album_id ";
$result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
$rowAlbum = mysqli_fetch_assoc ($result);



if ($user_type  == "user") {
  
  // Get User data
  $user_email = $_SESSION['user_email'];
  $query = "SELECT * FROM users WHERE user_email = '$user_email'";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
  $row = mysqli_fetch_assoc ($result);
  //echo "<h3>" . $row['user_name'] . ": ". $row['user_grunker']. " grunker</h3>";


  if (isset ($_POST['kob'])) {
    $userGrunker = $row['user_grunker'];
    $userId = $row['user_id'];
    $albumPrice = $rowAlbum['album_price'];
    $albumId = $rowAlbum['album_id'];
    $mayBuy = false;

    $updateUserGrunker = $userGrunker - $albumPrice;

    if ($userGrunker >= $albumPrice) {
      $mayBuy = true;
    }

    if ($mayBuy == true) {

      
      $query = "INSERT INTO album_user(fk_album_id, fk_user_id )
        VALUES('$albumId','$userId') ";
      mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));

      $query = "UPDATE users SET
        user_grunker = '$updateUserGrunker'
        WHERE user_id = '$userId'";
      mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));

      $albumSaleNumber = $rowAlbum['album_sale_no'] + 1;
      $query = "UPDATE albums SET
      album_sale_no = '$albumSaleNumber'
      WHERE album_id = '$albumId'";
      mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));

      echo "<div class='shoppingSuccess' onClick='$(this).hide()' ><h2>Tillykke dit køb er gået igennem</h2></div>";

    } else {

      echo "<div class='shoppingSuccess' onClick='$(this).hide()' ><h2>Der var desværre ikke Grunker nok på kontoen</h2></div>";
    }
  }
}

?>
<div class="container">
<section>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h2><?php echo "<h3>" . $row['user_name'] . ": ". $row['user_grunker']. " grunker</h3>";?></h2>
  </div>
  <div class="panel-body">
    <p>Her er en du gerne vil købe</p>
  </div>

<!-- Table -->
<table class="table">
  <tr>
    <th>Artist</th>
    <th>Navn</th>
    <th>Genre</th>
    <th>Dato</th>
    <th>Pris</th>
    <th>img</th>
    <th>Antal solgt</th>
  </tr>
  <!-- start while løkke  -->

      <tr>

        <td><?php echo $rowAlbum['album_artist']; ?></td>
        <td><?php echo $rowAlbum['album_title']; ?></td>
        <td><?php echo $rowAlbum['album_genre']; ?></td>
        <td><?php echo $rowAlbum['album_date']; ?></td>
        <td><?php echo $rowAlbum['album_price']; ?></td>
        <td> <img src="img/Albums/big/<?php echo $rowAlbum['album_img']?>" class="img-thumbnail" alt="The Album" width="200" height="200"></td>
        <td><?php echo $rowAlbum['album_sale_no']; ?></td>

      </tr>
      <!-- slut while løkke  -->
    </table>



<?php  if ($user_type  == "user") { ?>

  <!--<input type="button" value="KØB NU" />-->
  <form method="post">
    <input type="hidden" name="album" value="<?php echo $_GET['album'] ?>"/>
    <button type="submit" name="kob" class="btn btn-info" id="Button">KØB NU</button>
  </form>

<?php } else { ?>

<form action="login.php">
  <button type="submit" name="" class="btn btn-info" id="Button">Log ind for at købe</button>
</form>

  <?php } ?>

</section>

<!--################-- -over out- --######################-->
<?php include ('footer.php');?>
</div>
</div>
  </body>
</html>
<?php
    echo '<pre>Indhold af row ';      print_r ($row);       echo '</pre>';
    echo '<pre>Indhold af GET ';      print_r ($_GET);      echo '</pre>';
    echo '<pre>Indhold af POST ';     print_r ($_POST);     echo '</pre>';
    echo '<pre>Indhold af Session ';  print_r ($_SESSION);  echo '</pre>';
?>
