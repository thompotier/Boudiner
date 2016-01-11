<?php
session_start();

try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI";
    
	$username = $_SESSION['usersybase'];
	$pw=$_SESSION['mdpsybase'];
    
	$dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
	
	//Variables entrŽes dans le formulaire
    $idutil=$_SESSION['idutil'];
    $idappart=$_POST['idappart'];
	$date=$_POST["date"];
    
    //On prŽpare la requete
	$result = $dbh->prepare("EXEC AjoutOption $idutil, $idappart, '$date'");
    $result->execute();
	
	echo 'a'.$idutil;
	echo 'b'.$idappart;
	echo 'c'.$date;
	
	
	
	echo '<a href="index.php">Retour ˆ la page accueil</a>';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}



?>