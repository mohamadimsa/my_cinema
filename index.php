<?php
require 'traitement/dbconnect.php';
require 'traitement/filtre_film.php';
$queryGenre = $db->query('SELECT * from genre');
$genres = $queryGenre->fetchAll(PDO::FETCH_OBJ);
$queryDistrib = $db->query('SELECT * from distrib');
$distribs = $queryDistrib->fetchAll(PDO::FETCH_OBJ);

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>myCinema</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container-fluid">
        <!--Header-->
     <div class="row">
        <header>
            <div class="logo">
            <img src="assets/logo.svg" alt="logo my cinema">
            </div>
        </header>
    </div>
        <!--end Header-->
  

    <div class="row">

      <div class="col">
              <!--menu Lateral-->

        <div class="menu_lateral">
            <div class="lien_film">
               <a href="#">
                <img class="ico1" src="assets/icocine.png" alt="logo my cinema">
                <p>Film</p>
               </a>
            </div>

            <div class="lien_membre">
              <a href="#">
                <img class="ico2" src="assets/icomembre.png" alt="logo my cinema">
                <p>Membre</p>
              </a>
            </div>

            <div class="lien_personel">
              <a href="#">
                <img class="ico3" src="assets/icopersonel.png" alt="logo my cinema">
                <p>Personel</p>
              </a>
            </div>

            <div class="lien_cinema">
              <a href="#">
                <img class="ico4" src="assets/icomycine.png" alt="logo my cinema">
                <p>Cinéma</p>
               </a>
            </div>

        </div>
      </div>
      <!--end menu Lateral-->

    <div class="col-11">
      <!--Contenus central-->
      <div class="row">
        <!--Filtre film-->
        <form action="index.php" method="post">
           <input type="text" placeholder="nom du film..." value="" name="nom">
           <select name="genre" id="genre_select">
           <option value="">Genre</option>
             <?php foreach($genres as $genre): ?>
                <option value="<?= $genre->id_genre?>"><?= $genre->nom?></option>
             <?php endforeach ;?>
            </select>
            <select name="distrib" id="distrib_select">
           <option value="">Distribution</option>
             <?php foreach($distribs as $distrib): ?>
                <option value="<?= $distrib->id_distrib?>"><?= $distrib->nom?></option>
             <?php endforeach ;?>
            </select>
            
              <label for="date_p">date de production</label>
            <input type="date" name="date_projection" id="date_p" value="">
            
            
          <label for="pagination">film/page :</label>
            <select name="pagination" id="pagination">
            <option value="10">10</option>
              <?php for ($i = 5; $i <= 50; $i++): $i =$i + 4;?>
                  <option value="<?= $i;?>"><?= $i;?></option>
             <?php endfor?>
            </select>
         <input type="submit" value="Rechercher un film">
       </form>
        <!--Filtre film-->
      </div>
      <div class="row">
        <!--affichage avant resulat recherche-->
        <div class="row result">
          <div class="col">
            <h4>Résultat de votre recherche :</h4>
            <P>nombre de résultat trouver : <?php if(isset($filmtrouver)){echo count($filmtrouver);}?></p>
          </div>
        </div>
        <!-- end affichage avant resulat recherche-->
      </div>

          <!--resulat recherche-->
     <?php if (isset($filmtrouver)):foreach($filmtrouver as $film):?>
      
          <div class="row resultat-recherhe">
            <div class="col-3">
              <p>Titre : <strong><?= $film->titre;?></strong></p>
              <p>Genre : <?= $film->genre;?></p>
              <p>Discributeur : <?= $film->distrib;?></p>
              <a href=<?="fiche_film.php?id=".$film->id_film;?>>Avoir plus de détails</a>
            </div>
            <div class="col-5">
              <h6>Résumer :</h6>
              <p><?= $film->resum;?></p>
            </div>
          </div>
      <?php endforeach; endif ;?>
      <!-- end resulat recherche-->
    </div>
      <!--navigation pagination-->
     <div class="row">

     </div>
     <!-- end navigation pagination-->
    </div>

</div>

<script src="script.js"></script>
</body>

</html>