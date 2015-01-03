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
        $quantite=$liste[$i]->quantite;
        $retour=$mg->UpdateDetailFacture($idproduit,$quantite);
        $i++;
        print $retour;
        if($retour==1){
            $flag=true;
        }
        else{
            $flag=false;
        }
    }
    print $liste[0]->id_facture;
    if($flag==true){
        ?>
            <h1>Validation Reussi</h1>
            <?php
            $_SESSION['lignedf']=0;
    $_SESSION['test']=null;
    ?>
            
    
        <?php
    }
    
?>
