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
	
	//Variables entrées dans le formulaire
    
    $ida=$_POST['ida'];
    $ido=$_POST['ido'];
    
    //On prépare la requete
	$result = $dbh->prepare("EXEC validerOption $ido, 0, $ida");
    $result->execute();
	
	echo 'a'.$ido;
	echo 'b'.$ida;
	
	
	
	echo '<a href="index.php">Retour à la page accueil</a>';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}



?>