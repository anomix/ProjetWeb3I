$(document).ready(function() {
    //alert("bonjour");
    //$("#produit_form").fadeIn(3000);
    //$("#produit").focus();
    
    $('input#submit_produit').on('click', function (event) {
        iduser = $("#idutilisateur").val();
        prix = $("#prixproduit").val();
        quantite = $("#quantite").val();
        idproduit = $("#idproduit").val();
        //alert(prix);
        if(quantite !=0){
            //var data_form="idutilisateur="+iduser+"&prixproduit="+prix+"&idproduit="+idproduit+"&quantite="+quantite;
            //alert(data_form);
            $.ajax({
                type: 'POST',
                //data: data_form,
                data: "iduser="+iduser+"&prix="+prix+"&idproduit="+idproduit+"&quantite="+quantite,
                url: './admin/lib/php/ajax/AjaxProduit.php',
                success: function(data_du_php) {
                    if(data_du_php.retour==1){
                        //alert("coucou");
                        window.location.href="./index.php";
                        
                    }
                    else {
                        alert("quelque chose");
                    }
                },
                error: function(data_du_php) {
                    alert(data_du_php.retour);
                    alert(data_du_php);
                    alert("rate");
                    //window.location.href="./index.php";
                } 
            });
        }
        return false;
    });
});

