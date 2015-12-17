<?php
session_start();

try
{
	$hostname = "172.21.9.94";
    $port = 4100;
    $dbname = "M1_GroupeI";
    
	$username = $_SESSION['usersybase'];
    $pw = $_SESSION['mdpsybase'];
	$dbh = new PDO("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
	
	//Variables entrŽes dans le formulaire
    $id = (int) $_SESSION['idutil'];
	$prix= (int) $_POST["prix"];
	$surface= (int) $_POST["surface"];
    $nb= (int) $_POST["nb"];
    
    
	//$result = $dbh->prepare("EXEC AjoutApart :id, :prix, :surface, :nb");
	//$result->execute(array('id'=>$id, 'prix'=>$prix, 'surface'=>$surface, 'nb'=>$nb));
    
    $result = $dbh->prepare("EXEC AjoutApart $id, $prix, $surface, $nb");
    $result->execute();
   
    
    //$result = $dbh->prepare("exec AjoutApart 4, 40, 30, 3");
    //$result->execute();
    
    /*$sql = "{CALL M1_GroupeI.dbo.AjoutApart(?,?,?,?)};";
       $stmt = $dbh->prepare($sql);
               
       $stmt->bindParam(1, 4, PDO::PARAM_INT);
       $stmt->bindParam(2, 40, PDO::PARAM_INT);
       $stmt->bindParam(3, 30, PDO::PARAM_INT);
       $stmt->bindParam(4, 3, PDO::PARAM_INT);*/
    
	
	
	echo '<a href="index.php">Retour ˆ la page accueil</a><br>'.$_SESSION['idutil'].' '.$_POST["prix"].' '.$_POST["surface"].' '.$_POST["nb"].' ';
	
    
}
catch(Exception $e)
{
    die("Mauvaise identification $pw : ".$e->getMessage());
}

	/*$username = $_POST["nom"];
    $pw = $_POST["mdp"];*/
	
	echo $username;
	echo $pw;
	
	/*$result = $dbh->prepare("select * from Login");
	$result->execute();
    var_dump($result);
	
	while ($row = $result->fetch()) {
    	print_r($row);
		echo "<br> <br>";
  	}
	*/

?>