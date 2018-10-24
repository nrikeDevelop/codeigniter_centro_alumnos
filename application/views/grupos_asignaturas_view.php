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
                        <table  class="table table-striped" >
                            <thead>
                                <th>Asignaturas</th>
                            </thead>                       
                            <?php foreach ($asignaturas as $asignatura) {?>
                            <tr>
                                <td>
                                    <?php echo $asignatura->nombre?>
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