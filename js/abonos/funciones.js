$("#submitForm" ).click(function(e) {
   if(validacampos()){
      $("#idabono").removeAttr('disabled');
      $("#idedocta").removeAttr('disabled');
      $("#fechaabono").removeAttr('disabled');
      $("#form_abono").submit();
    }  
});
function validacampos(){
 if($('#recibidopor').val()==""){
     $( "#1" ).text( "Campo obligatorio" ).show().fadeOut( 3000 );
     $('#recibidopor').focus();
     return false;
 }
 if($('#abonadopor').val()==""){
      $( "#2" ).text( "Campo obligatorio" ).show().fadeOut( 3000 );
     $('#abonadopor').focus();
     return false;
 }
 if($('#montoabono').val()==""){
      $( "#3" ).text( "Campo obligatorio" ).show().fadeOut( 3000 );
     $('#montoabono').focus();
     return false;
 }
  if($('#modopagoabono').val()=="mp"){
      $( "#4" ).text( "Seleccione un método de pago válido" ).show().fadeOut( 3000 );
     $('#modopagoabono').focus();
     return false;
  }
 return true;
}