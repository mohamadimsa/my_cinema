<?php

require_once '../traitement/filtre_client.php'; 
var_dump($_POST);
require_once 'hautPage.php';
?>
<div class="col-11">
       <!--Filtre membre-->
       <form action="membre.php" method="post">
           <input type="text" placeholder="nom du client" value="" name="nom">
           <input type="text" placeholder="prenom du client" value="" name="prenom">
           <input type="text" placeholder="nom de la ville" value="" name="nomville">
           <input type="email"  name="email" value="" placeholder="adresse email client" > 
           <label for="membre">&nbsp &nbsp membre</label>
           <input type="checkbox" id="membre" name="membre" value="1">        
          <label for="pagination"> &nbsp &nbsp page :</label>
            <select name="pagination" id="pagination">
            <option value="10">10</option>
              <?php for ($i = 5; $i <= 50; $i++): $i =$i + 4;?>
                  <option value="<?= $i;?>"><?= $i;?></option>
             <?php endfor?>
            </select>
         <input type="submit" value="Rechercher un client">
       </form>
        <!--Filtre film-->
        <div class="row">
        <!--affichage avant resulat recherche-->
        <div class="row result">
          <div class="col">
            <h4>Résultat de votre recherche :</h4>
            <P>nombre de résultat trouver :&nbsp <?php if(isset($clientTrouver)){echo count($clientTrouver);}?> </p>
          </div>
        </div>
        <!-- end affichage avant resulat recherche-->
       </div>

          <!--resulat recherche-->
     <?php if (isset($clientTrouver)):foreach($clientTrouver as $client):?>
      
      <div class="row resultat-recherhe">
        <div class="col-3">
          <p>nom: <strong><?= $client->nom;?></strong></p>
          <p>prenom : <?= $client->prenom;?></p>
          <p>email : <?= $client->email;?></p>
          <a href=<?="fiche_client.php?id=".$client->id_perso;?>>Accéder à la fiche du client</a>
        </div>
        <div class="col-5">
          <p>ville : <?= $client->ville;?></p>
          <?php $date = new DateTime($client->date_naissance);?>
          <p>date de naissance : <?= $date->format('d-m-Y');?>
        </div>
      </div>
  <?php endforeach; endif ;?>
  <!-- end resulat recherche-->
</div>



<?php require_once 'basPage.php';?>