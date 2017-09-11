<div id="datosparaabonos" class="row"  data-set="<?php echo base_url(); ?>">
  <?php foreach ($detallelocalizador as $dato): ?>
  <div class="col-md-6"> 
    <div class="card mb-3">
     <div id="datosdellocalizador" class="card-header text-white bg-info">
      <i class="fa fa-table"></i>
      Datos del Localizador <a class="btn" role="button" href="<?php echo base_url(); ?>localizadores/ver/<?php echo $dato->idlocalizador; ?>"><i class="fa fa-info-circle" aria-hidden="true" style="color:white;float:right;"></i></a> 
     </div>
     <div class="card-body">
      <div id="alertSection"></div>
       <ul class="list-group">
        <li class="list-group-item ">Clave: <span id="clave"><?=$dato->cvelocalizador; ?></span></li>
        <li class="list-group-item">Titular: <span id="nombre"><?=$dato->titular; ?></span></li>
       </ul>
     </div>
     <div class="card-footer small text-muted">
      Updated yesterday at 11:59 PM
     </div>
    </div>

    <div id="balance" class="card mb-3">
     <div id="datosdellocalizador" class="card-header text-white bg-info">
      <i class="fa fa-table"></i>
      Balance de Estado de Cuenta
     </div>
     <div class="card-body">
      <div class="form-group row">
       <label for="cvelocalizador" class="col-sm-4 col-form-label">Folio:</label>
       <div class="col-sm-8">
        <input id="estadodecuenta" name="estadodecuenta" class="form-control" type="text" placeholder="0" style="text-align: left;" style="text-align: right;" disabled value="<?php echo $dato->idedocta; ?>">
       </div>
      </div>
      <div class="form-group row">
       <label for="cvelocalizador" class="col-sm-4 col-form-label">Tarifa Total:</label>
       <div class="col-sm-8">
        <input id="tarifa" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled value="<?php echo $dato->tarifapublica;; ?>">
       </div>
      </div>
      <div class="form-group row">
       <label for="cvelocalizador" class="col-sm-4 col-form-label">Total Pagado:</label>
       <div class="col-sm-8">
        <input id="pagado" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled value="<?php echo $dato->acumulado; ?>">
       </div>
      </div>
      <div class="form-group row">
       <label for="cvelocalizador" class="col-sm-4 col-form-label">Saldo Total:</label>
       <div class="col-sm-8">
        <input id="saldo" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled value="<?php echo $dato->saldo;?>">
       </div>
      </div>
     </div>
     <div class="card-footer small text-muted">
       Updated yesterday at 11:59 PM
      </div>
    </div>
    
    <div class="card mb-3">
     <div id="datosdellocalizador" class="card-header text-white bg-info">
      <i class="fa fa-table"></i>
      Abonar a cuenta
     </div>
     <div class="card-body">
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
               <input type="text" id="abonadopor" name="abonadopor" class="form-control" placeholder="Nombre y Apellido" required>
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
            <div class="form-group"><a class="btn btn-primary btn-lg btn-block <?php if($dato->saldo==0 || $dato->cancelado==1){echo "disabled";} ?>" id="guardaAbono" data-set="<?php echo $dato->idlocalizador ?>" href="#">Guardar</a></div>
           </form>
           <span id="1"></span>
           <span id="2"></span>
           <span id="3"></span>
           <span id="4"></span>
     </div>
     <div class="card-footer small text-muted">
      Updated yesterday at 11:59 PM
     </div>
    </div>
  </div>
 <?php endforeach ?>
  <div class="col-md-6"> 
   <div class="card mb-3">
    <div id="datosdellocalizador" class="card-header text-white bg-info">
     <i class="fa fa-table"></i>
     Abonos: Detalle
    </div>
    <div class="card-body">
     <div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
       <li class="nav-item">
         <a class="nav-link active" id="pagados-tab" data-toggle="tab" href="#pagados" role="tab" aria-controls="pagados" aria-expanded="true">Pagados</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" id="cancelados-tab" data-toggle="tab" href="#cancelados" role="tab" aria-controls="cancelados">Cancelados</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" id="todos-tab" data-toggle="tab" href="#todos" role="tab" aria-controls="todos">Todos</a>
       </li>
       
     </ul>
     <div class="tab-content" id="myTabContent">
       <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab" id="pagados">
        <table id="tablaabonospagados" class="table table-striped">
          <thead>
              <tr>                        
                 <th>Fecha Abono</th>
                 <th>Abono</th>
                 <th>...</th>
              </tr>                  
          </thead>
          <tbody>  
           <?php                    
            foreach ($listadeabonos->result() as $valor): 
            if($valor->cancelado==0){  ?>
            <tr>                    
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
       <div class="tab-pane fade" id="cancelados" role="tabpanel" aria-labelledby="profile-tab">
        <table id="tablaabonoscancelados" class="table table-strip">
                <thead>
                    <tr>                        
                        <th>Fecha Abono</th>
                        <th>Abono</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                   <?php                      
                     foreach ($listadeabonos->result() as $valor): 
                     if($valor->cancelado==1){                       
                   ?>
                   <tr>                    
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
       <div  class="tab-pane fade" id="todos" role="tabpanel" aria-labelledby="profile-tab">
        <table id="tablaabonostodos" class="table table-strip">
                 <thead>
                  <tr>                   
                   <th>Fecha Abono</th>
                   <th>Abono</th>
                   <th>...</th>
                  </tr>
                 </thead>
                 <tbody> 
                   <?php 
                     
                     foreach ($listadeabonos->result() as $valor): 
                     
                   ?>
                   <tr>
                    
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
   <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
<script src="<?php echo base_url(); ?>js/estadosdecuenta/funciones.js"></script>