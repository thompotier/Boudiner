<?php
//------------------------SUPPRESSION D APPART-------------------------//
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
	$idappart=$_POST["idappart"];
    
    //On pr�pare la requete de changement d'informations
	$result = $dbh->prepare("EXEC SupprimerApart $idappart");
    $result->execute();
	
	echo 'Id : '.$idappart;
	/*echo '<br>Droit : '.$_SESSION['droit'];
	echo '<br>Usersybase : '.$_SESSION['usersybase'];
	echo '<br> MDPSybase : '.$_SESSION['mdpsybase'];
	echo '<br>Var session nom : '.$_SESSION['nom'];*/
	
	echo '<a href="index.php">Retour � la page accueil</a>';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}


?>