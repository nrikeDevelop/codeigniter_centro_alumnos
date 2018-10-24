<body class="bg-color-body">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo $title?></h3>
                    </div>
                    <div class="card-body">
                        <table id="cursos" class="table table-striped" >
                            <thead>
                                <th>NIA</th>
                                <th>Nif</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Curso</th>
                                <th>Asignaturas</th>
                            </thead>                       
                            <?php foreach ($alumnos as $alumno) {?>
                            <tr>
                                <td>
                                    <?php echo $alumno->nia?>
                                </td>
                                <td>
                                    <?php echo $alumno->nif?>
                                </td>
                                <td>
                                    <?php echo $alumno->nombre?>
                                </td>
                                <td>
                                    <?php echo $alumno->email?>
                                </td>
                                <td>
                                    <?php echo $alumno->curso?>
                                </td>
                                <td>
                                    <a href="loadAlumnosAsignaturas/<?php echo $alumno->id?>" class="btn btn-secondary">Asignaturas  <?php echo $alumno->id?></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>