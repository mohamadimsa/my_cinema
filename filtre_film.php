<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$nom = $_POST["nom"];

try {
    $db = new PDO('mysql:host=localhost;dbname=cinema', "root", "root");
 $req = "SELECT * from distrib where nom = '$nom' ";
    foreach($db->query($req) as $row) {
       
           echo "elemnt trouver  ";
    }

   
    $db = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

if(count($row) > 0){
   header("Location: index.php?nom=".$row[1]."&numero=".$row[2]);
//exit;
}


?>



<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>resultat</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
         
<p> resultat</p>
<p>nom distrib : <?php echo $row[1];?></p>
<p>numero de telephone : <?php echo $row[2];?></p>
</body>
</html>






