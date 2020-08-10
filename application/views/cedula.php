<div id="transparencia">
    transparencia
</div>

<?php if($proyecto->fecha_envio_cedula != null) : ?>
<div id="transparencia-bloqueo">
    bloqueo
</div>
<?php endif; ?>

<div id="dialogo-nuevo-costo-proyecto" class="dialogo">
    <form action="/cedula/nuevoProyectoCosto" method="post">  
        <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
        <label>Aplicacion</label>
        <input type="text" name="aplicacion">
        <label>Monto</label>
        <input type="text" name="monto">
        <label>Porcentaje %</label>
        <input type="text" name="porcentaje">
        <input type="submit" value="Guardar">
    </form>
</div>

<div id="dialogo-nuevo-apoyo" class="dialogo">
    <form action="/cedula/nuevoOtroApoyo" method="post">  
        <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
        <label>Origen</label>
        <input type="text" name="origen">
        <label>Aplicacion</label>
        <input type="text" name="aplicacion">
        <label>Monto</label>
        <input type="text" name="monto">
        <label>Porcentaje %</label>
        <input type="text" name="porcentaje">
        <input type="submit" value="Guardar">
    </form>
</div>

<div id="dialogo-nuevo-entregable" class="dialogo">
    <form action="/cedula/nuevoEntregable" method="post">  
        <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
        <label>No. Ministración </label>
        <input type="text" name="fecha_entregable">
        <label>Fecha</label>
        <br>
        <input type="date" name="fecha">
        <br>
        <label>Informe de avances</label>
        <input type="text" name="descripcion">
        <label>% Avance</label>
        <input type="text" name="avance">
        <label>% Ministración</label>
        <input type="text" name="ministracion">
        <input type="submit" value="Guardar">
    </form>
</div>

<div id="dialogo-nuevo-entregable2" class="dialogo">
    <form action="/cedula/nuevoEntregable2" method="post">  
        <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
        <label>No. de Entregable</label>
        <input type="text" name="numero_entregable">
        <label>Fecha</label>
        <br>
        <input type="date" name="fecha">
        <br>
        <label>Descripción</label>
        <input type="text" name="descripcion">

        <input type="submit" value="Guardar">
    </form>
</div>


<div id="dialogo-enviar-cedula" class="dialogo">
    <a href="#" class="cerrar-dialogo">X</a>
    <div class="cuadro-titulo-verde">
        Cedula para la presentación y aprobación de proyectos. 
    </div>
    <img src="/imagenes/triangulo-verde.png" class="triangulo">

    <?php if($proyecto->fecha_envio_cedula == null) : ?>
    <div>
        <span>Enviar Cédula</span>
        <p>Una vez enviada la cédula no podrá realizar ninguna modificación.<br>¿Esta seguro de enviar la cédula?</p>
    </div>

    <div>
        <form action="/cedula/enviar" method="post">
            <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
            <input type="submit" value="SI">
            <a id="lnkCancelarEnvioCedula" href="#" class="boton">NO</a>
        </form>
    </div>

    <div>
        <p>Nota. Imprima acuse de recibo. Si no tiene acceso a una impresora, podrá imprimirla posteriormente en la sección <strong>CÉDULA</strong> en el botón imprimir</p>
    </div>
    <?php else : ?>
    <span style=" position: relative;
                 display: block;
                 font-weight: normal;
                 font-size: 26px; text-align: center;">Acuse de recibo de cédula</span>
    <br>
    <p style="    text-align: center;
              font-size: 14px;
              font-weight: normal;">El organismo intermedio de Mexicali en representación del Fideicomiso Empresarial de Baja California, le informa que su cédula para la presentación y aprobación de proyecto fue recibida con éxito</p>
    <br>
    <div>
        <span style="font-size: 15px; font-weight: bold">Nombre del Proyecto:</span>
        <span style="font-size: 22px;"><?php echo $proyecto->proyecto; ?></span>
    </div>
    <br>
    <div>
        <span style="font-size: 15px; font-weight: bold">Solicitante:</span>
        <span style="font-size: 22px;"><?php echo $institucion->nombre; ?></span>
    </div>
    <br>
    <div>
        <div>
            <span style="font-weight: bold">Folio:</span>
            <span style="font-weight: bold"><?php echo $proyecto->folio; ?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Fecha y Hora de Envío de Cédula:</span>
            <span style="font-weight: bold;"><?php echo @date("d/m/Y h:i A", strtotime($proyecto->fecha_envio_cedula)); ?></span>
        </div>
    </div>
    <br>
    <div class="alinear-centro">
        <a id="lnkCancelarEnvioCedula" href="#" class="boton">ACEPTAR</a>
    </div>
    <?php endif; ?>


