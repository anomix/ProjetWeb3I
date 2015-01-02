$(document).ready(function(){
   $("#inscription_form").fadeIn(5000);
   $("#inscription").focus();
   //alert("bonjour");
   $('input#submit_inscription').on('click',function (event){
       nom_user = $("#nom_user").val();
       prenom_user = $("#prenom_user").val();
       phone = $("#phone").val();
       nom_rue = $("#nom_rue").val();
       numero_rue = $("#numero_rue").val();
       ville = $("#ville").val();
       pays = $("#pays").val();
       pseudo = $("#pseudo").val();
       password = $("#password").val();
       //alert(nom_user);
       if(($.trim(nom_user)!= '') && $.trim(prenom_user != '')){// && $.trim(phone) !='' && $.trim(nom_rue) !='' && $.trim(numero_rue) !='' && $.trim(ville) !='' && $.trim(pays) !='' && $.trim(pseudo) != '' && $.trim(password) != '') {
           var data_form = $('form#form_inscription').serialize();
           //alert(data_form);
           $.ajax({
               type: 'POST',
               data: data_form,
               //dataType: "json",
               url: './admin/lib/php/ajax/AjaxInscription.php',
               success: function (data_du_php) {
                   if(data_du_php.retour == 1) {
                       $('#inscription_form').remove();
                       //alert(data_du_php.retour);
                       window.location.href = "./index.php?page=accueil_nm";
                       
                   }
                   else {
                       $('#message').html("Données incorrectes !!!");
                   }
               },
               error: function (){
                   alert('Rate');
               }
           });
       }
       else {
           $('#message').html("Remplissez les champs");
       }
       return false;
   });
});
