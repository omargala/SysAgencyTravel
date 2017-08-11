<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-12">
                <h2 class="page-header">Localizadores</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div id="alerta1" class="alert alert-warning">Ya existe un localizador con esta clave</div> 
                    <div id="alerta2" class="alert alert-success">Los datos se guardaron exitosamente</div>
                    <div class="panel panel-primary">                        
                        <div class="panel-heading">
                            <strong>Información de localizador</strong>
                        </div>             
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div id="alertLocalizador"></div>                                             
                                    <form name="registroFormulario" role="form">                     
                                            <div class="form-group">
                                                <label for="localizador" class="col-sm-4 control-label" align="right">Localizador:</label>
                                                <div class="col-sm-8 input-group">
                                                    <input type="number" id="localizador" class="form-control" placeholder="Ej. 4434542053" required><span id="1"></span>
                                                </div>                                      
                                            </div>
                                            <div class="form-group">
                                                <label for="ttoo" class="col-sm-4 control-label" align="right">TTOO:</label>
                                                <div class="col-sm-8 input-group">
                                                    <input id="ttoo" class="form-control" placeholder="Ej. Otro" ><span id="2"></span>
                                                </div>                                    
                                            </div>
                                            <div class="form-group">
                                                <label for="otro" class="col-sm-4 control-label" align="right">Otro(especifique):</label>
                                                <div class="col-sm-8 input-group">
                                                    <input id="otro" class="form-control" placeholder="Ej. Describe lo relacionado con otro" ><span id="3"></span>
                                                </div>   

                                            </div>
                                            <div class="form-group">
                                                <label for="servicio" class="col-sm-4 control-label" align="right">Servicio:</label>
                                                <div class="col-sm-8 input-group">
                                                    <input id="servicio" class="form-control" placeholder="Ej. Grand Bahía Príncipe" required><span id="4"></span>
                                                </div>                                
                                            </div>
                                            <div class="form-group">
                                                <label for="tipotarifa" class="col-sm-4 control-label" align="right">Tipo de tarifa:</label>
                                                <div class="col-sm-8 input-group">
                                                    <input id="tipotarifa" class="form-control" placeholder="Ej. NORMAL" required><span id="5"></span>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                                <label for="numhabs" class="col-sm-4 control-label" align="right">No. Habs:</label>
                                                <div class="col-sm-8 input-group">
                                                    <input id="numhabs" type="number" min="1" max="5" class="form-control" placeholder="Ej. 1 (máximo 5 habitaiones)" required><span id="6"></span>                    
                                                </div>                                 
                                            </div>
                                            <div class="form-group">
                                                <label for="titular" class="col-sm-4 control-label" align="right">Titular:</label>
                                                <div class="col-sm-8 input-group">
                                                    <input id="titular" class="form-control" placeholder="Ej. Jhon Smith" required><span id="7"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tarifa" class="col-sm-4 control-label" align="right">Tarifa pública:</label>   
                                                <div class="col-sm-8 input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input id="tarifa" class="form-control" type="text" placeholder="Ej. $5,400.00" required><span id="8"></span><span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                            <div class="form-group">                   
                                                    <label for="fechain" class="col-sm-4 control-label" align="right">Fecha In:</label>
                                                    <div class="col-sm-8 input-group">       
                                                        <input type="date" id="fechain" type="text" class="form-control" required><span id="9"></span>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="fechaout" class="col-sm-4 control-label" align="right">Fecha Out:</label>
                                                    <div class="col-sm-8 input-group">      
                                                        <input type="date" id="fechaout" type="text" class="form-control" required><span id="10"></span>     
                                                    </div>    
                                            </div>               
                                            <div class="form-group">
                                                <label for="planalimentos" class="col-sm-4 control-label" align="right">Plan de alimentos:</label>
                                                <div class="col-sm-8 input-group">
                                                    <input id="planalimentos" class="form-control" placeholder="Ej. Todo incluido" required><span id="11"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="adultos" class="col-sm-4 control-label" align="right">Adultos</label>   
                                                <div class="col-sm-8 input-group">          
                                                    <input type="number" min="1" id="adultos" class="form-control" placeholder="Ej. 2" required><span id="12"></span>
                                                </div>                            
                                           </div>
                                           <div class="form-group">
                                                <label for="menores" class="col-sm-4 control-label" align="right">Menores</label>
                                                <div class="col-sm-8 input-group">  
                                                    <input type="number" min="0" id="menores" class="form-control" placeholder="Ej. 1"><span id="13"></span>           
                                                </div>
                                            </div>
                                            <div class="form-group" align="right">
                                                <button id="submitForm" class="btn btn-primary">Guardar</button>
                                                <button id="guardarCambios" class="btn btn-primary hidden" data-set="">Guardar Cambios</button>
                                                <button type="reset" class="btn btn-danger">Cancelar</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="lista_localizadores" class="col-lg-6"></div>
            </div>
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
        /*if($('#menores').val()==""){
            $( "#12" ).text( "Campo obligatorio" ).show().fadeOut( 1000 );
            $('#localizador').focus();
            return;
        }*/
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
    $("#submitForm" ).click(function(e) {
        e.preventDefault();
        console.log("Submit, " + $('#localizador').val());
        var registro={};
        var base_url = "<?=base_url(); ?>";
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
                            $("#alerta1").show();
                            $("#alerta1").delay(8000).hide(600);
                            $('#localizador').focus();
                        }                       
                    }   
                    if(data.mensaje == "OK"){
                            $("#alerta2").show();
                            $("#alerta2").delay(8000).hide(600);
                            limpiaformulario();
                            $('#localizador').focus();
                            $('#lista_localizadores').load('<?=base_url();?>Localizador/listaLocalizadores');
                    }               
                    console.log(data);
                },
                error: function(errorThrown) {
                    console.log(errorThrown);
                }   
            }); 
        }      
    });
    function editarLocalizador(id){
        alert(id);
        var data_url = "<?=base_url(); ?>";
        var url = data_url + "Localizador/buscar";
        var datos = {
            "tipo" : 1,
            "id" : id
        };
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(data) {             
                console.log(data);
                for (var i = data.length - 1; i >= 0; i--) {
                    alertStatus(data[i].status);
                    $("#localizador").val(data[i].cvelocalizador);
                    $("#ttoo").val(data[i].ttoo);
                    $("#otro").val(data[i].otroespecificacion);
                    $("#servicio").val(data[i].servicio);
                    $("#tipotarifa").val(data[i].tipotarifa);
                    $("#numhabs").val(data[i].numhabs);
                    $("#titular").val(data[i].titular);
                    $("#tarifa").val(data[i].tarifapublica);
                    $("#fechain").val(data[i].fechain);
                    $("#fechaout").val(data[i].fechaout);
                    $("#planalimentos").val(data[i].planalimentos);
                    $("#adultos").val(data[i].adultos);
                    $("#menores").val(data[i].menores);
                    $("#guardarCambios").attr("data-set",data[i].idlocalizador);
                }
                $("#submitForm").addClass("hidden");
                $("#guardarCambios").removeClass("hidden");

            },
            error: function(errorThrown) {
                console.log(errorThrown);
            } 
        });
    }
    function alertStatus(status){
        if(status=="A"){
            var cadenaAlert = '<p class="bg-primary">Activo</p>';
            $("#alertLocalizador").append(cadenaAlert);
        }
        if(status=="C"){
            var cadenaAlert = '<p class="bg-danger">Cancelado</p>';
            $("#alertLocalizador").append(cadenaAlert);
        }
        if(status=="P"){
            var cadenaAlert = '<p class="bg-success">Pagado</p>';
            $("#alertLocalizador").append(cadenaAlert);
        }
    }
    function cancelarLocalizador(id){
        alert(id);
    }
    function openEstadoCuenta(id){
        $('#main_localizadores').load('<?=base_url();?>Localizador/edoCuenta/'+id);
    }
    $("#guardarCambios").click(function(){
        var id = $("#guardarCambios").attr("data-set");
        //alert(id);
        var data_url = "<?=base_url(); ?>";
        var url = data_url + "Localizador/updateLocalizador";
        var datos = {
            id : id,
            cvelocalizador :$("#localizador").val(),
            ttoo :$("#ttoo").val(),
            otroespecificacion : $("#otro").val(),
            servicio: $("#servicio").val(),
            tipotarifa : $("#tipotarifa").val(),
            numhabs : $("#numhabs").val(),
            titular : $("#titular").val(),
            tarifapublica : $("#tarifa").val(),
            fechain : $("#fechain").val(),
            fechaout : $("#fechaout").val(),
            planalimentos : $("#planalimentos").val(),
            adultos : $("#adultos").val(),
            menores : $("#menores").val()
        };
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: datos,
            contentType: "application/x-www-form-urlencoded",
            success: function(data) {    
                for (var i = data.length - 1; i >= 0; i--) {
                   
                }
                $("#submitForm").removeClass("hidden");
                $("#guardarCambios").addClass("hidden");
                $("guardarCambios").attr("data-set","");
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            } 
        });
    })
    $(document).ready(function(){
        $("#alerta1").hide();
        $("#alerta2").hide();
        $('#lista_localizadores').load('<?=base_url();?>Localizador/listaLocalizadores');
    });
</script> 