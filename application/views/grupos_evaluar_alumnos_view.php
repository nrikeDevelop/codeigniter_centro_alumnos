
<body class="bg-color-body">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <br><br>
                <div style="padding:10px;color:white"><?php echo validation_errors(); ?></div>
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo $titulo ?></h3>
                    </div>
                    <div class="card-body">
                        <table  class="table table-striped" >
                            <thead>
                                <th>Nombre</th>                  
                                <th></th>
                            </thead>                       
                            <tbody>
                                <?php foreach ($alumnos as $alumno){?>
                                <tr>
                                    <td>
                                        <?php echo $alumno->nombre_alumno?>
                                    </td>
                                    <td>
                                        <a href='<?php echo base_url().
                                        "index.php/main_view/loadGruposEvaluarAlumnosAlumno/".
                                        $id_contenido."/".$id_grupo."/".$alumno->nia_alumno?>' class="ui basic button"><i class="icon file"></i>Evaluar</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>                             
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>