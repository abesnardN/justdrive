$('#btnAddTrajet').on('click',function(){

  //recupere le formulaire d'ajout de trajets


    $.ajax({
       url : 'new',
       type : 'GET',
       dataType : 'html',
       success : function(code_html, statut){
          $('#formulaireAdd').removeClass('d-none');
          $('#formulaireAdd').html(code_html);
          $('#btnAddTrajet').addClass('d-none');
      },

       error : function(resultat, statut, erreur){

       },

       complete : function(resultat, statut){

       }

    });


})
