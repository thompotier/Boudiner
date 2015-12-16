<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Loc Advisor</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
<?php
session_start();

try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI";
    $username = "User1_GroupeI";
    $pw = "azerty";
    // On se connecte à MySQL
    $dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
    $result = $dbh->prepare("select * from Appartement");
	/*$result = $dbh->prepare("INSERT INTO Appartement
	(Surface, Prix, Nb_Pieces)
	VALUES (600, 600, 8)");*/
	$result->execute();
    //var_dump($result);
    
    debutEntete();
   	while ($row = $result->fetch()) {
		afficherAppart($row[ID], $row[Nb_Pieces], $row[Surface], $row[CreatedOn]);
    	//echo($row);
		//print_r($row);
  	}
	finEntete();
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}


?>
		<?php
		function debutEntete(){
			echo'
			<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="#">Loc Advisor</a></h1>
						<nav class="links">
							<ul>
								<li><a href="#">Accueil</a>';
								//si le connceté est perseonnel
								if (isset($_SESSION['droit']) && $_SESSION['droit']='3') {
										echo'<li><a href="gesappart.php">Gérer appartement</a></li>
											<li><a href="gesentretien.php">Gérer les entretiens</a></li>
											<li><a href="ajappart.php">Ajouter un appartement</a></li>
											<li><a href="gesoption.php">Valider les options</a></li>
											<li><a href="geslocation.php">Demande de location</a></li>
										';
									}
								echo'</li>
								
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">';
										echo '<h3>'.$_SESSION['nom'].'</h3>
											<p>Afficher votre profil</p> ';
										echo'	
										</a>
									</li>
								</ul>
							</section>  

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									';
									if (isset($_SESSION['nom'])) {
										echo'<li><a href="deconnexion.php" class="button big fit">Déconnexion</a></li>';
									}
									else {
										echo'<li><a href="connexion.php" class="button big fit">Connexion</a></li>';
									}
								echo'		
								</ul>
							</section>

					</section>

				<!-- Main -->
					<div id="main">
						<!-- Pagination -->
							<!--<ul class="actions pagination">
								<li><a href="" class="disabled button big previous">Previous Page</a></li>
								<li><a href="#" class="button big next">Next Page</a></li>
							</ul>-->

					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
								<header>
									<h2>Loc Advisor</h2>
									<p>Gérez vos appartements</p>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">
					
					
		';
			
		}
		?>
		
						<?php
						function afficherAppart($ID, $nb, $surface, $datecreation){
							echo'
							<article class="mini-post">
											<header>
												<h3><a href="#">Appartement '.$nb.' pieces de '.$surface.'m2</a></h3>
												<time class="published" datetime="TEST">'.$datecreation.'</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
											</header>
											<a href="#" class="image"><img src="images/appartement/'.$ID.'.jpg" alt="" /></a>
										</article>
							
							';
							
						}
						
						?>

				<?php
				function finEntete(){
					echo'
								</div>
							</section>

						<!-- Posts List -->
							<section>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
												<time class="published" datetime="2015-10-15">October 15, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
												<time class="published" datetime="2015-10-10">October 10, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic10.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Magna enim accumsan tortor cursus ultricies</a></h3>
												<time class="published" datetime="2015-10-08">October 8, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic11.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="#">Congue ullam corper lorem ipsum dolor</a></h3>
												<time class="published" datetime="2015-10-06">October 7, 2015</time>
											</header>
											<a href="#" class="image"><img src="images/pic12.jpg" alt="" /></a>
										</article>
									</li>
								</ul>
							</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
								</ul>
							</section>

					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>';
				}
				?>

						