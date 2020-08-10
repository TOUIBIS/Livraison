<?php
include("connexion.php") ;
session_start();
$user = $cnx->query("SELECT login,mdp from users");
$listeuser = $user->fetchAll();

//print_r($listeuser);
$login = $listeuser[0]["login"] ;
$mdp = $listeuser[0]["mdp"] ;

//echo $_SESSION["login"]." ".$_SESSION["mdp"];

if(isset($_SESSION["login"]) && $_SESSION["login"] == $login && $_SESSION["pass"] == $mdp  ){


    
    $nbColis = $cnx->query("SELECT * from colis");
     // Extraire (fetch) toutes les lignes (enregistrement, rows)
    $listeColis = $nbColis->fetchAll() ; // Ceci est un tableau de tableaux associatifs
    // Calculer le nombre d'étudiants
    $nbr_colis = count($listeColis);

    $chiffre = $cnx->query("SELECT SUM(prix) from colis");

    $listechiff = $chiffre->fetchAll() ;
  

echo "
    <html>
    <head>
    <meta charset='utf-8'>
   
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
  
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
    




    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
 
  
  




  <link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>

  
  <link href='css/sb-admin-2.min.css' rel='stylesheet'>
    
    </head>
    <body>
    
    
    ";

    
   
    echo "
    <nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow avbar '>
    <div class='container-fluid'>
        <div >
        <ul class='nav navbar-nav'>
        <li class='active'><a href='ajoutExp.html'>Ajouter un expediteur</a></li>
        <li><a href='ajoutLivreur.html'>Ajouter un livreur</a></li>
        <li><a href='listeCommandeAdmin.php'>Liste des colies</a></li>
      </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li><a class='btn btn-success btn-lg' href='logout.php' > <span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
             </ul>
             </div>
             </div>
    </nav>

    <div class='row'>
    <div class='col-sm-6' ></div>
    <div class='col-sm-2' >
                    
                    <div class='card border-left-success shadow  py-2'>
                    <div class='card-body'>
                    <div class='row no-gutters align-items-center'>
                        <div class='col mr-2'>
                        <div class='text-xs font-weight-bold text-success text-uppercase mb-1'><h1>Colis</h1></div>
                        <div class='h5 mb-0 font-weight-bold text-gray-800'>
                            <h1>  
                                ".$listechiff[0]['SUM(prix)']."

                                
                                </h1>             
                        </div>
                        </div>
                        <div class='col-auto'>
                        <i class='fas fa-dollar-sign fa-2x text-gray-300'></i>
                        </div>
                    </div>
                    </div>
                    </div>










    </div>
    <div class='col-sm-2' >

   
   
            
            <div class='card border-left-success shadow  py-2'>
            <div class='card-body'>
            <div class='row no-gutters align-items-center'>
                <div class='col mr-2'>
                <div class='text-xs font-weight-bold text-success text-uppercase mb-1'><h1>Colis</h1></div>
                <div class='h5 mb-0 font-weight-bold text-gray-800'>
                    <h1>  
                        $nbr_colis

                        
                        </h1>             
                </div>
                </div>
                <div class='col-auto'>
                <i class='fas fa-dollar-sign fa-2x text-gray-300'></i>
                </div>
            </div>
            </div>
            </div>







        </div>

        </div>";
        include('listeCommande.php');
       echo"
    </body>
    
    </html>
";
}else{
    header('Location:login.html'); 
 }
?>