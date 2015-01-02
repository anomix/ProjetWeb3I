<?php
    class produit_mManager extends produit_m {
        private $db;
        private $_produitArray = array();
        
        public function __construct($db) {
            $this->_db=$db;
        }
        
        function addProduit($iduser) {
            try{
                $query="select add_facture(:iduser) as retour";
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':iduser',$iduser);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (Exception $ex) {

            }
            return $retour;
        }
         
         function addDetailFacture($idfacture,$prix,$quantite,$idproduit) {
             try{
                 $query="select add_detail_facture(:idfacture,:prix,:quantite,:idproduit) as retour";
                 $sql=$this->_db->prepare($query);
                 $sql->bindValue(':idfacture',$idfacture);
                 $sql->bindValue(':prix',$prix);
                 $sql->bindValue(':quantite',$quantite);
                 $sql->bindValue(':idproduit',$idproduit);
                 $sql->execute();
                 $retour=$sql->fetchColumn(0);
             } catch (Exception $ex) {

             }
             return $retour;
         }
    }
?>

