                 
<div class="card mb-3">
  <div class="card-header text-white bg-info">
    <i class="fa fa-bar-chart"></i>
    Editar Localizador <a href="<?=base_url(); ?>Localizadores" class="btn btn-success btn-right-in-panel" role="button"><i class="fa fa-list" aria-hidden="true"></i> Regresar</a>
  </div>
  <div class="card-body">
   <div class="row">
    <div class="col-md-12"> 
     <div id="alertLocalizador"></div>
     <?php foreach ($localizador as $valor): ?>  
     <form id="form_localizador" action="<?=base_url(); ?>localizadores/editar" method="POST" contentType="application/x-www-form-urlencoded">
      <input id="id" name="id" type="text" class="hidden" value="<?php echo $valor->idlocalizador; ?>">     
      <div class="form-group row">
       <label for="cvelocalizador" class="col-sm-3 col-form-label">Localizador:</label>
       <div class="col-sm-9">
        <input type="number" id="cvelocalizador" name="cvelocalizador" class="form-control" placeholder="Ej. 4434542053" required value="<?php echo $valor->cvelocalizador; ?>" disabled ><span id="1"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="ttoo" class="col-sm-3 col-form-label">TTOO:</label>
       <div class="col-sm-9">
        <input id="ttoo" name="ttoo" class="form-control" placeholder="Ej. Otro" value="<?php echo $valor->ttoo; ?>"><span id="2"></span>          
       </div>
      </div>
      <div class="form-group row">
       <label for="otro" class="col-sm-3 col-form-label">Otro(especifique):</label>
       <div class="col-sm-9">
        <input id="otro" name="otro" class="form-control" placeholder="Ej. Describe lo relacionado con otro" value="<?php echo $valor->otroespecificacion; ?>"><span id="3"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Servicio:</label>
       <div class="col-sm-9">
        <input id="servicio" name="servicio" class="form-control" placeholder="Ej. Grand Bahía Príncipe" required value="<?php echo $valor->servicio; ?>"><span id="4"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Tipo de tarifa:</label>
       <div class="col-sm-9">
        <input id="tipotarifa" name="tipotarifa" class="form-control" placeholder="Ej. NORMAL" required value="<?php echo $valor->tipotarifa; ?>"><span id="5"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Num. de habitaciones:</label>
       <div class="col-sm-9">
        <input id="numhabs" name="numhabs" type="number" min="1" max="5" class="form-control" placeholder="Ej. 1 (máximo 5 habitaiones)" required value="<?php echo $valor->numhabs; ?>"><span id="6"></span> 
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Titular:</label>
       <div class="col-sm-9">
         <input id="titular" name="titular" class="form-control" placeholder="Ej. Jhon Smith" required value="<?php echo $valor->titular; ?>"><span id="7"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Tarifa pública:</label>
       <div class="col-sm-9">       
        <input id="tarifa" name="tarifa" class="form-control" type="text" placeholder="Ej. $5,400.00" required value="<?php echo $valor->tarifapublica; ?>"><span id="8"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Fecha In:</label>
       <div class="col-sm-9">
        <input type="date" name="fechain" id="fechain" type="text" class="form-control" required value="<?php echo $valor->fechain; ?>"><span id="9"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Fecha Out:</label>
       <div class="col-sm-9">
        <input type="date" name="fechaout" id="fechaout" type="text" class="form-control" required value="<?php echo $valor->fechaout; ?>"><span id="10"></span>  
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Adultos:</label>
       <div class="col-sm-9">
        <input type="number" min="1" id="adultos" name="adultos" class="form-control" placeholder="Ej. 2" required value="<?php echo $valor->adultos; ?>"><span id="12"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Menores:</label>
       <div class="col-sm-9">
        <input type="number" min="0" id="menores" name="menores" class="form-control" placeholder="Ej. 1" value="<?php echo $valor->menores; ?>"><span id="13"></span>  
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Plan Alimentos</label>
       <div class="col-sm-9">
        <input id="planalimentos" name="planalimentos" class="form-control" placeholder="Ej. Todo incluido" required value="<?php echo $valor->planalimentos; ?>"><span id="11"></span>
       </div>
      </div>
      <div id="contenedorCancelado" class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
         <div class="checkbox">
          <label class="text-danger">
           <input type="checkbox" id="canceladoLocalizador" name="canceladoLocalizador" <?php if($valor->cancelado=="1"){ echo "checked";} ?> value="1"> Cancelado
          </label>
         </div>
        </div>
       </div>             
   </div>
   </div>
  </div>
  <div class="card-footer small text-muted">
     <div class="form-group ">
      <button id="submitForm" class="btn btn-primary btn-right-in-panel">Guardar Cambios</button>
      <a href="<?=base_url(); ?>Localizadores" id="cancelarFormulario" class="btn btn-danger btn-right-in-panel">Cancelar</a>
     </div>       
  </div>
  <?php endforeach ?>
  </form>
 </div>  
<script src="<?php echo base_url(); ?>js/localizadores/funciones.js"></script>