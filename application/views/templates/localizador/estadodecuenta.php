<!-- Bootstrap Core CSS -->
<link href="<?=base_url();?>vendor/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url();?>vendor/css/sb-admin.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?=base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" href="<?=base_url();?>css/style.css">
<script src="<?=base_url();?>vendor/js/jquery.js"></script>
<link rel="stylesheet" href="<?=base_url(); ?>assets/autocomplete/easy-autocomplete.min.css">
<link rel="stylesheet" href="<?=base_url(); ?>assets/autocomplete/easy-autocomplete.themes.min.css">
<script src="<?=base_url(); ?>assets/autocomplete/jquery.easy-autocomplete.js"></script>
<script src="<?=base_url(); ?>vendor/js/bootstrap.js"></script>
<style>
    .panel-contenedor-interno{
      border-radius: 4px; 
      border: 1px solid #ddd; 
      padding: 15px;
    }
    .my-btn-circle {
        width: 30px;
        height: 30px;
        padding: 6px 0;
        border-radius: 15px;
        text-align: center;
        font-size: 12px;
        line-height: 1.4285;
    }
    .close {
        color: red;
        opacity: .5;
    }
</style> 
<script>  
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
    }
    function limpiaformularioabono(){
        $("#montoabono").val("");
        $("#mododepagoabono option[value=mp]").attr("selected",true);
        $("#abonadopor").val("");
        $("#recibidopor").val("");   
    }
    function buscar(id){        
        datos={
            'id': id,
            'tipo':'1'
        }
        base_url = "http://localhost:8005/SysAgencyTravel/";
        var url = base_url+"Localizador/Buscar";        
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(data) {
                for (var i = data.length - 1; i >= 0; i--) {
                    registro = data[0]; 
                    var indicadorPagado = false;

                  
                    if(registro.statuspago==1){
                        $('#alertaPagado').removeClass('hide');
                    }
                    //alert(registro.statuspago);
                    $('#localizador').val(registro.cvelocalizador);
                    $('#clave').html(registro.cvelocalizador);
                    $('#nombre').html(registro.titular);
                    $('#tarifa').val(registro.tarifapublica);
                    $('#estadodecuenta').val(registro.idedocta);
                    $('#saldo').val(registro.saldo);
                    $('#pagado').val(registro.acumulado);
                    $('#datosparaabonos').removeClass('hide');
                    var cadena="";
                    cadena='<a href="#" class="list-group-item"><strong>Tipo de Tarifa: </strong>' + registro.tipotarifa  + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong>Servicio: </strong>' + registro.servicio + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong># de Habs.: </strong>' + registro.numhabs  + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong>Adultos: </strong>' + registro.adultos  + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong>Menores: </strong>' + registro.menores + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong>Fecha In: </strong>' + registro.fechain  + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong>Fecha Out:</strong>' + registro.fechaout  + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong>Alimentos: </strong>' + registro.planalimentos + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong>Ttoo: </strong>' + registro.ttoo + '</a>';
                    cadena=cadena + '<a href="#" class="list-group-item"><strong>Otro: </strong>' + registro.otroespecificacion + '</a>';

                    $('#descripcion-detalle').html(cadena);
                    $('#celabono').focus();
                    getTotalPagado(registro.idedocta);                    
                    getAbonosLocalizador(registro.idedocta);
                    $("#localizador").val("");
                   
                }
            },
            error: function(error){
                console.log(error);
            }
        }); 
    }
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
    }
    function getStatus(idstatus){
        if(idstatus==0){
            return "No";
        }
        if(idstatus==1){
            return "Si";
        }
    }
    function borrarFilasActuales(){
        $(".itemabono").remove();
    }
    function getTotalPagado(idedocta){
        var base_url = "<?=base_url(); ?>";
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
                    updateTotalPagado(data.totalpagado);
                    calculaSaldo(data.totalpagado);
                },
                error: function(errorThrown) {
                    console.log(errorThrown);
                }   
        })
    }
    function calculaSaldo(totalpagado){
        var a = totalpagado;
        var b = $('#tarifa').val();
        //alert(a +" - " + b);
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
    }
    function updateTotalPagado(acumulado){
        var base_url = "<?=base_url(); ?>";
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
    function updateSaldo(saldo){
        var base_url = "<?=base_url(); ?>";
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
    function getAbonosLocalizador(idedocta){
        var registro={};
        var base_url = "<?=base_url();?>";
        var url = base_url + "Localizador/getAbonos"; // the script where you handle the form input.     
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
                           // var botonEditar = '<a class="btn" onclick="editarAbono('+data[i].idabono+')" ><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>';
                            var botonEditar = '<a class="btn" onclick="openEditarAbono('+data[i].idabono+')"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>';
                            var botonCancelar = '<a class="btn" onclick="cancelarAbono('+data[i].idabono+')"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>';
                            var modopago = getModoPago(data[i].modopagoabono);
                            var status = getStatus(data[i].statusabono);
                            cadena=cadena + '<tr class="itemabono"><td class="active">'+contador+'</td>';                            
                            cadena=cadena + '<td>'+data[i].fechaabono+'</td>';
                            cadena=cadena + '<td>'+modopago+'</td>';
                            cadena=cadena + '<td>'+data[i].montoabono+'</td>';
                            cadena=cadena + '<td class="optionsbuttons">'; 
                            cadena=cadena + botonEditar + botonCancelar;                       
                            cadena=cadena + '</td></tr>';

                        }
                        $('#tablaabonos tr:last').after(cadena);                        
                    }else{                       
                              
                    }         

                },
                error: function(errorThrown) {
                    console.log(errorThrown);
                }   
            }); 
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
            var base_url =  "<?=base_url(); ?>";
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
                    getAbonosLocalizador($("#estadodecuenta").val());
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
    function modoPagoNoSeleccionado(){
        if($('#modoPagoModal').val()=="mp"){
            return true;
        }else{
            return false;
        }
    }
    function openEditarAbono(idabono){
        var base_url = "<?=base_url(); ?>";
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
    }
    function checkedStatusModal(status){
        if(status=="0"){
            $("#statusModal").prop("checked", "checked");
        };
        if(status=="1"){
            $("#statusModal").prop("checked", "");
        };
    }
    function siCheckedStatusModal(){
        if($("#statusModal").prop('checked')){
            return 0;
        }else{
            return 1;
        }
    }
    function selectedModoPagoModal(modo){
        //alert(modo);
        $("#modoPagoModal option[value="+ modo +"]").attr("selected",true);
    }
    function cancelarAbono(idabono){
        //alert("Hice click a cancelar " + idabono);
        var base_url = "<?=base_url(); ?>";
        var url = base_url+"Localizador/cancelaAbono"; 
        datos = {
            'id' = idabono
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
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }   
        }); 

    }
    function getIdLocalizador(cve){
        //alert("cve"+cve);
        var registro={};
        var base_url = "<?=base_url(); ?>";
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

                    buscar(data[0].idlocalizador);
                },
                error: function(errorThrown) {
                    console.log(errorThrown);
                }   
            }); 
    }
    function getClave(cadena){
        var inicio = cadena.split(" ",1);
        return inicio;
    }
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
    function limpiarEditarDialog(){
        $('#referenciaAbonoModal').val("");
        $("#modoPagoModal option[value='mp']").attr("selected",true);
        $('#montoAbonoModal').val("");
        $("#fechaAbonoModal").val("");
        $("#recibioModal").val("");
        $("#pagoModal").val("");
    }
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
            var base_url = "<?=base_url(); ?>";
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
                        getAbonosLocalizador($('#estadodecuenta').val());
                    },
                    error: function(errorThrown) {
                        console.log(errorThrown);
                    }   
            });
        }
    })
    $(document).ready(function(){        
        var base_url = "<?=base_url(); ?>";
        var url = base_url +"Localizador/getLocalizadores";         
        var options = {
            url: function(phrase) {
                return url;
            },
            getValue: function(element) {
                return element.cvelocalizador + " " + element.titular;
            },          
            ajaxSettings: {
                dataType: "json",
                method: "POST",
                data: {
                    dataType: "json"
                }
            },
            preparePostData: function(data) {
                data.phrase = $("#localizador").val();
                return data;
            },
            requestDelay: 400
        };       
        $('#localizador').easyAutocomplete(options);   
    });
