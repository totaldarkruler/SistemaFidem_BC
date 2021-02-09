
<div id="transparencia">
    simonaaaa
</div>

<div id="contenedor-cedula" class="contenido-pagina">
    <div id="titulos">
        <div id="titulo-administrador">
            <div class="cuadro-titulo-anaranjado">
                Administrador de Proyectos
            </div>
            <img src="/imagenes/triangulo-cafe.png">
            <!-- <a href="<?php echo base_url() . "panel_control/mostrarPresentacionProyectos" ?>" class="atras">Atras</a> -->
            <a href="javascript: history.back(-1);" class="atras">Atrás</a>
        </div>      
    </div>
</div>

<div id="cedula">   
<form id="forma-desbloquear-puntos" action="/cedula_administrador/desbloquear" method="post">
    <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
    <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
    <input type="hidden" name="folio_proyecto" value="<?php echo $proyecto->folio; ?>">
    <nav id="submenu-cedula-administrador">
        <a href="#seccion-0">DOCUMENTOS ADJUNTOS</a> 
        <a href="#seccion-1">I.- REGISTRO DEL PROYECTO</a>
        <a href="#seccion-2">II.- ORGANISMO EJECUTOR DEL PROYECTO</a>
       <div class="contenedor-submenu-opcion"> <a href="#seccion-3">III.- NOMBRE DEL PROYECTO</a> <div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_3" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_3 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
       <div class="contenedor-submenu-opcion"><a href="#seccion-4">IV.- APOYO SOLICITADO FIDEM</a><div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_4" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_4 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
        <div class="contenedor-submenu-opcion"><a href="#seccion-5">V.- TIEMPO ESTIMADO</a><div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_5" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_5 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
        <a href="#seccion-6">VI.- VISTO BUENO</a>
        <div class="contenedor-submenu-opcion"><a href="#seccion-7">VII.- OBJETIVOS DEL PROYECTO</a><div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_7" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_7 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
        <div class="contenedor-submenu-opcion"><a href="#seccion-8">VIII.- ANTECEDENTES</a><div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_8" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_8 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
        <div class="contenedor-submenu-opcion"><a href="#seccion-9">IX.- ALCANCE, IMPACTO Y BENF.</a><div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_9" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_9 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
        <div class="contenedor-submenu-opcion"><a href="#seccion-10">X.- ACTIVIDADES, INFORMES...</a><div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_10" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_10 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
        <div class="contenedor-submenu-opcion"><a href="#seccion-11">XI.- ANEXOS</a><div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_11" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_11 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
        <div class="contenedor-submenu-opcion"><a href="#seccion-12">XII.- INTEGRACIÓN DEL VALOR</a><div class="contenedor-desbloquear-opcion"><input type="checkbox" name="punto_12" <?php if($puntos_desbloqueo != null) : ?><?php if($puntos_desbloqueo->punto_12 == 1) : ?>checked<?php endif; ?><?php endif; ?>><img src="/imagenes/desbloquear.png" width="14" height="14"></div></div>
        <a href="#seccion-13">XIII.- AUTORIZACIÓN</a>
    </nav>
