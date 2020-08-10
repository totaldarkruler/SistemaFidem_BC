<div id="evaluacion">
    <div class="subopcion">
        <span>EVALUACIÓN DEL PROYECTO</span>
        
        <p>
        <?php echo $proyecto->proyecto; ?>

        </p>
        
        <br>
        
        <div>
            <!--
            <form id="frmEvaluacionCantidadEvaluadores" action="/Proyecto/actualizar_no_evaluadores" method="post">
                <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
                <label>Cantidad de Evaluadores:</label>
                <select name="no_evaluadores">
                    <option value="0">(Cant. Evaluadores)</option>
                    <?php for($i =1; $i<=10; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?php if($proyecto->no_evaluadores == $i) echo 'selected'; ?> ><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
               <input type="submit" value="Guardar">
            </form>
-->
        </div>
        
        <div>
           <form id="frmEvaluacionAgregarEvaluador" action="/Proyecto/agregar_evaluador" method="post">
               <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
               <label>Evaluador:</label>               
                <select name="evaluador_id">
                    <option value="0">(Nombre del Evaluador)</option>
                    <?php foreach(@$evaluadores_disponibles->result() as $evaluador) : ?>
                        <option value="<?php echo $evaluador->id; ?>"><?php echo $evaluador->nombre . ' ' . $evaluador->ap_paterno . ' ' . $evaluador->ap_materno; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Agregar al Proyecto">
            </form>
        </div>
        
        <?php if(@$evaluadores_proyecto != null) : ?>
        <div>
            <table>
                <thead>
                    <th>EVALUADOR</th>
                    <th style='text-align: center;'>RESULTADO</th>
                    <th style='text-align: center;'>ESTATUS</th>
                    <th>COMENTARIOS Y RECOMENDACIONES DEL CEI</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                <?php foreach(@$evaluadores_proyecto->result() as $evaluador) : ?>
                    <?php if($evaluador->id_evaluador != null) : ?>
                    <tr>
                    <td><?php echo $evaluador->nombre . ' ' . $evaluador->ap_paterno . ' ' . $evaluador->ap_materno; ?></td>
                        <td style='text-align: center;'><?php echo $evaluador->resultado; ?></td>
                        <td style='text-align: center;'><?php echo $evaluador->estatus; ?></td>
                        <td> 
                            <a href="/Proyecto/evaluar/<?php echo $evaluador->evaluador_proyecto_id . '/1' ?>">Ver</a></td>
                        <td>
                            <a href="/Proyecto/eliminar_evaluador/<?php echo $evaluador->id_proyecto . '/' . $evaluador->id_evaluador; ?>">Eliminar</a>
                        </td>
                        <td>
                        <a href="/Proyecto/enviar_notificacion_evaluacion/<?php echo $proyecto->id . '/' . $evaluador->id_evaluador; ?>">Enviar Notificación</a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                
                </tbody>
            </table>
        </div>
        <?php endif; ?>
        
        <div class="resultado">
            <span>PUNTAJE TOTAL</span>
            <span> <?php echo number_format(@$resultado->resultado,2); ?> </span>
        </div>
        
        <div id="proyecto-comentarios-general">
            <form action="/proyecto/guardar_observacion_evaluacion" method="post">
                <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
                <div class="input">
                    <label>Comentarios y Recomendaciones del CEI:</label>
                    <textarea name="comentarios" maxlength="250">
                    <?php echo $proyecto->observaciones_evaluacion; ?>
                    </textarea>
                </div>
                <div class="alinear-derecha">
                    <input type="submit" value="Guardar">
                </div>
            </form>
        </div>
        
        <div>
            <a href="/evaluacion/mostrarReporte/<?php echo $proyecto->id; ?>" class="boton" target="_blank">Ver reporte</a>
        </div>

        <br><br><br><br>
        
    </div>
    
    
</div>