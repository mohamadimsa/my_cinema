<?php 
require '../traitement/fiche_film.php';
require_once 'hautPage.php';
?>

<div class="col-11">
     <div class="row">
     <div class="col">
     <H4>FICHE FILM</H4>
     </div>
     <div class="col">
        <a href="<?= "membre.php?histo=".$details->id_film?>">ajouter ce film a l'historique d'un client</a>
     </div>
     </div>
   <div class="row">
      <div class="col-3">
        <img classe="image_film" width="209px" src="<?php if(isset($image)){echo $image;} ?>" alt="image tu titre selectionner">
      </div>
      <div class="col">
      <div class="desciption">
         <h5><span>TITRE</span> &nbsp :&nbsp &nbsp <?= $details->titre?></h5>
         <p>Genre &nbsp:&nbsp &nbsp <?= $details->nom?></p> 
         <p>Distributeur &nbsp:&nbsp &nbsp <?= $production->nom?></p>
         <p>Année de prod &nbsp:&nbsp &nbsp <?= $details->annee_prod?></p> 
         <p>duréé du film &nbsp:&nbsp &nbsp <?= $details->duree_min?> min</p> 
      </div>
      <div class="resum">
        <h6>Resumer &nbsp:</h6>
        <p><?=$details->resum?></p>
      </div>
      </div>
   </div>

   <div class="row">
     <h4>AVIS (<?= count($avistrouver);?>)</h4>
   </div>
   <div class="row">
     <?php foreach($avistrouver as $avis):?>
          <article>
            <h4><?=$avis->titre_avis ?></h4>
            <p>publier le <?=$avis->avis_date?></p>
            <p><?= $avis->avis?></p>
          </article>
     <?php endforeach;?>
   </div>

</div>
<?php require_once 'basPage.php';?>