</form>

    <div id="opcion">
        <div id="opciones-extras">
            <div id="opciones">
                <?php if($deshabilitar == 1) : ?>
                    <div class="deshabilitar">
                       
                <?php endif; ?>
                <a id="lnkGuardarCedulaAdministrador" href="#" class="guardar"><img src="/imagenes/guardar.png" width="30" height="30"></a>
                <a id="lnkImprimirCedulaAdministrador" href="#" class="imprimir"><img src="/imagenes/imprimir.png" width="30" height="30"></a> 
                <a id="lnkDesbloquearPuntosCedulaAdministrador" href="#" class="desbloquear"><img src="/imagenes/desbloquear.png" width="30" height="30"></a> 
                <?php if($deshabilitar == 1) : ?>
                     </div>
                <?php endif; ?>
            </div>
            <?php if($proyecto->fecha_envio_cedula != null) : ?>
            <div id="acuse-recibo">
                <span>ACUSE DE RECIBO</span>
                <span>Fecha y Hora de Recepción:</span>
                <span><?php echo @date("d/m/Y h:i A", strtotime($proyecto->fecha_envio_cedula)); ?></span>
            </div>
            <?php endif; ?>
        </div>

        <form id="forma-imprimir-cedula" action="/cedula/imprimir" method="post">  
            <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
        </form>

                <!-- <?php echo $proyecto->folio; ?> -->
        <div id="informacion-folio-cedula">
            <span>Folio Organismo Intermedio</span>
            <span><?php echo $proyecto->folio; ?></span>
        </div>

        <div id="documentos-anexos">
            <div>
                <span>TÉRMINOS DE REFERENCIA</span>
                <table>
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($documentos_terminos_referencia != null) : ?>
                        <?php foreach ($documentos_terminos_referencia->result() as $documento_terminos_referencia) : ?>
                        <tr>
                            <td><?php echo $documento_terminos_referencia->documento; ?></td>
                            <td><a href="<?php echo $documento_terminos_referencia->ruta . $documento_terminos_referencia->documento ?>" target="_target">Descargar</a></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div>
                <span>ESTUDIOS REALIZADOS</span>
                <table>
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Tipo de Estudio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($documentos_estudios != null) : ?>
                            <?php if($proyecto->no_requiere_estudio != 1) : ?>
                                <?php foreach ($documentos_estudios->result() as $documento_estudio) : ?>
                                <tr>
                                    <td><?php echo $documento_estudio->documento; ?></td>
                                    <td><?php echo $documento_estudio->tipo; ?></td>                            
                                    <td><a href="<?php echo $documento_estudio->ruta . $documento_estudio->documento ?>" target="_target">Descargar</a></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div>
                <span>ANEXOS DEPENDENCIAS DE GOBIERNO</span>
                <table>
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th></th>
                        </tr>                        
                    </thead>
                    <tbody>
                        <?php if($documentos_anexos_gobierno != null) : ?>
                        <?php foreach ($documentos_anexos_gobierno->result() as $documento_anexo_gobierno) : ?>
                        <tr>
                            <td><?php echo $documento_anexo_gobierno->documento; ?></td>                           
                            <td><a href="<?php echo $documento_anexo_gobierno->ruta . $documento_anexo_gobierno->documento; ?>" target="_target">Descargar</a></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>


        </div>

        <div>
            <form id="forma-cedula-administrador" action="/cedula_administrador/actualizar" method="post">  
                <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
                <input type="hidden" name="folio_proyecto" value="<?php echo $proyecto->folio; ?>">
                <input type="hidden" name="contrasenia" value="<?php echo $proyecto->clave; ?>">

                <div id="seccion-1" class="seccion-cedula">
                    <div class="texto-apartado">
                        <span>APARTADO I.</span> <span>REGISTRO DEL PROYECTO:</span> (Uso exclusivo organismo intermedio)
                    </div>
                    <span>i.- registro del proyecto</span>

                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Clave del Proyecto</th>
                                    <th>Fecha de Recepción</th>
                                    <th>Area de Influencia</th>
                                    <th>Linea Estratégica del PED</th>
                                    <th>Fecha de Reunión</th>
                                    <th>No. Reunión</th>                            
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="clave_proyecto" value="<?php echo $proyecto->clave_proyecto; ?>"></td>
                                    <?php if ($proyecto->fecha_recepcion == "" || $proyecto->fecha_recepcion == "1969-12-31 00:00:00") : ?>
                                    <td><input type="text" name="fecha_recepcion" value="" class="alinear-centro" data-fecha></td>
                                    <?php else : ?>
                                    <td><input type="text" name="fecha_recepcion" value="<?php echo substr($proyecto->fecha_recepcion, 0, -9); ?>" class="alinear-centro" data-fecha></td>
                                    <?php endif; ?>

                                    <td><input type="text" name="area_influencia" value="<?php echo $proyecto->area_influencia; ?>"></td>
                                    <td><input type="text" name="linea_estrategica" value="<?php echo $proyecto->linea_estrategica; ?>"></td>

                                    <?php if ($proyecto->fecha_reunion == "" ||  $proyecto->fecha_reunion == "1969-12-31 00:00:00") : ?>
                                    <td><input type="text" name="fecha_reunion" value="" class="alinear-centro" data-fecha></td>
                                    <?php else : ?>
                                    <td><input type="text" name="fecha_reunion" value="<?php echo substr($proyecto->fecha_reunion, 0, -9); ?>" class="alinear-centro" data-fecha></td>
                                    <?php endif; ?>

                                    <td><input type="text" name="no_reunion" value="<?php echo $proyecto->no_reunion; ?>" class="alinear-centro"></td>
                                </tr>                       
                            </tbody>
                        </table>
                    </div>
                <!--/div-->
                    <br>
                <div>
                <table>
                    <tbody>
                        <tr>
                            <th>Ciudad:</th>                            
                            <td>
                             <select id="ciudad_id" name="ciudad_id">
                                            <?php foreach(@$ciudad->result() as $ciudad) : ?>
                                                <?php if ($proyecto->ciudadid == $ciudad->id ) : ?>
                                                    <option selected value="<?php echo $ciudad->id; ?>" ><?php echo $ciudad->ciudad; ?></option>
                                                <?php else : ?>
                                                    <option value="<?php echo $ciudad->id; ?>" ><?php echo $ciudad->ciudad; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                             </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                </div>
            </form>
        </div>

        <div id="seccion-1-5" class="seccion-cedula">            
            <div>
                <table>
                    <tbody>
                        <tr>
                            <th>Organismo Intermedio:</th>                            
                            <td>CONSEJO DE DESARROLLO ECONOMICO DE MEXICALI, A.C.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div id="seccion-2" class="seccion-cedula">
            <div class="texto-apartado">
                <span>APARTADO II.</span> <span>SOLICITANTE:</span> (Organismo responsable de la ejecución y presentación del informe de resultado)
            </div>
            <span>ii.- organismo ejecutor del proyecto</span>

            <div>
                <table>
                    <tbody>
                        <tr>
                            <th>Solicitante:</th>
                            <td><input type="text" value="<?php echo $institucion->nombre; ?>" readonly="readonly"></td>
                        </tr>
                        <tr>
                            <th>Reprentante:</th>
                            <td><input type="text" value="<?php echo $institucion->representante; ?>" readonly="readonly"></td>
                        </tr>
                        <tr>
                            <th>Cargo del Reprentante:</th>
                            <td><input type="text" value="<?php echo $institucion->cargo; ?>" readonly="readonly"></td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td><input type="text" value="<?php echo $institucion->direccion; ?>" readonly="readonly"></td>
                        </tr>
                        <tr>
                            <th>Teléfono(s) de Contacto:</th>
                            <td><input type="text" value="<?php echo $institucion->telefono; ?>" readonly="readonly"></td>
                        </tr>
                        <tr>
                            <th>Correo:</th>
                            <td><input type="text" value="<?php echo $institucion->correo; ?>" readonly="readonly"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="seccion-3" class="seccion-cedula">
            <div class="texto-apartado">
                <span>APARTADO III.</span> <span>NOMBRE DEL PROYECTO:</span> (Especifique un nombre breve que identifique con precisión el proyecto)                
            </div>
            <span>iii.- nombre del proyecto</span>

            <div>
                <table>
                    <thead></thead>
                    <tbody>
                        <tr>
                            <th>Nombre:</th>
                            <td><input type="text" name="proyecto" value="<?php echo $proyecto->proyecto; ?>" readonly="readonly"></td>
                        </tr>
                        <tr>
                            <th>Tipo de Proyecto:</th>
                            <td><input type="text" name="id_tipo_proyecto" value="<?php echo $proyecto->tipo_proyecto; ?>" readonly="readonly"></td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
        </div>

        <div id="seccion-4" class="seccion-cedula">
            <div class="texto-apartado">
                <span>APARTADO IV.</span> <span>APOYO SOLICITANTE A FIDEM:</span> (Monto solicitado al FIDEM para el proyecto, cifras en Moneda Nacional)
            </div>
            <span class="inline">iv.- apoyo solicitado a fidem</span>
            <span class="inline">(Monto con número y letra)</span>

            <div>
                <table>
                    <thead></thead>
                    <tbody>
                        <tr>
                            <th>Cantidad:</th>
                            <td style="width: 750px !important"><input id="txtSeccion4CostoTotal" type="text" name="apoyo_fidem_solicitado" class="moneda" value="<?php echo $proyecto->apoyo_fidem_solicitado; ?>" data-moneda></td>  
                        </tr>
                        <tr>
                            <th>Cantidad con Letra:</th>
                            <td><input type="text" name="cantidad_letra" class="moneda-letra" value="<?php echo $proyecto->cantidad_letra; ?>" readonly="readonly"></td>
                        </tr>                      
                    </tbody>
                </table>
            </div>
        </div>

        <div id="seccion-5" class="seccion-cedula">
            <div class="texto-apartado">
                <span>APARTADO V.</span> <span>TIEMPO ESTIMADO PARA LA REALIZACIÓN DEL PROYECTO:</span> (Tiempo en el que se estima concluir el proyecto presentando el informe final)
            </div>
            <span>v.- tiempo estimado para la realización del proyecto</span>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Fecha de Inicio</th>
                            <th>Fecha Final</th>
                            <th>Tiempo Total Estimado de Ejecución</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if ($proyecto->fecha_inicio  == "" || $proyecto->fecha_inicio == "1969-12-31 00:00:00") : ?>
                            <td><input type="text" value="" class="alinear-centro" readonly="readonly"></td>
                            <?php else : ?>
                            <td class="alinear-centro"><?php echo @date("m/Y", strtotime($proyecto->fecha_inicio)); ?></td>
                            <?php endif; ?>

                            <?php if ($proyecto->fecha_fin == "" || $proyecto->fecha_fin == "1969-12-31 00:00:00") : ?>
                            <td><input type="text" value="" class="alinear-centro" readonly="readonly"></td>
                            <?php else : ?>
                            <td class="alinear-centro"><?php echo @date("m/Y", strtotime($proyecto->fecha_fin)); ?></td>
                            <?php endif; ?>


                            <td class="alinear-centro"><?php echo $proyecto->dias_letra; ?></td>
                        </tr>                      
                    </tbody>
                </table>
            </div>
        </div>

        <div id="seccion-6" class="seccion-cedula">
            <div class="texto-apartado">
                <span>APARTADO VI.</span> <span>VISTO BUENO PARA LA PRESENTACIÓN DEL PROYECTO:</span> (Uso exclusivo Organismo Intermedio)

            </div>
            <span>vi.- visto bueno para la presentación</span>

        </div>

        <div id="seccion-7" class="seccion-cedula">
            <!--
