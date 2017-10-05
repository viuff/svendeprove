<!--################ -SvendeProve- ######################-->
<?php include ('AdmHeader.php');?>

<section id="" class="">
  <div class="container">
    <div class="row">
<br><br><br><br>

<section>
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><h4>Vil du rette:</h4></div>
    <div class="panel-body">

<?php
  $album_id = $_GET['album_id'];
  $query = "SELECT * FROM albums WHERE album_id = '$album_id'";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
  $row = mysqli_fetch_assoc ($result);
  echo "<h3>" . $row['album_title'] . "</h3>";
?>

<h4>Til</h4>
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
  <label for="album_artist_ret">Artist<br></label>
    <input type="text" name="album_artist_ret" class="form-control" value="<?php echo $row['album_artist'] ?>">
    </div>
    <div class="form-group">
  <label for="album_title_ret">Title<br></label>
    <input type="text" name="album_title_ret" class="form-control" value="<?php echo $row['album_title'] ?>">
  </div>
  <div class="form-group">
  <label for="album_genre_ret">Genre<br></label>
    <input type="text" name="album_genre_ret" class="form-control" value="<?php echo $row['album_genre'] ?>">
  </div>
  <div class="form-group">
  <label for="album_date_ret">dato<br></label>
    <input type="text" name="album_date_ret" class="form-control" value="<?php echo $row['album_date'] ?>">
  </div>
  <div class="form-group">
  <label for="album_price_ret">Pris<br></label>
    <input type="text" name="album_price_ret" class="form-control" value="<?php echo $row['album_price'] ?>">
  </div>
<!--#widewimage#-->
  <input type="file" class="btn btn-info" name="filename"><br>
  <br />
    <label for="album_img_ret">Aktuelle pic--------<br></label>
      <input type="text" name="album_img_ret" class="" size="50" value="<?php echo $row['album_img']?>">

 <img src="img/Albums/small/<?php echo $row['album_img']?>" class="img-thumbnail" alt="The Album" width="50" height="50">
<br /><br />
  <button type="submit" name="EditAlbum" class="btn btn-info" id="Button" >Ja tak, ret</button>

</form>
<?php
//onclick="setTimeout(myFunction(), 3000);"
?>

<?php
$album_id = $_GET['album_id'];

  if (isset ($_POST['EditAlbum'])){//hvis der trykkes på knappen ja tak....
  //tager indhold fra form feltet "kategori_ret" og ligger i variablen $kategori_ret
  $album_artist_ret = $_POST['album_artist_ret'];
  $album_title_ret = $_POST['album_title_ret'];
  $album_genre_ret = $_POST['album_genre_ret'];
  $album_date_ret = $_POST['album_date_ret'];
  $album_price_ret = $_POST['album_price_ret'];
  $filename =  $_FILES['filename']['name'];

  if($_FILES['filename']['error'] == 0){//Hvis der er ingen fejl så kan den uploade
   $filename= $_FILES['filename']['name'];
   $filename = uniqid() . '_' . $filename;
   //giver et unikt navn til den oploadede fil så der godt kan være to filer med samme navn fra bruger side
   $image = WideImage::load($_FILES['filename']['tmp_name']);

   //big
   $img_big = $image->resize(200, 200);
   $img_big->saveToFile("img/Albums/big/" . $filename);
   //thumb
   $img_thumb = $img_big->resize(50, 50);
   $img_thumb->saveToFile("img/Albums/small/" . $filename);

  $query = "UPDATE albums SET
  album_artist = '$album_artist_ret',
  album_title = '$album_title_ret',
  album_genre = '$album_genre_ret',
  album_date = '$album_date_ret',
  album_price = '$album_price_ret',
  album_img = '$filename'
  WHERE album_id = '$album_id'";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));

} else if($_FILES['filename']['error'] == 4){//Hvis der opstår en fejl eller hvis der ikke er valgt et billede som skal uploades
  $query = "UPDATE albums SET
  album_artist = '$album_artist_ret',
  album_title = '$album_title_ret',
  album_genre = '$album_genre_ret',
  album_date = '$album_date_ret',
  album_price = '$album_price_ret'
  WHERE album_id = '$album_id'";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));

} else if($_FILES['filename']['error'] == 1){//Hvis der opstår en fejl eller hvis der ikke er valgt et billede som skal uploades

    echo "<h1 class='w3-padding-16 w3-text-light-grey text-center'>Billedet er for stort</h1>";

  }
  echo "<script>window.location = 'adm.php'</script>";
}
?>

  <br>
  <form action="adm.php">
    <button href type="submit" name="NejTakRetIkkeStudent" class="btn btn-info" id="Button">Nej tak, fortryd</button>
  </form>
  <br>

    </div>
  </div>
</section>

<!--################-- -over out- --######################-->
<?php include ('AdmFooter.php');?>
</section>
</div>
</div>
  </body>
</html>
