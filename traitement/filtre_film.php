<?php


$filmGenre = $db->prepare("SELECT id_film, titre, genre.nom AS genre, distrib.nom as distrib, resum from film left join genre on film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib where genre.id_genre = :genre");
$filmGenre->bindParam(':genre',$_POST["genre"]);

if ($_POST["genre"] != "") {
   if($filmGenre->execute()){
       $filmtrouver =$filmGenre->fetchAll(PDO::FETCH_OBJ);
   }
}
?>