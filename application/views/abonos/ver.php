<div id="page-wrapper">
 <div class="row">
  <div class="col-md-12">
    <div class="col-lg-12">
      <h2 class="page-header"><span class="text-white">Detalle del Abono</span></h2>
    </div>
    <div class="row">
     <div class="col-md-12">
      <div id="alertSection"></div>
       <div class="panel panel-primary">                       
        <div class="panel-heading">
            <strong>Información del abono</strong><a href="<?=base_url(); ?>abonos" class="btn btn-success btn-right-in-panel"" type="button"><i class="fa fa-list" aria-hidden="true"></i> Lista Abonos</a>
        </div>             
        <div class="panel-body">
         <div class="row">
          <div class="col-md-12"> 
           <div id="alertLocalizador"></div>
            <ul class="list-group">                                               
            <?php foreach ($datos->result() as $dato){ ?>
               <li class="list-group-item"><strong class="text-primary">Referencia de Abono: </strong> <?php echo $dato->idabono ?></li>
               <li class="list-group-item"><strong class="text-primary">Referencia de Estado de Cuenta: </strong> <?php echo $dato->idedocta ?></li>
               <li class="list-group-item"><strong class="text-primary">Recibió: </strong> <?php echo $dato->recibidopor ?></li>
               <li class="list-group-item"><strong class="text-primary">Pagó: </strong> <?php echo $dato->abonadopor ?></li>
               <li class="list-group-item"><strong class="text-primary">Abono: </strong> <?php echo $dato->montoabono ?></li>
               <li class="list-group-item"><strong class="text-primary">Fecha: </strong> <?php echo $dato->fechaabono ?></li>
               <li class="list-group-item"><strong class="text-primary">Modo de Pago: </strong> <?php echo $dato->modopagoabono?></li>
               <li class="list-group-item"><strong class="text-primary">Cancelado: </strong> <?php if($dato->cancelado==0){echo "NO";}else{echo "CA";};?></li>             
            <?php } ?>
            </ul>
           </div>
          </div>
         </div>
       </div>
     </div>
    </div>
  </div>        
 </div>                    
</div>  