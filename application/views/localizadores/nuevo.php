<div id="page-wrapper">
 <div class="row">
  <div class="col-md-12">
    <div class="col-lg-12">
      <h2 class="page-header"><span class="text-white">Nuevo Localizador</span></h2>
    </div>
    <div class="row">     
     <div class="col-md-12">
      <div id="alertSection"></div>
       <div class="panel panel-primary">                       
        <div class="panel-heading">
            <strong>Información de localizador</strong><a href="<?=base_url(); ?>Localizadores" class="btn btn-success btn-right-in-panel"" type="button"><i class="fa fa-list" aria-hidden="true"></i> Lista Localizadores</a>
        </div>             
        <div class="panel-body">
         <div class="row">
          <div class="col-md-12"> 
           <div id="alertLocalizador"></div>                                             
           <form id="form_localizador" action="<?=base_url(); ?>localizadores/nuevo" method="POST" contentType="application/x-www-form-urlencoded">                     
            <div class="form-group">
             <label for="cvelocalizador" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Localizador:</label>
             <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
              <input type="number" id="cvelocalizador" name="cvelocalizador" class="form-control" placeholder="Ej. 4434542053" required><span id="1"></span>
             </div>                                      
            </div>
            <div class="form-group">
             <label for="ttoo" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">TTOO:</label>
             <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
              <input id="ttoo" name="ttoo" class="form-control" placeholder="Ej. Otro"><span id="2"></span>
             </div>                                    
            </div>
            <div class="form-group">
             <label for="otro" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Otro(especifique):</label>
             <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
              <input id="otro" name="otro" class="form-control" placeholder="Ej. Describe lo relacionado con otro"><span id="3"></span>
             </div>
            </div>
            <div class="form-group">
             <label for="servicio" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Servicio:</label>
             <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
              <input id="servicio" name="servicio" class="form-control" placeholder="Ej. Grand Bahía Príncipe" required><span id="4"></span>
             </div>                                
            </div>
            <div class="form-group">
             <label for="tipotarifa" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Tipo de tarifa:</label>
             <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
              <input id="tipotarifa" name="tipotarifa" class="form-control" placeholder="Ej. NORMAL" required><span id="5"></span>
             </div>  
            </div>
            <div class="form-group">
             <label for="numhabs" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">No. Habs:</label>
             <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
              <input id="numhabs" name="numhabs" type="number" min="1" max="5" class="form-control" placeholder="Ej. 1 (máximo 5 habitaiones)" required><span id="6"></span>                    
             </div>                                 
            </div>
            <div class="form-group">
             <label for="titular" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Titular:</label>
             <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
              <input id="titular" name="titular" class="form-control" placeholder="Ej. Jhon Smith" required><span id="7"></span>
             </div>
            </div>
            <div class="form-group">
             <label for="tarifa" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Tarifa pública:</label>   
              <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
               <span class="input-group-addon">$</span>
               <input id="tarifa" name="tarifa" class="form-control" type="text" placeholder="Ej. $5,400.00" required ><span id="8"></span><span class="input-group-addon">.00</span>
              </div>
             </div>
             <div class="form-group">                   
              <label for="fechain" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Fecha In:</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">       
               <input type="date" name="fechain" id="fechain" type="text" class="form-control" required ><span id="9"></span>
              </div>
             </div>
             <div class="form-group">
              <label for="fechaout" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Fecha Out:</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">      
               <input type="date" name="fechaout" id="fechaout" type="text" class="form-control" required><span id="10"></span>     
              </div>    
             </div>               
             <div class="form-group">
              <label for="planalimentos" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Plan de alimentos:</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">
               <input id="planalimentos" name="planalimentos" class="form-control" placeholder="Ej. Todo incluido" required><span id="11"></span>
              </div>
             </div>
             <div class="form-group">
              <label for="adultos" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Adultos</label>   
              <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">          
               <input type="number" min="1" id="adultos" name="adultos" class="form-control" placeholder="Ej. 2" required><span id="12"></span>
              </div>                            
             </div>
             <div class="form-group">
              <label for="menores" class="col-12 col-sm-3 col-md-3 col-lg-3 control-label" align="right">Menores</label>
              <div class="col-12 col-sm-9 col-md-9 col-lg-9 input-group">  
               <input type="number" min="0" id="menores" name="menores" class="form-control" placeholder="Ej. 1"><span id="13"></span>           
              </div>
             </div>
             <div id="contenedorCancelado" class="form-group hidden">
              <div class="col-sm-offset-2 col-sm-10">
               <div class="checkbox">
                <label class="text-danger">
                 <input type="checkbox" id="canceladoLocalizador" name="canceladoLocalizador"> Cancelado
                </label>
               </div>
              </div>
             </div>
             <div class="form-group" align="right">
              <button id="submitForm" class="btn btn-primary">Guardar</button>
              <button id="cancelarFormulario" type="reset" class="btn btn-danger">Cancelar</button>
             </div>
            </form>
           </div>
          </div>
         </div>
       </div>
     </div>
    </div>
  </div>        
 </div>                    
</div>  
<script src="<?php echo base_url(); ?>js/localizadores/funciones.js"></script>