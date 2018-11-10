

<nav class="navbar navbar-expand-lg navbar-dark bg-color-purple">
	<a class="navbar-brand" href="<?php echo base_url()?>index.php/main_view"> <img class="logo" src="<?php echo base_url('application/images/logo.png'); ?>" height="40"> Codeigniter-Alumnos-Centro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto"> 
        <?php if ( $admin == TRUE){?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/auth/">
                <i class="fas fa-cog" style="margin-right:3px"></i>Administrar</a>
            </li> 
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>index.php/main_view/loadAlumnos">Alumnos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/main_view/loadGrupos">Cursos</a>
            </li>
        <?php }else{ ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>index.php/main_view/loadCalificaciones">
            <i class="fas fa-sign-out-alt" style="margin-right:3px"></i>Calificaciones</a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>index.php/auth/logout">
            <i class="fas fa-sign-out-alt" style="margin-right:3px"></i>Logout</a>
        </li>

        <li style="margin-left: 100px;"></li>
        <!--
        <li class="nav-item active">
            <a class="nav-link" href="http://bootstrap-ecommerce.com">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="html-components.html"> Documentation </a>
        </li>
        <li class="nav-item dropdown">
                <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">  Dropdown  </a>
            <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#"> Menu item 1</a></li>
                  <li><a class="dropdown-item" href="#"> Menu item 2 </a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="btn ml-2 btn-warning" href="http://bootstrap-ecommerce.com">Download</a>
        </li>
        -->
    </ul>
  </div>
</nav>