<div class="texto-apartado">
<span>APARTADO VII.</span> <span>OBJETIVOS DEL PROYECTO:</span> 
</div>
-->
            <span>vii.- objetivos del proyecto</span>

            <div>
                <table>
                    <thead>
                        <th>Objetivo General (Describa con claridad la finalidad del proyecto. ¿Qué se pretende lograr? En la medida de lo posible, establecer un objetivo que se pueda cuantificar).</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="ob_general" readonly="readonly"><?php echo $proyecto->ob_general; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table>
                    <thead>
                        <th>Objetivos Especifícos (Describa los objetivos que se pretende alcanzar con la operación del proyecto).</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="ob_especifico" readonly="readonly"><?php echo $proyecto->ob_especifico; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="seccion-8" class="seccion-cedula">
            <!--
<div class="texto-apartado">
<span>APARTADO VIII.</span> <span>ANTECEDENTES QUE JUSTIFICAN EL PROYECTO</span>
</div>
-->
            <span>viii.- antecedentes que justifiquen proyecto</span>

            <div>
                <table>
                    <thead>
                        <th>Sintesis de los antecedentes económicos, sociales, educativos, tecnologicos, etcétera, que originan la necesidad del proyecto</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="antecedentes" readonly="readonly"><?php echo $proyecto->antecedentes; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table>
                    <thead>
                        <th>Sintesis de la problemática que aborda el proyecto</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="problematica" readonly="readonly"><?php echo $proyecto->problematica; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table>
                    <thead>
                        <th>&iquest;Como contribuirá el proyecto a la solución de la problemática?</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="solucion" readonly="readonly"><?php echo $proyecto->solucion; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="seccion-9" class="seccion-cedula">
            <!-- 
