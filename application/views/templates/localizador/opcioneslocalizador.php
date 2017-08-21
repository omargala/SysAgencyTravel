<div id="contenedorgeneral" class="container">
   <div id="opciones" style="margin-top: 20px;">
   <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a id="alta" aria-controls="profile" role="tab" data-toggle="tab">Localizadores</a></li>
    <li role="presentation"><a id="edocuenta" aria-controls="profile" role="tab" data-toggle="tab">Estados de Cuenta</a></li>
   </ul>
  </div> 
<div id="main_localizadores"></div>
<script>
  $(document).ready(function(){
    $('#main_localizadores').load('<?=base_url();?>Localizador/altaLocalizador');
    $("#alta").click(function(event) {               
      $('#main_localizadores').load('<?=base_url();?>Localizador/altaLocalizador');
    });              
    $("#edocuenta").click(function(event) {               
      $('#main_localizadores').load('<?=base_url();?>Localizador/edoCuenta');
    });
  });
</script>


 