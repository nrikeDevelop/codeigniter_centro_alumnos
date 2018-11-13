<body class="bg-color-body">
    <div class="container">
        <div class="row">
            <br><br>
            <h3 class="text-color-white"><?php echo $titulo ?></h3>
            <table class="ui table">
                <thead>
                <th>Asignatura</th>
                <th>Nota<th>
                </thead>
                <tbody>
                    <?php foreach ($asignaturas as $asignatura) { ?>
                    <tr>
                        <td><?php echo $asignatura->nombre_contenido ?></td>
                        <td><?php echo $asignatura->nota ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>