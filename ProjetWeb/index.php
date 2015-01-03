<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        include('./nonmembre/lib/php/Pliste_include.php');
    }
    else {
        include('./admin/lib/php/liste_include.php');
    }
    $db = Connexion::getInstance($dsn,$user,$pass);
    if($db){
        //print"connexion ok";
    }
    
    $scripts = array();
    $i=0;
    foreach(glob('./admin/lib/js/jquery/*.js')as $js){
        $fichierJs[$i] = $js;
        $i++;
    }
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Projet Fruit et Légume</title>
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/style_pc.css"/>
        <?php
            foreach($fichierJs as $js){
        ?>
        <script type="text/javascript" src="<?php print $js; ?>"></script>
        <?php
            }
        ?>
        <script type="text/javascript" src="./admin/lib/js/jquery/jquery-validation-1.13.1/dist/jquery.validate.js"></script>   
        <script type="text/javascript" src="./admin/lib/js/fonctionsJquery.js"></script>    
        <script type="text/javascript" src="./admin/lib/js/fonctionsJqueryAdmin.js"></script>
        <script type="text/javascript" src="./admin/lib/js/fonctionsJqueryInscription.js"></script>
        <script type="text/javascript" src="./admin/lib/js/fonctionsJqueryProduit.js"></script> 
    </head>
    <body>
        <div id="page">
            <header>
                <h1>Welcome in my project</h1>
                <p>
                <?php
                    if(isset($_SESSION['admin'])){
                        print "Bienvenue ".$_SESSION['nomUser']." ".$_SESSION['prenomUser'].", profitez bien de votre visite ! ";
                    }
                    /*if(isset($_SESSION['page'])){
                        if(isset($_GET['page'])) {
                            $_SESSION['page']= $_GET['page'];
                            print $_SESSION['page'];
                        }
                    }*/
                ?>
                </p>
            </header> 
            <section id="menu">
                <nav>
                    <?php
                        if(!isset($_SESSION['admin'])){
                            if(file_exists('./nonmembre/pages/menu_nm.php')){
                                include('./nonmembre/pages/menu_nm.php');
                            }
                        }
                        else{
                            if(file_exists('./membre/pages/menu_m.php')){
                                include('/membre/pages/menu_m.php');
                            }
                        }
                    ?>
                </nav>
            </section>
            <section id="contenu">
                <nav>
                    <!--<p>
                        Bonjour, je suis fruit et legume, je suisdfdsfdsfdsfdsfdsfsdsfdsfsds la pour vofsd jfsdfhjsd jghf jhg jdhksdjgdsgdngmjgdjnhjsus aider a commander nos produits.Comme vous l'aurezs  sdf sdfo sdfs fs fsdfrh dgdfdsfdsfds remarqué, nous vendons des fruits et des légumes.
                    </p>-->
                    <?php
                        //print "passe par ici";
                        
                        if(!isset($_SESSION['admin'])){
                            //print "passe par ici2";
                            if(!isset($_SESSION['page'])){
                                $_SESSION['page'] = "accueil_nm";
                                //print "passe par ici3";
                            }
                            if(isset($_GET['page'])) {
                                $_SESSION['page'] = $_GET['page'];
                                /*print $_GET['page'];
                                print "passe par ici4";*/
                            }
                            $chemin = './nonmembre/pages/'.$_SESSION['page'].'.php';
                            //print "passe par ici5";
                            if(file_exists($chemin)) {
                                include($chemin);
                                //print "passe par ici6";
                            }
                        }
                        else {
                            //$_SESSION['page']=null;
                            if(!isset($_SESSION['page'])){
                                $_SESSION['page'] = "accueil_m";
                                //print "passe par ici3";
                            }
                            if(isset($_GET['page'])) {
                                $_SESSION['page'] = $_GET['page'];
                                /*print $_GET['page'];
                                print "passe par ici4";*/
                            }
                            $chemin = './membre/pages/'.$_SESSION['page'].'.php';
                            //print "passe par ici5";
                            if(file_exists($chemin)) {
                                include($chemin);
                                //print "passe par ici6";
                            }
                        }
                    ?>
                </nav>
            </section>
            <footer>
                Editeur responsable Corentin Speckens
            </footer>
        </div>
    </body>
</html>
