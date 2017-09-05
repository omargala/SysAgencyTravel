<div id="page-wrapper">
<?php foreach ($detallelocalizador as $dato): ?>
  <div class="row">
   <div id="datosparaabonos" class="col-md-12" data-set="<?php echo base_url(); ?>">
    <div class="panel-default">
     <div class="panel-body">
       <div class="col-md-6">
        <div id="datosdellocalizador" class="panel panel-primary">
         <div class="panel-heading">Datos del Localizador <a class="btn" type="button" href="<?php echo base_url(); ?>localizadores/ver/<?php echo $dato->idlocalizador; ?>"><i class="fa fa-info-circle" aria-hidden="true" style="color:white;float:right;"></i></a></div>
         <div class="panel-body">
          <div id="alertSection"></div>
           <ul class="list-group">
            <li class="list-group-item ">Clave: <span id="clave"><?=$dato->cvelocalizador; ?></span></li>
            <li class="list-group-item">Titular: <span id="nombre"><?=$dato->titular; ?></span></li>
           </ul>
         </div>
         <!-- <div class="panel-footer">Panel footer</div>-->
        </div>
        <div id="balance" class="panel panel-primary">
         <div class="panel-heading">
             Balance de Estado de Cuenta
         </div>
         <div class="panel-body">          
           <div class="col-2" >
             <label for="estadodecuenta">Estado de Cuenta:</label>
           </div>
           <div class="col-8 input-group">
            <span class="input-group-addon">#</span>
            <input id="estadodecuenta" name="estadodecuenta" class="form-control" type="text" placeholder="0" style="text-align: left;" style="text-align: right;" disabled value="<?php echo $dato->idedocta; ?>"><span class="input-group-addon"></span> 
           </div>
            <div class="col-2">
              <label for="tarifa">Tarifa Total:</label>
            </div>
            <div class="col-8 input-group">
             <span class="input-group-addon">$</span>
             <input id="tarifa" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled value="<?php echo $dato->tarifapublica;; ?>"><span class="input-group-addon">.00</span>        
            </div>
       
         
           <div class="col-2">
            <label for="pagado">Total Pagado:</label>
           </div>
           <div class="col-8 input-group">
            <span class="input-group-addon">$</span>
            <input id="pagado" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled value="<?php echo $dato->acumulado; ?>"><span class="input-group-addon">.00</span>       
           </div>
   
      
           <div class="col-2">
            <label for="saldo">Saldo Total:</label>
           </div>
           <div class="col-8 input-group">
            <span class="input-group-addon">$</span>
            <input id="saldo" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled value="<?php echo $dato->saldo;?>"><span class="input-group-addon">.00</span>       
           </div>
         
         </div>
        </div>
        <div class="panel panel-primary">
         <div class="panel-heading">Abonar a Cuenta</div>
          <div class="panel-body">
           <form role="form" class="form">                               
            <div class="form-group">
              <select name="mododepagoabono" id="mododepagoabono"  class="form-control">
                <option value="mp" class="form-control">Modo de pago:</option>
                <option value="ef" class="form-control">Efectivo</option>
                <option value="tc" class="form-control">T. Crédito</option>
                <option value="td" class="form-control">T. Débito</option>
                <option value="tb" class="form-control">Trans. Bancaria</option>
              </select>
            </div>
             <div class="form-group">
               <input type="text" id="abonadopor" name="abonadopor" class="form-control" placeholder="Nombre y Aepllido" required>
             </div>
             <div class="form-group">
                <input type="text" id="recibidopor" name="recibidopor" class="form-control" placeholder="Recibido por:" required>
             </div>
             <div class="form-group">
              <div class="input-group">
               <span class="input-group-addon">$</span>
               <input id="montoabono" name="montoabono" class="form-control" type="text" placeholder="Abono: $5,400.00" style="text-align: right;" required><span class="input-group-addon">.00</span>
              </div>   
            </div> 
            <div class="form-group"><a class="btn btn-primary btn-lg btn-block <?php if($dato->saldo==0){echo "disabled";} ?>" id="guardaAbono" data-set="<?php echo $dato->idlocalizador ?>" href="#">Guardar</a></div>
           </form>
           <span id="1"></span>
           <span id="2"></span>
           <span id="3"></span>
           <span id="4"></span>
          </div>
        </div>
       </div>
