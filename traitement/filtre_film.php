<?php

if(isset($_POST["nom"] )){
    
    $titre = "'".$_POST["nom"]."%'";
$filmGenre = $db->prepare("SELECT id_film, titre, genre.nom AS genre, distrib.nom as distrib, resum from film left join genre on film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib where genre.id_genre = :genre ORDER BY genre.nom ");
$filmGenre->bindParam(':genre',$_POST["genre"]);
$filmDistrib = $db->prepare("SELECT id_film, titre, genre.nom AS genre, distrib.nom as distrib, resum from film left join genre on film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib where film.id_distrib = :distrib");
$filmDistrib->bindParam(':distrib',$_POST["distrib"]);
$filmNom = $db->prepare("SELECT id_film, titre, genre.nom AS genre, distrib.nom as distrib, resum from film left join genre on film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib where film.titre LIKE $titre");
$nom_genre = $db->prepare("SELECT id_film, titre, genre.nom AS genre, distrib.nom as distrib, resum from film left join genre on film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib where film.titre LIKE $titre AND film.id_genre = :genre");
$nom_genre->bindParam(':genre',$_POST["genre"]);
$nom_distrib = $db->prepare("SELECT id_film, titre, genre.nom AS genre, distrib.nom as distrib, resum from film left join genre on film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib where film.titre LIKE $titre AND film.id_distrib = :distrib");
$nom_distrib->bindParam(':distrib',$_POST["distrib"]);
$nom_distrib_genre = $db->prepare("SELECT id_film, titre, genre.nom AS genre, distrib.nom as distrib, resum from film left join genre on film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib where film.titre LIKE $titre AND film.id_distrib = :distrib AND film.id_genre = :genre ");
$nom_distrib_genre->bindParam(':distrib',$_POST["distrib"]);
$nom_distrib_genre->bindParam(':genre',$_POST["genre"]);
$distrib_genre = $db->prepare("SELECT id_film, titre, genre.nom AS genre, distrib.nom as distrib, resum from film left join genre on film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib where film.id_distrib = :distrib AND film.id_genre = :genre ");
$distrib_genre->bindParam(':distrib',$_POST["distrib"]);
$distrib_genre->bindParam(':genre',$_POST["genre"]);


if ($_POST["genre"] != "" && $_POST["distrib"] == "" && $_POST["date_projection"] == "" && $_POST["nom"] == "" ) {
   if($filmGenre->execute()){
       $filmtrouver =$filmGenre->fetchAll(PDO::FETCH_OBJ);
   }
}
elseif($_POST["distrib"] != "" && $_POST["genre"] == "" && $_POST["date_projection"] == "" && $_POST["nom"] == "" ) {

    if($filmDistrib->execute()){
        $filmtrouver =$filmDistrib->fetchAll(PDO::FETCH_OBJ);
    }
 }

elseif($_POST["nom"] != "" && $_POST["genre"] == "" && $_POST["date_projection"] == "" && $_POST["distrib"] == "") {

    if($filmNom->execute()){
        $filmtrouver =$filmNom->fetchAll(PDO::FETCH_OBJ);
        
    }
 }
 elseif($_POST["nom"] != "" && $_POST["genre"] != "" && $_POST["date_projection"] == "" && $_POST["distrib"] == "") {

    if($nom_genre->execute()){
        $filmtrouver =$nom_genre->fetchAll(PDO::FETCH_OBJ);
        
    }
 }
 elseif($_POST["nom"] != "" && $_POST["genre"] == "" && $_POST["date_projection"] == "" && $_POST["distrib"] != "") {

    if($nom_distrib->execute()){
        $filmtrouver =$nom_distrib->fetchAll(PDO::FETCH_OBJ);
        
    }
 }
 elseif($_POST["nom"] != "" && $_POST["genre"] != "" && $_POST["date_projection"] == "" && $_POST["distrib"] != "") {

    if($nom_distrib_genre->execute()){
        $filmtrouver =$nom_distrib_genre->fetchAll(PDO::FETCH_OBJ);
        
    }
 }
 elseif($_POST["nom"] == "" && $_POST["genre"] != "" && $_POST["date_projection"] == "" && $_POST["distrib"] != "") {

    if($distrib_genre->execute()){
        $filmtrouver =$distrib_genre->fetchAll(PDO::FETCH_OBJ);
        
    }
 }

}


if (isset($filmtrouver)) {
  
    $nbFilms = count($filmtrouver);

    $parPage = 10 ;

    $page = ceil($nbFilms /$parPage);
}
?>