<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ing. Felix Omar Gala Paredes (www.consultoriaog.com">
    <title>System Agency Travel</title>
     <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?=base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <link rel="stylesheet" href="<?=base_url();?>css/sb-admin.css">
    <link rel="stylesheet" href="<?=base_url();?>css/style.css">
    <script src="<?=base_url();?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>vendor/popper/popper.min.js"></script>
    <script src="<?=base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=base_url();?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?=base_url();?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?=base_url();?>vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="<?=base_url();?>js/sb-admin.min.js"></script>
</head>
<body class="bg-dark">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          Acceso de Usuario
        </div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario:</label>
              <input type="text" class="form-control" id="usuario" name="id=usuario" placeholder="Ingrese su usuario">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contraseña:</label>
              <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Password">
            </div>           
            <a class="btn btn-primary btn-block" href="<?php echo base_url();?>main">Login</a>
          </form>         
        </div>
      </div>
    </div>
  </body>
  </html>