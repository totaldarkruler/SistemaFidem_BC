<script>
    function mostrarDialogoTipoProyecto(proyecto_id, proyecto_tipo){
        $("#dialogo-editar-tipo-proyecto > form").html("");
        $("#dialogo-editar-tipo-proyecto > form").append("<input name='id' type='hidden'  value='" + proyecto_id + "' />");
        $("#dialogo-editar-tipo-proyecto > form").append("<input name='tipo' type='text'  value='" + proyecto_tipo + "' />");
        $("#dialogo-editar-tipo-proyecto > form").append("<input type='submit' value='Guardar' />");
        $("#transparencia").fadeIn(function(){
            $("#dialogo-editar-tipo-proyecto").fadeIn();
        });
        
    }
    
     function mostrarDialogoTipoEstudio(tipo_estudio_id, tipo_estudio_tipo){
        $("#dialogo-editar-tipo-estudio > form").html("");
        $("#dialogo-editar-tipo-estudio > form").append("<input name='id' type='hidden'  value='" + tipo_estudio_id + "' />");
        $("#dialogo-editar-tipo-estudio > form").append("<input name='tipo' type='text'  value='" + tipo_estudio_tipo + "' />");
        $("#dialogo-editar-tipo-estudio > form").append("<input type='submit' value='Guardar' />");
        $("#transparencia").fadeIn(function(){
            $("#dialogo-editar-tipo-estudio").fadeIn();
        });
    }

</script>

<div id="transparencia">s</div>
<div id="dialogo-editar-tipo-proyecto" class="dialogo">
    <form action="/tipo_proyecto/editar" method="post">

    </form>
</div>

<div id="dialogo-editar-tipo-estudio" class="dialogo">
    <form action="/tipo_estudio/editar" method="post">

    </form>
</div>
<div id="mantenimientos">
    <div class="subopcion">
        <span>CALENDARIO DE SESIONES</span>

        <div class="formulario">
            <form action="/calendario/nuevo" method="post" enctype='multipart/form-data'>  
                <label class="inline">Adjuntar archivo:</label>
                <input type="file" name="documento" class="inline">

                <div class="botones">
                    <input type="submit" value="Subir Documento" class="liga inline subir-documento">
                </div>
            </form>           
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Ruta</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (@$sesiones->num_rows() > 0) : ?>
                    <?php foreach ($sesiones->result() as $sesion) : ?>
                    <tr>
                        <td><?php echo $sesion->documento; ?></td>
                        <td><?php echo $sesion->ruta; ?></td>
                        <td><a href="<?php echo base_url(). 'calendario/eliminar/'. $sesion->id ?>">Eliminar</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="subopcion">
        <span>REGLAS DE OPERACION</span>

        <div class="formulario">
            <form action="/reglas_operacion/nuevo" method="post" enctype='multipart/form-data'>  
                <label class="inline">Adjuntar archivo:</label>
                <input type="file" name="documento" class="inline">

                <div class="botones">
                    <input type="submit" value="Subir Documento" class="liga inline subir-documento">
                </div>
            </form>           
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Ruta</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (@$reglas->num_rows() > 0) : ?>
                    <?php foreach ($reglas->result() as $regla) : ?>
                    <tr>
                        <td><?php echo $regla->documento; ?></td>
                        <td><?php echo $regla->ruta; ?></td>
                        <td><a href="<?php echo base_url(). 'reglas_operacion/eliminar/'. $regla->id ?>">Eliminar</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="subopcion">
        <span>TIPOS DE PROYECTOS</span>

        <div class="formulario">
            <form action="/tipo_proyecto/nuevo" method="post">  
                <div class="seccion-formulario"> 
                    <div class="campo">
                        <label for="tipo_proyecto" class="columna_3">Nombre del Tipo de Proyecto:</label>
                        <input type="text" name="tipo_proyecto" class="columna_6" />
                    </div>                    
                </div>
                <div class="botones">
                    <input type="submit" value="Agregar" class="liga inline subir-documento">
                </div>
            </form> 
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Tipo de Proyecto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (@$tipos_proyecto->num_rows() > 0) : ?>
                    <?php foreach ($tipos_proyecto->result() as $tipo_proyecto) : ?>
                    <tr>
                        <td><?php echo $tipo_proyecto->tipo; ?></td>
                        <td>
                            <a href="<?php echo base_url(). 'tipo_proyecto/eliminar/'. $tipo_proyecto->id ?>">Eliminar</a>
                            <a class="lnkEditarTipoProyecto" href="#" onclick="javascript: mostrarDialogoTipoProyecto('<?php echo $tipo_proyecto->id; ?>',' <?php echo $tipo_proyecto->tipo; ?>'); return false;">Editar</a>                            
                        </td>


                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="subopcion">
        <span>TIPOS DE ESTUDIOS</span>

        <div class="formulario">
            <form action="/tipo_estudio/nuevo" method="post">  
                <div class="seccion-formulario"> 
                    <div class="campo">
                        <label for="tipo_estudio" class="columna_3">Nombre del Tipo de Estudio:</label>
                        <input type="text" name="tipo_estudio" class="columna_6" />
                    </div>                    
                </div>
                <div class="botones">
                    <input type="submit" value="Agregar" class="liga inline subir-documento">
                </div>
            </form> 
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Tipo de Estudio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (@$tipos_estudio->num_rows() > 0) : ?>
                    <?php foreach ($tipos_estudio->result() as $tipo_estudio) : ?>
                    <tr>
                        <td><?php echo $tipo_estudio->tipo; ?></td>
                        <td>
                            <a href="<?php echo base_url(). 'tipo_estudio/eliminar/'. $tipo_estudio->id ?>">Eliminar</a>
                              <a href="#" onclick="javascript: mostrarDialogoTipoEstudio('<?php echo $tipo_estudio->id; ?>',' <?php echo $tipo_estudio->tipo; ?>'); return false;">Editar</a>       
                        </td>                       
                    </tr>
                    <?php endforeach; ?>                   
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="subopcion">
        <span>FIRMAS ORGANISMO INTERMEDIO</span>

        <div class="formulario">
            <form action="/firma/actualizarFirmas" method="post">  
                <div class="seccion-formulario"> 
                    <div class="campo">
                        <label for="nombre" class="columna_3">Nombre:</label>
                        <input type="text" name="nombre" class="columna_6" value="<?php echo $firmas[0][0]; ?>" />
                    </div>    
                    <div class="campo">
                        <label for="puesto" class="columna_3">Puesto:</label>
                        <input type="text" name="puesto" class="columna_6" value="<?php echo $firmas[0][1]; ?>" />
                    </div>    
                    <br>
                    <div class="campo">
                        <label for="nombre2" class="columna_3">Nombre:</label>
                        <input type="text" name="nombre2" class="columna_6" value="<?php echo $firmas[1][0]; ?>" />
                    </div>    
                    <div class="campo">
                        <label for="puesto2" class="columna_3">Puesto:</label>
                        <input type="text" name="puesto2" class="columna_6" value="<?php echo $firmas[1][1]; ?>" />
                    </div>    
                </div>
                <div class="columna_9">
                    <div class="alinear-derecha">
                        <input type="submit" value="Guardar">
                    </div>
                </div>
            </form> 
        </div>


    </div>


</div>