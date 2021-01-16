<?php 
require '../traitement/fiche_film.php';
require_once 'hautPage.php';
?>

<div class="col-11">
     <div class="row">FICHE FILM</div>
   <div class="row">
      <div class="col-3">
        <img classe="image_film" width="209px" src="<?php if(isset($image)){echo $image;} ?>" alt="image tu titre selectionner">
      </div>
      <div class="col">
      <div class="desciption">
         <h6><span>TITRE</span> &nbsp :&nbsp &nbsp <?= $details->titre?></h6>
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

</div>
<?php require_once 'basPage.php';?>