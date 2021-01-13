<?php
require_once '../traitement/fiche_client.php'; 
require_once 'hautPage.php';
?>
<div class="col-11">
     <div class="row info_general">
      <div class="col-2 avatar">
         <img src="../assets/profils/default.jpeg" alt="image de profil du clients" width="150px">
      </div>
      <div class="col">
            <h5>coordonnées client</h5>
           <p>nom : <?= $infoTrouver->nom;?></p>
           <p>prenom : <?= $infoTrouver->prenom;?></p>
           <p>date de naissance : <?=$date_aniv->format('d-m-Y');?></p>
           <p>adresse : <?= $infoTrouver->adresse;?></p>
           <p>ville : <?= $infoTrouver->ville.', '.$infoTrouver->cpostal ;?></p>
           <p>email : <?= $infoTrouver->email;?></p>
      </div>
      <div class="col">
            <h5>détails membre</h5>
            <p>date d'inscription : <?= $date_insciption->format('d-m-Y');?>
            <?php if(intval($infoTrouver->id_abo)>0):?>
            <p>abonnement : <?= $detailAbo->nom;?></p>
            <p>statut abonnement : </p>
            <p>date de souscription :<?= $date_abonnement->format('d-m-Y');?></p>
            <p>résumer de l'abonnement : <?= $detailAbo->resum;?> </p>
                <?php endif ; if(intval($infoTrouver->id_abo) == 0):?>
                  <p>le client n'a jamais souscris a un abonnement <p>
                  <a href="ajoutAbonnement.php">souscrire un abonemment</a>
                  
                <?php endif;?>  
      </div>
     </div>
</div>







<?php require_once 'basPage.php';?>