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
    
    $idu=$_POST['idu'];
    $ida=$_POST['ida'];
    $ido=$_POST['ido'];
    
    //On prépare la requete
	$result = $dbh->prepare("EXEC validerOption $ido, 1, $ida");
    $result->execute();
	
	echo 'a'.$ido;
	echo 'b'.$ida;
	
	echo'<form method="post" action="bail.php">
            <input type="hidden" name="idu" value="'.$idu.'" />
			<input type="hidden" name="ida" value="'.$ida.'" />
			<input type="submit" name="Modifier" value="Créer le bail" />
		</form>';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}



?>