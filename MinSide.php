<!--################ -SvendeProve- ######################-->
<?php
  include('includes/session_start.php');
  include ('UsererHeader.php');
?>
<br /><br /><br />
<section id="" class="">
  <div class="container">
    <div class="row">

<?php
  $email = $_SESSION['user_email'];
  $query = "SELECT * FROM users WHERE user_email = '$email'";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
  $row = mysqli_fetch_assoc ($result);
  echo "<h3>" . $row['user_name'] . "</h3>";

	//$user_id = $_GET['user_id'];
	//$query = "SELECT * FROM users WHERE user_id = '$user_id'";
	//$result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
	//$row = mysqli_fetch_assoc ($result);
	//echo "<h3>" . $row['user_name'] . "</h3>";
?>

<h4>Du kan rette dine data:</h4>
<form method="post" enctype="multipart/form-data"><!--enctype er for at form kan indeholde billeder-->
  <div class="form-group">
  <label for="user_name_ret">Navn<br></label>
    <input type="text" name="user_name_ret" class="form-control" value="<?php echo $row['user_name'] ?>">
    </div>
    <div class="form-group">
  <label for="user_email_ret">E-mail<br></label>
    <input type="text" name="user_email_ret" class="form-control" value="<?php echo $row['user_email'] ?>">
  </div>
  <div class="form-group">
  <label for="user_pw_ret">Password<br></label>
    <input type="text" name="user_pw_ret" class="form-control" value="<?php echo $row['user_pw'] ?>">
  </div>
  <div class="form-group">
  <label for="user_phone_ret">Tlf.<br></label>
    <input type="text" name="user_phone_ret" class="form-control" value="<?php echo $row['user_phone'] ?>">
  </div>

	<input type="file" class="btn btn-info" name="filename"><br>	<!--widewimage-->

  <button type="submit" name="EditUser" class="btn btn-info" id="Button" >Ja tak, ret</button>

</form>

<?php
$user_id = $row['user_id'];

  if (isset ($_POST['EditUser'])){//hvis der trykkes på knappen ja tak....
  //tager indhold fra form feltet "kategori_ret" og ligger i variablen $kategori_ret
  $user_name_ret = $_POST['user_name_ret'];
  $user_email_ret = $_POST['user_email_ret'];
  $user_pw_ret = $_POST['user_pw_ret'];
  $user_phone_ret = $_POST['user_phone_ret'];
	$filename =  $_FILES['filename']['name'];

	if($_FILES['filename']['error'] == 0){//Hvis der er ingen fejl så kan den uploade
		$filename= $_FILES['filename']['name'];
		$filename = uniqid() . '_' . $filename;
		//giver et unikt navn til den oploadede fil så der godt kan være to filer med samme navn fra bruger side
		$image = WideImage::load($_FILES['filename']['tmp_name']);
		$resized = $image->resize(80);
		//skære filen til i en fixd størelse og putter den i en bestemt mappe
		$resized -> saveToFile("img/users/" . $_FILES['filename']['name']);


  $query = "UPDATE users SET
  user_name = '$user_name_ret',
  user_email = '$user_email_ret',
  user_pw = '$user_pw_ret',
  user_phone = '$user_phone_ret',
	user_img = '$filename'
  WHERE user_id = '$user_id'";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));



  } else if($_FILES['filename']['error'] == 4){//Hvis der opstår en fejl eller hvis der ikke er valgt et billede som skal uploades
    $query = "UPDATE users SET
    user_name = '$user_name_ret',
    user_email = '$user_email_ret',
    user_pw = '$user_pw_ret',
    user_phone = '$user_phone_ret'
    WHERE user_id = '$user_id'";
    $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));

  } else if($_FILES['filename']['error'] == 1){//Hvis der opstår en fejl eller hvis der ikke er valgt et billede som skal uploades

      echo "<h1 class='w3-padding-16 w3-text-light-grey text-center'>Billedet er for stort</h1>";

    }
    echo "<script>window.location = 'MinSide.php'</script>";


	//echo "$filename";
  // opdatere siden efter vi har trykket på "ja tak ret"
  //header( "refresh:0.5;" );
  //header("Location: EditMember.php");
  //  echo "<script>window.location = 'writer.php'</script>";
  }
?>

    </div>
  </div>
</section>

<!--################-- -over out- --######################-->
<?php include ('footer.php');?>
  </body>
</html>
<?php
    // echo '<pre>Indhold af row ';      print_r ($row);       echo '</pre>';
    // echo '<pre>Indhold af GET ';      print_r ($_GET);      echo '</pre>';
    // echo '<pre>Indhold af POST ';     print_r ($_POST);     echo '</pre>';
    // echo '<pre>Indhold af Session ';  print_r ($_SESSION);  echo '</pre>';
?>
