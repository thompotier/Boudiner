
Début
<?php

try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI »;
    $username = "User1_GroupeI »;
    $pw = « azerty »;
    // On se connecte à MySQL
    $dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
    $result = $dbh->prepare("select * from Appartement »);
    var_dump($result);
    $result->execute();
    
   	while ($row = $result->fetch()) {
    	print_r($row);
  	}
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}


?>


Fin