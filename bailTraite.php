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
    
    $idu=$_POST['idu'];
    $ida=$_POST['ida'];
    $dated=$_POST['dated'];
    $datef=$_POST['datef'];
    
    //On prŽpare la requete
	$result = $dbh->prepare("EXEC AjoutLocation $idu, '$dated', '$datef', $ida");
    $result->execute();
	
	//echo 'a'.$ido;
	//echo 'b'.$ida;
	
    echo '<a href="index.php" class="button big fit">Retour ˆ la page accueil</a>';
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}



?>