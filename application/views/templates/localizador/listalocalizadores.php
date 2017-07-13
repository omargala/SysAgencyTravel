
<div id="page-wrapper">
 <div class="row">
  <div class="col-lg-12">
   <h1 class="page-header">Relación de Localizadores</h1>
  </div> <!-- /.col-lg-12 -->        
 </div>
 <div class="row">
  <div class="col-lg-12">
   <div class="panel panel-default">
    <div class="panel-heading">
     Localizadores <button id="addLocalizador" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
    </div>
    <div class="panel-body">   
	    <table id="loc" width="100%" class="table table-striped table-bordered table-hover">
	     <thead>
	      <tr> 
	       <th>Clave</th>
	       <th>Titular</th>
	       <th>Tarifa</th>
	       <th>Pagado</th>	       
	       <th>...</th>
	      </tr>
	     </thead>
	     <tbody>
	      <?php 
	      if (empty($todoslocalizadores)) {	      	 	
	      	 		echo "Vacío";      		
    	 	}else{ 
    	 		foreach ($todoslocalizadores as $key) {  ?>	      	 	
	      	 	<tr class="odd gradeX">
	    			<td><?=$key->cvelocalizador; ?></td>
	    			<td><?=$key->titular; ?></td>
	    			<td><?=$key->tarifapublica; ?></td>
	    			<td class="center"><?=$key->statuspagado; ?></td>
	    		 	<td align="center">
	    		 		<a class="btn btn-info" href="#"><span class="glyphicon glyphicon-eye-open"></span></a>
	    		 		<a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-pencil"></span></a>	
	    		 		<a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-pencil"></span></a>	
	    		 	</td>
	    	 	</tr>
	    	<?php 
	    	 	}
	      	}	
	      	?>  				                                              
	     </tbody>
	    </table>                            
    </div>
   </div>
  </div>
 </div>
</div>
<script src="<?=base_url();?>vendor/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url();?>vendor/js/bootstrap.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?=base_url();?>vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url();?>vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
	$('#loc').DataTable({
    	responsive: true
    });
});
</script>