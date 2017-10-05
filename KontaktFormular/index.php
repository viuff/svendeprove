<!--################ -SvendeProve- ######################-->
<?php

?>
<!--################ -kontakt form- ######################-->

<?php
  //  session_start();
    error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
 <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>kontakt form...</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		    <link rel="stylesheet" href="css/form-elements.css">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/scrolling-nav.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
     </head>

    <body>
    <?php

    if(isset($_POST['submit'])){

        include 'validering.php';
        if(empty($fejlbeskeder)){
            $success = true;
        }

    }
    ?>
        <!-- Top content -->
        <div class="top-content">
          <section>
           <a id="NyElev" href="../index.php" class="btn btn-info btn-block" role="button">Tilbage til forsiden</a>
          </section>
            <div class="inner-bg">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Kontakt:</h3>
                            		<p>Skriv til DJ Grunk...</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-envelope"></i>
                        		</div>
                            </div>

                            <div class="form-bottom contact-form">
			                    <form role="form" action="" method="post">
			                    	<div class="form-group <?php if($error_fornavn){ echo 'has-error'; } ?>">
			                    		<label class="sr-only" for="fornavn">Fornavn</label>
			                        	<input type="text" name="fornavn" placeholder="Fornavn..." class="form-control" value="<?php if($error_fornavn){ echo $fejlbeskeder['tomt_fornavn'] . $fejlbeskeder['tal_fornavn']; }else{ echo $_POST['fornavn']; } ?>">
			                        </div>
                                    <div class="form-group <?php if($error_efternavn == true){ echo 'has-error'; } ?>">
                                        <label class="sr-only" for="efternavn">Efternavn</label>
                                        <input type="text" name="efternavn" placeholder="Efternavn..." class="form-control" value="<?php if($error_efternavn){ echo $fejlbeskeder['tomt_efternavn'] . $fejlbeskeder['tal_efternavn']; }else{ echo $_POST['efternavn']; } ?>">
                                    </div>
			                        <div class="form-group <?php if($error_email == true){ echo 'has-error'; } ?>">
			                        	<label class="sr-only" for="email">Email</label>
			                        	<input type="text" name="email" placeholder="Email..." class="form-control" value="<?php if($error_email){ echo $fejlbeskeder['tomt_emailfelt'] . $fejlbeskeder['invalid_email']; }else{ echo $_POST['email']; } ?>">
			                        </div>
                                    <div class="form-group <?php if($error_telefon == true){ echo 'has-error'; } ?>">
                                        <label class="sr-only" for="telefon">Telefon</label>
                                        <input type="text" name="telefon" placeholder="Telefon..." class="form-control" value="<?php if($error_telefon){ echo $fejlbeskeder['tomt_telefon'] . $fejlbeskeder['min_tegn_only_numbers'] . $fejlbeskeder['otte_tegn_not_numbers'] . $fejlbeskeder['min_tegn']; }else{ echo $_POST['telefon']; } ?>">
                                    </div>
			                        <div class="form-group <?php if($error_besked == true){ echo 'has-error'; } ?>">
			                        	<label class="sr-only" for="contact-message">Besked</label>
			                        	<textarea name="besked" placeholder="Besked..." class="form-control"><?php if($error_besked){ echo $fejlbeskeder['tom_besked'];  }else{ echo $_POST['besked']; } ?></textarea>
			                        </div>
			                        <input type="submit" name="submit" class="btn btn-lg btn-info" value="Send besked">
			                    </form>

		                    </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <?php
            if($success == true){
            ?>
                <script type="text/javascript">
                    $(document).ready(function(){

                        $('.fa-envelope').animate({'marginRight': "-=1100"}, 3000);
                        $('p').fadeOut(1000).html("Tak for din henvendelse").fadeIn(1000).fadeTo(1000, 0.0).fadeTo(1000, 1.0);

                    });
                </script>
            <?php
            }
        ?>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    <!-- </body>

</html> -->
<!--#############################-over out-###################################-->
  </div>
</div>

  <?php
  include('../footer.php');
   ?>
