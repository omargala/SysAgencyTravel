                 
<div class="card mb-3 ">
  <div class="card-header text-white bg-info">
    <i class="fa fa-bar-chart"></i>
    Editar Abono <a href="<?=base_url(); ?>estadosdecuenta/detalleEstadodeCuenta/<?php echo $idedocta; ?>" class="btn btn-success btn-right-in-panel" role="button"><i class="fa fa-list" aria-hidden="true"></i> Regresar</a>
  </div>
  <div class="card-body">
   <div class="row">
    <div class="col-md-12"> 
     <div id="alertLocalizador"></div>
     <?php foreach ($abono->result() as $data): ?> 
     <form action="<?php echo base_url(); ?>/abonos/editar" id="form_abono" class="form-horizontal" method="post" contentType="application/x-www-form-urlencoded"> 
      <div class="form-group row">
       <label for="cvelocalizador" class="col-sm-3 col-form-label">Referencia de Abono:</label>
       <div class="col-sm-9">
        <input id="idabono" name="idabono" type="text" class="form-control" disabled value="<?php echo $data->idabono; ?>">
       </div>
      </div>
      <div class="form-group row">
       <label for="ttoo" class="col-sm-3 col-form-label">Referencia de Estado de Cuenta:</label>
       <div class="col-sm-9">
        <input id="idedocta" name="idedocta" type="text" class="form-control" disabled value="<?php echo $data->idedocta; ?>">          
       </div>
      </div>
      <div class="form-group row">
       <label for="otro" class="col-sm-3 col-form-label">Recibió:</label>
       <div class="col-sm-9">
         <input id="recibidopor" name="recibidopor" type="text" class="form-control" value="<?php echo $data->recibidopor; ?>"><span id="1"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Pagó::</label>
       <div class="col-sm-9">
        <input id="abonadopor" name="abonadopor" type="text" class="form-control" value="<?php echo $data->abonadopor; ?>"><span id="2"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Abono:</label>
       <div class="col-sm-9">
         <input id="montoabono" name="montoabono" type="text" class="form-control" value="<?php echo $data->montoabono; ?>"><span id="3"></span>
       </div>
      </div>
      <div class="form-group row">
       <label for="" class="col-sm-3 col-form-label">Fecha:</label>
       <div class="col-sm-9">
        <input id="fechaabono" name="fechaabono" type="text" class="form-control" disabled value="<?php echo $data->fechaabono; ?>">
       </div>
      </div>
     <div class="form-group row">
        <label for="" class="col-sm-3 col-form-label">Modo de Pago:</label>
        <div class="col-sm-9">
          <select name="modopagoabono" id="modopagoabono"  class="form-control">
              <option value="mp" class="form-control" >Modo de pago:</option>
              <option value="ef" class="form-control" <?php if($data->modopagoabono=="ef"){ echo "selected";} ?>>Efectivo</option>
              <option value="tc" class="form-control" <?php if($data->modopagoabono=="tc"){ echo "selected";} ?>>T. Crédito</option>
              <option value="td" class="form-control" <?php if($data->modopagoabono=="td"){ echo "selected";} ?>>T. Débito</option>
              <option value="tb" class="form-control" <?php if($data->modopagoabono=="tb"){ echo "selected";} ?>>Trans. Bancaria</option>
          </select><span id="4"></span>
        </div>
      </div>  
      <div class="form-group row">
       <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label class="text-danger">
              <input type="checkbox" id="cancelado" name="cancelado" value="1" <?php if($data->cancelado==1){ echo "checked";} ?>> Cancelado
            </label>
          </div>
        </div>
      </div>            
   </div>
   </div>
  </div>
  <div class="card-footer small text-muted">
     <div class="form-group ">
      <button id="submitForm" class="btn btn-primary">Guardar Cambios</button>
      <a href="<?php echo base_url(); ?>abonos/editar/<?php echo $data->idabono; ?>/<?php echo $idedocta; ?>" class="btn btn-danger" role="button">Cancelar</a>
     </div>       
  </div>
  <?php endforeach ?>
  </form>
 </div>  
<script src="<?php echo base_url(); ?>js/abonos/funciones.js"></script>

