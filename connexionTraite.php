<?php


try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI";
    
	$username = "User1_GroupeI";
    $pw = "azerty";
	$dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
	
	$nom=$_POST["nom"];
	$mdp=$_POST["mdp"];
	$result = $dbh->prepare("SELECT * FROM Login WHERE Username= :nom AND Password= :mdp");
	$result->execute(array('nom'=>$nom, 'mdp'=>$mdp));
	
	while ($row = $result->fetch()) {
		$droit=$row[Droit];
    	print_r($row);
		echo "<br> <br> $droit";
  	}
	
	session_start ();
	$_SESSION['login'] = $username;
	
    
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