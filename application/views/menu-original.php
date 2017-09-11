<header>
<div class="container">      
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
       
        <!-- Top Menu Items -->
        <!-- -->
        <ul class="nav navbar-left top-nav">
            <li class="active">
                <a href="<?=base_url(); ?>"  id="inicio"><i class="fa fa-fw fa-home"></i> Inicio</a>
            </li>
            <li>
                
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-address-book-o" aria-hidden="true"></i> Localizadores <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="<?=base_url(); ?>Localizadores" id="lista"> Lista de Localizadores</a>
                    </li>
                    <li>
                        <a href="<?=base_url(); ?>Localizadores/nuevo" id="nuevo"> Nuevo</a>
                    </li>                 
                    <li class="divider"></li>
                    <li>
                        <a href="#">Consulta avanzada</a>
                    </li>
                </ul>
            </li> 
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-line-chart" aria-hidden="true"></i>Estados de Cuenta <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="<?=base_url(); ?>Estadosdecuenta" id="lista"> Estados de Cuenta</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">Consulta avanzada</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-line-chart" aria-hidden="true"></i>Abonos<b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="<?=base_url(); ?>abonos" id="lista"> Lista</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">Consulta avanzada</a>
                    </li>
                </ul>
            </li>                        
            <li>
                <a href="<?=base_url(); ?>Reportes" id="Reportes"><i class="fa fa-fw fa-line-chart"></i> Reportes</a>
            </li>
        </ul>             
    </nav>     
</div>         
</header>
<div class="main container">