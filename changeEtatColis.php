<?php
include("connexion.php") ;
session_start();

if(isset($_SESSION["login"])){

echo "<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
</head>
</head>
<body>  
<a href='logout.php' > Logout</a>
    <form action='changeEtatColis.php' method='POST'>
        N° Coli : <input type='text' name='numColi' required='required'>

        <p>Selectionner l etat de colie :</p>

        <input type='radio' id='livree' name='etat' value='Livree'>
        <label for='livree'>Livrée</label><br>
        <input type='radio' id='retour' name='etat' value='Retour'>
        <label for='retour'>Retour</label><br>

        <input type='submit' name='submit' value='Ajouter'> 
    </form>";

    if(isset($_POST['submit']) ){
        $id_coli=$_POST["numColi"];
        $etat = $_POST["etat"];
        
        if ($etat == 'Retour'){
            $req = $cnx->query("UPDATE colis SET etat = 'Retour' WHERE id_colis = $id_coli");
           
            echo "Colie Retour";
        }else{
            $req = $cnx->query("UPDATE colis SET etat = 'Livree' WHERE id_colis = $id_coli");
            echo "Colie Livree";
        }
             
    }

echo "</body>
</html>
";
}
else{
   header('Location:login.html'); 
}
?>