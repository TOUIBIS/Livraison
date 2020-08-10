<?php
session_start();
include("connexion.php") ;

$login =$_POST['login'];
$mdp =$_POST['pass'];

$req = $cnx->query ("select username,password from expediteurs where username like '$login' and password like '$mdp'");
$user = $req->fetchAll();
$req_reslt = count($user);

$req1 = $cnx->query ("select username,password from livreurs where username like '$login' and password like '$mdp'");
$user1 = $req1->fetchAll();
$req_reslt1 = count($user1);

$user = $cnx->query("SELECT login,mdp from users");
$listeuser = $user->fetchAll();
$loginAd = $listeuser[0]["login"] ;
$mdpAd = $listeuser[0]["mdp"] ;



print_r ($req_reslt);
print_r ($req_reslt1);

if($login == $loginAd && $mdp == $mdpAd ){
    $_SESSION['login']=$login;
    $_SESSION['pass']=$mdp;
    header('Location:dashbord.php'); 
}
elseif($req_reslt1 == 1){
    $_SESSION['login']=$login;
    $_SESSION['pass']=$mdp;
    header('Location:changeEtatColis.php'); 

}elseif ($req_reslt == 1){
    // Set session variables
    $_SESSION['login']=$login;
    $_SESSION['pass']=$mdp;
   
    header('Location:ajoutCommande2.php'); 
}else{
 
 header('Location:login.html'); 
}

?>

