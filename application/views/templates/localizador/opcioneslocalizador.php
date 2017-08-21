<div id="contenedorgeneral" class="container">
  <div id="opciones" style="margin-top: 50px;">
   <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a id="alta" aria-controls="profile" role="tab" data-toggle="tab">Localizadores</a></li>
    <li role="presentation"><a id="edocuenta" aria-controls="profile" role="tab" data-toggle="tab">Estados de Cuenta</a></li>
   </ul>
  </div> 
<div id="main_localizadores" class="panel panel-default" style="border-radius: 0px;background-color: #f1f1f1;"></div>
<script>
	$(document).ready(function(){
		$('#main_localizadores').load('<?=base_url();?>Localizador/altaLocalizador');
		$("#alta").click(function(event) {               
      $('#main_localizadores').load('<?=base_url();?>Localizador/altaLocalizador');
    });              
    $("#edocuenta").click(function(event) {               
      $('#main_localizadores').load('<?=base_url();?>Localizador/edoCuenta');
    });
    if ($(window).width() < 1199){
      $('#contenedorgeneral').removeClass('container');
    }
    if ($(window).width() < 770){
      $('.form-group input').removeClass('col-sm-8');
      $('.form-group input').addClass('col-sm-12');
    }
	});
</script>