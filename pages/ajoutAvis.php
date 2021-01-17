<?php 
require_once 'hautPage.php';
$id_film = $_GET["id_film"];
$id_membre = $_GET["id_membre"]
?>

<div class="col-11">

 <div class="row"><h4>Ajouter un avis au film : </h4></div>

 <div class="row">
        <form action="<?= "../traitement/ajoutAvis.php?id_membre=".$id_membre."&id_film=".$id_film?>" method="post">
        <div>
            <label for="titre">TITRE :</label>
            <input type="text" name="titre" id="titre" placeholder="donner un titre a votre avis" required>
        </div>
        <div>
          <textarea required id="story" name="avis" placeholder=" ajouter votre avis ici ;)" maxlength="200"></textarea>
        </div>
        <input type="submit" value="ajouter l'avis">
        </form>
 </div>



</div>

<?php require_once 'basPage.php';?>