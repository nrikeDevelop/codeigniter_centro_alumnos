<body class="bg-color-body">
    <div class="container">
        <br>
        <h3 style="color:white"><?php echo $titulo ?></h3>
        <br><br>
    <?php if(empty($calificaciones)){?>
        <table class="ui celled table" >
            <tr>
                <td>
                    <h5>Aún no estas calificado</h5>
                </td>
            </tr>
        </table>
    <?php } else { ?>
        <table class="ui celled table" >
            <thead>
            <th>Asignatura</th>
            <th>Nota</th>
            </thead>
            <tbody>
                <?php foreach ($calificaciones as $calificacion){ ?>
                <tr>
                     <td>
                         <?php echo $calificacion->nombre_contenido ?>
                     </td>
                     <td>
                         <?php echo $calificacion->nota ?>
                     </td>
                 </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    </div>
</body>