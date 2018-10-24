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
                                <th>Alumno</th>
                                <th>Curso</th>
                            </thead>                       
                            <?php foreach ($alumnos as $alumno) {?>
                            <tr>
                                <td>
                                    <?php echo $alumno->NIA?>
                                </td>
                                <td>
                                    <?php echo $alumno->nombre?>
                                </td>
                                <td>
                                    <?php echo $alumno->codigo?>
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