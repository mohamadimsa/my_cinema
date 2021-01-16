<?php
require_once '../traitement/fiche_client.php';
require_once 'hautPage.php';
?>
<div class="col-11">
     <div class="row"><a href=<?= "modifClient.php?id=" . $infoTrouver->id_perso; ?>>modifier le profil</a></div>
     <div class="row info_general">
          <div class="col-2 avatar">
               <img src="../assets/profils/default.jpeg" alt="image de profil du clients" width="150px">
          </div>
          <div class="col-4">
               <h5>coordonnées client</h5>
               <p>nom : <?= $infoTrouver->nom; ?></p>
               <p>prenom : <?= $infoTrouver->prenom; ?></p>
               <p>date de naissance : <?= $date_aniv->format('d-m-Y'); ?></p>
               <p>adresse : <?= $infoTrouver->adresse; ?></p>
               <p>ville : <?= $infoTrouver->ville . ', ' . $infoTrouver->cpostal; ?></p>
               <p>email : <?= $infoTrouver->email; ?></p>
          </div>
          <div class="col-4">
               <h5>détails membre</h5>
               <p>date d'inscription : <?= $date_insciption->format('d-m-Y'); ?>
                    <?php if (intval($infoTrouver->id_abo) > 0) : ?>
               <p>abonnement : <?= $detailAbo->nom; ?></p>
               <p>statut abonnement : </p>
               <p>date de souscription :<?= $date_abonnement->format('d-m-Y'); ?></p>
               <p>résumer de l'abonnement : <?= $detailAbo->resum; ?> </p>
          <?php endif;
                    if (intval($infoTrouver->id_abo) == 0) : ?>
               <p>le client ne posséde pas d'bonnements
               <p>
                    <a href=<?= "modifClient.php?id=" . $infoTrouver->id_perso; ?>>souscrire un abonemment</a>
               <?php endif; ?>
               <p>dernier film vus : <?= $dernierflim->titre . ', le ' . $date_dernierfilm->format('d-m-Y'); ?> </p>
          </div>
     </div>
     <div class="row abo historique">

           <div class="row"><h4>historique des film vus par le client</h4></div>
        <div class="row">
         <div class="col-6">
          <table>
          <tr>
           <th>titre</th>
           <th>vus le </th>
          </tr>
           <?php foreach($historiqueMembre as $historique):?>
           <tr>
           <td><?= $historique->titre ?></td>
           <?php $date_historique = new DATETime($historique->date);?>
           <td><?= $date_historique->format('d-m-Y')?></td>
           </tr>
           <?php endforeach ; ?>
           
          </table>
         </div>
         <div class="col-6">
            
         </div>
        </div>
     </div>
</div>


<?php require_once 'basPage.php'; ?>