<div class="container">
<div id="opciones" style="margin-top: 50px;">
 <ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a id="lista" aria-controls="home" role="tab" data-toggle="tab">Lista Localizadores</a></li>
  <li role="presentation"><a id="alta" aria-controls="profile" role="tab" data-toggle="tab">Nuevo Localizador</a></li>
  <li role="presentation"><a id="pagosyabonos" aria-controls="profile" role="tab" data-toggle="tab">Pagos y Abonos</a></li>
  <li role="presentation"><a id="edocuenta" aria-controls="profile" role="tab" data-toggle="tab">Estados de Cuenta</a></li>
 </ul>
</div>
<div id="main_localizadores" class="panel panel-default" style="border-radius: 0px;background-color: #f1f1f1;"></div>
<script>
	$(document).ready(function(){
		$('#main_localizadores').load('<?=base_url();?>Localizador/listaLocalizadores');
		$("#lista").click(function(event) {               
      $('#main_localizadores').load('<?=base_url();?>Localizador/listaLocalizadores');
    });
		$("#alta").click(function(event) {               
      $('#main_localizadores').load('<?=base_url();?>Localizador/altaLocalizador');
    });
    $("#pagosyabonos").click(function(event) {               
      $('#main_localizadores').load('<?=base_url();?>Localizador/pagosAbonos');
    });
    $("#edocuenta").click(function(event) {               
      $('#main_localizadores').load('<?=base_url();?>Localizador/edoCuenta');
    });

	});
</script>