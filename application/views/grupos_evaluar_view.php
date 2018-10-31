<body class="bg-color-body">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo $titulo ?></h3>
                    </div>
                    <div class="card-body">
                        <table  class="table table-striped" >
                            <thead>
                                <th>Asignaturas</th>
                            </thead>                       
                            <tbody>
                                <?php foreach ($asignaturas as $asignatura){?>
                                <tr>
                                    <td>
                                       <?php echo $asignatura->nombre ?> 
                                    </td>
                                    <td>
                                    <a href="<?php echo base_url().'index.php/main_view/loadGruposEvaluarAlumnos/'.$asignatura->id_contenido.'/'.$asignatura->id_grupo?>" class="btn btn-secondary bg-color-purple"><i class="fas fa-book-open" style="margin-right:5px"></i>Evaluar</a>
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