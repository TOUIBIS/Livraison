<?php // Connexion à la bdd


include("connexion.php") ;

$nom_client= $_POST['nomClient'];
$tel_client= $_POST['tel'];
$region= $_POST['region'];
$adresse= $_POST['adresse'];
$produit= $_POST['produit'];
$prix= $_POST['prix'];

$req ="INSERT INTO colis (nom_client,tel_client,regions,adresse,produit,prix,date_cmd) VALUES('$nom_client','$tel_client','$region','$adresse','$produit','$prix',now())";

$cnx->exec($req);

header('Location:ajoutCommande2.php');
?>