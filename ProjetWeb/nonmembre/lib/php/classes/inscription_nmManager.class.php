<?php
    class inscription_nmManager extends inscription_nm {
        private $db;
        private $_inscriptionArray = array();
        
        public function __construct($db) {
            $this->_db = $db;
        }
        
        function addInscription($nom_user,$prenom_user,$phone,$nom_rue,$numero_rue,$ville,$pays,$pseudo,$password) {
            try{
                $query="select add_inscription(:nom_user,:prenom_user,:phone,:nom_rue,:numero_rue,:ville,:pays,:pseudo,:password)as retour";
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':nom_user',$_POST['nom_user']);
                $sql->bindValue(':prenom_user',$_POST['prenom_user']);
                $sql->bindValue(':phone',$_POST['phone']);
                $sql->bindValue(':nom_rue',$_POST['nom_rue']);
                $sql->bindValue(':numero_rue',$_POST['numero_rue']);
                $sql->bindValue(':ville',$_POST['ville']);
                $sql->bindValue(':pays',$_POST['pays']);
                $sql->bindValue(':pseudo',$_POST['pseudo']);
                $sql->bindValue(':password',$_POST['password']);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
            return $retour;
        }
    }
?>