                 
<div class="card mb-3">
  <div class="card-header text-white bg-info">
    <i class="fa fa-bar-chart"></i>
    Nuevo Localizador
  </div>
  <div class="card-body">
   <div class="row">
    <div class="col-md-12"> 
     <div id="alertLocalizador"></div>
     <form id="form_localizador" action="<?=base_url(); ?>localizadores/nuevo" method="POST" contentType="application/x-www-form-urlencoded">
      <div class="form-group row">
       <label for="cvelocalizador" class="col-sm-3 col-form-label">Localizador:</label>
       <div class="col-sm-9">
        <input type="number" id="cvelocalizador" name="cvelocalizador" class="form-control" placeholder="Ej. 4434542053" required><span id="1"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="ttoo" class="col-sm-3 col-form-label">TTOO:</label>
       <div class="col-sm-9">
        <input id="ttoo" name="ttoo" class="form-control" placeholder="Ej. Otro"><span id="2"></span>              
       </div>
      </div>
      <div class="form-group row">
       <label for="otro" class="col-sm-3 col-form-label">Otro(especifique):</label>
       <div class="col-sm-9">
        <input id="otro" name="otro" class="form-control" placeholder="Ej. Describe lo relacionado con otro"><span id="3"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Servicio:</label>
       <div class="col-sm-9">
        <input id="servicio" name="servicio" class="form-control" placeholder="Ej. Grand Bahía Príncipe" required><span id="4"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Tipo de tarifa:</label>
       <div class="col-sm-9">
        <input id="tipotarifa" name="tipotarifa" class="form-control" placeholder="Ej. NORMAL" required><span id="5"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Num. de habitaciones:</label>
       <div class="col-sm-9">
        <input id="numhabs" name="numhabs" type="number" min="1" max="5" class="form-control" placeholder="Ej. 1 (máximo 5 habitaiones)" required><span id="6"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Titular:</label>
       <div class="col-sm-9">
        <input id="titular" name="titular" class="form-control" placeholder="Ej. Jhon Smith" required><span id="7"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Tarifa pública:</label>
       <div class="col-sm-9">
       <div class="input-group"> 
        <span class="input-group-addon">$</span>      
        <input id="tarifa" name="tarifa" class="form-control" type="number" placeholder="Ej. $5,400.00" required >
        <span class="input-group-addon">.00</span>
       </div>
        <span id="8"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Fecha In:</label>
       <div class="col-sm-9">
        <input type="date" name="fechain" id="fechain" type="text" class="form-control" required ><span id="9"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Fecha Out:</label>
       <div class="col-sm-9">
        <input type="date" name="fechaout" id="fechaout" type="text" class="form-control" required><span id="10"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Adultos:</label>
       <div class="col-sm-9">
        <input type="number" min="1" id="adultos" name="adultos" class="form-control" placeholder="Ej. 2" required><span id="12"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Menores:</label>
       <div class="col-sm-9">
        <input type="number" min="0" id="menores" name="menores" class="form-control" placeholder="Ej. 1"><span id="13"></span>  
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Plan Alimentos</label>
       <div class="col-sm-9">
        <input id="planalimentos" name="planalimentos" class="form-control" placeholder="Ej. Todo incluido" required><span id="11"></span>
       </div>
      </div>          
   </div>
   </div>
  </div>
  <div class="card-footer small text-muted">
     <div class="form-group ">
      <button id="submitForm" class="btn btn-primary btn-right-in-panel">Guardar</button>
      <button id="cancelarFormulario" type="reset" class="btn btn-danger btn-right-in-panel">Cancelar</button>
     </div>       
  </div>
  </form>
 </div>  
<script src="<?php echo base_url(); ?>js/localizadores/funciones.js"></script>