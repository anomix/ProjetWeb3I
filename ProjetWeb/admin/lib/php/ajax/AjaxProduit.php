<?php

session_start();
header('Content-Type: application/json');
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/produit_m.class.php';
require '../classes/produit_mManager.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);
try {
    $mg = new produit_mManager($db);
    if($_SESSION['lignedf']==0) {
        $_SESSION['test']=$mg->addProduit($_POST['iduser']);
        $_SESSION['lignedf']=1;
    }
    if($_SESSION['test']!=0){
        $retour=$mg->addDetailFacture($_SESSION['test'],$_POST['prix'],$_POST['quantite'],$_POST['idproduit']);
        if($retour!=0){
            $_SESSION['choix']="default";
            $_SESSION['valeur']="default";
        }
        else {
            $_SESSION['choix']="default";
        }
    }
    print json_encode(array("retour" => $retour));
} catch (PDOException $e) {
    print "Echec de la connexion".$e;
}
