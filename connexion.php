<?php // Connexion à la bdd
    $servername = "localhost";
    $username = "sami";
    $password = "sami";

try{
$cnx = new PDO('mysql:host=localhost;dbname=livraison', $username, $password);
   
}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

?>