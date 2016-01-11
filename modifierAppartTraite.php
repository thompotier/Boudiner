<?php
//------------------------MODIFICATION D APPART-------------------------//
session_start();

try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI";
    
    //on rŽcupre ses infos de quand il s'est connectŽ
	$username = $_SESSION['usersybase'];
	$pw=$_SESSION['mdpsybase'];
    
    //On se connecte avec ses infos
	$dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
	
	//Variables entrŽes dans le formulaire
	$surface=$_POST["surface"];
    $prix=$_POST["prix"];
	$nb=$_POST["nb"];
	$idappart=$_POST["idappart"];
    
    //On prŽpare la requete de changement d'informations
	$result = $dbh->prepare("EXEC ModifApart $idappart, $surface, $prix, $nb");
    $result->execute();
	
	echo 'Id : '.$idappart;
	echo '<br>Nombre de pieces : '.$nb;
	echo '<br>Prix : '.$prix;
    echo '<br>Surface : '.$surface;
	/*echo '<br>Droit : '.$_SESSION['droit'];
	echo '<br>Usersybase : '.$_SESSION['usersybase'];
	echo '<br> MDPSybase : '.$_SESSION['mdpsybase'];
	echo '<br>Var session nom : '.$_SESSION['nom'];*/
	
	echo '<a href="index.php">Retour ˆ la page accueil</a>';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}


?>