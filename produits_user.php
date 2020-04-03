<?php

    include("assets/php/headerJarditou.php");
//  Requete SQL

require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$requete = "SELECT pro_prix, pro_libelle, pro_id, pro_photo, pro_ref, pro_description, pro_d_ajout, pro_d_modif, pro_bloque FROM produits ORDER BY pro_id";
$result = $db->query($requete);
verifObj($result);
?>


    <h1 id="ttlpage" class="col-4 offset-4 mb-5">Produits</h1>
    <!--------------Tableau------------->
<?php while ($row = $result->fetch()) { ?> <!-- Aller chercher -->
    <div class="accordion mb-1" id="accordionExample">
        <div class=" card">
            <div class="row card-header" id="heading<?php echo $row->pro_id; ?>">
                <h2 class="col-4">
                    <button class=" txtDec btn btn-link" type="button" data-toggle="collapse"
                            data-target="#collapse<?php echo $row->pro_id; ?>" aria-expanded="true"
                            aria-controls="collapseOne">
                        <p><?php echo $row->pro_libelle; ?></p>
                    </button>
                </h2>
                <p class="prixTab col-4 text-center">

                    <?php echo $row->pro_prix . "€"; ?>
                </p>

            </div>
            <div id="collapse<?php echo $row->pro_id; ?>" class="collapse"
                 aria-labelledby="heading<?php echo $row->pro_id; ?>" data-parent="#accordionExample">
                <div class="row card-body">
                    <ins class="ReducImg col-6 "><img class="img-thumbnail"
                                                     src="assets/img/<?php echo $row->pro_id; ?>.<?php echo $row->pro_photo; ?>"
                                                     alt="Grande Photo"></ins>
                    <p class="col-5 offset-1">
                        <ins class="categTab row mb-3"><?php echo $row->pro_ref; ?></ins>
                        <ins class="prix2Tab row mb-3"><?php echo $row->pro_prix . "€"; ?></ins>
                        <ins class="refTab row">ID : <?php echo $row->pro_id; ?></ins>
                        <ins class="refTab row mb-4">Libellé : <?php echo $row->pro_libelle; ?></ins>
                        <ins class="refTab row">Ajouté : <?php echo $row->pro_d_ajout; ?></ins>
                        <ins class="refTab row">Modifié : <?php echo $row->pro_d_modif; ?></ins>
                        <ins class="refTab row">Bloqué : <?php echo $row->pro_bloque; ?></ins>
                        <ins class="descTab row">Description</ins>
                        <ins class="desc2Tab row"><?php echo $row->pro_description; ?></ins>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php } ?> <!--fin while -->


    <?php
    include("assets/php/footer.php");



?>