</div>

<div id="dialogo-nueva-actividad" class="dialogo">
    <form action="/cedula/nuevaActividad" method="post">  
        <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
        <label>Actividad</label>
        <input type="text" name="actividad">
        <div>
            <?php if($actividad_titulos != null) : ?>
            <?php foreach($actividad_titulos->result() as $actividad_titulo) : ?>   
            <input type="checkbox" name="actividad1"><?php echo $actividad_titulo->titulo_col1; ?>
            <input type="checkbox" name="actividad2"><?php echo $actividad_titulo->titulo_col2; ?>
            <input type="checkbox" name="actividad3"> <?php echo $actividad_titulo->titulo_col3; ?>
            <input type="checkbox" name="actividad4"><?php echo $actividad_titulo->titulo_col4; ?>
            <input type="checkbox" name="actividad5"><?php echo $actividad_titulo->titulo_col5; ?>
            <input type="checkbox" name="actividad6"><?php echo $actividad_titulo->titulo_col6; ?>
            <input type="checkbox" name="actividad7"><?php echo $actividad_titulo->titulo_col7; ?>
            <input type="checkbox" name="actividad8"><?php echo $actividad_titulo->titulo_col8; ?>
            <input type="checkbox" name="actividad9"><?php echo $actividad_titulo->titulo_col9; ?>
            <input type="checkbox" name="actividad10"><?php echo $actividad_titulo->titulo_col10; ?>
            <input type="checkbox" name="actividad11"><?php echo $actividad_titulo->titulo_col11; ?>
            <input type="checkbox" name="actividad12"><?php echo $actividad_titulo->titulo_col12; ?>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <input type="submit" value="Guardar">
    </form>
</div>

<form id="forma-imprimir-cedula" action="/cedula/imprimir" method="post">  
    <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
</form>

<div id="dialogo-acuse-recibo" class="dialogo">
    <a href="#" class="cerrar-dialogo">X</a>
    <div class="cuadro-titulo-verde">
        Cedula para la presentación y aprobación de proyectos. 
    </div>

    <img src="/imagenes/triangulo-verde.png" class="triangulo">

    <div>
        <span>Acuse de Recibo de Cédula</span>
        <p>El organismo intermedio de Mexicali en representación del Fideicomiso Empresarial de Baja California, le informa que su cédula para la presentación y aprobación de proyecto fue recibida con éxito</p>
    </div>

    <div>
        <span>Nombre del Proyecto:</span>
        <span><?php echo $proyecto->proyecto; ?></span>
    </div>

    <div>
        <span>Solicitante:</span>
        <span><?php echo $institucion->nombre; ?></span>
    </div>

    <div>
        <div>
            <span>Folio:</span>
            <span><?php echo $proyecto->folio; ?></span>
        </div>
        <div>
            <span>Fecha y Hora de Recepción:</span>
            <?php if ((substr($proyecto->fecha_envio_cedula,0,-9)) != "1969-12-31") : ?>            
            <span><?php echo @date("d/m/Y h:i A", strtotime($proyecto->fecha_envio_cedula)); ?></span>
            <?php else : ?>
            <span></span>
            <?php endif; ?>
        </div>
    </div>

    <div>
        <form action="/cedula/imprimir" method="post">  
            <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
            <input type="submit" value="Imprimir">
        </form>
    </div>
