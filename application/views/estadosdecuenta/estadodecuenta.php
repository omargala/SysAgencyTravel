<div id="page-wrapper">
  <div class="row">
  <div class="col-md-12">        
   <h1 class="page-header">Estado de Cuenta</h1>            
   <div class="panel panel-default">
    <div class="panel-contenedor-interno"> 
    <div class="row">
      <div class="col-lg-6 col-sm-6 col-12">
      <div class="input-group">
        <input id="localizador" placeholder="Buscar por Clave o Nombre" type="text" class="form-control" aria-label="Search for...">
        <span class="input-group-btn">
          <button  id="search" class="btn btn-warning" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
        </span>
      </div>
      </div>
    </div>                                                         
   </div>
  </div>
 </div> 
   <div id="datosparaabonos" class="col-md-12 hide">
    <div class="panel-default">
     <div class="panel-body">
       <div class="col-md-6">
        <div id="datosdellocalizador" class="panel panel-primary">
         <div class="panel-heading">Datos del Localizador <a class="btn" type="button" data-toggle="modal" data-target="#infoLocalizador"><i class="fa fa-info-circle" aria-hidden="true" style="color:white;float:right;"></i></a></div>
         <div class="panel-body">
          <div id="alertSection"></div>
           <ul class="list-group">
            <li class="list-group-item ">Clave: <span id="clave"></span></li>
            <li class="list-group-item">Titular: <span id="nombre"></span></li>
           </ul>
           <div class="modal fade" id="infoLocalizador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
             <div class="modal-content">
              <div class="modal-header list-group-item active">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color:white;" aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detalle del Localizador</h4>
              </div>
              <div class="modal-body">
                <div id="descripcion-detalle" class="list-group"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
             </div>
            </div>
           </div>
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
            <input id="estadodecuenta" class="form-control" type="text" placeholder="0" style="text-align: left;" disabled><span class="input-group-addon">...</span> 
           </div>
            <div class="col-2">
              <label for="tarifa">Tarifa Total:</label>
            </div>
            <div class="col-8 input-group">
             <span class="input-group-addon">$</span>
             <input id="tarifa" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled><span class="input-group-addon">.00</span>        
            </div>
       
         
           <div class="col-2">
            <label for="pagado">Total Pagado:</label>
           </div>
           <div class="col-8 input-group">
            <span class="input-group-addon">$</span>
            <input id="pagado" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled><span class="input-group-addon">.00</span>       
           </div>
   
      
           <div class="col-2">
            <label for="saldo">Saldo Total:</label>
           </div>
           <div class="col-8 input-group">
            <span class="input-group-addon">$</span>
            <input id="saldo" class="form-control" type="text" placeholder="Tarifa pública Ej. $5,400.00" style="text-align: right;" disabled><span class="input-group-addon">.00</span>       
           </div>
         
         </div>
        </div>
        <div class="panel panel-primary">
         <div class="panel-heading">Abonar a Cuenta</div>
          <div class="panel-body">
           <form action="" class="form">                                                                      
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
               <input type="text" id="abonadopor" class="form-control" placeholder="Nombre y Aepllido" required>
             </div>
             <div class="form-group">
                <input type="text" id="recibidopor" class="form-control" placeholder="Recibido por:" required>
             </div>
             <div class="form-group">
              <div class="input-group">
               <span class="input-group-addon">$</span>
               <input id="montoabono" class="form-control" type="text" placeholder="Abono: $5,400.00" style="text-align: right;" required><span class="input-group-addon">.00</span>
              </div>   
            </div> 
            <div class="form-group"><a class="btn btn-primary btn-lg btn-block" id="guardaAbono" href="#" >Guardar</a></div>
           </form>
           <span id="1"></span>
           <span id="2"></span>
           <span id="3"></span>
           <span id="4"></span>
          </div>
        </div>
       </div>   
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
               <tbody></tbody>
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
                <tbody></tbody>
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
   <div class="modal fade" id="editarDialog" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <div class="modal-header list-group-item">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle de Abono</h4>
       </div>
       <div class="modal-body">
        <div id="descripcion-detalle" class="list-group">
         <div class="form-horizontal">
          <div class="form-group">
              <label for="referenciaAbonoModal" class="col-sm-2 control-label">Referencia</label>
              <div class="col-sm-10">
                  <input id="referenciaAbonoModal" type="text" class="form-control">
              </div>
          </div>
          <div class="form-group">
              <label for="recibioModal" class="col-sm-2 control-label">Recibió:</label>
              <div class="col-sm-10">
                  <input id="recibioModal" type="text" class="form-control">
              </div>
          </div>
          <div class="form-group">
              <label for="pagoModal" class="col-sm-2 control-label">Pagó:</label>
              <div class="col-sm-10">
                  <input id="pagoModal" type="text" class="form-control">
              </div>
          </div>
          <div class="form-group">
              <label for="montoAbonoModal" class="col-sm-2 control-label">Abono:</label>
              <div class="col-sm-10">
                  <input id="montoAbonoModal" type="text" class="form-control">
              </div>
          </div>
          <div class="form-group">
              <label for="fechaAbonoModal" class="col-sm-2 control-label">Fecha:</label>
              <div class="col-sm-10">
                  <input id="fechaAbonoModal" type="text" class="form-control" disabled>
              </div>
          </div>
          <div class="form-group">
              <label for="modoPagoModal" class="col-sm-2 control-label">Modo de Pago:</label>
              <div class="col-sm-10">
                  <select name="modoPagoModal" id="modoPagoModal"  class="form-control">
                          <option value="mp" class="form-control">Modo de pago:</option>
                          <option value="ef" class="form-control">Efectivo</option>
                          <option value="tc" class="form-control">T. Crédito</option>
                          <option value="td" class="form-control">T. Débito</option>
                          <option value="tb" class="form-control">Trans. Bancaria</option>
                      </select>
                  </div>
          </div>                            
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
             <div class="checkbox">
               <label class="text-danger">
                 <input type="checkbox" id="statusModal"> Cancelado
               </label>
             </div>
            </div>
          </div>
         </div>
        </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         <button id="guardarCambiosAbono" type="button" class="btn btn-primary">Guardar</button>
       </div>
      </div>
    </div>
   </div>      
  </div>                    
</div>
<script src="js/estadodecuenta.js"></script>