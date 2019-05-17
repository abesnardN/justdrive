function affiche(id){
  $('#divoccupant-'+id).removeClass('d-none');

}
function masque(id){
  $('#divoccupant-'+id).addClass('d-none');

}
// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "ready!" );
});
