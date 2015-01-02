<?php
    //include './nonmembre/lib/php/classes/produits_nm.class.php';
    //include './nonmembre/lib/php/classes/produits_nmManager.class.php';
    $mg = new produits_nmManager($db);
    if(isset($_GET['prod'])){
        $_SESSION['prod'] = $_GET['prod'];
        $liste = $mg->getProduit_m($_SESSION['prod']);
    }
?>
<h1>Detail Produit</h1>
<div id="table_detail_produit">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_produit">
    <input type="hidden" id="idutilisateur" name="idutilisateur" value="<?php print $_SESSION['idUser']; ?>"/>
    <input type="hidden" id="prixproduit" name="prixproduit" value="<?php print $liste[0]->prix_produit;?>"/>
    <input type="hidden" id="idproduit" name="idproduit" value="<?php print $liste[0]->id_produit;?>"/>
    <table>   
        <tr>
            <td rowspan="5">
                <img src="./admin/images/<?php print $liste[0]->nom_produit;?>.jpg" alt="<?php print $liste[0]->nom_produit;?>"/>
            </td>
            <td>Nom: 
                <?php
                    print $liste[0]->nom_produit;
                ?>
            </td>
        </tr>
        <tr>
            <td>Prix: 
                <?php
                    print $liste[0]->prix_produit;
                ?>
                €
            </td>
        </tr>
        <tr>
            <td>Stock: 
                <?php
                    print $liste[0]->stock;
                    print $liste[0]->type;
                ?>
            </td>
        </tr>
        <tr>
            <td>Quantité: <input type="number" id="quantite" name="quantite"/> </td>
        </tr>  
        <tr>
            <td><input type="submit" id="submit_produit" name="<?php print $liste[0]->id_produit;?>" value="Ajouter"/> </td>
        </tr> 
        </table>
</form>
</div>

