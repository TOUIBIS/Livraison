<?php // Connexion à la bdd
include("connexion.php") ;

        $nom_liv= $_POST['nomLiv'];
        $tel= $_POST['tel'];

       

        $req ="INSERT INTO livreurs (id_livreur,nom_livreur,tel) VALUES(NULL,'$nom_liv','$tel')";
        $cnx->exec($req);

        header('Location:ajoutLivreur.html');
?>