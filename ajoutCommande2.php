<html>
    <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
      
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
         
          
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    

          <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

          
          <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <body >
  

    <div class="container-fluid"> 
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <div >
            <a class="btn btn-success btn-lg " href="logout.php" > <span class="glyphicon glyphicon-log-out"></span> Logout</a>
        </div>
    </nav>
    
        <div class="row">
        
        </div>
        <div class="row">
        <div class="col-sm-1"></div>
            <div class="col-sm-4" >

                    
                    <form action="ajoutCommande.php" method="POST" >
                        <div class="form-group">
                             <label for="nomClient">Nom de client :</label> 
                             <input type="text" class="form-control" name="nomClient" placeholder="Enter nom client" required="required"> <br>
                        </div>
                        <div class="form-group">
                             <label for="tel">TEL :</label> 
                            
                             <input type="text" class="form-control" name="tel" placeholder="Enter N° telephone" required="required"> <br>
                        </div>
                        <div class="form-group">
                             <label for="tel"> REGION :</label> 
                             
                             <input type="text" class="form-control" name="region" placeholder="Enter la region" required="required"> <br>
                        </div>
                        <div class="form-group">
                             <label for="adresse"> Adressse :</label> 
                             
                             <input type="text" class="form-control" name="adresse" placeholder="Enter la region" required="required"> <br>
                        </div>
                        <div class="form-group">
                             <label for="adresse">  PRODUIT :</label> 
                             
                             <input type="text" class="form-control" name="produit" placeholder="Description du produit" required="required"> <br>
                        </div>
                        <div class="form-group">
                             <label for="adresse">  PRIX EN DT:</label> 
                             
                             <input type="text" class="form-control" name="prix" step="any" placeholder="Description du produit" required="required"> <br>
                        </div>
                      
                       
                  
                      
                        <input type="submit" class="btn btn-success" value="Sauvegarder" name="save"> 
                    </form>
            </div>
            <div class="col-sm-1" ></div>
            <div class="col-sm-2" >
                

                <?php
                    include("connexion.php") ;
                    $nbColis = $cnx->query("SELECT * from colis");
                     // Extraire (fetch) toutes les lignes (enregistrement, rows)
                    $listeColis = $nbColis->fetchAll() ; // Ceci est un tableau de tableaux associatifs
                    // Calculer le nombre d'étudiants
                    $nbr_colis = count($listeColis);
                ?>
                   
                   
                 
              <div class="card border-left-success shadow  py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h1>Colis</h1></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <h1>  <?php
                            echo "".$nbr_colis;

                            ?>
                            </h1>             
                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
         
               
                   
                   
                   <?php
                 
                    
                    $chiffre = $cnx->query("SELECT SUM(prix) from colis");

                   $listechiff = $chiffre->fetchAll() ;
                    ?>
     <div class="card border-left-success shadow  py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h1>Gans</h1></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <h1>  <?php
                            echo "".$listechiff[0]['SUM(prix)'];

                            ?>
                            DT
                            </h1>             
                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
       

                    <?php




                   
                   /*echo "
                   <div class='alert alert-success alert-dismissable fade in'>
                    <i class='icon icon-check-circle icon-lg'></i>
                    <strong>".$listechiff[0]['SUM(prix)']." Dinards
                    </strong></div>";*/
                    
                    ?>
            </div>
            <div class="col-sm-3" ></div>
            <div class="col-sm-1">
            
            </div>
        </div>         
            
        <?php
       include('listeCommande.php');
        ?>

    </div>








            </body>
</html>
