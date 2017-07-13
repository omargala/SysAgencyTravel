<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">                                                
            <form name="registroFormulario" role="form">
                <div class="row"> 
                    <div class="form-group col-md-4">                                        
                            <input type="number" id="localizador" class="form-control" placeholder="Clave de Localizador" required>
                    </div>  
                    <div class="form-group col-md-8">
                            <input id="titular" class="form-control" placeholder="Titular" required>
                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#datosdetalle" aria-expanded="false" aria-controls="collapseExample">
                  Ver Detalle
                </a>
                <div class="collapse" id="datosdetalle">
                    <div class="well">
                        <div class="row">
                            <div class="form-group col-md-3">                                     
                                <input id="ttoo" class="form-control" placeholder="TTOO:" disabled>       
                            </div>
                             <div class="form-group col-md-3">
                               <input id="otro" class="form-control" placeholder="Otro(especifique)"  disabled>
                            </div>                                                         
                            <div class="form-group col-md-3">
                                    <input id="servicio" class="form-control" placeholder="Servicio" required  disabled>                             
                            </div>
                            <div class="form-group col-md-3">
                                    <input id="tipotarifa" class="form-control" placeholder="Tipo de tarifa" required  disabled>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <input id="numhabs" type="number" min="1" max="5" class="form-control" placeholder="No. Habs" required  disabled>
                            </div>                   
                            <div class="form-group col-md-3">
                                <input id="planalimentos" class="form-control" placeholder="Plan de alimentos" required disabled>
                            </div>
                            <div class="form-group col-md-3">          
                                <input type="number" min="1" id="adultos" class="form-control" placeholder="Adultos" required  disabled>                    
                            </div>
                            <div class="form-group col-md-3">
                                <input type="number" min="0" id="menores" class="form-control" placeholder="Menores"  disabled>         
                            </div>  
                        </div>
                        <div class="row">
                             <div class="form-group col-md-3">
                                <label for="">Fecha In</label>                                                    
                                <input type="date" id="fechain" type="text" class="form-control" required  disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Fecha</label>    
                                <input type="date" id="fechaout" type="text" class="form-control" required  disabled>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group" align="right">
                                <button id="submitForm" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>                                   
                <div class="form-group" align="right">  
                    <div class="col-sm-4 input-group">
                        <span class="input-group-addon">$</span>
                        <input id="tarifa" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" required><span id="8"></span><span class="input-group-addon">.00</span>
                    </div>
                </div>                  
            </form>                               
        </div>
        <div class="col-md-12">
            <table>
                <thead>
                   <tr>
                       <th></th>
                   </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>        
    </div>                    
</div>         
<script>   
    function validacampos(){
        if($('#localizador').val()==""){
            $( "#1" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#servicio').val()==""){
             $( "#4" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#tipotarifa').val()==""){
             $( "#5" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#numhabs').val()==""){
            $( "#6" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#titular').val()==""){
            $( "#7" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#fechain').val()==""){
            $( "#8" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#fechaout').val()==""){
             $( "#9" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#planalimentos').val()==""){
            $( "#10" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#adultos').val()==""){
            $( "#11" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#menores').val()==""){
            $( "#12" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#localizador').val()<0){
            $( "#1" ).text( "El valor no puede ser menor que cero" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#adultos').val()<0){
            $( "#11" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        if($('#menores').val()<0){
            $( "#12" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
         if($('#numhabs').val()<1){
            $( "#6" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }
        return true;
    }
    function limpiaformulario(){
        $('#localizador').val("");
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
    $("#submitForm" ).click(function() {
        console.log("Submit");
        var registro={};
        base_url = "http://localhost:8005/Sys_Agency_Travel/";
        var url = base_url+"Localizador/registroDatos"; // the script where you handle the form input.     
        if(validacampos()){
            var datos = {
            "localizador": $('#localizador').val(),
            "ttoo": $('#ttoo').val(),
            "otro": $('#otro').val(),
            "servicio": $('#servicio').val(),
            "tipotarifa": $('#tipotarifa').val(),
            "numhabs": $('#numhabs').val(),
            "titular": $('#titular').val(),
            "tarifa": $('#tarifa').val(),
            "fechain": $('#fechain').val(),
            "fechaout": $('#fechaout').val(),
            "planalimentos": $('#planalimentos').val(),
            "adultos": $('#adultos').val(),
            "menores": $('#menores').val()
            }; 
            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: datos,
                contentType: "application/x-www-form-urlencoded",
                success: function(data) {
                    for (var i = data.length - 1; i >= 0; i--) {
                        registro = data[0];                                             
                        if (registro.cvelocalizador == $('#localizador').val()) {    
                            /*setTimeout(function() {
                                $("#alerta1").fadeIn(1500);
                            },3000);*/
                            $("#alerta1").show();
                            $("#alerta1").delay(8000).hide(600);
                            $('#localizador').focus();
                        }                       
                    }   
                    if(data.mensaje == "OK"){ 
                        /*                         
                            setTimeout(function() {
                                $("#alerta2").fadeIn(1500);
                            },3000);  */   
                             $("#alerta2").show();
                             $("#alerta2").delay(8000).hide(600);
                             limpiaformulario();
                             $('#localizador').focus();           
                    }               
                    console.log(data);
                },
                error: function(errorThrown) {
                    console.log(errorThrown);
                }   
            }); 
        }       
    });
    $(document).ready(function(){
        $("#alerta1").hide();
        $("#alerta2").hide();
    });
</script> 

<!-- 
$(“#divActualizarContrato_Success”).hide();

En el momento que lo queramos mostrar:

$(“#divActualizarContrato_Success”).show();
$(“#divActualizarContrato_Success”).delay(8000).hide(600);
-->