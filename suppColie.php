<?php
// Récupérer l'id à supprimer
$id = $_REQUEST['dd'];

// Connexion à la bdd
include("connexion.php");
// Supprimer l'enregistrement
$stmt=$cnx->exec("DELETE FROM colis where id_colis=$id");
if(!$stmt)
echo ('echec d suppression '.$cnx->errorInfo());
// Redirection à la page principale
header("location:ajoutCommande2.php");
?>