<?php
session_start();
?>
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
    <!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="#">Loc Advisor</a></h1>
						<nav class="links">
							<ul>
								<li><a href="#">Accueil</a></li>
                                <?php
								//si le connceté est perseonnel
								if (isset($_SESSION['droit']) && $_SESSION['droit']=='3') {
										echo'<li><a href="gesappart.php">Gérer appartement</a></li>
											<li><a href="gesentretien.php">Gérer les entretiens</a></li>
											<li><a href="ajappart.php">Ajouter un appartement</a></li>
											<li><a href="gesoption.php">Valider les options</a></li>
											<li><a href="geslocation.php">Demande de location</a></li>
										';
									}
                                ?>
                                
								
								
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
										<a href="profil.php">
                                        <?php
										echo '<h3>'.$_SESSION['nom'].'</h3>
											<p>Afficher votre profil</p> ';
										?>	
										</a>
									</li>
								</ul>
							</section>  

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<?php
									if (isset($_SESSION['nom'])) {
										echo'<li><a href="deconnexion.php" class="button big fit">Déconnexion</a></li>';
									}
									else {
										echo'<li><a href="connexion.php" class="button big fit">Connexion</a></li>';
									}
								?>		
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
                                    <?php
                                    echo'
									<h2>Modifier les informations de l appartement </h2>
                                    ';
                                    ?>
								</header>
							</section>

						<!-- Mini Posts -->
							<section>
								<div class="mini-posts">
		
						<?php
                            echo'
                                    
                                <section class="form">
									Id de lappartement : '.$_POST['idappart'].'
                                    <br>Saisissez les informations :
                                    <form method="post" action="modifierAppartTraite.php">
                                        <label for="pseudo"> Surface : </label>
                                        <input type="text" name="surface">
										<label for="pseudo"> Prix : </label>
                                        <input type="text" name="prix">
                                        <label for="pseudo"> Nombre de pieces : </label>
                                        <input type="text" name="nb">
                                        <input type="hidden" name="idappart" value="'.$_POST['idappart'].'" />
                                        <input type="submit" value="Envoyer" />
                                    </form>
                                </section>
                            
                            ';
                         
                         
						?>
				
								</div>
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
</html>