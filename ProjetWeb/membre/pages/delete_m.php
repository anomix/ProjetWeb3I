<?php
    if(isset($_GET['test'])){
        $_SESSION['test']=$_GET['test'];
    }
    include './nonmembre/lib/php/classes/produits_nm.class.php';
    include './nonmembre/lib/php/classes/produits_nmManager.class.php';
    $mg=new produits_nmManager($db);
    $liste=$mg->getDetailFacture($_SESSION['test']);
    $nbr=count($liste);
    $flag=true;
    $i=0;
    while($i<$nbr && $flag==true){
        $idproduit=$liste[$i]->id_produit;
        $idfacture=$_SESSION['test'];
        $retour=$mg->DeleteDetailFacture($idproduit,$idfacture);
        $i++;
        print $retour;
        if($retour==1){
            $flag=true;
        }
        else{
            $flag=false;
        }
    }
    if($flag==true){
        $retour=$mg->DeleteFacture($idfacture);
        if($retour==1){
            $flag=true;
            print "<h1>Annulation reussie</h1>";
        }
        else{
            $flag=false;
        }
        
    }
?>
