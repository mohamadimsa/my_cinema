<?php
if (isset($_GET["id_film"]) && isset($_GET["id_membre"])) {
    $id_film = $_GET["id_film"];
    $id_membre = $_GET["id_membre"];
}
else{
    header('Location: ../pages/membre.php');
    exit;
}
require_once 'hautPage.php';
?>
<div class="col-11">
       <div class="row"><h5>Ajouter a l'historique</h5></div>
       <div class="row">
          <form action="<?= "../traitement/ajoutHistorique.php?id_film=".$id_film."&id_membre=".$id_membre?>" method="post">
                <div>
                 <label for="date_vus">Film vus par le client le :</label>
                 <input required type="date" name="date" id="date_vus">
                </div>
                <div>
            <label for="titre">TITRE AVIS:</label>
            <input VALUE=""type="text" name="titre" id="titre" placeholder="donner un titre a votre avis" >
        </div>
        <div>
          <textarea  value="" id="story" name="avis" placeholder=" ajouter votre avis ici ;)" maxlength="200"></textarea>
        </div>
        <input type="submit" value="ajouter a l'historique">
          </form>
       </div>
</div>
<?php require_once 'basPage.php'; ?>