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
                                <th>Nota</th>
                                <th></th>
                            </thead>                       
                            <tbody>
                                <?php foreach ($alumnos as $alumno){?>
                                <form method="POST" action="<?php echo base_url().
                                    'index.php/main_view/loadGruposEvaluarAlumnosForm/'.
                                    $alumno->nia_alumno.'/'.
                                    $id_contenido.'/'.
                                    $id_grupo ?>" >
                                <tr>
                                    <td>
                                        <?php echo $alumno->nombre_alumno?>
                                    </td>
                                    <td>
                                        <?php 
                                        //$data = array('name'=> 'nota','value'=> $alumno->nota,'style'=> 'width:90px','class'=>'form-control');
                                        $data = array('name'=> 'nota','style'=> 'width:90px','class'=>'form-control');
                                        echo form_input($data);
                                        ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" type="submit">Evaluar</button>
                                    </td>
                                </tr>
                                </form>
                                <?php } ?>
                            </tbody>                             
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>