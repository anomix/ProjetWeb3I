<?php
    session_start();
    header('Content-Type: application/json');
    
    require './liste_include_ajax.php';
    require '../classes/connexion.class.php';
    require '../classes/inscription_nm.class.php';
    require '../classes/inscription_nmManager.class.php';
    
    $db = Connexion::getInstance($dsn,$user,$pass);
    
    try{
        $mg = new inscription_nmManager($db);
        $retour=$mg->addInscription($_POST['nom_user'],$_POST['prenom_user'],$_POST['phone'],$_POST['nom_rue'],$_POST['numero_rue'],$_POST['ville'],$_POST['pays'],$_POST['pseudo'],$_POST['password']);
        if($retour==1){
            $_SESSION['page']="accueil_nm";
        }
        print json_encode(array("retour" => $retour));
        
    } catch (PDOException $e) {
        print "Echec de la connexion ".$e;
    }
?>

