<?php

class Login {

    private $_db;
    private $_userArray=array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    function isAdmin($login,$password) {
        $retour=array();
		//print "login ".$login." password ".$password;
		//print " coucou ";
		//print $_POST['password'];
		
        try {
			
            $query="select verifier_connexion(:nom_user,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':nom_user',$_POST['login']);
            //$sql->bindValue(':password',$_POST['password']);  
            $sql->bindValue(':password',md5($_POST['password']));  
            //print " ".$query;
            $sql->execute();
            //2 manières et 2 récup. différentes de la valeur
            //$retour[] = $sql->fetchAll(PDO::FETCH_ASSOC); // récupérer : print $auth[0][0]['verifier_connexion'];  
            $retour = $sql->fetchColumn(0);   
            //print " retour ".$retour;
        } catch(PDOException $e) {
            print "Echec de la requ&ecirc;te.".$e;
        }
        return $retour;
    }
    
    public function getUserAuthentification_nm($pseudo,$password) {
        $query="select * from utilisateur where pseudo = :pseudo and password = md5(:password)";
        $resultset = $this->_db->prepare($query);
        $resultset->bindvalue(1,$pseudo,PDO::PARAM_STR);
        $resultset->bindvalue(2,$password,PDO::PARAM_STR);
        $resultset->execute();
        
        $nbr=$resultset->rowCount();
            while($data = $resultset->fetch()) {
                $_userArray[] = new utilisateur_m($data);
            }
            return $_userArray;
    }
}