</script> 
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">        
            <h1 class="page-header">Estado de Cuenta</h1>            
            <div class="panel panel-default">
                <div class="panel-contenedor-interno">
                    <div class="row">
                        <div class="col-md-12 form-inline">
                            <div class="form-group" style="width: 80%">
                                <input id="localizador" placeholder="Buscar por Clave o Nombre" style="width: 100%">
                            </div>
                            <button cass="form-group" id="search" type="button" class="btn btn-warning my-btn-circle"><strong>
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </strong></button>
                        </div>        
                    </div>
                </div>
            </div>                                                              
        </div>
        <div id="datosparaabonos" class="col-md-12 hide">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Datos del Localizador <a class="btn" type="button" data-toggle="modal" data-target="#infoLocalizador"><i class="fa fa-info-circle" aria-hidden="true" style="color:white;float:right;"></i></a></div>
                            <div class="panel-body">
                               <div id="alertaPagado" class="alert alert-success hide">
                                    Cuenta liquidada
                                </div>  
                                    <ul class="list-group">
                                        <li class="list-group-item ">Clave: <span id="clave"></span></li>
                                        <li class="list-group-item">Titular: <span id="nombre"></span></li>
                                    </ul>
                                    <div class="modal fade" id="infoLocalizador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header list-group-item active">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white;" aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Detalle del Localizador</h4>
                                              </div>
                                              <div class="modal-body">
                                                <div id="descripcion-detalle" class="list-group">
                                                 
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                   
                            </div>
                            <!-- <div class="panel-footer">Panel footer</div>-->
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Estado de Cuenta
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4"  align="right">
                                        <label for="estadodecuenta">Estado de Cuenta:</label>
                                    </div>
                                    <div class="col-md-8 input-group">
                                        <span class="input-group-addon">#</span>
                                        <input id="estadodecuenta" class="form-control" type="text" placeholder="0" style="text-align: left;" disabled> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" align="right">
                                        <label for="tarifa">Tarifa Total:</label>
                                    </div>
                                    <div class="col-md-8 input-group">
                                        <span class="input-group-addon">$</span>
                                        <input id="tarifa" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled><span class="input-group-addon">.00</span>        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" align="right">
                                        <label for="pagado">Total Pagado:</label>
                                    </div>
                                    <div class="col-md-8 input-group">
                                        <span class="input-group-addon">$</span>
                                        <input id="pagado" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled><span class="input-group-addon">.00</span>       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" align="right">
                                        <label for="saldo">Saldo Total:</label>
                                    </div>
                                    <div class="col-md-8 input-group">
                                        <span class="input-group-addon">$</span>
                                        <input id="saldo" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled><span class="input-group-addon">.00</span>       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Abonar a Cuenta
                            </div>
                            <div class="panel-body">
                                <form action="" class="form">                                                                                
                                    <div class="form-group">
                                        <select name="mododepagoabono" id="mododepagoabono"  class="form-control">
                                            <option value="mp" class="form-control">Modo de pago:</option>
                                            <option value="ef" class="form-control">Efectivo</option>
                                            <option value="tc" class="form-control">T. Crédito</option>
                                            <option value="td" class="form-control">T. Débito</option>
                                            <option value="tb" class="form-control">Trans. Bancaria</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="abonadopor" class="form-control" placeholder="Nombre y Aepllido" required>
                                    </div>
                                     <div class="form-group">
                                        <input type="text" id="recibidopor" class="form-control" placeholder="Recibido por:" required>
                                    </div>
                                     <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input id="montoabono" class="form-control" type="text" placeholder="Abono: $5,400.00" style="text-align: right;" required><span class="input-group-addon">.00</span>
                                        </div>   
                                    </div> 
                                    <div class="form-group"><a class="btn btn-primary btn-lg btn-block" id="guardaAbono" href="#" >Guardar</a></div>
                                </form>
                                <span id="1"></span>
                                <span id="2"></span>
                                <span id="3"></span>
                                <span id="4"></span>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Abonos: Detalle
                            </div>
                            <div class="panel-body">
                                <table id="tablaabonos" class="table table-striped">
                                    <thead>
                                        <tr  class="info">
                                           <th>#</th>
                                           <th>Fecha Abono</th>
                                           <th>Modo Pago</th>
                                           <th>Abono</th>
                                           <th>...</th>
                                        </tr>                  
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editarDialog" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header list-group-item">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detalle de Abono</h4>
                  </div>
                  <div class="modal-body">
                    <div id="descripcion-detalle" class="list-group">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="referenciaAbonoModal" class="col-sm-2 control-label">Referencia</label>
                                <div class="col-sm-10">
                                    <input id="referenciaAbonoModal" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recibioModal" class="col-sm-2 control-label">Recibió:</label>
                                <div class="col-sm-10">
                                    <input id="recibioModal" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pagoModal" class="col-sm-2 control-label">Pagó:</label>
                                <div class="col-sm-10">
                                    <input id="pagoModal" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="montoAbonoModal" class="col-sm-2 control-label">Abono:</label>
                                <div class="col-sm-10">
                                    <input id="montoAbonoModal" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fechaAbonoModal" class="col-sm-2 control-label">Fecha:</label>
                                <div class="col-sm-10">
                                    <input id="fechaAbonoModal" type="text" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="modoPagoModal" class="col-sm-2 control-label">Modo de Pago:</label>
                                <div class="col-sm-10">
                                    <select name="modoPagoModal" id="modoPagoModal"  class="form-control">
                                            <option value="mp" class="form-control">Modo de pago:</option>
                                            <option value="ef" class="form-control">Efectivo</option>
                                            <option value="tc" class="form-control">T. Crédito</option>
                                            <option value="td" class="form-control">T. Débito</option>
                                            <option value="tb" class="form-control">Trans. Bancaria</option>
                                        </select>
                                    </div>
                            </div>                            
                             <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="checkbox">
                                    <label class="text-danger">
                                      <input type="checkbox" id="statusModal"> Cancelado
                                    </label>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button id="guardarCambiosAbono" type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
        </div>      
    </div>                    
</div>