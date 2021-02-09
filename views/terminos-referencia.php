<div id="terminos-referencia" class="contenido-pagina">
    <div class="cuadro-titulo-amarillo">
        Términos de Referencia  
    </div>
    <img src="/imagenes/triangulo-cafe.png">
    <a href="<?php echo base_url(); ?>" class="atras">Atrás</a>

    <div class="container_12">
        <div id="formulario-terminos-referencia" class="formulario">
            <form action="<?php echo base_url(); ?>terminos_referencia/nuevo" method="post" enctype='multipart/form-data'> 
                <div class="seccion-formulario"> 
                    <div class="grid_12">
                        <span class="titulo-formulario">Enviar Términos de Referencia</span>

                        <p class="instrucciones">Los términos de referencia serán enviados al organismo intermediario para su revisión, el sistema le proporcionará un número de folio y contraseña para que pueda realizar el llenado de la cédula</p>
                    </div>
                </div>

                <div class="seccion-formulario"> 
                    <span class="titulo">Proyecto</span>

                    <div class="grid_12">
                        <label for="nombre_proyecto" class="grid_2 alpha omega">Nombre del Proyecto:</label>
                        <input type="text" name="nombre_proyecto" class="grid_10 alpha omega" data-requerido />
                    </div>
                </div>

                <div class="seccion-formulario">
                    <span class="titulo">Datos del Solicitante</span>

                    <div class="grid_12">
                        <label for="solicitante" class="grid_2 alpha omega">Solicitante:</label>
                        <?php if (@$instituciones != null) : ?>
                        <select id="id-institucion" class="grid_10 alpha omega" name="id_institucion" data-requerido>
                            <?php foreach ($instituciones->result() as $institucion) : ?>
                            <option value="<?php echo $institucion->id; ?>"><?php echo $institucion->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php endif; ?>
                    </div>
                    <div class="grid_12">
                        <label for="direccion" class="grid_2 alpha omega">Dirección:</label>
                        <input id="direccion-institucion" type="text" name="direccion" class="grid_10 alpha omega" value="" data-requerido />
                    </div>
                </div>

                <div class="seccion-formulario">
                    <div class="grid_12">
                        <div class="grid_5 alpha omega push_7 alinear-derecha">
                            <a id="lnkSolicitudRegistro" class="boton" href="<?php echo base_url(); ?>terminos_referencia/registro">Solicitud de Registro o Cambio de Datos</a>
                        </div>
                    </div>
                </div>

                <div class="seccion-formulario">
                    <span class="titulo">Términos de Referencia</span>

                    <div class="grid_12">                   
                        <label class="grid_2 alpha omega">Adjuntar Archivo:</label>
                        <input type="file" name="archivo" class="grid_10 alpha omega requerido" data-requerido />
                    </div>
                </div>
                
                <input type='hidden' name='documento[]'  /> 
<!--
                <div class="seccion-formulario">                
                    <span class="titulo inline">Otros documentos</span>
                    <span class="instrucciones-seccion-formulario inline">(Exclusivo para dependencias de gobierno)</span>
                    <!--
<div class="grid_12">
<a id="lnkAgregarOtroDocumento" href="#">Agregar</a>         
</div>

                    <div id="otros-documentos">
                        <div class='grid_12'>
                            <div class='grid_7 alpha'>
                                <label class='grid_2 alpha omega'>Adjuntar Archivo:</label>
                                <input type='file' name='documento[]' class='grid_5 alpha omega' />                                                           
                            </div>
                            <div class='grid_2'>
                                <a href="#" class="lnkAgregarOtroDocumento">Agregar otro</a>                              
                            </div>
                            <div class='grid_3 omega'>                                  
                                <a href="#" class="lnkEliminarDocumentoActual">Eliminar este archivo</a>  
                            </div>
                        </div>
                    </div>

                </div>
-->
                <div class="seccion-formulario">
                    <span class="titulo inline">Correo</span>
                    <span class="instrucciones-seccion-formulario inline">Proporcione un correo donde quiera que le enviemos su usuario y contraseña</span>


                    <div class="grid_12">
                        <label for="correo_electronico" class="grid_2 alpha omega">Correo Electrónico:</label>
                        <input type="text" name="correo_electronico" class="grid_10 alpha omega" data-requerido />
                    </div>
                </div>
                
                 <div class="seccion-formulario">
                    <div class="grid_12">
                        <input id="chkEntendidoReglas" type="checkbox"> He leído y entendido las Reglas de Operación y el Manual de Procedimientos para la Rendición de Cuentas de Proyectos del FIDEM
                    </div>
                </div>

                <div class="seccion-formulario">
                    <div class="grid_12 centrado">
                        <input id="btnEnviarFormularioTerminosReferencia" type="submit" value="Enviar" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>