$("#guardaAbono").click(function(){
	if(validacampos()){
		var idlocalizador = $("#guardaAbono").attr("data-set");
		var base_url = $("#datosparaabonos").attr("data-set");
        var datos={
        'abono' : $("#montoabono").val(),
        'modopago' : $("#mododepagoabono").val(),
        'abonadopor' : $("#abonadopor").val(),
        'recibidopor' : $("#recibidopor").val(),
        'idedocta' : $("#estadodecuenta").val()
        }       
        var url = base_url+"abonos/nuevo";  
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(data) {
                console.log(data);
                $(location).attr("href",base_url+"estadosdecuenta/detalleEstadodeCuenta/"+idlocalizador);                     
            },
            error: function(error){
                console.log("error de a huevo"+error);
            }
        });
    }else{
        return false;
    };
})

function validacampos(){
    if($('#montoabono').val()==""){
        $( "#1" ).text( "Campo monto de abono es obligatorio" ).show().fadeOut( 1000 );
        $('#montoabono').focus();
        return false;
    }
    if($('#mododepagoabono').val()=="mp"){
         $( "#2" ).text( "Seleccione una opción por favor" ).show().fadeOut( 1000 );
        $('#mododepagoabono').focus();
        return false;
    }
    if($('#abonadopor').val()==""){
         $( "#3" ).text( "Campo abonado por es obligatorio" ).show().fadeOut( 1000 );
        $('#abonadopor').focus();
        return false;
    }
    if($('#recibidopor').val()==""){
        $( "#4" ).text( "Campo recibido por es obligatorio" ).show().fadeOut( 1000 );
        $('#recibidopor').focus();
        return false;
    }
    return true;
};