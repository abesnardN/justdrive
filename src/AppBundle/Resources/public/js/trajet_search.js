function inscrire(idTrajet, placesRestant){
  if (placesRestant < 1) {
    alert('plus de place.');
    return false;
  }
  $.ajax({
     url : 'inscrire',
     type : 'POST',
     data: {
        'idTrajet': idTrajet
      },
     dataType : 'html',
     success : function(code_html, statut){
        document.location.reload(true);
    }
  });
}

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