<div class="texto-apartado">
<span>APARTADO IX.</span> <span>ALCANCE, IMPACTO Y BENEFICIOS ESPERADOS DEL PROYECTO:</span> 
</div>
-->
            <span>ix.- alcance, impacto y beneficios</span>

            <div>
                <table>
                    <thead>
                        <th>Alcance del Proyecto</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="alcance" readonly="readonly"><?php echo $proyecto->alcance; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table>
                    <thead>
                        <th>Impacto y beneficio cualitativo del proyecto</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea name="impacto" readonly="readonly"><?php echo $proyecto->impacto; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="seccion-10" class="seccion-cedula">
            <!--   
<div class="texto-apartado">
<span>APARTADO X.</span> <span>ACTIVIDADES, INFORMES Y ENTREGABLES:</span> 
</div>
-->
            <span>x.- actividades, informes y entregables</span>

            <div>
                <div class="subtitulo">
                    <img src="/imagenes/cronograma.png">
                    <span>CRONOGRAMA DE ACTIVIDADES</span>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="14">Tiempos de Ejecución</th>
                                <th></th>
                            </tr>
                            <?php if($actividad_titulos != null) : ?>
                            <tr>
                                <th>No.</th>
                                <th>Actividad</th>
                                <?php foreach($actividad_titulos->result() as $actividad_titulo) : ?>
                                <th><input type="text" name="actividad_titulo1" value="<?php echo $actividad_titulo->titulo_col1; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo2" value="<?php echo $actividad_titulo->titulo_col2; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo3" value="<?php echo $actividad_titulo->titulo_col3; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo4" value="<?php echo $actividad_titulo->titulo_col4; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo5" value="<?php echo $actividad_titulo->titulo_col5; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo6" value="<?php echo $actividad_titulo->titulo_col6; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo7" value="<?php echo $actividad_titulo->titulo_col7; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo8" value="<?php echo $actividad_titulo->titulo_col8; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo9" value="<?php echo $actividad_titulo->titulo_col9; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo10" value="<?php echo $actividad_titulo->titulo_col10; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo11" value="<?php echo $actividad_titulo->titulo_col11; ?>" readonly="readonly"></th>
                                <th><input type="text" name="actividad_titulo12" value="<?php echo $actividad_titulo->titulo_col12; ?>" readonly="readonly"></th>
                                <th></th>
                                <?php endforeach; ?>     

                            </tr>
                            <?php endif; ?>
                        </thead>
                        <tbody>
                            <?php $cont = 1; ?>
                            <?php if($actividades != null) : ?>
                            <?php foreach($actividades->result() as $actividad) : ?>
                            <tr>
                                <td>
                                    <?php echo $cont; ?>
                                </td>
                                <td class="alinear-izquierda">
                                    <?php echo @$actividad->actividad; ?>
                                </td>

                                <td><?php if(@$actividad->col1 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col2 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col3 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col4 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col5 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col6 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col7 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col8 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col9 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col10 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col11 != null) echo "√"; else echo ""; ?></td>
                                <td><?php if(@$actividad->col12 != null) echo "√"; else echo ""; ?></td>                            
                            </tr>
                            <?php $cont++; ?>
                            <?php endforeach; ?>  
                            <?php endif; ?>  

                        </tbody>
                    </table>
                </div>

                <div class="subtitulo">
                    <img src="/imagenes/cronograma.png">
                    <span>INFORMES (Los informes dependerán del número de ministración de recursos que el solictante requiera)</span>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                    <th>No. de Ministración</th>
                                    <th>Fecha</th>
                                    <th>Informe de avances</th>
                                    <th>% Avance</th>
                                    <th>% Ministración</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php $avance = 0; $ministracion = 0; ?>
                            <?php if($proyecto_entregables != null) : ?>                            
                            <?php foreach($proyecto_entregables->result() as $proyecto_entregable) : ?>
                            <tr>
                                <td><?php echo $proyecto_entregable->no_ministracion; ?></td>
                                    <td><?php echo $proyecto_entregable->fecha; ?></td>
                                    <td><?php echo $proyecto_entregable->descripcion; ?></td>
                                    <td><?php echo $proyecto_entregable->avance; ?></td>
                                    <?php $avance = $avance + $proyecto_entregable->avance; ?>
                                    <td><?php echo $proyecto_entregable->ministracion; ?></td>
                                    <?php $ministracion = $ministracion + $proyecto_entregable->ministracion; ?>
                                    
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo $avance; ?></td>
                                <td><?php echo $ministracion; ?></td>  
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>TOTAL DE AVANCE</td>
                                <td>TOTAL DE MINISTRACIÓN</td>  
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="subtitulo">
                    <img src="/imagenes/cronograma.png">
                    <span>ENTREGABLES (Los entregables deberán ser el producto final del proyecto)</span>
                </div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                    <th>No. de Entregable</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($proyecto_entregables2 != null) : ?>
                            <?php foreach($proyecto_entregables2->result() as $proyecto_entregable2) : ?>
                            <tr>
                                <td><?php echo $proyecto_entregable2->no_entregable; ?></td>
                                <td><?php echo $proyecto_entregable2->fecha; ?></td>
                                <td><?php echo $proyecto_entregable2->descripcion; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="seccion-11" class="seccion-cedula">
            <div class="texto-apartado">
                <span>APARTADO XI.</span> <span>ANEXOS:</span> Indica con una X los estudios con los que se cuenta para justificar la viabilidad del proyecto
            </div>
            <span>xi.- Anexos</span>

            <div>
                <div>                   
                    <table>
                        <thead>                           
                            <tr>
                                <th>Documento</th>
                                <th>Tipo de Estudio</th>
                                <th>Ruta</th>
                                <th colspan="2">Otro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($documentos_estudios != null) : ?>
                                <?php if($proyecto->no_requiere_estudio != 1) : ?>
                                    <?php foreach($documentos_estudios->result() as $documento_estudio) : ?>
                                    <tr>
                                        <td><?php echo $documento_estudio->documento; ?></td>
                                        <td><?php echo $documento_estudio->tipo; ?></td>
                                        <td><?php echo $documento_estudio->ruta; ?></td>
                                        <td><?php echo $documento_estudio->otro_estudio; ?></td>
                                        <td>&nbsp;</td>
                                    </tr>                            
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <tr>
                                <td colspan="4">
                                    <?php if($proyecto->no_requiere_estudio == 1) : ?>
                                    <span><strong>No se requiere estudio</strong></span> <br><br>
                                    <?php endif; ?>

                                    <span>Justificar porque no requiere estudios:</span>
                                    <input type="text" id="seccion-11-justificacion" name="seccion-11-justificacion" disabled="disabled"  value="<?php echo $proyecto->justificar_otro_estudio; ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="seccion-12" class="seccion-cedula">
            <!--
