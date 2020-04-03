<?php

function connexionBase()

{

   // Paramètre de connexion serveur

$host = "localhost";

   $login= "root";     // Votre loggin d'accès au serveur de BDD

   $password="root";    // Le Password pour vous identifier auprès du serveur

   $base = "jarditou";    // La bdd avec laquelle vous voulez travailler

try

{

        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         // Je défini que fetch me donnera des objets par default sinon il considerera que mes variables ne sont pas des objets
         $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $db;

}

    catch (Exception $e)
    {

        echo 'Erreur : ' . $e->getMessage() . '<br>';

        echo 'N° : ' . $e->getCode() . '<br>';

        die('Connexion au serveur impossible.');

    }

}

?>
<?php
//  Verification des objects apres une requete
function  verifObj($result)
{
    if (!$result)
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2];
        die("Erreur dans la requête");
    }
    if ($result->rowCount() == 0)
       die("La table est vide");
}
?>
