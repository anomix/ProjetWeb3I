<?php
    if(isset($_GET['fac'])) {
        $_SESSION['fac'] = $_GET['fac'];
    }
    include './nonmembre/lib/php/classes/produits_nm.class.php';
    include './nonmembre/lib/php/classes/produits_nmManager.class.php';
    $mg=new produits_nmManager($db);
    $liste=$mg->getDetailFacture($_SESSION['fac']);
    $nbr=count($liste);
    ?>
<h1><?php print "Facture n°".$_SESSION['fac'];?></h1>
<div id="table_facture_detail">
    <table width="100%">
        <tr>
            <th>
                Ligne
            </th>
            <th>
                Nom
            </th>
            <th>
                Prix
            </th>
            <th>
                Quantite
            </th>
        </tr>
        <?php
            $total=0;
            for($i=0;$i<$nbr;$i++){
                $total=$total+(($liste[$i]->prix_unitaire)*($liste[$i]->quantite));
        ?>
        <tr>
            <td width="15%">
                <?php print ($i+1);?>
            </td>
            <td width="55%">
                <?php print $liste[$i]->nom_produit;?>
            </td>
            <td width="15%">
                <?php print $liste[$i]->prix_unitaire;?>
            </td>
            <td width="15%">
                <?php print $liste[$i]->quantite;?>
            </td>
        </tr>
            <?php } ?>
    </table>
    <p><?php print "<h1>Total: ".$total."</h1>";?></p>
</div>

