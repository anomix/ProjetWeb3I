<?php
    class utilisateur_mManager extends utilisateur_m {
        private $_db;
        private $_userArray=array();
        
        public function __construct($db) {
            $this->_db = $db;
        }
        
        // liste des fruits
        public function getUserAuthentification_m($pseudo,$password) {
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
?>