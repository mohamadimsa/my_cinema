<?php
require_once 'dbconnect.php';
$data = "";
if (isset($_GET["id"])) {
    $id_cli = intval($_GET["id"]);

$detailsfilm = $db->prepare("SELECT * from film left join genre on film.id_genre = genre.id_genre where film.id_film=:id_film ORDER BY genre.nom ");
$detailsfilm->bindValue(":id_film",$id_cli,PDO::PARAM_INT);
$distib = $db->prepare("SELECT nom FROM distrib where id_distrib=:distrib");

if ($detailsfilm->execute()){
    $details = $detailsfilm->fetch(PDO::FETCH_OBJ);
    $prod = $details->id_distrib;
    $prod = intval($prod);
$distib->bindValue(":distrib",$prod,PDO::PARAM_INT);
if ($distib->execute()) {
    $production = $distib->fetch(PDO::FETCH_OBJ);
}
$recherche=$details->titre;
$recherche=trim($recherche);
$recherche= rtrim($recherche);
$recherche= str_replace(" ","_",$recherche);
 
$curl = curl_init();
$url = "http://www.omdbapi.com/?t=".$recherche."&apikey=26c135a9";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
 
 $data = curl_exec($curl);

 if($data === false){
     
    echo 'Erreur Curl : ' . curl_error($curl);

 }else{
    $data = json_decode($data);
    if (isset($data->Poster)) {
        $image = $data->Poster; 
    }
    else{
        $image = "../assets/default.jpg";
    }
     
}
curl_close($curl);
}

 $avisFilm = $db->prepare("SELECT * FROM historique_membre Where id_film=:id and avis IS NOT NULL");
 $avisFilm->bindValue(":id",$id_cli,PDO::PARAM_INT);

 if ($avisFilm->execute()) {
    $avistrouver = $avisFilm->fetchAll(PDO::FETCH_OBJ);
 }

}