
<body class="bg-color-body">
<div class="container fluid">
    <div class="row">
        <div class ="col-md-5">
        <br><br>
        <div class="ui center aligned container">
        <?php foreach ($info_alumno as $info){?>
            <div class="ui card">
                <div class="image">
                    <img src="<?php echo base_url().'application/images/users.png' ?>">
                </div>
                <div class="content">
                    <a class="header"><?php echo $info->nombre_alumno ?></a>
                <div class="meta">
                    <span class="date"><?php echo $info->fecha_nacimiento?></span>
                </div>
                <div class="meta">
                    <span class="date"><?php echo $info->nia?></span>
                </div>
                </div>
                <div class="extra content">
                    <a>
                    <i class="address card icon"></i>
                    <?php echo $info->nif?>
                    </a>
                </div>
            </div>
        <?php } ?>     
        </div>                      
        </div>
        <div class ="col-md-7">
            <br><br>
            <div class="container">
                <div class="row">
                <?php echo validation_errors( '<div class="alert alert-danger">', '</div>');?>
                <form class="ui form" method="POST" action="<?php echo base_url().'index.php/main_view/loadGruposEvaluarAlumnosAlumnoForm/'.$id_contenido.'/'.$id_grupo.'/'.$nia_alumno?>">
                    <div class="ui stacked segment">
                    <div class="ui two column grid container">
                        <div class="column">
                            <label style="color:white">Nota</label>
                            <input type="text" name="nota" placeholder="Nota">
                        </div>
                        <div class="column">
                        <label style="color:white">Evaluación</label>
                                <select name="evaluacion">
                                <option value="1">Primera Evaluación</option>
                                <option value="2">Segunda Evaluación</option>
                                <option value="3">Tercera Evaluación</option>
                                </select>
                        </div>
                    </div>
                    <br>
                    <div class="ui left aligned container">
                        <textarea type="text" rows="3" name="descripcion" placeholder="Descripcion"></textarea>
                    </div> 
                    <br>  
                    <div class="ui left aligned container">
                        <button class="ui button" type="submit">Puntuar</button>
                    </div>     
                    </div>       
                </form>
                </div>
                <div class="row">
                    <table class="ui celled table" >
                    <thead>
                        <th>Evaluación</th>
                        <th>Nota</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>fsdfs</td>
                        </tr>
                        <tr>
                            <td>dasfasd</td>
                        </tr>
                    </tbody>
                    <table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>


