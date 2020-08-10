<div>
    <?php if(@$solicitud != null) : ?>
    <div id="solicitudes-proveedores" class="formulario">
        <div class="seccion-formulario"> 
            <span class="titulo">Datos de la Institución</span>

            <div>
                <label for="nombre">Institución:</label>
                <input type="text" name="nombre" value="<?php echo $solicitud->nombre; ?>" />
            </div>
            <div>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" value="<?php echo $solicitud->direccion; ?>" />
            </div>
            <div>
                <label for="representante">Representante:</label>
                <input type="text" name="representante" value="<?php echo $solicitud->representante; ?>" />
            </div>
            <div>
                <label for="cargo_representante">Cargo del Representante:</label>
                <input type="text" name="cargo_representante" value="<?php echo $solicitud->cargo; ?>" />
            </div>
            <div>
                <div>
                    <label for="telefono">Teléfono de Contacto:</label>
                    <input type="text" name="telefono" value="<?php echo $solicitud->telefono; ?>"  />
                </div>
                <div>
                    <label for="extension">Extensión:</label>
                    <input type="text" name="extension" value="<?php echo $solicitud->extension; ?>" />
                </div>
            </div>
            <div>
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="text" name="correo_electronico" value="<?php echo $solicitud->correo; ?>" />
            </div>
        </div>

        <div class="seccion-formulario">
            <span class="titulo">Acta Constitutiva</span>

            <div>
                <label for="documento">Archivo Adjunto:</label>
               <a href="<?php echo $solicitud->ruta_acta . $solicitud->documento ?>" target="_blank"><?php echo $solicitud->documento; ?></a>
            </div>
        </div>
        
        <div class="alinear-centro">
            <a href="/solicitudes_registro/aprobar/<?php echo $solicitud->id; ?>" class="boton">Aprobar</a>
            <a href="/solicitudes_registro/rechazar/<?php echo $solicitud->id; ?>" class="boton">Rechazar</a>
            
        </div>
    </div>
    <?php else : ?>
    <div class="subopcion">
        <span>SOLICITUDES DE REGISTRO PENDIENTES</span>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NOMBRE DE LA INSTITUCION</th>
                        <th>REPRESENTANTE</th>
                        <th>FECHA</th>
                        <th></th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php if (@$solicitudes->num_rows() > 0) : ?>
                    <?php foreach ($solicitudes->result() as $solicitud) : ?>
                    <tr>
                        <td class="alinear-centro"><?php echo $solicitud->id; ?></td>
                        <td><?php echo $solicitud->nombre; ?></td>
                        <td><?php echo $solicitud->representante; ?></td>
                        <td class="alinear-centro"><?php echo @date("d/m/Y", strtotime($solicitud->fecha)); ?></td>
                        <td>
                            <a href="/solicitudes_registro/obtener/<?php echo $solicitud->id; ?>">Ver solicitud</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php endif; ?>

</div>