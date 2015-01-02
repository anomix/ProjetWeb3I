<h2> Produits </h2>
<?php
    $mg = new Produits_nmManager($db);  
?>
<div id="choix">
    <ul>
        <li><a href="index.php?choix=fruit">Fruits</a></li>
        <li><a href="index.php?choix=legume">Légumes</a></li>
    </ul>
</div>

    <?php
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
                    <img src="./admin/images/<?php print $liste[$i]->nom_produit;?>.jpg" alt="<?php print $liste[$i]->nom_produit;?>"/>
            </td>
            <td>Nom: 
                <?php
                    print $liste[$i]->nom_produit;
                ?>
            </td>
        </tr>
        <tr>
            <td>Catégorie: Fruit
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
    <?php
        for($i=0;$i<$nbr;$i++){
    ?>
    <table>
        <tr>
            <td rowspan="3">
                    <img src="./admin/images/<?php print $liste[$i]->nom_produit;?>.jpg" alt="<?php print $liste[$i]->nom_produit;?>"/>
            </td>
            <td>Nom:
                <?php
                    print $liste[$i]->nom_produit;
                ?>
            </td>
        </tr>
        <tr>
            <td>Catégorie: Légume
            </td>
        </tr>
        <tr>
            <td>Sotck: 
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
?>






