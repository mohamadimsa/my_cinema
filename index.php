<?php
require 'traitement/dbconnect.php';
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
        <form>
           <input type="text" placeholder="nom du film...">
           <select name="genre" id="genre_select">
           <option value="default">Genre</option>
             <?php foreach($genres as $genre): ?>
                <option value="<?= $genre->id_genre?>"><?= $genre->nom?></option>
             <?php endforeach ;?>
            </select>
            <select name="distrib" id="distrib_select">
           <option value="default">Distribution</option>
             <?php foreach($distribs as $distrib): ?>
                <option value="<?= $distrib->id_distrib?>"><?= $distrib->nom?></option>
             <?php endforeach ;?>
            </select>
            
              <label for="date_p">date de production</label>
            <input type="date" name="date_projection" id="date_p">
            

         <input type="submit" value="Rechercher un film">
       </form>
        <!--Filtre film-->
      </div>
      <div class="row">
        <!--affichage avant resulat recherche-->
        <div class="row result">
          <div class="col">
            <h4>Résultat de votre recherche :</h4>
            <P>nombre de résultat trouver :</p>
          </div>
          <div class="col-3 pafi">
          <label for="pagination">nombre de film à afficher :</label>
            <select name="pagination" id="pagination">
              <?php for ($i = 5; $i <= 50; $i++): $i =$i + 4;?>
                  <option value="<?= $i;?>"><?= $i;?></option>
             <?php endfor?>
            </select>
          </div>
        </div>
        <!-- end affichage avant resulat recherche-->
      </div>



    </div>
    </div>

</div>


</body>

</html>