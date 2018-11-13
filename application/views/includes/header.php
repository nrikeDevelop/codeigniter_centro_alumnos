

<nav class="navbar navbar-expand-lg navbar-dark bg-color-purple">
	<a class="navbar-brand" href="<?php echo base_url()?>index.php/main_view"> <img class="logo" src="<?php echo base_url('application/images/logo.png'); ?>" height="40"> Codeigniter-Alumnos-Centro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto"> 
        <?php if ( $admin == TRUE){?>  
          <div class="dropdown">
            <button class="btn bg-color-purple text-color-white opacity-6 dropdown-toggle" style="margin-right:9px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cogs" style="margin-right: 5px"></i> Administrador
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item ui" href="<?php echo base_url()?>index.php/main_view/loadGrupos">
                  <i class="fas fa-layer-group" style="margin-right:7px"></i>Cursos</a>
              <a class="dropdown-item ui" href="<?php echo base_url()?>index.php/alumnos/index">
                  <i class="fas fa-users" style="margin-right:7px"></i>Alumnos</a>
              <a class="dropdown-item ui " href="<?php echo base_url()?>index.php/auth/">
                <i class="fas fa-cog" style="margin-right:7px"></i>Administrar</a>
            </div>
          </div>
       
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
      
    </ul>
  </div>
</nav>
