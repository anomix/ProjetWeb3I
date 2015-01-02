<?php

class Login {

    private $_db;
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    function isAdmin($login,$password) {
        $retour=array();
		print "login ".$login." password ".$password;
		print " coucou ";
		print $_POST['password'];
		
        try {
			
            $query="select verifier_connexion(:nom_user,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':nom_user',$_POST['login']);
            //$sql->bindValue(':password',$_POST['password']);  
			$sql->bindValue(':password',md5($_POST['password']));  
			print " ".$query;
            $sql->execute();
            //2 manières et 2 récup. différentes de la valeur
            //$retour[] = $sql->fetchAll(PDO::FETCH_ASSOC); // récupérer : print $auth[0][0]['verifier_connexion'];  
            $retour = $sql->fetchColumn(0);   
			print " retour ".$retour;
        } catch(PDOException $e) {
            print "Echec de la requ&ecirc;te.".$e;
        }
        return $retour;
    }
}
