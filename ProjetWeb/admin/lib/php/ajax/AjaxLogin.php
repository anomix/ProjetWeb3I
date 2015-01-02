<?php
session_start();
header('Content-Type: application/json');
//indique que le retour doit $etre traité en json
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/login.class.php';
require '../classes/utilisateur_m.class.php';
require '../classes/utilisateur_mManager.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);

try{    
    $mg = new Login($db);
    $retour=$mg->isAdmin($_POST['login'],$_POST['password']);
    if($retour==1) {
        $_SESSION['admin']=1;
        $_SESSION['page']="accueil_m";
        $mg2 = new utilisateur_mManager($db);
        $liste = $mg2->getUserAuthentification_m($_POST['login'],$_POST['password']);
        $_SESSION['nomUser'] = $liste[0]->nom_user;
        $_SESSION['prenomUser'] = $liste[0]->prenom_user; 
        $_SESSION['idUser'] = $liste[0]->id_user;
               //print "session : ".$_SESSION['admin'];
    }
    print json_encode(array("retour" => $retour)); 
}
catch(PDOException $e){
	print "Echec de la coucou".$e;
}

?>