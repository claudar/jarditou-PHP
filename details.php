<?php
include("assets/php/headerJarditou.php");

 $res = $_POST['proID'];  //je declare une variable res pour sauvegarder la valeur de mon input hidden et pour pouvoir la reutiliser dans ma requete

require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
   $db = connexionBase(); // Appel de la fonction de connexion
   $requete = 'SELECT *  FROM produits WHERE pro_id ='.$res;
   $result = $db->query($requete);
   // Renvoi de l'enregistrement sous forme d'un objet
   $produit = $result->fetch(PDO::FETCH_OBJ);
?>

<body>
    <form action="script_modif.php" method="POST">


<div class="form-group">
    <label for="formGroupExampleInput">ID</label>
    <input type="text" class="form-control" name="pro_id"id="pro_id" value="<?php echo $produit->pro_id; ?>" placeholder="" readonly>
    <span id="error_pro_id"></span>
</div>
<div class="form-group">
    <label for="formGroupExampleInput2">Réference</label>
    <input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo $produit->pro_ref; ?>" placeholder="">
    <span id="error_pro_ref"></span>
</div>

<div class="form-group">
    <label for="formGroupExampleInput2">Catégorie</label>
    <input type="text" class="form-control"name="pro_cat" id="pro_cat_id" value="<?php echo $produit->pro_cat_id; ?>" placeholder="">
    <span id="error_pro_cat"></span>
</div>

<div class="form-group">
    <label for="formGroupExampleInput2">Libellé</label>
    <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo $produit->pro_libelle; ?>" placeholder="">
    <span id="error_pro_libelle"></span>
</div>

<div class="form-group">
    <label for="formGroupExampleInput2">Description</label>
    <input type="text" class="form-control" name="pro_description" id="pro_description" value="<?php echo $produit->pro_description; ?>" placeholder="">
    <span id="error_pro_description"></span>
</div>

<div class="form-group">
    <label for="formGroupExampleInput2">Prix</label>
    <input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo $produit->pro_prix; ?>"placeholder="">
    <span id="error_pro_prix"></span>
</div>

<div class="form-group">
    <label for="formGroupExampleInput2">Stock</label>
    <input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo $produit->pro_stock; ?>" placeholder="">
    <span id="error_pro_stock"></span>
</div>

<div class="form-group">
    <label for="formGroupExampleInput2">Couleur</label>
    <input type="text" class="form-control" name="couleur" id="couleur" value="<?php echo $produit->pro_couleur; ?>"placeholder="">
    <span id="error_couleur"></span>
</div>

<div class="form-group">
    <label for="formGroupExampleInput2">Extension</label>
    <input type="text" class="form-control" name="photo" id="photo" value="<?php echo $produit->pro_photo; ?>"placeholder="Ex: jpg, png, ...">
    <span id="error_photo"></span>
</div>

<!-- <div class="form-group">
    <label for="formGroupExampleInput2">Date d'ajout</label>
    <input type="date" class="form-control" name="date_ajout" id="date_ajout" placeholder="jj-mm-aaaa">
    <span id="error_date_ajout"></span>
</div> -->
<!-- <div class="form-group">
    <label for="formGroupExampleInput2">Date de modification</label>
    <input type="date" class="form-control" name="date_modif" id="date_modif" placeholder="jj-mm-aaaa">
    <span id="error_date_modif"></span>
</div> -->

<!-- je defini des valeurs 1 et 0 pour ma mention bloque, ainsi je peux avoir un choix et oui et non pour mes produits au moment de choisir -->
<!-- <div class="form-check form-check-inline mb-3 font">
    <label class="form-check-label" for="inlineCheckbox2">Voulez vous bloquer ce produit?</label>
</div>

  <div class="form-check form-check-inline">
      <input class="radI form-check-input ml-1 mb-3" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> <!-- Value = 1 -->
      <!-- <label class="radI form-check-label ml-2 mb-2" for="inlineRadio1"><h5 class="largContact2">Oui</h5></label> <!-- Value = 0 -->
  <!-- </div>
  <div class="form-check form-check-inline mb-3">
      <input class="radI form-check-input ml-5 mb-3" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" checked>
      <label class="radI form-check-label ml-2 mb-2" for="inlineRadio1"><h5 class="largContact2">Non </h5></label>
  </div> -->
<!-- si je veux que ma mention bloqué ait une valeur numerique je fais ce qui suit -->
<div class="form-group">
    <label for="formGroupExampleInput2">Bloquer Produit</label>
    <input type="texte" class="form-control" name="bloque" value="<?php echo $produit->pro_bloque; ?>"id="bloque">
    <span id="error_bloque"></span>

</div>
<br>
<div class="form-check form-check-inline mb-3 font">
    <input class="form-check-input font" type="radio" name="accepte" id="accepte" required>
    <label class="form-check-label" for="inlineCheckbox2">Voulez vous modifier ce produit?</label>
</div>

<br>
<button type="submit" class="btn btn-outline-success">Modifier</button>
<button type="reset" class="btn btn-outline-danger">Refuser</button>
</form>

<!-- *** Modification IMAGE *** -->
<form class="mt-3" action="ajout_photo.php" method="POST" enctype="multipart/form-data">
<p class="alert alert-primary text-center h4 col-lg-4">Ajouter une image</p>
    <input class=" col-8 offset-2 col-lg-2 offset-lg-1 form-group" type="file" name="ImgPro"> <!-- Photo -->
    <input type="hidden" name="prodIDphoto" value="<?= $res ?>"> <!-- IDPhoto -->
    <input type="hidden" name="SizeImg" value="300000"> <!-- Taille Max/ si besoin de modification changer value ici-->
    <input id="SendImage" class="form-control col-8 offset-2 col-lg-2 offset-lg-1 mb-5" type="submit" name="SendImg" value="Ajouter la Photo">
</form>


<!-- zone de suppression du produit -->


<form action="supression.php" method="get"> <!-- Recupération de l'id -->
<!-- j'utilise un modal pour la suppression pour avoir une confirmation de ce que je veux faire -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
  supprimer ce produit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmez vous la suppressin de ce produit?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="mb-3">La suppression de ce produit sera définitive.</p>
        <p> êtes vous sur de vouloir réaliser cette opération?</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="DeleteButton" value="<?php echo $produit->pro_id; ?>"> <!-- Bouton caché avec la valeur de pro_id -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
        <input type="submit" class="btn btn-primary" value="Supprimer Produit"</button>
      </div>
    </div>
  </div>
</div>

</form>

<?php
include("assets/php/footer.php")
?>