</div>

<div id="contenedor-cedula" class="contenido-pagina">
    <div id="titulos">
        <div>
            <div class="cuadro-titulo-verde">
                Cedula para la presentación y aprobación de proyectos. 
            </div>
            <img src="/imagenes/triangulo-verde.png">
            <a href="<?php echo base_url(); ?>" class="atras">Atras</a>
        </div>

        <nav id="menu-cedula">
            <a id="lnkGuardarCedula" href="#" class="guardar">Guardar</a>
            <!-- <a href="#" class="editar">Editar</a> -->
            <a id="lnkAcuseRecibo" href="#" class="imprimir">Imprimir</a>
            <a id="lnkEnviarCedula" href="#" class="enviar">Enviar Cédula</a>
            <a href="<?php echo base_url(); ?>" class="salir">Salir</a>
        </nav>
    </div>

</div>

<div id="cedula">
    <nav id="submenu-cedula">
        <a href="#seccion-1" class="solo-administrador">I.- REGISTRO DEL PROYECTO</a>
        <a href="#seccion-2">II.- ORGANISMO EJECUTOR DEL PROYECTO</a>
        <a href="#seccion-3">III.- NOMBRE DEL PROYECTO</a>
        <a href="#seccion-4">IV.- APOYO SOLICITADO FIDEM</a>
        <a href="#seccion-5">V.- TIEMPO ESTIMADO</a>
        <a href="#seccion-6" class="solo-administrador">VI.- VISTO BUENO</a>
        <a href="#seccion-7">VII.- OBJETIVOS DEL PROYECTO</a>
        <a href="#seccion-8">VIII.- ANTECEDENTES</a>
        <a href="#seccion-9">IX.- ALCANCE, IMPACTO Y BENF.</a>
        <a href="#seccion-10">X.- ACTIVIDADES, INFORMES...</a>
        <a href="#seccion-11">XI.- ANEXOS</a>
        <a href="#seccion-12">XII.- INTEGRACIÓN DEL VALOR</a>
        <a href="#seccion-13" class="solo-administrador">XIII.- AUTORIZACIÓN</a>
    </nav>


    <div id="opcion">

        <?php if($proyecto->fecha_envio_cedula != null) : ?>
        <div id="acuse-recibo">
            <span>ACUSE DE RECIBO</span>
            <span>Fecha y Hora de Recepción:</span>
            <span><?php echo @date("d/m/Y h:i A", strtotime($proyecto->fecha_envio_cedula)); ?></span>
        </div>
        <?php endif; ?>


        <div id="informacion-folio-cedula">
            <span>Folio Organismo Intermedio</span>
            <span><?php echo $proyecto->folio; ?></span>
        </div>
        <form id="forma-cedula" action="/cedula/actualizar" method="post" enctype='multipart/form-data'>  
            <input type="hidden" name="id" value="<?php echo $proyecto->id; ?>">
            <input type="hidden" name="folio_proyecto" value="<?php echo $proyecto->folio; ?>">
            <input type="hidden" name="contrasenia" value="<?php echo $proyecto->clave; ?>">
            <input type="hidden" name="justificar_otro_estudio_oculto" id="justificar_otro_estudio_oculto" value="<?php echo $proyecto->justificar_otro_estudio; ?>">
            
            <!--
