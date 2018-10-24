<body class="bg-color-body">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <br><br>
                <div class="<?php echo $alert_state?>" role="alert">                  
                      La nota introducida ya existe, ¿Desea remplazarla?
                        <a class="btn btn-warning" style="margin-left:30px;margin-right:10px;">Si</a><a class="btn btn-warning">No</a>
                  </div>
                <br>
                
                <?php echo validation_errors();?>
                
                <div class="card">
                    <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" >
                        Evaluar
                    </a>                                  
                <div class="collapse" id="collapseExample">

                    <div class="card card-body">
                        <form method="POST" action="<?php echo base_url()?>index.php/main_view/form_notas/<?php echo $id_alumno ?>">
                        <label>Asignatura</label>
                        <select class="form-control" name="asign">
                            <?php foreach ($evaluaciones as $evaluacion) { ?>
                            <option value="<?php echo $evaluacion["id_asignatura"]?>"> <?php echo $evaluacion["asignatura"]?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <label>Evaluación</label>
                        <select class="form-control" name="eval">
                            <option value="1">Primera Evaluación</option>
                            <option value="2">Segunda Evaluación</option>
                            <option value="3">Tercera Evaluación</option>
                        </select>
                        <br>
                        <label>Nota</label>
                        <input type="number" name="nota" class="form-control" placeholder="Introducir la nota">
                        <br>
                        <button type="submit" class="btn btn-secondary">Evaluar</button>
                        </form>
                    </div>
                </div>  
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo $title?></h3>
                    </div>
                    <div class="card-body">
                        <table  class="table table-striped" >
                            <thead>
                                <th>Asignatura</th>    
                                <th class="td-center"> 1 Evaluación</th>
                                <th class="td-center"> 2 Evaluación</th>
                                <th class="td-center"> 3 Evaluación</th>
                            </thead>
                            <tbody>
                                <?php foreach ($evaluaciones as $evaluacion) {?>
                                <tr>
                                    <td><?php echo $evaluacion["asignatura"]?></td>
                                    <!-- PREGUNTAMOS POR LA NOTA -->
                                    <td class="td-center"><?php echo $evaluacion["notas"]["eva1"]?></td>
                                    <td class="td-center"><?php echo $evaluacion["notas"]["eva2"]?></td>
                                    <td class="td-center"><?php echo $evaluacion["notas"]["eva3"]?></td> 
                                </tr>                                                   
                                <?php }?>          
                            </tbody>                       
                        </table>
                    </div>
                </div>
                <br><br>

            </div>
        </div>
    </div>
</body>