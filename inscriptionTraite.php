<?php
session_start();

try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI";
    
	$username = "User1_GroupeI";
    $pw = "azerty";
	$dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
	
	//Variables entrŽes dans le formulaire
	$username2=$_POST["username"];
	$mdp=$_POST["mdp"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$date=$_POST["date"];
    
    //On prŽpare la requete
	$result = $dbh->prepare("EXEC Inscription $username2, $mdp, $nom, $prenom, '$date'");
    $result->execute();
	
	echo 'a'.$username2;
	echo 'b'.$mdp;
	echo 'c'.$nom;
	echo 'd'.$prenom;
	echo 'e'.$date;
    
	
	
	echo '<a href="index.php">Retour ˆ la page accueil</a>';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}



?>