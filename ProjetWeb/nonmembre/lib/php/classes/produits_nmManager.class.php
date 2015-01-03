<?php
    class produits_nmManager extends Produits_nm {
        private $_db;
        private $_produitsArray=array();
        
        public function __construct($db) {
            $this->_db = $db;
        }
        
        // liste des fruits
        public function getListeProduit_nm($id_cat) {
            $query="select * from produit where id_categorie = :id_cat";
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue(1,$id_cat,PDO::PARAM_INT);
            $resultset->execute();

            $nbr=$resultset->rowCount();
            while($data = $resultset->fetch()) {
                $_produitsArray[] = new Produits_nm($data);
            }
            return $_produitsArray;
        }
        
        public function getProduit_m($idproduit) {
            $query="select * from produit where id_produit = :id_produit";
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue(1,$idproduit,PDO::PARAM_INT);
            $resultset->execute();
            $nbr=$resultset->rowCount();
            while($data=$resultset->fetch()) {
                $_produitsArray[] = new Produits_nm($data);
            }
            return $_produitsArray;
        }
        
        public function getDetailFacture($idfacture) {
            $query="select detail_facture.quantite,detail_facture.prix_unitaire,produit.nom_produit,produit.id_produit, detail_facture.id_facture from detail_facture,produit where detail_facture.id_facture=:idfacture and detail_facture.id_produit=produit.id_produit";
            $resultset = $this->_db->prepare($query);
            $resultset->bindvalue(1,$idfacture,PDO::PARAM_INT);
            $resultset->execute();
            $nbr=$resultset->rowCount();
            while($data=$resultset->fetch()) {
                $_produitsArray[] = new Produits_nm($data);
            }
            return $_produitsArray;
            
        }
        
        public function UpdateDetailFacture($idproduit,$quantite){
            try{
                $query="select updateDetail(:idproduit,:quantite) as retour";
                $prod=$idproduit;
                $quant=$quantite;
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':idproduit',$prod);
                $sql->bindValue(':quantite',$quant);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
            return $retour;
        }
        
        public function DeleteDetailFacture($idproduit,$idfacture){
            try{
                $query="select deleteDetail(:idproduit,:idfacture) as retour";
                $prod=$idproduit;
                $fact=$idfacture;
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':idproduit',$prod);
                $sql->bindValue(':idfacture',$fact);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (Exception $ex) {
                print $e->getMessage();
            }
            return $retour;
        }
        
        public function DeleteFacture($idfacture){
            try{
                $query="select deleteFacture(:idfacture) as retour";
                $fact=$idfacture;
                $sql=$this->_db->prepare($query);
                $sql->bindValue(':idfacture',$fact);
                $sql->execute();
                $retour=$sql->fetchColumn(0);
            } catch (Exception $ex) {
                print $e->getMessage();
            }
            return $retour;
        }
        public function getFacture($iduser){
            $query="select * from facture where id_user=:iduser";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':iduser',$iduser);
            $resultset->execute();
            $nbr=$resultset->rowCount();
            while($data=$resultset->fetch()) {
                $_produitsArray[] = new Produits_nm($data);
            }
            return $_produitsArray;
        }
    }
