
<style>
    .panel-contenedor-interno{
      border-radius: 4px; 
      border: 1px solid #ddd; 
      padding: 15px;
    }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">        
            <h1 class="page-header">Estado de Cuenta</h1>            
                <div class="panel panel-default">
                    <div class="panel-contenedor-interno">
                        <form action="" class="form-inline">
                            <div class="form-group">
                                <label for="localizador">Buscar:</label>
                                <input id="localizador" class="form-control" placeholder="Clave o Nombre">
                            </div>
                        </form>
                    </div>
                </div>            
                <div>
                    <div class="panel-contenedor-interno">
                        <div id="alertaPagado" class="alert alert-success hide">
                            Cuenta liquidada
                        </div>  
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item">Clave: <span id="clave"></span></li>
                                    <li class="list-group-item">Titular: <span id="nombre"></span></li>
                                </ul>
                                <textarea name="descripcion-detalle" id="descripcion-detalle" cols="30" rows="5" class="form-control" ></textarea>
                            </div> 
                            <div class="col-md-6">
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
                    </div>
                </div>                                                     
        </div>
        <div id="datosparaabonos" class="col-md-12 hide">
            <h2 class="page-header">Abonos de Cliente</h2><a role="button" data-toggle="collapse" href="#addabono" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus-square-o fa-1x" aria-hidden="true"></i><span style="font-size: 18px;"> Abonar</span></a>
            <div class="panel panel-default">
                <div id="addabono" class="panel-contenedor-interno collapse">
                    <form action="" class="form-inline">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input id="montoabono" class="form-control" type="text" placeholder="Abono: $5,400.00" style="text-align: right;" required><span class="input-group-addon">.00</span>
                        </div>                                                     
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
                        <div class="form-group"><a id="guardaAbono" href="#"><i class="fa fa-floppy-o fa-2x" aria-hidden="true"></i></a></div>
                    </form>
                    <span id="1"></span>
                    <span id="2"></span>
                    <span id="3"></span>
                    <span id="4"></span>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="tablaabonos" class="table table-striped">
                        <thead>
                            <tr>
                               <th>#</th>
                               <th>Abono</th>
                               <th>Fecha Abono</th>
                               <th>Modo Pago</th>
                               <th>Pagado</th>
                               <th>Pagó</th>
                               <th>Recibió</th>
                            </tr>                  
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            
        </div>        
    </div>                    
</div>         
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
        $("#mododepagoabono").val("");
        $("#abonadopor").val("");
        $("#recibidopor").val("");
        
    }
    function buscar(id){
        alert(id);
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
                    console.log(registro);
                    var indicadorPagado = false;

                    if(registro.statuspago==1){
                        indicadorPagado = true;
                    }else{
                        indicadorPagado = false;
                    }
                    alert(registro.statuspago);
                    $('#localizador').val(registro.cvelocalizador);
                    $('#clave').html(registro.cvelocalizador);
                    $('#nombre').html(registro.titular);
                    $('#tarifa').val(registro.tarifapublica);
                    $('#estadodecuenta').val(registro.idedocta);
                    $('#saldo').val(registro.saldo);
                    $('#pagado').val(registro.acumulado);
                    $('#datosparaabonos').removeClass('hide');
                    var cadena="";
                    cadena="Tipo de Tarifa: " + registro.tipotarifa  + "     ";
                    cadena=cadena + "Servicio: " + registro.servicio + "\n";
                    cadena=cadena + "# de Habs.: " + registro.numhabs  + "     ";
                    cadena=cadena + "Adultos: " + registro.adultos  + "     ";
                    cadena=cadena + "Menores: " + registro.menores + "\n";
                    cadena=cadena + "Fecha In: " + registro.fechain  + "     ";
                    cadena=cadena + "Fecha Out:" + registro.fechaout  + "\n";
                    cadena=cadena + "Alimentos: " + registro.planalimentos  + "     ";
                    cadena=cadena + "Ttoo: " + registro.ttoo + "\n";
                    cadena=cadena + "Otro: " + registro.otroespecificacion + "\n";
                    console.log(cadena);
                    $('#descripcion-detalle').val(cadena);
                    $('#celabono').focus();
                    getTotalPagado(registro.idedocta);                    
                    getAbonosLocalizador(registro.idedocta);
                    if(indicadorPagado==true){$('#alertaPagado').removeClass('hide');}
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
        base_url = "http://localhost:8005/SysAgencyTravel/";
        var url = base_url+"Localizador/consultas";
        var cadena ="";
        var idedocta = idedocta;
        var datos = {
            'idedocta' : idedocta,
            'option' : 1
        }  
        $.ajax({
            url: url,
                type: "POST",
                dataType: "JSON",
                data: datos,
                contentType: "application/x-www-form-urlencoded",
                success: function(data) {
                    console.log("Total = " + data.totalpagado);
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
        alert(a +" - " + b);
        var saldo = b - a;
        $('#pagado').val(totalpagado);
        $('#saldo').val(saldo);
        updateSaldo(saldo);
    }
    function updateTotalPagado(acumulado){
        var base_url = "http://localhost:8005/SysAgencyTravel/";
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
        var base_url = "http://localhost:8005/SysAgencyTravel/";
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
            },
             error: function(errorThrown) {
                console.log(errorThrown);
            }
        });
    };
    function getAbonosLocalizador(idedocta){
        console.log("getAbonosLocalizador"+idedocta);
        var registro={};
        var base_url = "http://localhost:8005/SysAgencyTravel/";
        var url = base_url+"Localizador/getAbonos"; // the script where you handle the form input.     
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
                        console.log("Data es Null"+data);
                        var contador=0;
                         for (var i = data.length - 1; i >= 0; i--) { 
                           console.log(data[i]);                     
                            contador+=1;
                            var modopago = getModoPago(data[i].modopagoabono);
                            var status = getStatus(data[i].statusabono);
                            cadena=cadena + '<tr class="itemabono"><td>'+contador+'</td>';
                            cadena=cadena + '<td>'+data[i].montoabono+'</td>';
                            cadena=cadena + '<td>'+data[i].fechaabono+'</td>';
                            cadena=cadena + '<td>'+modopago+'</td>';
                            cadena=cadena + '<td>'+status+'</td>';
                            cadena=cadena + '<td>'+data[i].abonadopor+'</td>';
                            cadena=cadena + '<td>'+data[i].recibidopor+'</td></tr>';
                        }
                        $('#tablaabonos tr:last').after(cadena);
                    }else{                       
                              
                    }         
                    console.log(data);
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
            console.log(datos);
            base_url = "http://localhost:8005/SysAgencyTravel/";
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
                    getAbonosLocalizador($("#estadodecuenta").val());
                    getTotalPagado($("#estadodecuenta").val());
                    limpiaformularioabono();
                },
                error: function(error){
                    console.log(error);
                }
            });
        }else{
            return false;
        };
    })
    $(document).ready(function(){       
        
    });
</script> 