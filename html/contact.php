<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Sneakers FAN</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" >
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

	<!--  NAV  -->
	
<?php include("header.php"); ?>

    <!--  Accueil  -->
    <header class="intro_contact">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading bounceInLeft">CONTACT</h1>
                        <a href="#bla" class="fleche">
                            <i class="glyphicon glyphicon-chevron-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--  TITRE FORMULAIRE  -->

    <div id="container-fluid" class="bla">
    	<div class="row">
	    	<div class="col-md-12 txt">
	    		<h1>Des questions des conseils? N'hésitez pas !</h1>
			</div>
		</div>
    </div>
    		<!--  PHP  -->

		    <?php
			  if ($_SERVER['REQUEST_METHOD']=='POST') {
			 
				  $nombreErreur = 0; 
				  if (!isset($_POST['email'])) { 
				    $nombreErreur++; 
				    $erreur1 = '<p>Il y a un problème avec la variable "email".</p>';
				  } else { 
					    if (empty($_POST['email'])) { 
					      $nombreErreur++; 
					      $erreur2 = '<div class="row txt"">
						    	<div class="col-md-8 col-md-offset-2">
						    		<p>Vous avez oublié de donner votre email.</p>
								</div>
							</div>';
					    } else {
						      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
						        $nombreErreur++; 
						        $erreur3 = '<p>Cet email ne ressemble pas un email.</p>';
						      }
					    }
				  }
				 
				  if (!isset($_POST['message'])) {
				    $nombreErreur++;
				    $erreur4 = '<p>Il y a un problème avec la variable "message".</p>';
				  } else {
					    if (empty($_POST['message'])) {
					      $nombreErreur++;
					      $erreur5 = '<p>Vous avez oublié de donner un message.</p>';
					    }
				  }

				  if (!isset($_POST['captcha'])) {
				    $nombreErreur++;
				    $erreur6 = '<p>Il y a un problème avec la variable "captcha".</p>';
				  } else {
					    if ($_POST['captcha']!=4) {
					      $nombreErreur++;
					      $erreur7 = '<p>Désolé, le captcha anti-spam est erroné.</p>';
					    }
				  }
				 
				  if ($nombreErreur==0) { 
				  $nom     = htmlentities($_POST['nom']); 
				  $email   = htmlentities($_POST['email']);
				  $message = htmlentities($_POST['message']);
				 
				  $destinataire = 'guilllaumeaxel@gmail.com'; 
				  $sujet = 'Titre du message'; 
				  $contenu = '<html><head><title>Titre du message</title></head><body>';
				  $contenu .= '<p>Mail Sneakers FAN</p>';
				  $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
				  $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
				  $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
				  $contenu .= '</body></html>'; 
				  $headers = 'MIME-Version: 1.0'."\r\n";
				  $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
				 
				  mail($destinataire, $sujet, $contenu, $headers);
				  echo '<h2>Message envoyé!</h2>'; 

				  } else { 
				    echo '<div id="container-fluid">
				    		<div class="row txt">
						    	<div class="col-md-8 col-md-offset-2" style="border:1px solid #ff0000; padding:35px;">
						    		<h1 style="color:#ff0000; font-size:20px;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</h1>';
								    if (isset($erreur1)) echo '<p>'.$erreur1.'</p>';
								    if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
								    if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
								    if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
								    if (isset($erreur5)) echo '<p>'.$erreur5.'</p>';
								    if (!isset($_POST['captcha'])) {
									    $nombreErreur++;
									    $erreur6 = '<p>Il y a un problème avec la variable "captcha".</p>';
									} else {
										if ($_POST['captcha']!=4) {
										  $nombreErreur++;
										  $erreur7 = '<p>Désolé, le captcha anti-spam est erroné.</p>';
										    }
									    }

									if (isset($erreur6)) echo '<p>'.$erreur6.'</p>';
									if (isset($erreur7)) echo '<p>'.$erreur7.'</p>';
				    echo '		</div>
							</div>
					    </div>';
					}
			}

			?>

		<!--  FORMULAIRE  -->

		<form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
			<div id="container-fluid">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-3 txt">
						<p>Votre NOM & PRÉNOM : </p>
					</div>
					<div class="col-md-3">
						<input type="text" name="nom" size="40" />
					</div>
					<div class="col-md-3"></div>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-3 txt">
						<p>Votre EMAIL <span style="color:#ff0000;">*</span>: </p>
					</div>
					<div class="col-md-3">
						<input type="text" name="email" size="30" />
					</div>
					<div class="col-md-3"></div>
				</div>
				<div class="row message">
					<div class="col-md-3"></div>
					<div class="col-md-3 txt">
						<p>Votre MESSAGE <span style="color:#ff0000;">*</span>: </p>
					</div>
					<div class="col-md-3">
						<textarea name="message" cols="45" rows="8"></textarea>
					</div>
					<div class="col-md-3"></div>
				</div>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-3 txt">
						<p>Combien font 1+3 : </p>
					</div>
					<div class="col-md-3">
						<input type="text" name="captcha" size="2" />
						<input class="btn" type="submit" name="submit" value="Envoyer" />
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>	   	
		</form>

    <!--  FOOTER  -->

    <?php include("footer.php"); ?>

</body>
</html>