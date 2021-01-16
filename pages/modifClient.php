<?php
require_once '../traitement/fiche_client.php';
require_once 'hautPage.php';
?>

<div class="col-11">
   <div class="row">
      <h4>Modifier coordonnées du client</h4>
   </div>
   <div class="row">
      <div class="col">
         <form action=<?= "../traitement/modifClient.php?id=".$infoTrouver->id_perso?> method="post">
            <div class="champs_formulaire">
               <label for="nom">Nom : &nbsp &nbsp</label>
               <input type="text" name="nom" id="nom" value=<?= $infoTrouver->nom ?> disabled>
            </div>
            <div class="champs_formulaire">
               <label for="prenom">Prenom : &nbsp &nbsp</label>
               <input type="text" name="prenom" id="prenom" value=<?= $infoTrouver->prenom ?> disabled>
            </div>
            <div class="champs_formulaire">
               <label for="date_naissance">date de naissance : &nbsp &nbsp</label>
               <input type="text" name="date_naissance" id="date_naissance"  value=<?=$date_aniv->format('d-m-Y')?> disabled>
            </div>
            <div class="champs_formulaire">
               <label for="email">adresse email : &nbsp &nbsp</label>
               <input type="email" name="email" id="email" required placeholder=<?= $infoTrouver->email?> value="<?= $infoTrouver->email?>">
            </div>
            <div class="champs_formulaire">
               <label for="adresse">adresse postal : &nbsp &nbsp</label>
               <input type="adresse" name="adresse" id="asresse" required placeholder="<?= $infoTrouver->adresse ?>" value="<?= $infoTrouver->adresse?>">
            </div>
            <div class="champs_formulaire">
               <label for="ville">ville : &nbsp &nbsp</label>
               <input type="ville" name="ville" id="ville" required placeholder="<?= $infoTrouver->ville?>" value="<?= $infoTrouver->ville?>">
            </div>

            <div class="champs_formulaire">
               <label for="cpostal">code postal : &nbsp &nbsp</label>
               <input type="number" name="cpostal" id="cpostal" min="100" required  value="<?= $infoTrouver->cpostal?>" placeholder=<?= $infoTrouver->cpostal?> >
            </div>
        
            <div class="boutton_validation formulaire">
               <input type="submit" value="valider les modification">
            </div>
         </form>
      </div>

   </div>
   <div class="row abo">
      <h4>souscrire un abonnement au client</h4>
   </div>
   <div class="row "></div>
       <div class="col">
    <p>abonnement actuel : <?php if(intval($infoTrouver->id_abo) == 0){echo "aucun";}else{echo $detailAbo->nom;}?></p>
    
      <form action=<?= "../traitement/modifClient.php?id=".$infoTrouver->id_perso?> method="post">
            <div class="champs_formulaire">
               <label for="abonnement">choissez une option  : &nbsp &nbsp</label>
               <select name="abonnement" id="abonnement" required>
               <option selected value=""><?= "modifier / supprimer / souscrire"?></option>
               <?php if(intval($infoTrouver->id_abo) != 0):?>
               <option value="0">Désabonner le client</option>
               <?php endif;?>
               <?php foreach($listAboTrouver as $abonnement): ?>
                <option value="<?= $abonnement->id_abo?>"><?= "Souscrire à l'abonnements : ".$abonnement->nom?></option>
             <?php endforeach ;?>
               </select>
            </div>
            <input type="submit" value="valider les modification">
         </form>
       </div>

         <div class="col-6 abo">
     <h5>reccap  des abonnement disponible : </h5>
     
     <div class="row">
     <table>
        <tr>
        <th>nom</th>
        <th>resumée</th>
        <th>prix</th>
        <th>durée (jour)</th>
        </tr>
        <?php foreach($listAboTrouver as $aboDispo): ?>
           <tr>
           <td><?= $aboDispo->nom?></td>
           <td><?= $aboDispo->resum?></td>
           <td><?= $aboDispo->prix?></td>
           <td><?= $aboDispo->duree_abo?></td>
           </tr>

        <?php endforeach;?>
     </table>
     </div>
     
     </div>
    
       
   </div>


   
   
</div>


<?php require_once 'basPage.php'; ?>