<div class="seccion-formulario">
<p style="position: relative; display: block; background-color: #cc3333; color: #fff; padding: 10px; height: 80px; ">
Por favor, no ingrese acentos, tildes, comillas en las cajas siguientes, ya que de lo contrario se invalidará la información. Muchas gracias por su comprensión 
</p>
</div>
-->
            <div id="seccion-1" class="seccion-cedula">
                <div class="texto-apartado">
                    <span>APARTADO I.</span> <span>REGISTRO DEL PROYECTO:</span> (Uso exclusivo organismo intermedio)
                </div>
                <span class="inline">i.- registro del proyecto</span>
                <span class="inline"><img src="/imagenes/candado-administrador.png"></span>
                <span class="inline">(Reservado para el Administrador del Sistema)</span>

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
                                <td><input type="text" value="<?php echo $proyecto->clave_proyecto; ?>" readonly="readonly"></td>
                                <?php if ($proyecto->fecha_recepcion == "" || $proyecto->fecha_recepcion == "1969-12-31 00:00:00") : ?>
                                <td><input type="text" value="" class="alinear-centro" readonly="readonly"></td>
                                <?php else : ?>
                                <td><input type="text" value="<?php echo substr($proyecto->fecha_recepcion,0,-9); ?>" class="alinear-centro" readonly="readonly"></td>
                                <?php endif; ?>
                                <td><input type="text" value="<?php echo $proyecto->area_influencia; ?>" readonly="readonly"></td>
                                <td><input type="text" value="<?php echo $proyecto->linea_estrategica; ?>" readonly="readonly"></td>
                                <?php if ($proyecto->fecha_reunion == "" || $proyecto->fecha_reunion == "1969-12-31 00:00:00") : ?>
                                <td><input type="text" value="" class="alinear-centro" readonly="readonly"></td>
                                <?php else : ?>
                                <td><input type="text" value="<?php echo substr($proyecto->fecha_reunion,0,-9); ?>" class="alinear-centro" readonly="readonly"></td>
                                <?php endif; ?>
                                <td><input type="text" value="<?php echo $proyecto->no_reunion; ?>" class="alinear-centro" readonly="readonly"></td>
                            </tr>                       
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="seccion-1-5" class="seccion-cedula">            
                <div>
                    <table>
                        <tbody>
                            <tr colspan="9">
                                <th>Organismo Intermedio:</th>
                                <!--<td><input type="text" value="MEXICALI" readonly="readonly"></td> Codigo Emanuel-->
                                <td><input type="text" value="CONSEJO DE DESARROLLO ECONOMICO DE MEXICALI, A.C" readonly="readonly"></td><!--Etiqueta value editada-->
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- if ($proyecto->fecha_recepcion == "31/12/1969") echo "" else -->
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
                                <td><input type="text" name="proyecto" value="<?php echo $proyecto->proyecto; ?>"></td>
                            </tr>
                            <tr>
                                <th>Tipo de Proyecto:</th>
                                <td>
                                    <select name="id_tipo_proyecto">
                                        <?php foreach($tipos_proyecto->result() as $tipo_proyecto) : ?>
                                        <option value="<?php echo $tipo_proyecto->id; ?>" <?php if ($proyecto->id_tipo_proyecto == $tipo_proyecto->id) echo "selected"; ?>><?php echo $tipo_proyecto->tipo; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
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
                                <td><input type="text" name="cantidad_letra" value="<?php echo $proyecto->cantidad_letra; ?>" data-requerido></td>
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
                                <?php if ($proyecto->fecha_inicio == "" || $proyecto->fecha_inicio == "1969-12-31 00:00:00") : ?>
                                <td><input id="txtFechaInicio" name="fecha_inicio" type="text" value="" class="alinear-centro" data-fecha></td>
                                <?php else : ?>
                                <td class="alinear-centro"><input id="txtFechaInicio" class="alinear-centro" type="text" name="fecha_inicio" value="<?php echo substr($proyecto->fecha_inicio, 0, -9); ?>" placeholder="dd/mm/aaaa" data-fecha></td>
                                <?php endif; ?>

                                <?php if ($proyecto->fecha_fin == "" || $proyecto->fecha_fin == "1969-12-31 00:00:00") : ?>
                                <td><input id="txtFechaFin" type="text" name="fecha_fin" value="" class="alinear-centro" data-fecha></td>
                                <?php else : ?>
                                <td class="alinear-centro"><input id="txtFechaFin"class="alinear-centro"  type="text" name="fecha_fin" value="<?php echo substr($proyecto->fecha_fin, 0, -9); ?>" placeholder="dd/mm/aaaa" data-fecha></td>
                                <?php endif; ?>
                                <td class="alinear-centro"><input id="txtPeriodoDias" name="dias_letra" type="text" value="<?php echo $proyecto->dias_letra; ?>" class="alinear-centro"></td>
                            </tr>                      
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="seccion-6" class="seccion-cedula">
                <div class="texto-apartado">
                    <span>APARTADO VI.</span> <span>VISTO BUENO PARA LA PRESENTACIÓN DEL PROYECTO:</span> (Uso exclusivo Organismo Intermedio)
                </div>
                <span class="inline">vi.- visto bueno para la presentación</span>
                <span class="inline"><img src="/imagenes/candado-administrador.png"></span>
                <span class="inline">(Reservado para el Administrador del Sistema)</span>

            </div>

            <div id="seccion-7" class="seccion-cedula">               
                <span>vii.- objetivos del proyecto</span>

                <div>
                    <table>
                        <thead>
                            <th>Objetivo General (Describa con claridad la finalidad del proyecto. ¿Qué se pretende lograr? En la medida de lo posible, establecer un objetivo que se pueda cuantificar).</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <textarea name="ob_general"><?php echo $proyecto->ob_general; ?></textarea>
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
                                    <textarea name="ob_especifico"><?php echo $proyecto->ob_especifico; ?></textarea>
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
                                    <textarea name="antecedentes"><?php echo $proyecto->antecedentes; ?></textarea>
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
                                    <textarea name="problematica"><?php echo $proyecto->problematica; ?></textarea>
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
                                    <textarea name="solucion"><?php echo $proyecto->solucion; ?></textarea>
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
                                    <textarea name="alcance"><?php echo $proyecto->alcance; ?></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <table>
                        <thead>
                            <!--<th>Impacto y beneficio cualitativo del proyecto</th>Emanuel diaz-->
                            <th>Impacto o beneficio que aportara el proyecto</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <textarea name="impacto"><?php echo $proyecto->impacto; ?></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="seccion-10" class="seccion-cedula">
                <!--   <div class="texto-apartado">
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
                                    <td colspan="" class="alinear-izquierda"><a id="lnkAgregarActividad" href="#">Agregar Actividad</a></td>
                                    <th colspan="14">Tiempos de Ejecución</th>
                                </tr>
                                <?php if($actividad_titulos != null) : ?>
                                <tr>
                                    <th>No.</th>
                                    <th>Actividad</th>
                                    <?php foreach($actividad_titulos->result() as $actividad_titulo) : ?>
                                    <th><input type="text" name="actividad_titulo1" value="<?php echo $actividad_titulo->titulo_col1; ?>"></th>
                                    <th><input type="text" name="actividad_titulo2" value="<?php echo $actividad_titulo->titulo_col2; ?>"></th>
                                    <th><input type="text" name="actividad_titulo3" value="<?php echo $actividad_titulo->titulo_col3; ?>"></th>
                                    <th><input type="text" name="actividad_titulo4" value="<?php echo $actividad_titulo->titulo_col4; ?>"></th>
                                    <th><input type="text" name="actividad_titulo5" value="<?php echo $actividad_titulo->titulo_col5; ?>"></th>
                                    <th><input type="text" name="actividad_titulo6" value="<?php echo $actividad_titulo->titulo_col6; ?>"></th>
                                    <th><input type="text" name="actividad_titulo7" value="<?php echo $actividad_titulo->titulo_col7; ?>"></th>
                                    <th><input type="text" name="actividad_titulo8" value="<?php echo $actividad_titulo->titulo_col8; ?>"></th>
                                    <th><input type="text" name="actividad_titulo9" value="<?php echo $actividad_titulo->titulo_col9; ?>"></th>
                                    <th><input type="text" name="actividad_titulo10" value="<?php echo $actividad_titulo->titulo_col10; ?>"></th>
                                    <th><input type="text" name="actividad_titulo11" value="<?php echo $actividad_titulo->titulo_col11; ?>"></th>
                                    <th><input type="text" name="actividad_titulo12" value="<?php echo $actividad_titulo->titulo_col12; ?>"></th>
                                    <tH></tH>
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
                                    <td><a href="/cedula/eliminarActividad/<?php echo $actividad->id_proyecto . "/" . $actividad->id ?>" onclick="return confirm ('¿Esta seguro de eliminar esta informacion?');">Eliminar</a></td>
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
                                    <td colspan="5" class="alinear-izquierda"><a id="lnkNuevoEntregable" href="#">Agregar Entregable</a></td>
                                </tr>
                                <tr>
                                    
                                    <th>No. de Ministración</th>
                                    <th>Fecha</th>
                                    <th>Informe de avances</th>
                                    <th>% Avance</th>
                                    <th>% Ministración</th>  
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $avance = 0; $ministracion = 0 ?>
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
                                    <td><a href="/cedula/eliminarEntregable/<?php echo $proyecto_entregable->id_proyecto . "/" . $proyecto_entregable->id ?>" onclick="return confirm ('¿Esta seguro de eliminar esta informacion?');">Eliminar</a></td>
                                </tr>
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
                                    <td colspan="3" class="alinear-izquierda"><a id="lnkNuevoEntregable2" href="#">Agregar Entregable</a></td>
                                </tr>
                                <tr>
                                    
                                    <th>No. de Entregable</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($proyecto_entregables2 != null) : ?>
                                <?php foreach($proyecto_entregables2->result() as $proyecto_entregable2) : ?>
                                <tr>
                                    <td><?php echo $proyecto_entregable2->no_entregable; ?></td>
                                    <td><?php echo $proyecto_entregable2->fecha; ?></td>
                                    
                                    <td><?php echo $proyecto_entregable2->descripcion; ?></td>
                                    <td><a href="/cedula/eliminarEntregable2/<?php echo $proyecto_entregable2->id_proyecto . "/" . $proyecto_entregable2->id ?>" onclick="return confirm ('¿Esta seguro de eliminar esta informacion?');">Eliminar</a></td>
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
                <span class="inline">xi.- Anexos</span>
                <span class="inline">Seleccione los estudios con los que cuenta para justificar la viabilidad del proyecto</span>

                <div>
                    <div>
                        <table>
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <th>Adjuntar Archivo:</th>
                                    <td><input type="file" id="estudio-seleccionado" name="archivo_tipo_estudio" disabled=<?php if ($proyecto->no_requiere_estudio == 1) echo "disabled"; ?>></td>                                
                                    <th>Tipo de Estudio:</th>
                                    <td>
                                        <select id="tipo_estudio_id" name="tipo_estudio_id">
                                            <?php foreach(@$tipos_estudio->result() as $tipo_estudio) : ?>
                                            <?php if ($tipo_estudio->id == 8): ?>
                                                <option selected value="<?php echo $tipo_estudio->id; ?>" <?php if ($proyecto->no_requiere_estudio == 1) echo "selected"; ?>>
                                                    <?php echo $tipo_estudio->tipo; ?>
                                                </option>
                                            <?php else:?>
                                                <option value="<?php echo $tipo_estudio->id; ?>" <?php if ($proyecto->no_requiere_estudio == 1) echo "selected"; ?>>
                                                    <?php echo $tipo_estudio->tipo; ?>
                                                </option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr> 
                                <tr>
                                    <td colspan="4">
                                        <span>Describir otros:</span>
                                        <input type="text" id="seccion-11-otros" name="seccion-11-otros" disabled="disabled" ><!--value="<?php echo $proyecto->justificar_otro_estudio; ?>"-->
                                    </td>
                                </tr>   
                                <tr>
                                    <td colspan="5">
                                        <span>Justificar porque no requiere estudios:</span>
                                        <input type="text" id="seccion-11-justificacion" name="seccion-11-justificacion" value="<?php echo $proyecto->justificar_otro_estudio; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>   
                        <!--?php if($proyecto->no_requiere_estudio == 1) : ?-->
                        <!--input id="btnGuardarCedula" type="submit" value="Guardar" disabled="disabled"--> 
                        <!--?php else :?-->
                        <input id="btnGuardarCedula" type="submit" value="Guardar">
                        <!--?php endif; ?-->
                    </div>

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
                                <?php if($documentos_anexos != null) : ?>
                                    <!--?php if($proyecto->no_requiere_estudio != 1) : ?-->
                                        <?php foreach($documentos_anexos->result() as $documento_anexo) : ?>
                                        <tr>
                                            <td><?php echo $documento_anexo->documento; ?></td>
                                            <td><?php echo $documento_anexo->tipo; ?></td>
                                            <td><?php echo $documento_anexo->ruta; ?></td>
                                            <td><?php echo $documento_anexo->otro_estudio; ?></td>                                    
                                            <td><a href="/cedula/eliminarDocumentoProyecto/<?php echo $documento_anexo->proyecto_id . "/" . $documento_anexo->proyecto_documento_id ?>" onclick="return confirm ('¿Esta seguro de eliminar esta informacion?');">Eliminar</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <!--?php endif; ?-->     
                                <?php endif; ?> 
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
                                <th colspan="3" class="alinear-izquierda">Aplicación de recursos solicitados a FIDEM (Partidas acorde al manual de comprobación de recursos) <a id="lnkNuevoCostoProyecto" href="#">Agregar</a></th>
                                <th></th>
                                <!--<th>%</th>-->
                                <th class="alinear-centro" data-moneda><?php echo $proyecto->apoyo_fidem_solicitado; ?></th>
                                <th class="alinear-centro">
                                <input type="text" name="apoyo_fidem_porcentaje" value="<?php echo $proyecto->apoyo_fidem_porcentaje; ?>">    
                                    
                                
                                </th>
                              
                                
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
                                <td class="alinear-izquierda"><a href="/cedula/eliminarCosto/<?php echo $proyecto_costo->id_proyecto . "/" . $proyecto_costo->id ?>" onclick="return confirm ('¿Esta seguro de eliminar esta informacion?');">Eliminar</a></td>
                            </tr>
                            <?php $cont++; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <tr>
                                    <th colspan="3" class="alinear-izquierda">Otros Apoyos <a id="lnkNuevoApoyo" href="#">Agregar</a></th>
                                <!--<th>%</th>-->
                                <th></th>
                                
                                <th class="alinear-centro"><span data-moneda><?php echo $proyecto->otro_apoyo; ?></span></th>
                                <th class="alinear-centro">
                                     <input type="text" name="otro_apoyo_porcentaje" value=" <?php echo $proyecto->otro_apoyo_porcentaje; ?>">    
                                
                                   </th>
                                
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
                                <td class="alinear-izquierda"><a href="/cedula/eliminarOtroApoyo/<?php echo $proyecto_otro_apoyo->id_proyecto . "/" . $proyecto_otro_apoyo->id ?>" onclick="return confirm ('¿Esta seguro de eliminar esta informacion?');">Eliminar</a></td>
                            </tr> 
                            <?php $cont++; ?>
                            <?php endforeach; ?>  
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br />
                 <input id="btnGuardarPorcentajes" type="submit" value="Guardar">
            </div>

            <div id="seccion-13" class="seccion-cedula">
                <!--  
<div class="texto-apartado">
<span>APARTADO XIII.</span> <span>AUTORIZACIÓN DEL PROYECTO:</span> 
</div>
-->
                <span class="inline">viii.- autorización</span>
                <span class="inline"><img src="/imagenes/candado-administrador.png"></span>
                <span class="inline">(Reservado para el Administrador del Sistema)</span>


            </div>
        </form>

    </div>


    <?php
    $this->load->view('estructura/pie.php');   
    ?>