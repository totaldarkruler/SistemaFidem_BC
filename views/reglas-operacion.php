<div id="reglas-operacion" class="contenido-pagina">
    <a href="<?php echo base_url(); ?>" class="atras">Reglas de Operación</a>

    <div class="margen-izquierdo">
        <p class="instrucciones">Para descargar el calendario haga clic en el enlace de abajo.</p>

        <?php if ($reglas->num_rows() > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Documentos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($reglas->result() as $regla) : ?>
                <tr>
                    <td><?php echo $regla->documento; ?></td>
                    <td><a href="<?php echo $regla->ruta . $regla->documento?>" target="_target">Descargar</a></td>
                </tr>
                <?php endforeach; ?>              
            </tbody>
        </table>
        <?php else : ?>
        <p>No existen reglas de operación registradas hasta el momento</p>
        <?php endif; ?>
    </div>
</div>