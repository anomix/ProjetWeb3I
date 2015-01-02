<?php
    class accueil_nmManager extends Accueil_nm {
        private $_db;
        private $_accueilArray=array();
        
        public function __construct($db) {
            $this->_db = $db;
        }
        
        //texte accueil
        public function getTexteAccueil_nm() {
            try{
                $query="select texte_accueil from projet";
                $resultset=$this->_db->prepare($query);
                $resultset->execute();
            } catch (PDOException $e) {
                print $e->getMessage();
            }
            while($data = $resultset->fetch()){
                try{
                    $_accueilArray[]=new accueil_nm($data);
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
        return $_accueilArray;
        }
    }
?>
