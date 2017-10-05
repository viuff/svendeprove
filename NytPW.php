<?php
	//start session son det første
	session_start();
	//slå fejl rapotering til
	error_reporting(E_ALL);
  include ('includes/db_connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Nyt PW</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link href="css/style.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<!--....................formular....................-->
		<div class="container">
	  		<h2>Nyt PassWord</h2>

			<form method="post">
				<div class="form-group">
	 				<label for="navn">E-mail (Brugernavn)</label>
	  				<input type="text" placeholder="skriv din E-mail her" name="email" class="form-control">
				</div>
				<button type="submit" name="NytPW" class="btn btn-default">Send</button>
			</form>
				<?php
					//udskriv beskeden hvis der er tastet forkert
					if (isset($besked))
					{
						echo $besked;
					}
				?>
			</form>



		<br />
		<br />
		<br />

	  <!--....................login....................-->
		<?php
		//vil have fat i hvad der skrives vha $_POST i formular felterene
		if (isset ($_POST['NytPW']))
		{//formularen er: method="post"
		//vi renser lige texten fra bruger indput felterene i formularen
		//$email er den variabel som får indhold fra formularfeltet brugernavn
		  $email = mysqli_real_escape_string ($dbcon , $_POST['email']);
			//"escaper"", ', \

	//<!--....................tjek users tabel....................-->
		  //opretter forespørgelsen, samlign formularfeltet med db
			$query="SELECT * FROM users WHERE user_email='$email'";
		//udføre forespørgelsen til db
			$result=mysqli_query ($dbcon,$query) or die('query problem' . mysqli_error($dbcon));

      $query = "UPDATE users SET
      user_pw = '12345'
      WHERE user_email = '$email'";
      $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
      ?>
      <div class="row">
        <div class="col-lg-12">
      <?php    echo "Der er sendt en email med et nyt pw";?>
        </div>
      </div>
  <?php
			}
		 ?>
	</div>
  <br /><br /><br />
<!--....................returknap....................-->
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <a class="btn btn-default page-scroll" href="index.php">Tilbage til forsiden</a>
      </div>
    </div>
</div>
<!--....................over out....................-->

</body>
</html>
