<!--################ -SvendeProve- ######################-->
<?php include ('AdmHeader.php');?>
<!--########################### adgangs tjekker #############################-->
<?php if (isset($_GET['logout'])) {
  unset($_SESSION['adgang']);
}
if (!isset($_SESSION['adgang']) && $_SESSION['level'] != 1) {
  die(header('location:index.php'));
} ?>
<!--############################  ################################-->
<div class="container">

<br><br><br>
<!--################ -html 0pret album- ######################-->
<h4>Du kan oprette albums her:</h4>
<section>
     <form method="post" enctype="multipart/form-data">
       <div class="form-group">
     		<label for="album_title">Abum Navn<br></label>
        <input type="text" name="album_title"  required="" placeholder="skriv Album navn her" class="form-control">
        </div>
        <div class="form-group">
       	<label for="album_artist">Album Artist<br></label>
        <input type="text" name="album_artist"  required="" placeholder="skriv Artist navn her" class="form-control">
        </div>
        <div class="form-group">
     		<label for="album_genre">Album Genre<br></label>
         <input type="text" name="album_genre"  required="" placeholder="skriv genre her" class="form-control">
         </div>
         <div class="form-group">
        <label for="album_date">Album er fra, dato:<br></label>
        <input type="text" name="album_date"  required="" placeholder="sæt dato her" class="form-control">
        </div>
        <div class="form-group">
       <label for="album_price">Album pris:<br></label>
       <input type="text" name="album_price"  required="" placeholder="skriv pris her" class="form-control">
       </div>

       <input type="file" class="btn btn-info" name="filename"><br>	<!--widewimage-->

        <input type="submit" name="CreateAlbumButton" value="Opret Album" id="Button" class="btn btn-info"><br>
     </form>
</section>

<!--################-- -php 0pret album- --######################-->
<?php
     //vil have fat i hvad der skrives vha $_POST i formular felterene
     //når der trykkes på opret knappen
     if (isset ($_POST['CreateAlbumButton']))
       {
       $album_title=mysqli_real_escape_string ($dbcon ,$_POST['album_title']);
       $album_artist=mysqli_real_escape_string ($dbcon ,$_POST['album_artist']);
       $album_genre=mysqli_real_escape_string ($dbcon ,$_POST['album_genre']);
       $album_date=mysqli_real_escape_string ($dbcon ,$_POST['album_date']);
       $album_price=mysqli_real_escape_string ($dbcon ,$_POST['album_price']);
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
        }

     $sql=mysqli_query ($dbcon ,"INSERT INTO albums(album_title, album_artist, album_genre, album_date, album_price, album_img)
     VALUES('$album_title','$album_artist','$album_genre','$album_date', '$album_price', '$filename') ");

     echo "<script>window.location = 'adm.php'</script>";
   }
     //or die ( mysql_error ()");

// echo '<pre>Indhold af POST ';     print_r ($_POST);     echo '</pre>';

?>
<!--################-- -over out- --######################-->
<?php include ('AdmFooter.php');?>
</div>

  </body>
</html>
