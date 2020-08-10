<?php // Connexion à la bdd
include("connexion.php") ;

$nom_exp= $_POST['nomExp'];
$tel= $_POST['tel'];
$prixLiv= $_POST['prixLiv'];
$prixRetour= $_POST['prixRetour'];


$req ="INSERT INTO expediteurs (id,nom_exp,tel,prix_livraison,prix_retour) VALUES(NULL,'$nom_exp','$tel','$prixLiv','$prixRetour')";
$cnx->exec($req);

header('Location:ajoutExp.html');
?>