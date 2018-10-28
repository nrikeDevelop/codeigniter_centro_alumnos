<body class="bg-color-body">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <br><br><br><br><br><br>
       
            <div class="alert alert-warning" role="alert">
                <p>
                    El valor introducido ya corresponde a la nota del alumno ¿Desea reemplazarla?
                </p>
                <p style="text-align: right">
                    <a class="btn btn-warning" href="<?php echo base_url()?>index.php/main_view/updateAlumnosAsignaturas/<?php echo $id_alumno?>/<?php echo $id_asignatura?>/<?php echo $evaluacion?>/<?php echo $nota?>">Si</a>
                    <a class="btn btn-warning" href="<?php echo base_url()?>index.php/main_view/loadAlumnosAsignaturas/<?php echo $id_alumno?>">No</a>
                </p>
                
            </div>
        </div>
    </div>
</div> 
</body>
