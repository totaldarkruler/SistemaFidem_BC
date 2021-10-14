<div>
    <?php if(@$institucion != null) : ?>
    <div id="solicitudes-proveedores" class="formulario">
        <form action="/institucion/actualizar/" method="post">
            <div class="seccion-formulario"> 
                <span class="titulo">Datos de la Institución</span>
                <input type="hidden" name="id" value="<?php echo $institucion->id; ?>">
                <div>
                    <label for="nombre">Institución:</label>
                    <input type="text" name="nombre" value="<?php echo $institucion->nombre; ?>" />
                </div>
                <div>
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" value="<?php echo $institucion->direccion; ?>" />
                </div>
                <div>
                    <label for="representante">Representante:</label>
                    <input type="text" name="representante" value="<?php echo $institucion->representante; ?>" />
                </div>
                <div>
                    <label for="cargo_representante">Cargo del Representante:</label>
                    <input type="text" name="cargo_representante" value="<?php echo $institucion->cargo; ?>" />
                </div>
                <div>
                    <div>
                        <label for="telefono">Teléfono de Contacto:</label>
                        <input type="text" name="telefono" value="<?php echo $institucion->telefono; ?>"  />
                    </div>
                    <div>
                        <label for="extension">Extensión:</label>
                        <input type="text" name="extension" value="<?php echo $institucion->extension; ?>" />
                    </div>
                </div>
                <div>
                    <label for="correo_electronico">Correo Electrónico:</label>
                    <input type="text" name="correo_electronico" value="<?php echo $institucion->correo; ?>" />
                </div>


            </div>

            <div class="seccion-formulario">
                <span class="titulo">Acta Constitutiva</span>

                <div>
                    <label for="documento">Archivo Adjunto:</label>
                    <a href="<?php echo $institucion->ruta_acta . $institucion->documento ?>" target="_blank"><?php echo $institucion->documento; ?></a>
                </div>
            </div>
            
            <div class="alinear-centro">
            <input type="submit" value="Guardar" />
            </div>

        </form>
    </div>
    <?php else : ?>
    <div class="subopcion">
        <span>INSTITUCIONES REGISTRADAS</span>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NOMBRE DE LA INSTITUCION</th>
                        <th>REPRESENTANTE</th>
                        <th>FECHA REGISTRO</th>
                        <th></th> 
                        <th></th>                         
                    </tr>
                </thead>
                <tbody>
                    <?php if (@$instituciones->num_rows() > 0) : ?>
                    <?php foreach ($instituciones->result() as $institucion) : ?>
                    <tr>
                        <td class="alinear-centro"><?php echo $institucion->id; ?></td>
                        <td><?php echo $institucion->nombre; ?></td>
                        <td><?php echo $institucion->representante; ?></td>
                        <td class="alinear-centro"><?php echo @date("d/m/Y", strtotime($institucion->fecha)); ?></td>
                        <td>
                            <a href="/institucion/obtener/<?php echo $institucion->id; ?>">Ver institución</a>
                        </td>
                         <!-- <td>
                            <a href="/institucion/eliminar/<?php echo $institucion->id; ?>" onclick="return confirm('Se eliminará esta institución. Continuar?');">Eliminar</a>
                        </td> -->
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>