<div id="presentacion-proyectos">
    <div class="subopcion">
        <span>PRESENTACIÓN DE PROYECTOS</span>
        <form action="/cedula/buscar/" method="post">
            <div>
                <div>                    
                    <input type="submit" value="" class="buscar">
                    <a href="<?php echo base_url(); ?>panel_control/mostrarPresentacionProyectos" class="actualizar">Todos</a>                 
                </div>
                <div>
                    <span>Mostrar por Solicitante:</span>
                    <div>
                        <span>Solicitante:</span>
                        <select name="institucion_id">
                            <option value="0">&lt;&lt;TODOS&gt;&gt;</option>
                            <?php foreach($instituciones->result() as $institucion) : ?>
                            <option value="<?php echo $institucion->id; ?>"><?php echo $institucion->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div>
                    <span>Mostrar por Rango de Fechas:</span>
                    <div>
                        <span>Fecha Inicio:</span>
                        <input type="text" name="fecha_inicio" value="" data-fecha>
                    </div>
                    <div>
                        <span>Fecha Fin:</span>
                        <input type="text" name="fecha_fin" value="" data-fecha>
                    </div>
                </div>
            </div>
        </form>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>FOLIO</th>
                        <th>NOMBRE DEL PROYECTO</th>
                        <th>SOLICITANTE</th>
                        <th>ACUSE DE RECIBO</th>
                        <th>HORA</th>
                        <th>ESTADO EVALUACIÓN</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sUrlActual = "en eso ando"; ?>
                    <?php if (@$proyectos->num_rows() > 0) : ?>
                    <?php foreach ($proyectos->result() as $proyecto) : ?>
                    <tr>
                        <td class="alinear-centro"><?php echo $proyecto->folio; ?></td>
                        <td class="alinear-izquierda"><?php echo $proyecto->proyecto; ?></td>
                        <td class="alinear-izquierda"><?php echo $proyecto->institucion; ?></td>
                        <?php if($proyecto->fecha_envio_cedula != null) : ?>
                        <td class="alinear-centro"><?php echo @date("d/m/Y", strtotime($proyecto->fecha_envio_cedula)); ?></td>
                        <td class="alinear-centro"><?php echo @date("hs A", strtotime($proyecto->fecha_envio_cedula)); ?></td>
                        <?php else: ?>
                        <td class="alinear-centro"><?php echo ""; ?></td>
                        <td class="alinear-centro"><?php echo ""; ?></td>
                        <?php endif; ?>
                        <td class="alinear-centro"><?php echo $proyecto->estatus_evaluacion; ?></td>
                        <td><a href="<?php echo base_url(). 'cedula_administrador/mostrar/'. $proyecto->id ?>">Ver</a></td>
                         <td><a href="<?php echo base_url(). 'cedula_administrador/evaluar/'. $proyecto->id ?>" class="<?php if($proyecto->fecha_envio_cedula == null) echo 'disabled'; ?>">Evaluar</a></td>
                        <td><a href="<?php echo base_url(). 'cedula_administrador/eliminar_proyecto/'. $proyecto->id . '/' . $sUrlActual ?>" onclick="return confirm('Se eliminará este proyecto. Continuar?');">Eliminar</a></td>                        
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>






