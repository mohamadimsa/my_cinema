<?php
require_once '../traitement/fiche_client.php';
require_once '../traitement/modifClient.php';
require_once 'hautPage.php';
?>

<div class="col-11">
   <div class="row">
      <h4>Modifier coordonnées du client</h4>
   </div>
   <div class="row">
      <div class="col">
         <form action="../traitement/modifClient.php" method="post">
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
               <input type="email" name="email" id="email" required value=<?= $infoTrouver->email?>>
            </div>
            <div class="champs_formulaire">
               <label for="ville">ville : &nbsp &nbsp</label>
               <input type="ville" name="ville" id="ville" required value=<?= $infoTrouver->ville?>>
            </div>

            <div class="champs_formulaire">
               <label for="cpostal">code postal : &nbsp &nbsp</label>
               <input type="number" name="cpostal" id="cpostal" min="100" required value=<?= $infoTrouver->cpostal?>>
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
    <p>abonnement actuel : <?php if(intval($infoTrouver->id_abo) == 0){echo "aucun";}else{echo $detailAbo->nom;}?></p>
    
      <form action="../traitement/modifClient.php" method="post">
            <div class="champs_formulaire">
               <label for="abonnement">choissez une option  : &nbsp &nbsp</label>
               <select name="abonnement" id="abonnement">
               <option value=""><?= "modifier / supprimer / souscrire"?></option>
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
   
</div>


<?php require_once 'basPage.php'; ?>