<div class="texto-apartado">
<span>APARTADO XII.</span> <span>INTEGRACIÓN DEL VALOR ESTIMADO DEL PROYECTO</span> 
</div>
-->
            <span>xii.- Integración del valor estimado del proyecto</span>

            <div>
                <table>
                    <tbody>
                        <tr>
                            <th colspan="3" class="alinear-izquierda">Costo total del Proyecto (solicitado a FIDEM más Otros Apoyos)</th>
                            <th></th>
                                <th class="alinear-centro" data-moneda><?php echo $proyecto->costo_total; ?></th>
                                <!--<th>%</th>-->
                                <th>100%</th>
                                <!--<td class="alinear-centro" data-moneda><?php echo $proyecto->costo_total; ?></td>-->
                                <th></th>
                        </tr>
                        <tr>
                                <th colspan="3" class="alinear-izquierda">Aplicación de recursos solicitados a FIDEM (Partidas acorde al manual de comprobación de recursos) </th>
                                <th></th>
                                <!--<th>%</th>-->
                                <th class="alinear-centro" data-moneda><?php echo $proyecto->apoyo_fidem_solicitado; ?></th>
                                <th class="alinear-centro"><?php echo $proyecto->apoyo_fidem_porcentaje . '%'; ?></th>
                                <th></th>
                        </tr>
                        <tr>
                                <td colspan="3" class="alinear-centro"><strong>Aplicación</strong></td>
                                <td colspan="2" class="alinear-centro"><strong>Monto</strong></td>
                                <td class="alinear-centro"><strong>%</strong></td> 
                                <td></td>                            
                        </tr>

                        <?php if($proyecto_costos != null) : ?>
                        <?php $cont = 1; ?>
                        <?php foreach($proyecto_costos->result() as $proyecto_costo) : ?>
                        <tr>
                            <td class="alinear-centro"><?php echo $cont . '.'; ?></td>
                            <td colspan="2" class="alinear-izquierda"><?php echo $proyecto_costo->aplicacion; ?></td>
                            <td colspan="2" class="alinear-centro" data-moneda><?php echo $proyecto_costo->monto; ?></td>
                            <td class="alinear-centro"><?php echo $proyecto_costo->porcentaje; ?></td>
                        </tr>
                        <?php $cont++; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                                <th colspan="3" class="alinear-izquierda">Otros Apoyos</th>
                                <!--<th>%</th>-->
                                <th></th>
                                <th class="alinear-centro"><span data-moneda><?php echo $proyecto->otro_apoyo; ?></span></th>
                                <th class="alinear-centro"><?php echo $proyecto->otro_apoyo_porcentaje . '%'; ?></th>
                                <th></th>
                        </tr>
                        
                        <tr>
                                <td colspan="2" class="alinear-centro"><strong>Otros Apoyos</strong></td>
                                <td class="alinear-centro"><strong>Aplicación</strong></td>
                                <td colspan="2" class="alinear-centro"><strong>Monto</strong></td>   
                                <td class="alinear-centro"><strong>%</strong></td>
                                <td></td>
                            </tr>
                        

                        <?php if($proyecto_otros_apoyos != null) : ?>
                        <?php $cont = 1; ?>
                        <?php foreach($proyecto_otros_apoyos->result() as $proyecto_otro_apoyo) : ?>
                        <tr>
                                <td class="alinear-centro"><?php echo $cont . '.'; ?></td>
                                <td class="alinear-izquierda"><?php echo $proyecto_otro_apoyo->origen; ?></td>
                                <td class="alinear-izquierda"><?php echo $proyecto_otro_apoyo->aplicacion; ?></td>
                                <td colspan="2" class="alinear-centro" data-moneda><?php echo $proyecto_otro_apoyo->monto; ?></td>   
                                <td class="alinear-centro"><?php echo $proyecto_otro_apoyo->porcentaje; ?></td>
                        </tr> 
                        <?php $cont++; ?>
                        <?php endforeach; ?>  
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div id="seccion-13" class="seccion-cedula">
            <!-- 
<div class="texto-apartado">
<span>APARTADO XIII.</span> <span>AUTORIZACIÓN DEL PROYECTO:</span>
</div>
-->
            <span>viii.- autorización</span>               
        </div>

    </div>

</div>








<?php
$this->load->view('estructura/pie.php');   
?>