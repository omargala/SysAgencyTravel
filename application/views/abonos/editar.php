<div id="page-wrapper">
 <div class="row">
  <div class="col-md-12">
    <div class="col-lg-12">
      <h2 class="page-header"><span class="text-white">Editar Abono</span></h2>
    </div>
    <div class="row">
     <div class="col-md-12">
      <div id="alertSection"></div>
       <div class="panel panel-primary">                       
        <div class="panel-heading">
            <strong>Información de Abono</strong><a href="<?=base_url(); ?>abonos" class="btn btn-success btn-right-in-panel"" type="button"><i class="fa fa-list" aria-hidden="true"></i> Lista Abonos</a>
        </div>             
        <div class="panel-body">
         <div class="row">
          <div class="col-md-12"> 
           <div id="alertLocalizador"></div>                                             
            <form action="<?php echo base_url(); ?>/abonos/editar" id="form_abono" class="form-horizontal" method="post" contentType="application/x-www-form-urlencoded">
            <?php foreach ($abono->result() as $data): ?>
              <div class="form-group">
                  <label for="idabono" class="col-sm-2 control-label">Referencia de Abono:</label>
                  <div class="col-sm-10">
                      <input id="idabono" name="idabono" type="text" class="form-control" disabled value="<?php echo $data->idabono; ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="idedocta" class="col-sm-2 control-label">Referencia de Estado de Cuenta:</label>
                  <div class="col-sm-10">
                      <input id="idedocta" name="idedocta" type="text" class="form-control" disabled value="<?php echo $data->idedocta; ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="recibidopor" class="col-sm-2 control-label">Recibió:</label>
                  <div class="col-sm-10">
                      <input id="recibidopor" name="recibidopor" type="text" class="form-control" value="<?php echo $data->recibidopor; ?>"><span id="1"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="abonadopor" class="col-sm-2 control-label">Pagó:</label>
                  <div class="col-sm-10">
                      <input id="abonadopor" name="abonadopor" type="text" class="form-control" value="<?php echo $data->abonadopor; ?>"><span id="2"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="montoabono" class="col-sm-2 control-label">Abono:</label>
                  <div class="col-sm-10">
                      <input id="montoabono" name="montoabono" type="text" class="form-control" value="<?php echo $data->montoabono; ?>"><span id="3"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label for="fechaabono" class="col-sm-2 control-label">Fecha:</label>
                  <div class="col-sm-10">
                      <input id="fechaabono" name="fechaabono" type="text" class="form-control" disabled value="<?php echo $data->fechaabono; ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="modopagoabono" class="col-sm-2 control-label">Modo de Pago:</label>
                  <div class="col-sm-10">
                      <select name="modopagoabono" id="modopagoabono"  class="form-control">
                              <option value="mp" class="form-control" >Modo de pago:</option>
                              <option value="ef" class="form-control" <?php if($data->modopagoabono=="ef"){ echo "selected";} ?>>Efectivo</option>
                              <option value="tc" class="form-control" <?php if($data->modopagoabono=="tc"){ echo "selected";} ?>>T. Crédito</option>
                              <option value="td" class="form-control" <?php if($data->modopagoabono=="td"){ echo "selected";} ?>>T. Débito</option>
                              <option value="tb" class="form-control" <?php if($data->modopagoabono=="tb"){ echo "selected";} ?>>Trans. Bancaria</option>
                          </select><span id="4"></span>
                      </div>
              </div>                            
               <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label class="text-danger">
                      <input type="checkbox" id="cancelado" name="cancelado" value="1" <?php if($data->cancelado==1){ echo "checked";} ?>> Cancelado
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group" align="right">
               <button id="submitForm" class="btn btn-primary">Guardar Cambios</button>
               <a href="#" type="reset" class="btn btn-danger">Cancelar</a>
              </div>
             <?php endforeach ?>
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
<script src="<?php echo base_url(); ?>js/abonos/funciones.js"></script>