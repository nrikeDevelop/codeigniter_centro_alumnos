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
                                <th>Código</th>
                                <th>Nombre Ciclo</th>
                            </thead>                       
                            <?php foreach ($grupos as $grupo) {?>
                            <tr>
                                <td>
                                    <div class="dropdown">

                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <?php echo $grupo->codigo ?>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="loadGruposAlumnos/<?php echo $grupo->codigo?>">Alumnos</a>
                                            <a class="dropdown-item" href="loadGruposAsignaturas/<?php echo $grupo->codigo?>">Asignaturas</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $grupo->nombre ?>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
