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
                                <th>Nombre</th>
                                <th>Nota</th>
                            </thead>                       
                            <tbody>
                                <?php foreach ($alumnos as $alumno){?>
                                <tr>
                                    <td>
                                        <?php echo $alumno->nombre_alumno?>
                                    </td>
                                    <td>
                                        <?php 
                                        $data = array('name'=> 'username','value'=> $alumno->nota,'style'=> 'width:90px','class'=>'form-control');
                                        echo form_input($data);
                                        ?>

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