<div id="calendario" class="contenido-pagina">
    <a href="<?php echo base_url(); ?>" class="atras">Calendario de Sesiones</a>

    <div class="margen-izquierdo">
        <p class="instrucciones">Para descargar el calendario haga clic en el enlace de abajo.</p>

        <?php if (@$sesiones->num_rows() > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Documentos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($sesiones->result() as $sesion) : ?>
                <tr>
                    <td><?php echo $sesion->documento; ?></td>
                    <td><a href="<?php echo $sesion->ruta . $sesion->documento?>" target="_target">Descargar</a></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?php else : ?>
        <p>No existen calendarios registrados hasta el momento</p>
        <?php endif; ?>
    </div>
</div>