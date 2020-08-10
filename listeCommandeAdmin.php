<?php
        // Connexion à la bdd
        include("connexion.php") ;

        if(isset($_POST['submit']) ){
            $nemexp = $_POST["selectExp"];
            $region = $_POST["selectRegion"];

            if($nemexp== 0 && $region == '0'){
                
                $Commandes = $cnx->query("SELECT * from colis");

            }elseif ($nemexp == 0){   
                $Commandes = $cnx->query("SELECT * from colis where regions like '$region'");
            }elseif ($region == '0'){ 
                
                $Commandes = $cnx->query("SELECT * from colis where id_exp = $nemexp ");
            }else{
                $Commandes = $cnx->query("SELECT * from colis where id_exp = $nemexp and regions like '$region' ");
            }
       
            
       
        }else{
            $Commandes = $cnx->query("SELECT * from colis");
        }
        
        $exp = $cnx->query ("select id,nom_exp from expediteurs");
        $listeExp = $exp->fetchAll();
        
       
        
        // Extraire (fetch) toutes les lignes (enregistrement, rows)
        $listeCommandes = $Commandes->fetchAll() ; // Ceci est un tableau de tableaux associatifs
        // Calculer le nombre d'étudiants
        $nbr_commandes = count($listeCommandes);

        echo"
        <html>
        <head>

        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        
       

        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
      
      

        <style>
        th,td{
            text-align: center;
        }
        </style>
       </head>
        <body>
      
        Filter par : <form class='form-inline'   method='post'>
                    
                    <select class='form-control' name='selectExp'>
                        <option value='0'>--tout les expediteurs--</option>";
                        foreach($listeExp as $item){
                            echo "<option value=".$item[0].">".$item[1]."</option> ";
                        }
                    echo "</select>

                    <select class='form-control' name='selectRegion'>
                        <option value='0'>--tout les regions--</option>
                        <option value='Sousse'>Sousse</option>
                        <option value='Tunis'>Tunis</option>";
                        
                    echo "</select>


                    <input class='btn btn-success' type='submit' name='submit' value='Recherche'> 
        </form><br>";


        echo " Nombre des colies  : $nbr_commandes <br>";
        if( $nbr_commandes == 0 ){
        // Afficher un message si la liste est vide
        echo "<b>Aucune colie pour le moment !</b>";
        }
        else
        {
        echo "<table style='width:100%; border: 1px solid black' class='table table-striped'> ";
        echo " <thead> <tr><th> id clois</th><th > nom client</th><th> N° Telephone</th><th> Region</th><th > Adresse</th><th> Produit</th><th > Prix</th><th> Date</th><th> Etat de colis</th><th> Supprimer</th><th>modifier</th>  </tr></thead>";
       
        foreach ($listeCommandes as $item) {
        echo "<tr >    <td>".$item[0]."</td> <td>".$item[3]."</td><td>".$item[4]."</td> <td>".$item[5]."</td> <td>".$item[6]."</td> <td>".$item[7]."</td> <td>".$item[8]."</td> <td>".$item[9]."</td><td>".$item[10]."</td> <td><a href='suppColie.php?dd=".$item[0]."'><span class = 'glyphicon glyphicon-trash' style ='color:red'></span></a></td>  <td> <a href='modifColie.php?dd=".$item[0]."'><span class = 'glyphicon glyphicon-pencil' style ='color:red'></span></a></td> <tr>";
        }
        echo "</table> </body></html>";
        }
?>