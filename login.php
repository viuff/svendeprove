<!--################ -SvendeProve login.php- ######################-->
<?php
	//start session son det første
	session_start();

	//slå fejl rapotering til
	error_reporting(E_ALL);
	// Report simple running errors
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//error_reporting(E_ALL & ~E_NOTICE);
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);

	// if ( isset($_SESSION['adgang']) && $_SESSION['adgang'] == 1) {
	// 		die(header('location: index.php'));
	//
	// }


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

	<title>Logind</title>

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
	  		<h2>Log ind</h2>

			<form method="post">
				<div class="form-group">
	 				<label for="email">E-mail (Brugernavn)</label>
	  				<input type="email" placeholder="skriv din E-mail her" name="email" class="form-control">
				</div>
				<div class="form-group">
	  				<label for="pw">Kodeord</label>
	  				<input type="password" placeholder="skriv dit kodeord her" name="pw" class="form-control">
				</div>
				<button type="submit" name="login" class="btn btn-info">Login</button>
			</form>

			<br />

			<div>
			<p><a href="NytPW.php">Glemt PassWord?</a></p>
			</div>

		<br />
		<br />
	  <!--....................login....................-->
		<?php
		//vil have fat i hvad der skrives vha $_POST i formular felterene
		if (isset ($_POST['login']))
		{//formularen er: method="post"
		//vi renser lige texten fra bruger indput felterene i formularen
		//$email er den variabel som får indhold fra formularfeltet brugernavn
		  $email = mysqli_real_escape_string ($dbcon , $_POST['email']);
			//"escaper"", ', \
			$pw=mysqli_real_escape_string ($dbcon ,$_POST['pw']);

	//<!--....................tjek instruktors tabel....................-->
		  //opretter forespørgelsen, samlign formularfeltet med db
			$query="SELECT * FROM users WHERE user_email='$email' AND user_pw = '$pw'";
		//udføre forespørgelsen til db
			$result=mysqli_query ($dbcon,$query) or die('query problem' . mysqli_error($dbcon));
			//husk tjekker kode på hver enkelt beskyttet side!

			if (mysqli_num_rows($result) > 0) {//retunere antal af rækker hvor forespørgelsen er sand
				$row = mysqli_fetch_assoc ($result); //henter værdirerene fra forespørgselen
	    	$_SESSION['adgang'] = true;//laver en nøgle, her hedder den adgang med værdien "true"
				$_SESSION['user_email'] = $_POST['email'];
				$_SESSION['level'] = $row['user_role'];

				if ($row['user_role'] == 1) { //ser om der står 0 eller 1 i member_adm = er brugeren adm
					die(header('location: adm.php'));
				} else {
					die(header('location: user.php'));
				}
			}
		}
		 ?>
<!--################ -html 0pret bruger- ######################-->
		<h2>Opret ny bruger</h2>
		 <section>
		      <form method="post">
		        <div class="form-group">
		      		<label for="user_name">Navn<br></label>
		         <input type="text" name="user_name"  required="" placeholder="skriv navn her" class="form-control">
		         </div>
		         <div class="form-group">
		        	<label for="user_email">E-mail<br></label>
		         <input type="email" name="user_email"  required="" placeholder="skriv email her" class="form-control">
		         </div>
		         <div class="form-group">
		      		<label for="user_pw">Password<br></label>
		          <input type="password" name="user_pw"  required="" placeholder="skriv dit password her" class="form-control">
		          </div>
		          <div class="form-group">
		         	<label for="user_phone">Tlf<br></label>
		         <input type="text" name="user_phone"  required="" placeholder="skriv tlf her" class="form-control">
		         </div>
		         <input type="submit" name="CreateUserButton" value="Opret ny bruger" id="Button" class="btn btn-info"><br>
		      </form>
		 </section>

		 <!--################ php 0pret bruger ######################-->
		 <?php
		      //vil have fat i hvad der skrives vha $_POST i formular felterene
		      //når der trykkes på opret knappen
		      if (isset ($_POST['CreateUserButton']))
		        {
		        $user_name=mysqli_real_escape_string ($dbcon ,$_POST['user_name']);
		        $user_email=mysqli_real_escape_string ($dbcon ,$_POST['user_email']);
		        $user_pw=mysqli_real_escape_string ($dbcon ,$_POST['user_pw']);
		        $user_phone=mysqli_real_escape_string ($dbcon ,$_POST['user_phone']);
						$user_grunker=1500;

		      $sql=mysqli_query ($dbcon ,"INSERT INTO users(user_name, user_email, user_pw, user_phone, user_grunker)
		      VALUES('$user_name','$user_email','$user_pw','$user_phone','$user_grunker') ");
		      //or die ( mysql_error ()");
		 }

		 // echo '<pre>Indhold af POST ';     print_r ($_POST);     echo '</pre>';

		 ?>
<!--....................returknap....................-->
<br />
<br />
    <div class="row">
      <div class="col-lg-12">
        <a class="btn btn-info page-scroll" href="index.php">Tilbage til forsiden</a>
      </div>
    </div>

<!--....................over out....................-->
</div>
</body>
</html>
