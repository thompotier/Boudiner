<?php
session_start();

try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI";
    
    //on r�cup�re ses infos de quand il s'est connect�
	$username = $_SESSION['usersybase'];
	$pw=$_SESSION['mdpsybase'];
    
    //On se connecte avec ses infos
	$dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
	
	//Variables entr�es dans le formulaire
	$nom=$_POST["nom"];
	$mdp=$_POST["mdp"];
    
    //On pr�pare la requete de changement d'informations
	$result = $dbh->prepare("SELECT * FROM Login WHERE Username= :nom AND Password= :mdp");
	$result->execute(array('nom'=>$nom, 'mdp'=>$mdp));
    
	//On sauvegarde ses nouvelles infos dans les var de session
    $_SESSION['nom']= $_POST["nom"];
	
	
	
	echo $_SESSION['droit'];
	echo $_SESSION['usersybase'];
	echo $_SESSION['mdpsybase'];
	echo $_SESSION['nom'];
	
	echo '<a href="index.php">Retour � la page accueil</a>';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}


?>