<h2>Accueil</h2>
<?php
    $accueil_nmManager = new accueil_nmManager($db);
    $texte = $accueil_nmManager->getTexteAccueil_nm();
    print $texte[0]->texte_accueil;
?>