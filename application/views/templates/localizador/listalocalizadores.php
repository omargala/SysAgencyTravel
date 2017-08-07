

 <div class="row">
  <div class="col-lg-12">
   <div class="panel panel-default">
    <div class="panel-heading">
     Localizadores
    </div>
    <div class="panel-body">   
	    <table id="loc" width="100%" class="table table-striped table-bordered table-hover">
	     <thead>
	      <tr> 
	       <th>Clave</th>
	       <th>Titular</th>
	       <th>Tarifa</th>       
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
	    		 	<td align="center">
	    		 		<a class="btn" href="#"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
	    		 		<a class="btn" href="#"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>		
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