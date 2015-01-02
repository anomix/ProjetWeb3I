<?php
    include './nonmembre/lib/php/classes/produits_nm.class.php';
    include './nonmembre/lib/php/classes/produits_nmManager.class.php';
    if(!isset($_SESSION['lignedf'])){
        $_SESSION['lignedf']=0;
    }
        
    $mg = new produits_nmManager($db);
    if(!isset($_SESSION['valeur'])) {
        $_SESSION['valeur']="default";
    }
    if(isset($_GET['valeur'])) {
        $_SESSION['valeur'] = $_GET['valeur'];
    }
    print $_SESSION['valeur'];
    $_SESSION['choix'] = "default";  
?>
<h2>Nouvelle facture</h2>
<div id="table_newfacture_m">
    <?php
    if($_SESSION['valeur']=="default"){
    ?>
    <h1><?php if(isset($_SESSION['test'])){print "Facture n°".$_SESSION['test'];}?></h1>
    <table>
        <thead>
            <th id="tablethlnf">
                Ligne        
            </th>
            <th id="tablethprnf">
                Produit
            </th>
            <th id="tablethqnf">
                Quantité
            </th>
            <th id="tablethpxnf">
                Prix
            </th>
        </thead>
        <tbody>
            <?php
                if($_SESSION['lignedf']!=0){
                    $liste = $mg->getDetailFacture($_SESSION['test']);
                    $nbr = count($liste);
                    $total=0;
                    for($i=0;$i<$nbr;$i++){
                        $total=$total+(($liste[$i]->quantite)*($liste[$i]->prix_unitaire));
                
            ?>
            <tr>
                <td>
                    <?php print $i+1;?>
                </td>
                <td>
                    <?php print $liste[$i]->nom_produit;?>
                </td>
                <td>
                    <?php print $liste[$i]->quantite;?>
                </td>
                <td>
                    <?php print $liste[$i]->prix_unitaire;
                    }
                }
                    ?>
                </td>
            </tr>
            <tr><td colspan ="4"><a href="index.php?page=newfacture_m&valeur=ajout">Ajouter</a></td></tr>
        </tbody>
    </table>
    <table>
            <td width="10%">
                <?php $_SESSION['listeU']=$liste;?>
                <a href="./membre/lib/php/classes/update_mManager.class.php">Ajouter</a>
            </td>
            <td width="75%"><input type="submit" id="submit_annuler" name="submit_annulerr" value="Annuler"/></td>
            <td width="15%">Total: <?php if($_SESSION['lignedf']!=0){print $total;}else{print 0;}?> €</td>
    </table>
    <?php
    }
    ?>
    <?php
        if($_SESSION['valeur']=="ajout"){
            //$_SESSION['valeur']="default";
            if(!isset($_SESSION['choix'])){
            $_SESSION['choix'] = "default";            
            }
            //print $_SESSION['choix'];
            if(isset($_GET['choix'])) {
                $_SESSION['choix'] = $_GET['choix'];
                /*print $_SESSION['choix'];
                print "passe par ici";*/
            }
            if($_SESSION['choix']=="default"){
            ?>
    <div id="choix">
    <ul>
        <li><a href="index.php?page=newfacture_m&choix=fruit">Fruits</a></li>
        <li><a href="index.php?page=newfacture_m&choix=legume">Légumes</a></li>
    </ul>
</div>
<div id="table_default">
    <table>
        <tr>
            <td>
                <img src="./admin/images/fruit_produit_nm.jpg" alt="fruits" />
            </td>
            <td>
                <img src="./admin/images/legume_produit_nm.jpg" alt="legumes" />
            </td>
        </tr>
    </table>
</div>

        <?php
        }
        if($_SESSION['choix']=="fruit"){
            $liste = $mg->getListeProduit_nm(2);
            $nbr = count($liste);
            $_SESSION['choix']="default";
            
            ?>
<div id="table_produit_nm">
    <?php
        for($i=0;$i<$nbr;$i++){
    ?>
        <table>   
            <tr>
                <td rowspan="3">
                    <a href="index.php?valeur=detail&prod=<?php print $liste[$i]->id_produit;?>"><img src="./admin/images/<?php print $liste[$i]->nom_produit;?>.jpg" alt="<?php print $liste[$i]->nom_produit;?>"/></a>
                </td>
                <td>Nom: 
                    <?php
                        print $liste[$i]->nom_produit;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Prix: 
                    <?php
                        print $liste[$i]->prix_produit;
                    ?>
                    €
                </td>
            </tr>
            <tr>
                <td>Stock: 
                    <?php
                        print $liste[$i]->stock;
                        print $liste[$i]->type;
                    ?>
                </td>
            </tr>
        </table>
    <?php
            }
    ?>
    
</div>
    <?php
    }
    if($_SESSION['choix']=="legume"){
            $liste = $mg->getListeProduit_nm(3);
            $nbr = count($liste);
            $_SESSION['choix']="default";
            ?>
<div id="table_produit_nm">
    <table>
    <?php
        for($i=0;$i<$nbr;$i++){
    ?>
    
        <tr>
            <td rowspan="3">
                    <a href="index.php?valeur=detail&prod=<?php print $liste[$i]->id_produit;?>"><img src="./admin/images/<?php print $liste[$i]->nom_produit;?>.jpg" alt="<?php print $liste[$i]->nom_produit;?>"/></a>
            </td>
            <td>Nom:
                <?php
                    print $liste[$i]->nom_produit;
                ?>
            </td>
        </tr>
        <tr>
            <td>Prix: 
                <?php
                    print $liste[$i]->prix_produit;
                ?>
                €
            </td>
        </tr>
        <tr>
            <td>Stock: 
                <?php
                    print $liste[$i]->stock;
                    print $liste[$i]->type;
                ?>
            </td>
        </tr>   
    
    <?php
            }
        } 
        ?>
        </table>
        <?php
        }
        if($_SESSION['valeur']=="detail"){
            include('./membre/pages/detail_produit_m.php');
            $_SESSION['valeur']="default";
        }
    ?>
</div>
