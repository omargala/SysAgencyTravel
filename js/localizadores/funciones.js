function validacampos(){
 if($('#cvelocalizador').val()==""){
     $( "#1" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#cvelocalizador').focus();
     return;
 }
 if($('#servicio').val()==""){
      $( "#4" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#servicio').focus();
     return;
 }
 if($('#tipotarifa').val()==""){
      $( "#5" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#tipotarifa').focus();
     return;
 }
 if($('#numhabs').val()==""){
     $( "#6" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#numhabs').focus();
     return;
 }
 if($('#titular').val()==""){
     $( "#7" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#titular').focus();
     return;
 }
 
 if($('#fechain').val()==""){
     $( "#8" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#fechain').focus();
     return;
 }
 if($('#fechaout').val()==""){
      $( "#9" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#fechaout').focus();
     return;
 }
 if($('#planalimentos').val()==""){
     $( "#10" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#planalimentos').focus();
     return;
 }
 if($('#adultos').val()==""){
     $( "#11" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#adultos').focus();
     return;
 }
 if($('#cvelocalizador').val()<0){
     $( "#1" ).text( "El valor no puede ser menor que cero" ).show().fadeOut( 1000 );
     $('#cvelocalizador').focus();
     return;
 }
 if($('#adultos').val()<0){
     $( "#11" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#cvelocalizador').focus();
     return;
 }
 if($('#menores').val()<0){
     $( "#12" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#cvelocalizador').focus();
     return;
 }
  if($('#numhabs').val()<1){
     $( "#6" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
     $('#cvelocalizador').focus();
     return;
 }
 return true;
}

function limpiaformulario(){
 $('#cvelocalizador').val("");
 $('#ttoo').val("");
 $('#otro').val("");
 $('#servicio').val("");
 $('#tipotarifa').val("");
 $('#numhabs').val("");
 $('#titular').val("");
 $('#tarifa').val("");
 $('#fechain').val("");
 $('#fechaout').val("");
 $('#planalimentos').val("");
 $('#adultos').val("");
 $('#menores').val("");
}

$("#submitForm" ).click(function(e) {
   if(validacampos()){
    if($("#cvelocalizador:disabled")){
        $("#cvelocalizador").removeAttr("disabled");
        $( "#form_localizador").submit();
    }else{
        $( "#form_localizador").submit();
    }    
   }   
});

function alertStatus(status){
    if(status=="A"){
        var cadenaAlert = '<div id="alertResult" class="alert alert-info" role="alert">Activo</div>';
        $("#alertLocalizador").append(cadenaAlert);
    }
    if(status=="C"){
        var cadenaAlert = '<div id="alertResult" class="alert alert-danger" role="alert">Cancelado</div>';
        $("#alertLocalizador").append(cadenaAlert);
    }
    if(status=="P"){
        var cadenaAlert = '<div id="alertResult" class="alert alert-success" role="alert">Pagado</div>';
        $("#alertLocalizador").append(cadenaAlert);
    }
}
function cancelarLocalizador(id){
    var data_url = "<?=base_url(); ?>";
    var url = data_url + "Localizador/cancelarLocalizador";
    var datos = {
        'id' : id
    }
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(data){
            console.log(data);
            limpiaformulario();
            $('#lista_localizadores').load('<?=base_url();?>Localizador/listaLocalizadores');
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }
    })
}

$("#cancelarFormulario").click(function(){
    $("#alertResult").remove();
    $("#contenedorCancelado").addClass("hidden");
    $("#cvelocalizador").attr("disabled",false);
})
   