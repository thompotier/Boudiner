<?php


try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI";
    
	$username = "User1_GroupeI";
    $pw = "azerty";
	$dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
	
	//Variables entrées dans le formulaire
	$nom=$_POST["nom"];
	$mdp=$_POST["mdp"];
	$result = $dbh->prepare("SELECT * FROM Login WHERE Username= '$nom' AND Password= '$mdp'");
	$result->execute();
	
	
	
	
	$droit;
	while ($row = $result->fetch()) {
		$droit=$row[Droit];
		$idutil=$row[ID_Utilisateur];
    	print_r($row);
		echo "<br> <br> ";
  	}
	
	session_start ();
	$_SESSION['nom'] = $nom;
	$_SESSION['idutil']= $idutil;
	
	//Selon son droit on lui attribu son user sybase
	switch ($droit) {
		case 1:
			//connecté
			//$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'User3_GroupeI', 'azerty');
			$_SESSION['droit'] = $droit;
			$_SESSION['usersybase'] = 'User3_GroupeI';
			$_SESSION['mdpsybase'] = 'azerty';
			break;
		case 2:
			//locataire et propriétaire
			//$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'User4_GroupeI', 'azerty');
			$_SESSION['droit'] = $droit;
			$_SESSION['usersybase'] = 'User4_GroupeI';
			$_SESSION['mdpsybase'] = 'azerty';
			break;
		case 3:
			//personnel	
			//$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'User5_GroupeI', 'azerty');
			$_SESSION['droit'] = $droit;
			$_SESSION['usersybase'] = 'User5_GroupeI';
			$_SESSION['mdpsybase'] = 'azerty';
			break;
	}
	
	//A la fin dans les variables de session on a :
	// le login entré (nom), le droit, le usersybase affecté et le mdpsybase.
	
	echo $_SESSION['droit'];
	echo $_SESSION['usersybase'];
	echo $_SESSION['mdpsybase'];
	echo $_SESSION['nom'];
	echo $_SESSION['idutil'];
	
	echo '<a href="index.php">Retour à la page accueil</a>';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}

	/*$username = $_POST["nom"];
    $pw = $_POST["mdp"];
	
	echo $username;
	echo $pw;
	
	$result = $dbh->prepare("select * from Login");
	$result->execute();
    var_dump($result);
	
	while ($row = $result->fetch()) {
    	print_r($row);
		echo "<br> <br>";
  	}
	*/

?>