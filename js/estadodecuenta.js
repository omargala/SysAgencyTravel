var base_url = "http://localhost/SysAgencyTravel/";
function borrarFilasActuales(){
    $(".itemabono").remove();
};
function buscar(id){        
    datos={
        'id': id,
        'tipo':'1'
    }
    //base_url = "http://localhost/SysAgencyTravel/";
    var url = base_url+"Localizador/Buscar";        
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(data) {
            for (var i = data.length - 1; i >= 0; i--) {
                console.log(data[i]); 
                var descripcionStatus = "";
                if(data[i].status=="C")
                    {
                        descripcionStatus="<strong class='text-danger'>Cancelado</strong>";
                        $("#datosdellocalizador").removeClass("panel-primary");
                        $("#datosdellocalizador").addClass("panel-danger");
                        $("#balance").removeClass("panel-primary");
                        $("#balance").addClass("panel-danger");                           
                    };
                if(data[i].status=="A")
                    {
                        descripcionStatus="<strong class='text-primary'>Activo</strong>";                            
                    };
                if(data[i].status=="P")
                    {
                        descripcionStatus="<strong class='text-success'>Pagado</strong>";
                        $("#datosdellocalizador").removeClass("panel-primary");
                        $("#datosdellocalizador").addClass("panel-success");
                        $("#balance").removeClass("panel-primary");
                        $("#balance").addClass("panel-success");
                    };
                var cadena="";                    
                cadena='<a href="#" class="list-group-item"><strong>Estatus de Localizador: </strong>' + data[i].status  + " - " + descripcionStatus + '</a>';
                $("#alertSection").append(cadena);
                $('#localizador').val(data[i].cvelocalizador);
                $('#clave').html(data[i].cvelocalizador);
                $('#nombre').html(data[i].titular);
                $('#tarifa').val(data[i].tarifapublica);
                $('#estadodecuenta').val(data[i].idedocta);
                $('#saldo').val(data[i].saldo);
                $('#pagado').val(data[i].acumulado);
                $('#datosparaabonos').removeClass('hide');                    
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Estatus de Localizador: </strong>' + data[i].tipotarifa  + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Servicio: </strong>' + data[i].servicio + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong># de Habs.: </strong>' + data[i].numhabs  + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Adultos: </strong>' + data[i].adultos  + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Menores: </strong>' + data[i].menores + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Fecha In: </strong>' + data[i].fechain  + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Fecha Out:</strong>' + data[i].fechaout  + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Alimentos: </strong>' + data[i].planalimentos + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Ttoo: </strong>' + data[i].ttoo + '</a>';
                cadena=cadena + '<a href="#" class="list-group-item"><strong>Otro: </strong>' + data[i].otroespecificacion + '</a>';
                $('#descripcion-detalle').html(cadena);
                getTotalPagado(data[i].idedocta);                    
                getAbonosPagados(data[i].idedocta);
                getAbonosCancelados(data[i].idedocta);
                getAbonosTodos(data[i].idedocta);
                $("#localizador").val("");
            }
        },
        error: function(error){
            console.log(error);
        }
    }); 
};
function calculaSaldo(totalpagado){
    var a = totalpagado;
    var b = $('#tarifa').val();
    var saldo = b - a;    
    $('#pagado').val(totalpagado);
    $('#saldo').val(saldo);
    if(saldo==0){
        $("#alertaPagado").removeClass("hide");            
        $("#abonar").addClass("hide");
        $('#guardaAbono').attr('disabled','disabled');
    }else{
        $("#alertaPagado").addClass("hide");
        $('#guardaAbono').removeAttr('disabled');
        $("#abonar").removeClass("hide");
    }
    updateSaldo(saldo);
};
function cancelarAbono(idabono){
    var url = base_url+"Localizador/cancelaAbono"; 
    datos = {
        'id' : idabono
    }
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(data) {     
            for (var i = data.length - 1; i >= 0; i--) {
                console.log(data[i].mensaje);
            }
            borrarFilasActuales();
            getAbonosPagados($("#estadodecuenta").val());
            getAbonosCancelados($("#estadodecuenta").val());
            getAbonosTodos($("#estadodecuenta").val());
            getTotalPagado($("#estadodecuenta").val());  

        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }   
    }); 
}
function checkedStatusModal(status){
    if(status=="C"){
        $("#statusModal").prop("checked", "checked");
    };
    if(status=="P"){
        $("#statusModal").prop("checked", "");
    };
};
function getAbonosCancelados(idedocta){
    var registro={};
    //var base_url = "http://localhost/SysAgencyTravel/";
    var url = base_url + "Localizador/getAbonosCancelados";
    var cadena ="";
    var datos = {
        'idedocta' : idedocta
    }        
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(data) {
            if(data){
                var contador=0;
                 for (var i = data.length - 1; i >= 0; i--) {                  
                    contador+=1;
                    var botonEditar = '<a class="btn" onclick="openEditarAbono('+data[i].idabono+')"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>';                           
                    var modopago = getModoPago(data[i].modopagoabono);
                    cadena=cadena + '<tr class="itemabono"><td class="active">'+contador+'</td>';                          
                    cadena=cadena + '<td>'+data[i].fechaabono+'</td>';
                    cadena=cadena + '<td>'+data[i].montoabono+'</td>';
                    cadena=cadena + '<td class="optionsbuttons">'; 
                    cadena=cadena + botonEditar;                       
                    cadena=cadena + '</td></tr>';
                }
                $('#tablaabonoscancelados tr:last').after(cadena);                        
            }else{                       
                      
            }      
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }   
    }); 
};
function getAbonosPagados(idedocta){
    var registro={};
    //var base_url = "http://localhost/SysAgencyTravel/";
    var url = base_url + "Localizador/getAbonosPagados";
    var cadena ="";
    var datos = {
        'idedocta' : idedocta
    }        
    $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(data) {
                if(data){
                    var contador=0;
                     for (var i = data.length - 1; i >= 0; i--) {                  
                        contador+=1;
                        var botonEditar = '<a class="btn" onclick="openEditarAbono('+data[i].idabono+')"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>';
                        var botonCancelar = '<a class="btn" onclick="cancelarAbono('+data[i].idabono+')"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>';
                        var modopago = getModoPago(data[i].modopagoabono);
                        cadena=cadena + '<tr class="itemabono"><td class="active">'+contador+'</td>';                            
                        cadena=cadena + '<td>'+data[i].fechaabono+'</td>';
                        cadena=cadena + '<td>'+data[i].montoabono+'</td>';
                        cadena=cadena + '<td class="optionsbuttons">'; 
                        cadena=cadena + botonEditar + botonCancelar;                       
                        cadena=cadena + '</td></tr>';
                    }
                    $('#tablaabonospagados tr:last').after(cadena);                        
                }else{                       
                          
                }         

            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }   
        }); 
};
function getAbonosTodos(idedocta){
 var registro={};
 var url = base_url + "Localizador/getAbonosTodos";
 var cadena ="";
 var datos = {
     'idedocta' : idedocta
 }        
 $.ajax({
   url: url,
   type: "POST",
   dataType: "JSON",
   data: datos,
   contentType: "application/x-www-form-urlencoded",
   success: function(data) {
    if(data){
     var contador=0;
     var botonCancelar = "";
      for (var i = data.length - 1; i >= 0; i--) {                  
         contador+=1;
         var botonEditar = '<a class="btn" onclick="openEditarAbono('+data[i].idabono+')"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>';
         
         if(data[i].statusabono=="C"){
             botonCancelar = '<a class="btn" disabled><strong class="text-danger">C</strong></a>';
         }else{
             botonCancelar = '<a class="btn" onclick="cancelarAbono('+data[i].idabono+')"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>';
         }                            
         var modopago = getModoPago(data[i].modopagoabono);
         cadena=cadena + '<tr class="itemabono"><td class="active">'+contador+'</td>';                            
         cadena=cadena + '<td>'+data[i].fechaabono+'</td>';
         cadena=cadena + '<td>'+data[i].montoabono+'</td>';
         cadena=cadena + '<td class="optionsbuttons">'; 
         cadena=cadena + botonEditar + botonCancelar;                       
         cadena=cadena + '</td></tr>';
     }
     $('#tablaabonostodos tr:last').after(cadena);                        
    }         
   },
   error: function(errorThrown) {
    console.log(errorThrown);
  }   
 });  
};
function getClave(cadena){
    var inicio = cadena.split(" ",1);
    return inicio;
}
function getIdLocalizador(cve){
    var registro={};
    //var base_url = "http://localhost/SysAgencyTravel/";
    var url = base_url+"Localizador/getIdLocalizadorbyCve";     
    var cadena ="";
    var datos = {
        'cvelocalizador' : $.trim(cve)
    }        
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(data) {     
            console.log(data);
            if (data) {
                buscar(data[0].idlocalizador);                   
            }else{
                $("#localizador").val(""); 
                $("#localizador").focus();
                alert("No existe registros de Localizadores");    
            }                    
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }   
    }); 
};
function getModoPago(idmp){
    if(idmp=="ef"){
        return "Efectivo";
    }
    if(idmp=="tc"){
        return "T. de Crédito";
    }
    if(idmp=="tb"){
        return "Transferencia";
    }
    if(idmp=="td"){
        return "T. de Débito";
    }
};
function getTotalPagado(idedocta){
    var url = base_url+"Localizador/consultas";
    var cadena ="";
    var idedocta = idedocta;
    var datos = {
        'id' : idedocta,
        'option' : 1
    }
    $.ajax({
        url: url,
            type: "POST",
            dataType: "JSON",
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(data) {
                console.log("AQUÍ GET TOTAL PAGADO Y RECIBO DATA=> ");
                console.log(data.totalpagado);
                
                updateTotalPagado(data.totalpagado);
                calculaSaldo(data.totalpagado);
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }   
    })
};
function limpiarEditarDialog(){
    $('#referenciaAbonoModal').val("");
    $("#modoPagoModal option[value='mp']").attr("selected",true);
    $('#montoAbonoModal').val("");
    $("#fechaAbonoModal").val("");
    $("#recibioModal").val("");
    $("#pagoModal").val("");
};
function limpiaformularioabono(){
    $("#montoabono").val("");
    $("#mododepagoabono option[value=mp]").attr("selected",true);
    $("#abonadopor").val("");
    $("#recibidopor").val("");   
};
function modoPagoNoSeleccionado(){
    if($('#modoPagoModal').val()=="mp"){
        return true;
    }else{
        return false;
    }
};
function openEditarAbono(idabono){
    //var base_url = "http://localhost/SysAgencyTravel/";
    var url = base_url+"Localizador/consultas";
    var cadena ="";
    var datos = {
        'id' : idabono,
        'option' : 2
    }
    $.ajax({
    url: url,
        type: "POST",
        dataType: "JSON",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(data) {
            console.log(data)
            for (var i = data.length - 1; i >= 0; i--) {
                $('#montoAbonoModal').val(data[i].montoabono);
                $('#pagoModal').val(data[i].abonadopor);
                $('#recibioModal').val(data[i].recibidopor);
                $('#fechaAbonoModal').val(data[i].fechaabono);
                //$('#').val(data[i].idabono);
                //$('#').val(data[i].idedocuenta);
                $('#referenciaAbonoModal').val(data[i].idabono+"-"+data[i].idedocuenta);
                selectedModoPagoModal(data[i].modopagoabono);
                $('#montoAbonoModal').val(data[i].montoabono);
                $('#recibioModal').val(data[i].recibidopor);
                checkedStatusModal(data[i].statusabono);
            }
            $('#editarDialog').modal('show'); 
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }   
    })   
};
function selectedModoPagoModal(modo){
    $("#modoPagoModal option[value="+ modo +"]").attr("selected",true);
}
function siCheckedStatusModal(){
    if($("#statusModal").prop('checked')){
        return "C";
    }else{
        return "P";
    }
}
function updateSaldo(saldo){
    //var base_url = "http://localhost/SysAgencyTravel/";
    var url = base_url+"Localizador/updateSaldo"; 
    var datos = {
        'idedocta'  : $('#estadodecuenta').val(),
        'saldo' : saldo
    }
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(data){
            for (var i = data.length - 1; i >= 0; i--) {
                consol.log(data[i].mesaje);
            }
        },
         error: function(errorThrown) {
            console.log(errorThrown);
        }
    });
};
function updateTotalPagado(acumulado){
    //var base_url = "http://localhost/SysAgencyTravel/";
    var url = base_url+"Localizador/updateAcumulado"; 
    var datos = {
        'idedocta'  : $('#estadodecuenta').val(),
        'acumulado' : acumulado
    }
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        data: datos,
        contentType: "application/x-www-form-urlencoded",
        success: function(data){

        },
         error: function(errorThrown) {
            console.log(errorThrown);
        }
    });
};
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
$("#guardaAbono").click(function(){
    if(validacampos()){
        var datos={
        'abono' : $("#montoabono").val(),
        'modopago' : $("#mododepagoabono").val(),
        'abonadopor' : $("#abonadopor").val(),
        'recibidopor' : $("#recibidopor").val(),
        'estadodecuenta' : $("#estadodecuenta").val()
        }
        //var base_url =  "http://localhost/SysAgencyTravel/";
        var url = base_url+"Localizador/registraAbono";  
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(data) {
                console.log(data);
                borrarFilasActuales();
                limpiaformularioabono();
                getAbonosTodos($("#estadodecuenta").val());
                getAbonosCancelados($("#estadodecuenta").val());
                getAbonosPagados($("#estadodecuenta").val());
                getTotalPagado($("#estadodecuenta").val());                   
            },
            error: function(error){
                console.log(error);
            }
        });
    }else{
        return false;
    };
})   
$("#search").click(function(){        
    var clave = getClave($("#localizador").val());
    if(clave==""){
        $("#localizador").focus();
        alert("Ingrese al menos un criterio de búsqueda...");
        return;
    }
    borrarFilasActuales()
    getIdLocalizador(clave);        
})   
$("#modoPagoModal").change(function(){
    if($('#modoPagoModal').val()=="mp"){
        alert("Seleccione un método de pago");
        $('#modoPagoModal').focus();
    }
})
$('#guardarCambiosAbono').click(function(){
 if(modoPagoNoSeleccionado()){
    alert("Seleccione un método de pago");
    $('#modoPagoModal').focus();
    return;
}else{
  var id = $('#referenciaAbonoModal').val();
  var idabono = String(id.split("-",1));
  var idedocuenta = $('#estadodecuenta').val();
  var modopagoabono = $('#modoPagoModal').val();
  var montopagado = $('#montoAbonoModal').val();
  var status = siCheckedStatusModal();
  var fechaabono = $("#fechaAbonoModal").val();
  var quienrecibio = $("#recibioModal").val();
  var quienpago = $("#pagoModal").val();
  var datos = {
      'idabono' : idabono,
      'idedocuenta' : idedocuenta,
      'abonadopor' : quienpago,
      'recibidopor' : quienrecibio,
      'montoabono' : montopagado,
      'fechaabono' : fechaabono,
      'modopagoabono' : modopagoabono,
      'statusabono' : status 
  }
  var url = base_url+"Localizador/actualizaAbono";
  $.ajax({
   url: url,
   type: "POST",
   dataType: "JSON",
   data: datos,
   contentType: "application/x-www-form-urlencoded",
   success: function(data) { 
       for (var i = data.length - 1; i >= 0; i--) {
           console.log(data[i].mensaje);
       }

       limpiarEditarDialog();    
       $('#editarDialog').modal('hide'); 
       borrarFilasActuales();
       getAbonosPagados($('#estadodecuenta').val());
       getAbonosCancelados($('#estadodecuenta').val());
       getAbonosTodos($('#estadodecuenta').val());
       getTotalPagado($('#estadodecuenta').val());
   },
   error: function(errorThrown) {
       console.log(errorThrown);
   }   
  });
 }
})