<?php endforeach ?> 
       <div class="col-md-6">
        <div class="panel panel-primary">
         <div class="panel-heading">Abonos: Detalle</div>
          <div class="panel-body">
           <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#pagados" aria-controls="pagados" role="tab" data-toggle="tab"><strong class="text-success">Pagados</strong></a></li>
              <li role="presentation"><a href="#cancelados" aria-controls="cancelados" role="tab" data-toggle="tab"><strong class="text-danger">Cancelados</strong></a></li>
              <li role="presentation"><a href="#todos" aria-controls="todos" role="tab" data-toggle="tab"><strong class="text-primary">Todos</strong></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
             <div role="tabpanel" class="tab-pane active" id="pagados">
              <table id="tablaabonospagados" class="table table-striped">
                <thead>
                    <tr class="info">
                       <th>#</th>
                       <th>Fecha Abono</th>
                       <th>Abono</th>
                       <th>...</th>
                    </tr>                  
                </thead>
                <tbody>  
                 <?php 
                  $contp=0;
                  foreach ($listadeabonos->result() as $valor): 
                  if($valor->cancelado==0){
                    $contp+=1;
                 ?>
                  <tr>
                   <td><?php echo $contp; ?></td>
                   <td><?php echo $valor->fechaabono; ?></td>
                   <td><?php echo $valor->montoabono; ?></td>                  
                   <td align="center">
                      <a class="btn" href="<?php echo base_url(); ?>abonos/ver/<?php echo $valor->idabono; ?>/<?php echo $valor->idedocta; ?>"><i class="fa fa-eye text-info" aria-hidden="true"></i></a>
                      <a class="btn" href="<?php echo base_url(); ?>abonos/editar/<?php echo $valor->idabono; ?>/<?php echo $valor->idedocta; ?>"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
                      <a class="btn" href="<?php echo base_url(); ?>abonos/cancelar/<?php echo $valor->idabono; ?>/<?php echo $valor->idedocta; ?>"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                    </td>                 
                  </tr>
                 <?php 
                  }
                 endforeach ?>
                </tbody>
              </table>
             </div>
             <div role="tabpanel" class="tab-pane" id="cancelados">
              <table id="tablaabonoscancelados" class="table table-strip">
               <thead>
                   <tr class="info">
                       <th>#</th>
                       <th>Fecha Abono</th>
                       <th>Abono</th>
                       <th>...</th>
                   </tr>
               </thead>
               <tbody>
                  <?php 
                    $contc = 0;
                    foreach ($listadeabonos->result() as $valor): 
                    if($valor->cancelado==1){
                      $contc+=1;
                  ?>
                  <tr>
                   <td><?php echo $contc; ?></td>
                   <td><?php echo $valor->fechaabono; ?></td>
                   <td><?php echo $valor->montoabono; ?></td>
                   <td>
                     <a class="btn" href="<?php echo base_url(); ?>abonos/editar/<?php echo $valor->idabono; ?>/<?php echo $valor->idedocta; ?>"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
                   </td>
                  </tr>
                 <?php 
                  }
                 endforeach ?>                      
               </tbody>
              </table>
             </div>
              <div role="tabpanel" class="tab-pane" id="todos">
               <table id="tablaabonostodos" class="table table-strip">
                <thead>
                 <tr class="info">
                  <th>#</th>
                  <th>Fecha Abono</th>
                  <th>Abono</th>
                  <th>...</th>
                 </tr>
                </thead>
                <tbody> 
                  <?php 
                    $cont = 0;
                    foreach ($listadeabonos->result() as $valor): 
                    $cont+=1;
                  ?>
                  <tr>
                   <td><?php echo $cont ?></td>
                   <td><?php echo $valor->fechaabono; ?></td>
                   <td><?php echo $valor->montoabono; ?></td>
                   <td><?php if($valor->cancelado==1){echo "<strong class='text-danger'>CA</strong>";}else{echo "<strong class='text-success'>P</strong>";} ?></td>
                  </tr>
                 <?php endforeach ?>               
                </tbody>
               </table>
              </div>
            </div>
           </div>
          </div>
        </div>
       </div>
     </div>
    </div>
   </div>  
  </div>                    
</div>
<script src="<?php echo base_url(); ?>js/estadosdecuenta/funciones.js"></script>