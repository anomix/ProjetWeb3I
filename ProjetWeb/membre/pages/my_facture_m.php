<?php

    include './nonmembre/lib/php/classes/produits_nm.class.php';
    include './nonmembre/lib/php/classes/produits_nmManager.class.php';
    $mg=new produits_nmManager($db);
    $liste=$mg->getFacture($_SESSION['idUser']);
    $nbr=count($liste);
    ?>
<div id="table_facture_m">
<table>
    <?php
    for($i=0;$i<$nbr;$i++){
        ?>
    <tr>
        <td>
            Numero de facture: <?php print $liste[$i]->id_facture; ?>
        </td>
        <td>
            Date de la facture: <?php print $liste[$i]->date_facture; ?>
        </td>
        <td>
            <a href="index.php?page=my_facture_detail&fac=<?php print $liste[$i]->id_facture;?>">Voir ma facture</a>
        </td>
    </tr>
    
        <?php
    }
    ?>
</table>
</div>


    
