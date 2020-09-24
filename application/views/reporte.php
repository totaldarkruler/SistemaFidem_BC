<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/javascript/funciones.js" type="text/javascript"></script>
<script src="/javascript/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
<link href="/css/estilos.css" rel="stylesheet" type="text/css">

<div>
    <div id="panelImprimir">  
        <a id="lnkImprimir" href="javascript:printPage()">Imprimir</a>
        <?php if($this->session->userdata("administrador") == "0") : ?>
            <a href="<?php echo base_url(); ?>cedula/reAbrir/<?php echo $proyecto->id; ?>">Regresar</a>
        <?php else: ?>
                 <?php if($this->session->userdata("tipo_usuario_id") == "4") : ?>
                         <a href="javascript: history.back(-1);">Regresar</a>
                       <?php else : ?>
                          <a href="<?php echo base_url(); ?>cedula_administrador/mostrar/<?php echo $proyecto->id; ?>">Regresar</a>
                       <?php endif; ?>
        
       
        <?php endif; ?>
    </div>
</div>    

<div id="reporte">
    <div class="hoja">
        <div id="encabezado-hoja">
            <div>
                <img src="/imagenes/logo_fidem.jpg" width="180" height="100">
            </div>       
            <div>
                <span>cédula para la presentación y aprobación de proyectos</span>
                <span>susceptibles de apoyo por el fideicomiso empresarial del estado de baja california</span>                
            </div>
            <div>
                <span>Organismo Intermedio</span>
                <img src="/imagenes/principal/CDEM_LOGO.png" width="180" height="50">
            </div>
        </div>
        <div class="seccion">
            <span class="numero">I.</span>
            <span class="titulo">Registro del Proyecto</span> (Uso exclusivo organismo intermedio)

            <div>
                <table>
                    <thead>
                        <tr>
                            <th colspan="2" style="width:166px">Clave del Proyecto</th>
                            <th colspan="2" style="width:166px">Fecha de Recepción</th>
                            <th colspan="3" style="width:167px">Área de Influencia</th>
                            <th colspan="3" style="width:167px">Línea Estretégica del PED</th>
                            <th colspan="2" style="width:166px">Fecha de Reunión</th>
                            <th colspan="2" style="width:166px">No. de Reunión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"><?php echo $proyecto->clave_proyecto; ?></td>
                            <?php if ($proyecto->fecha_recepcion == "" || $proyecto->fecha_recepcion == "1969-12-31 00:00:00") : ?>
                            <td colspan="2"></td>
                            <?php else : ?>
                            <td colspan="2"><?php echo @date("d/m/Y", strtotime($proyecto->fecha_recepcion)); ?></td>
                            <?php endif; ?>
                            <td colspan="3" ><?php echo $proyecto->area_influencia; ?></td>
                            <td colspan="3"><?php echo $proyecto->linea_estrategica; ?></td>
                            <?php if ($proyecto->fecha_reunion == "" || $proyecto->fecha_reunion == "1969-12-31 00:00:00") : ?>
                            <td colspan="2"></td>
                            <?php else : ?>
                            <td colspan="2"><?php echo @date("d/m/Y", strtotime($proyecto->fecha_reunion)); ?></td>
                            <?php endif; ?>
                            <td colspan="2"><?php echo $proyecto->no_reunion; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>

        <div id="seccion-1-5" class="seccion">            
            <div>
                <table>
                    <tbody>
                        <tr colspan="9">
                            <th style="width:139px">Organismo Intermedio:</th> 
                            <td style="width:859px">CONSEJO DE DESARROLLO ECONOMICO DE MEXICALI, A.C.</td>
                            <!--<td><input type="text" value="CONSEJO DE DESARROLLO ECONOMICO DE MEXICALI, A.C." readonly="readonly"></td>-->
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="seccion">
            <span class="numero">II.</span>
            <span class="titulo">Solicitante</span> (Organismo responsable de la ejecución y presentación del informe de resultado)

            <div>
                <table id="tabla-2-1">
                    <tbody>
                        <tr>
                            <th class="alinear-izquierda" style="width:150px">Solicitante:</th>
                            <td colspan="2" style="width:700px"><?php echo $institucion->nombre; ?></td>
                            <th style="width: 150px">Sello y/o Firma</th>
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">Representante:</th>
                            <td colspan="2"><?php echo $institucion->representante; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">Cargo del Representante:</th>
                            <td colspan="2"><?php echo $institucion->cargo; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">Dirección:</th>
                            <td colspan="2"><?php echo $institucion->direccion; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">Teléfono(s) de contacto:</th>
                            <td><?php echo $institucion->telefono; ?></td>
                            <td><?php echo $institucion->extension; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">E-mail:</th>
                            <td colspan="2"><?php echo $proyecto->correo; ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>

        <div class="seccion">
            <span class="numero">III.</span>
            <span class="titulo">nombre del proyecto</span> (Especifique un nombre breve que identifique con precisión el proyecto)

            <div>
                <table id="tabla3-1">
                    <tbody>
                        <tr>
                            <th class="alinear-izquierda" style="width:150px">Nombre:</th>
                            <td colspan="6" style="width:850px"><?php echo $proyecto->proyecto; ?></td>                                                  
                        </tr>
                        <tr>
                            <th></th>
                            <td><?php if($proyecto->tipo_proyecto == "ELABORACION DE ESTUDIOS Y PROYECTOS") echo "√"; ?></td>
                            <td>Elaboracion de estudios y proyectos</td>
                            <td><?php if($proyecto->tipo_proyecto == "PROGRAMAS DE PROMOCION") echo "√"; ?></td>
                            <td>Programas de promoción</td>
                            <td><?php if($proyecto->tipo_proyecto == "CAMPAÑA DE DIFUSIÓN") echo "√"; ?></td>
                            <td>Campaña de difusión</td>
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">Tipo de Proyecto:</th>
                            <td><?php if($proyecto->tipo_proyecto == "PROGRAMAS DE CAPACITACION") echo "√"; ?></td>
                            <td>Programa de capacitación</td>
                            <td><?php if($proyecto->tipo_proyecto == "PROGRAMA DE BECAS") echo "√"; ?></td>
                            <td>Programa de becas</td>
                            <td><?php if($proyecto->tipo_proyecto == "PROGRAMA DE APOYO A MIPYMES") echo "√"; ?></td>
                            <td>Programa de apoyo a Mipyme</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><?php if($proyecto->tipo_proyecto == "GESTION DE PROYECTOS") echo "√"; ?></td>
                            <td>Gestión de Proyectos</td>
                            <td><?php if($proyecto->tipo_proyecto == "OBRA PUBLICA") echo "√"; ?></td>
                            <td>Obra Pública</td>
                            <td><?php if($proyecto->tipo_proyecto == "APOYO PARA EQUIPAMIENTO") echo "√"; ?></td>
                            <td>Apoyo para equipamiento</td>
                        </tr>
                    </tbody>
                </table>                 
            </div>
        </div>

        <div class="seccion">
            <span class="numero">IV.</span>
            <span class="titulo">apoyo solicitado a fidem</span> Monto solicitado al FIDEM para el proyecto, cifras en Moneda Nacional)

            <div>
                <table id="tabla4-1" style="table-layout: fixed;width: 100%">
                    <tbody>
                        <tr>
                            <th style="width: 155px;">Cantidad:</th>
                            <td style="width: 155px;" data-moneda><?php echo $proyecto->apoyo_fidem_solicitado; ?></td>                                                  
                            <th style="position: relative; width: 155px; text-align: left;">Cantidad con letra:</th>                           
                            <td style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap;width:535"><?php echo $proyecto->cantidad_letra; ?></td>
                        </tr>                       
                    </tbody>
                </table>                 
            </div>
        </div>

        <div class="seccion">
            <span class="numero">V.</span>
            <span class="titulo">tiempo estimado para la realización del proyecto</span> (Tiempo en el que se estima concluir el proyecto presentando el informe final)

            <div>
                <table>
                    <tbody>
                        <tr>
                            <th style="width:333px">Fecha de inicio</th>
                            <th style="width:333px">Fecha final</th>
                            <th style="width:334px">Tiempo total estimado de ejecución</th>                            
                        </tr>                       
                        <tr>
                            <?php if ($proyecto->fecha_inicio == "" || $proyecto->fecha_inicio == "1969-12-31 00:00:00") : ?>
                            <td></td>
                            <?php else : ?>
                                <td class="alinear-centro"><?php echo @date("m/Y", strtotime($proyecto->fecha_inicio)); ?></td>
                            <!-- <td class="alinear-centro"><?php echo @date("d/m/Y", strtotime($proyecto->fecha_inicio)); ?></td> -->
                            <?php endif; ?>
                            <?php if ($proyecto->fecha_fin == "" || $proyecto->fecha_fin == "1969-12-31 00:00:00") : ?>
                            <td></td>
                            <?php else : ?>
                            <td class="alinear-centro"><?php echo @date("m/Y", strtotime($proyecto->fecha_fin)); ?></td>
                            <?php endif; ?>
                            <td class="alinear-centro"><?php echo $proyecto->dias_letra; ?></td>                            
                        </tr>
                    </tbody>
                </table>                 
            </div>
        </div>

        <div class="seccion">
            <span class="numero">VI.</span>
            <span class="titulo">visto bueno para la presentación del proyecto</span> (Uso exclusivo Organismo Intermedio)

            <div>
                <table id="tabla6-1">
                    <tbody>
                        <tr>
                            <th colspan="2" style="width:1000px">El Consejo Coordinador Empresarial y el Consejo de Desarrollo Económico de Mexicali, con fundamneto en la claúsula Cuarta del contrato del<br> Fideicomiso Empresarial del Estado de Baja California presentan ante el Comite Técnico del FIDEM el presente proyecto para su autorización.</th>                                        
                        </tr>                       
                        <tr>
                            <td></td>
                            <td></td>                         
                        </tr>
                        <tr>
                            <?php 
                            $cont = 1; 
                            ?>
                            <?php foreach($firmas->result() as $firma) : ?>
                            <?php if ($cont == 1) : ?>
                            <td><?php echo $firma->nombre; ?><br>Consejo Coordinador Empresarial de Mexicali</td>
                            <?php $cont++; ?>
                            <?php else : ?>
                            <td><?php echo $firma->nombre; ?><br>Consejo de Desarrollo Economico de Mexicali</td>    
                            <?php endif; ?>
                            <?php endforeach; ?>

                        </tr>
                    </tbody>
                </table>                 
            </div>
        </div>
        <div id="pie-hoja">
            <div>
                
            </div>
            <div>
                <span>"Toda copia en PAPEL es un Documento No Controlado a excepción del original"</span>
                <span>Teléfono Organismo Intermedio del Municipio de Mexicali (CDEM) (686) 554.74.29</span>
                <span>Página Web: http://cdem.org.mx/cdem#fidem | Correo Electrónico: gestion.fidem@cdem.org.mx</span>
            </div>
            <div>
                <span>Página <strong>1</strong> de <strong>5</strong></span>
            </div>
        </div>
    </div>

    <div class="hoja">
        <div id="encabezado-hoja">
            <div>
                <img src="/imagenes/logo_fidem.jpg" width="180" height="100">
            </div>       
            <div>
                <span>cédula para la presentación y aprobación de proyectos</span>
                <span>susceptibles de apoyo por el fideicomiso empresarial del estado de baja california</span>                
            </div>
            <div>
                <span>Organismo Intermedio</span>
                <img src="/imagenes/principal/CDEM_LOGO.png" width="180" height="50">
            </div>
        </div>
        <div class="seccion">
            <span class="numero">VII.</span>
            <span class="titulo">objetivos del proyecto (Describa con claridad la finalidad del proyecto. ¿Qué se pretende lograr? En la medida de lo posible, establecer un objetivo que se pueda cuantificar).</span>

            <div>
                <table style="table-layout: fixed;width: 100%">
                    <tbody>
                        <tr>
                            <th class="alinear-izquierda" style="width:1000px">Objetivo General:</th>                                        
                        </tr>                       
                        <tr>
                            <td style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap;"><?php echo $proyecto->ob_general; ?></td>                                                  
                        </tr>
                        <tr>
                            <th class="alinear-izquierda" style="width:1000px">Objetivos Específicos: (Describa los objetivos que se pretende alcanzar con la operación del proyecto).</th>                                        
                        </tr>                       
                        <tr>
                            <td style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap;"><?php echo $proyecto->ob_especifico; ?></td>                                                  
                        </tr>
                    </tbody>
                </table>                 
            </div>
        </div>

        <div class="seccion">
            <span class="numero">VIII.</span>
            <span class="titulo">antecedentes que justifiquen el proyecto</span>

            <div>
                <table style="table-layout: fixed;width: 100%">
                    <tbody>
                        <tr>
                            <th class="alinear-izquierda" style="width:1000px">Síntesis de los antecedentes económicos, sociales, educativos, tecnológicos, etcétera, que originan la necesidad del proyecto.</th>
                        </tr>                       
                        <tr>
                            <td style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap;"><?php echo $proyecto->antecedentes; ?></td>                                                  
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">Síntesis de la problemática que aborda el proyecto</th>                                        
                        </tr>                       
                        <tr>
                            <td style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap;"><?php echo $proyecto->problematica; ?></td>                                                  
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">¿Cómo contribuirá el proyecto a la solución de la problemática?</th>                                        
                        </tr>                       
                        <tr>
                            <td style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap;"><?php echo $proyecto->solucion; ?></td>                                                  
                        </tr>
                    </tbody>
                </table>                 
            </div>
        </div>

        <div class="seccion">
            <span class="numero">IX.</span>
            <span class="titulo">alcance, impacto y beneficio esperado del proyecto</span>

            <div>
                <table style="table-layout: fixed;width: 100%">
                    <tbody>
                        <tr>
                            <th class="alinear-izquierda" style="width:1000px">Alcance del proyecto</th>                                        
                        </tr>                       
                        <tr>
                            <td style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap;"><?php echo $proyecto->alcance; ?></td>                                                  
                        </tr>
                        <tr>
                            <th class="alinear-izquierda">Impacto o beneficio que aportara el proyecto</th>                                        
                        </tr>                       
                        <tr>
                            <td style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap;"><?php echo $proyecto->impacto; ?></td>                                                  
                        </tr>
                    </tbody>
                </table>                 
            </div>
        </div>
        <div id="pie-hoja">
            <div>
                
            </div>
            <div>
                <span>"Toda copia en PAPEL es un Documento No Controlado a excepción del original"</span>
                <span>Teléfono Organismo Intermedio del Municipio de Mexicali (CDEM) (686) 554.74.29</span>
                <span>Página Web: http://cdem.org.mx/cdem#fidem | Correo Electrónico: gestion.fidem@cdem.org.mx</span>
            </div>
            <div>
                <span>Página <strong>2</strong> de <strong>5</strong></span>
            </div>
        </div>
    </div>


    <div class="hoja">
        <div id="encabezado-hoja">
            <div>
                <img src="/imagenes/logo_fidem.jpg" width="180" height="100">
            </div>       
            <div>
                <span>cédula para la presentación y aprobación de proyectos</span>
                <span>susceptibles de apoyo por el fideicomiso empresarial del estado de baja california</span>                
            </div>
            <div>
                <span>Organismo Intermedio</span>
                <img src="/imagenes/principal/CDEM_LOGO.png" width="180" height="50">
            </div>
        </div>
        <div class="seccion">
            <span class="numero">X.</span>
            <span class="titulo">actividades, informes y entregables</span>

            <div>
                <table id="tabla10-2">
                    <tbody>
                        <tr>
                            <th colspan="14" class="alinear-izquierda" style="width:1000px">Cronograma de Actividades</th>                                        
                        </tr>                       
                        <tr>
                            <th rowspan="2" class="alinear-centro" style="width:100px"><strong>No.</strong></th>                                                  
                            <th rowspan="2" class="alinear-centro" style="width:150px"><strong>Actividad<br>(Estapas <br>generales <br>del proyecto)</strong></th>
                            <th colspan="12" class="alinear-centro" style="width:745px"><strong>Tiempos de Ejecución</strong></th>
                        </tr>
                        <?php if($actividad_titulos != null) : ?>

                        <tr>
                            <?php foreach($actividad_titulos->result() as $actividad_titulo) : ?>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col1; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col2; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col3; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col4; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col5; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col6; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col7; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col8; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col9; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col10; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col11; ?></th>
                            <th style="width:62px"><?php echo $actividad_titulo->titulo_col12; ?></th>
                            <?php endforeach; ?>     
                        </tr>
                        <?php endif; ?>
                        <?php $cont = 1; ?>
                        <?php if($actividades != null) : ?>
                        <?php foreach($actividades->result() as $actividad) : ?>
                        <tr>
                            <td class="alinear-centro">
                                <?php echo $cont; ?>
                            </td>
                            <td  class="alinear-izquierda" >
                                <?php echo @$actividad->actividad; ?>
                            </td>

                            <td class="alinear-centro" ><?php if(@$actividad->col1 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col2 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col3 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col4 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col5 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col6 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col7 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col8 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col9 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col10 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col11 != null) echo "√"; else echo ""; ?></td>
                            <td class="alinear-centro" ><?php if(@$actividad->col12 != null) echo "√"; else echo ""; ?></td> 
                        </tr>
                        <?php $cont++; ?>
                        <?php endforeach; ?>  
                        <?php endif; ?> 
					</tbody>						
				</table>
				<table>
                    <tbody>
                        <tr>
                            <th colspan="5" style="width:1000px">Informes (Los informes dependerán de número de ministración de recursos que el solicitante requiera)</th>
                        </tr>
                        <tr>
                            <th style="width:100px">No. Ministración</th>
                            <th style="width:150px">Fecha</th>
                            <th style="width:500px">Informe de avances</th>
                            
                            <th style="width:125px">% de Avance</th>
                            <th style="width:125px">% de Ministración</th>
                        </tr>
                        <?php $avance = 0; $ministracion = 0 ?>
                        <?php if($proyecto_entregables != null) : ?>
                        <?php foreach($proyecto_entregables->result() as $proyecto_entregable) : ?>
                        <tr>
                            <td style="width:100px; text-align: center"><?php echo $proyecto_entregable->no_ministracion; ?></td>
                            <td style="width:150px"><?php echo $proyecto_entregable->fecha; ?></td>
                            <td style="width:500px; text-align:center"><?php echo $proyecto_entregable->descripcion; ?></td>
                            <?php $avance = $avance + $proyecto_entregable->avance; ?>                            
                            <td style="width:125px" class="alinear-centro"><?php echo $proyecto_entregable->avance; ?></td>
                            <?php $ministracion = $ministracion + $proyecto_entregable->ministracion; ?>
                            <td style="width:125px" class="alinear-centro"><?php echo $proyecto_entregable->ministracion; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <!--td></td>
                            <td style="width:100px" colspan="1"></td>
							<td style="width:150px" colspan="1"></td-->
							<td colspan="2"></td>
							<td style="text-align: right" class="alinear-derecha"><strong>Total</strong></td>
                            <td class="alinear-centro"><strong><?php echo $avance; ?></strong></td>
                            <td class="alinear-centro"><strong><?php echo $ministracion; ?></strong></td>  
                        </tr>
					<!--/tbody>
                </table> 	
				<table>
                    <tbody-->
                         <tr>
                            <th style="width:1000px" colspan="14">Entregables (Los entregables deberán ser el producto final del proyecto)</th>
                        </tr>
                        <?php if($proyecto_entregables2 != null) : ?>
                        <?php foreach($proyecto_entregables2->result() as $proyecto_entregable2) : ?>
                        <tr>
                            <td style="text-align: center"><?php echo $proyecto_entregable2->no_entregable; ?></td>
                             <td><?php echo $proyecto_entregable2->fecha; ?></td>
                            <td colspan="3" style="text-align: center" colspan="12"><?php echo $proyecto_entregable2->descripcion; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>                 
            </div>
        </div>

        <div class="seccion">
            <span class="numero">XI.</span>
            <span class="titulo">anexos</span>
            <span class="subtitulo">Indica con una √ los estudios con los que se cuenta para justificar la viablidad del proyecto</span>
            <div>
                <?php $otros = ""; ?>
                <table>
                    <tbody>
                        <tr>
                            <td class="alinear-centro">
                                <?php foreach($tipos_estudio_por_proyecto->result() as $tipo_estudio_por_proyecto) : ?>   
                                <!--?php if($tipo_estudio_por_proyecto->tipo_estudio == "ESTUDIO DE FACTIBILIDAD") : ?-->
                                <?php if($tipo_estudio_por_proyecto->id_tipo_estudio == 1) : ?>
                                √
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <!--td>Estudio de factibilidad</td-->
                            <td>
                                <?php foreach($tipos_estudio->result() as $tEstudio) : ?>
                                <?php if($tEstudio->id == 1) : ?>
                                <?php echo $tEstudio->tipo;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td class="alinear-centro">
                                <?php foreach($tipos_estudio_por_proyecto->result() as $tipo_estudio_por_proyecto) : ?>   
                                <!--?php if($tipo_estudio_por_proyecto->tipo_estudio == "PLAN DE NEGOCIOS") : ?-->
                                <?php if($tipo_estudio_por_proyecto->id_tipo_estudio == 2) : ?>
                                √
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <!--td>Plan de negocios</td-->
                            <td>
                                <?php foreach($tipos_estudio->result() as $tEstudio) : ?>
                                <?php if($tEstudio->id == 2) : ?>
                                <?php echo $tEstudio->tipo;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td class="alinear-centro">
                                <?php foreach($tipos_estudio_por_proyecto->result() as $tipo_estudio_por_proyecto) : ?>   
                                <!--?php if($tipo_estudio_por_proyecto->tipo_estudio == "ESTUDIO TECNICO") : ?-->
                                <?php if($tipo_estudio_por_proyecto->id_tipo_estudio == 3) : ?>
                                √
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <!--td>Estudio técnico</td-->
                            <td>
                                <?php foreach($tipos_estudio->result() as $tEstudio) : ?>
                                <?php if($tEstudio->id == 3) : ?>
                                <?php echo $tEstudio->tipo;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td class="alinear-centro">
                                <?php foreach($tipos_estudio_por_proyecto->result() as $tipo_estudio_por_proyecto) : ?>   
                                <!--?php if($tipo_estudio_por_proyecto->tipo_estudio == "ESTUDIO FINANCIERO") : ?-->
                                <?php if($tipo_estudio_por_proyecto->id_tipo_estudio == 4) : ?>
                                √
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <!--td>Estudio financiero</td-->   
                            <td>
                                <?php foreach($tipos_estudio->result() as $tEstudio) : ?>
                                <?php if($tEstudio->id == 4) : ?>
                                <?php echo $tEstudio->tipo;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="alinear-centro">
                                <?php foreach($tipos_estudio_por_proyecto->result() as $tipo_estudio_por_proyecto) : ?>   
                                <!--?php if($tipo_estudio_por_proyecto->tipo_estudio == "ESTUDIO DE MERCADO") : ?-->
                                <?php if($tipo_estudio_por_proyecto->id_tipo_estudio == 5) : ?>
                                √
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <!--td>Estudio de mercado</td-->
                            <td>
                                <?php foreach($tipos_estudio->result() as $tEstudio) : ?>
                                <?php if($tEstudio->id == 5) : ?>
                                <?php echo $tEstudio->tipo;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td class="alinear-centro">
                                <?php foreach($tipos_estudio_por_proyecto->result() as $tipo_estudio_por_proyecto) : ?>   
                                <!--?php if($tipo_estudio_por_proyecto->tipo_estudio == "PROYECTO EJECTUIVO") : ?-->
                                <?php if($tipo_estudio_por_proyecto->id_tipo_estudio == 6) : ?>
                                √
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <!--td>Proyecto ejecutivo</td-->
                            <td>
                                <?php foreach($tipos_estudio->result() as $tEstudio) : ?>
                                <?php if($tEstudio->id == 6) : ?>
                                <?php echo $tEstudio->tipo;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td class="alinear-centro">
                                
                                <?php foreach($tipos_estudio_por_proyecto->result() as $tipo_estudio_por_proyecto) : ?>
                                <!--?php if($tipo_estudio_por_proyecto->tipo_estudio == "OTROS") : ?-->
                                <?php if($tipo_estudio_por_proyecto->id_tipo_estudio == 7) : ?>
                                <?php $otros = $tipo_estudio_por_proyecto->otro_estudio.','.$otros; ?>
                                √
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <!--td>Otros</td-->
                            <td>
                                <?php foreach($tipos_estudio->result() as $tEstudio) : ?>
                                <?php if($tEstudio->id == 7) : ?>
                                <?php echo $tEstudio->tipo;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td class="alinear-centro">
                                <!--?php if($tipos_estudio_por_proyecto->num_rows() == 0) : ?-->
                                <?php if($proyecto->no_requiere_estudio==1) :?>
                                √
                                <?php endif; ?>
                            </td>
                            <!--td>No se requiere</td-->
                            <td>
                                <?php foreach($tipos_estudio->result() as $tEstudio) : ?>
                                <?php if($tEstudio->id == 8) : ?>
                                <?php echo $tEstudio->tipo;?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" style="width:1000px"><strong>Describir Otros:</strong>
                                <p>  <?php echo $otros; ?></p>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="8"><strong>Justificar porque no requiere estudios:</strong>
                                <p><?php echo $proyecto->justificar_otro_estudio; ?></p>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div id="pie-hoja">
            <div>
                
            </div>
            <div>
                <span>"Toda copia en PAPEL es un Documento No Controlado a excepción del original"</span>
                <span>Teléfono Organismo Intermedio del Municipio de Mexicali (CDEM) (686) 554.74.29</span>
                <span>Página Web: http://cdem.org.mx/cdem#fidem | Correo Electrónico: gestion.fidem@cdem.org.mx</span>
            </div>
            <div>
                <span>Página <strong>3</strong> de <strong>5</strong></span>
            </div>
        </div>
    </div>


    <div class="hoja">
        <div id="encabezado-hoja">
            <div>
                <img src="/imagenes/logo_fidem.jpg" width="180" height="100">
            </div>       
            <div>
                <span>cédula para la presentación y aprobación de proyectos</span>
                <span>susceptibles de apoyo por el fideicomiso empresarial del estado de baja california</span>                
            </div>
            <div>
                <span>Organismo Intermedio</span>
                <img src="/imagenes/principal/CDEM_LOGO.png" width="180" height="50">
            </div>
        </div>
        <div class="seccion">
            <span class="numero">XII.</span>
            <span class="titulo">integración del valor estimado del proyecto</span>

            <div>
                <table>
                    <tbody>
                        <tr>
                            <th style="width:700px" colspan="3" class="alinear-izquierda">Costo total del Proyecto (solicitado a FIDEM más Otros Apoyos)</th>
                            <th style="width:150px" class="alinear-centro" data-moneda><?php echo $proyecto->costo_total; ?></th>
                            <!--<th>%</th>-->
                            <th style="width:150px">100%</th>
                            
                            
                        </tr>
                        <tr>
                            <th colspan="3" class="alinear-izquierda">Aplicación de recursos solicitados a FIDEM (Partidas acorde al manual de comprobación de recursos)</th>
                            <!--<th>%</th>
                            <th class="alinear-centro"><?php echo $proyecto->apoyo_fidem_porcentaje . '%'; ?></th>
                            <td class="alinear-centro" data-moneda><?php echo $proyecto->apoyo_fidem; ?></td>
                            -->
                            <th class="alinear-centro" data-moneda><?php echo $proyecto->apoyo_fidem_solicitado; ?></th>
                             <th class="alinear-centro"><?php echo $proyecto->apoyo_fidem_porcentaje . '%'; ?></th>
                            
                        </tr>
                        <tr>
                            <!--<td colspan="3" class="alinear-centro"><strong>Aplicación</strong></td>
                            <td colspan="2" class="alinear-centro"><strong>%</strong></td>
                            <td class="alinear-centro"><strong>Monto</strong></td>
                            -->
                            
                           <td colspan="3" class="alinear-centro"><strong>Aplicación</strong></td>
                         
                           <td colspan="1" class="alinear-centro"><strong>Monto</strong></td>
                           <td class="alinear-centro"><strong>%</strong></td> 
                           
                            
                        </tr>

                        <?php if($proyecto_costos != null) : ?>
                        <?php $cont = 1; ?>
                        <?php foreach($proyecto_costos->result() as $proyecto_costo) : ?>
                        <tr>
                            <!--<td class="alinear-centro"><?php echo $cont . '.'; ?></td>
                            <td colspan="2" class="alinear-izquierda"><?php echo $proyecto_costo->aplicacion; ?></td>
                            <td colspan="2" class="alinear-centro" data-moneda><?php echo $proyecto_costo->monto; ?></td>
                            <td class="alinear-centro"><?php echo $proyecto_costo->porcentaje; ?></td>
                            -->
                            <td class="alinear-centro"><?php echo $cont . '.'; ?></td>
                            <td colspan="2" class="alinear-izquierda"><?php echo $proyecto_costo->aplicacion; ?></td>
                            <td colspan="1" class="alinear-centro" data-moneda><?php echo $proyecto_costo->monto; ?></td>
                            <td class="alinear-centro"><?php echo $proyecto_costo->porcentaje; ?></td>
                        </tr>
                        <?php $cont++; ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <tr>
                            <th colspan="3" class="alinear-izquierda"></th>
                            
                            <th class="alinear-centro"><span data-moneda><?php echo $proyecto->otro_apoyo; ?></span></th>
                            
                            <th class="alinear-centro"><?php echo $proyecto->otro_apoyo_porcentaje . '%'; ?></th>
                        </tr>
                        <tr>
                            <!--<td colspan="2" class="alinear-centro"><strong>Origen</strong></td>
                            <td class="alinear-centro"><strong>Aplicación</strong></td>
                            <td colspan="2" class="alinear-centro"><strong>%</strong></td>   
                            <td class="alinear-centro"><strong>Monto</strong></td>
                            -->
                            <td colspan="2" class="alinear-centro"><strong>ORIGEN DE OTROS APOYOS</strong></td>
                            <td class="alinear-centro"><strong>Aplicación</strong></td>
                            <td colspan="1" class="alinear-centro"><strong>Monto</strong></td>   
                            <td class="alinear-centro"><strong>%</strong></td>
                        </tr>

                        <?php if($proyecto_otros_apoyos != null) : ?>
                        <?php $cont = 1; ?>
                        <?php foreach($proyecto_otros_apoyos->result() as $proyecto_otro_apoyo) : ?>
                        <tr>
                            <!--<td class="alinear-centro"><?php echo $cont . '.'; ?></td>
                            <td class="alinear-izquierda"><?php echo $proyecto_otro_apoyo->origen; ?></td>
                            <td class="alinear-izquierda"><?php echo $proyecto_otro_apoyo->aplicacion; ?></td>
                            <td colspan="2" class="alinear-centro" data-moneda><?php echo $proyecto_otro_apoyo->monto; ?></td>   
                            <td class="alinear-centro"><?php echo $proyecto_otro_apoyo->porcentaje; ?></td>
                            -->
                            <td class="alinear-centro"><?php echo $cont . '.'; ?></td>
                            <td class="alinear-izquierda"><?php echo $proyecto_otro_apoyo->origen; ?></td>
                            <td class="alinear-izquierda"><?php echo $proyecto_otro_apoyo->aplicacion; ?></td>
                            <td colspan="1" class="alinear-centro" data-moneda><?php echo $proyecto_otro_apoyo->monto; ?></td>   
                            <td class="alinear-centro"><?php echo $proyecto_otro_apoyo->porcentaje; ?></td>
                        </tr> 
                        <?php $cont++; ?>
                        <?php endforeach; ?>  
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="pie-hoja">
            <div>
                <!--<span>Revision Vigente: 1</span>
                <span>22/03/15</span>
                -->
            </div>
            
            <div>
                <span>"Toda copia en PAPEL es un Documento No Controlado a excepción del original"</span>
                <span>Teléfono Organismo Intermedio del Municipio de Mexicali (CDEM) (686) 554.74.29</span>
                <span>Página Web: http://cdem.org.mx/cdem#fidem | Correo Electrónico: gestion.fidem@cdem.org.mx</span>
            </div>
            <div>
                <span>Página <strong>4</strong> de <strong>5</strong></span>
            </div>
        </div>
    </div>

    <div class="hoja">
        <div id="encabezado-hoja">
            <div>
                <img src="/imagenes/logo_fidem.jpg" width="180" height="100">
            </div>       
            <div>
                <span>cédula para la presentación y aprobación de proyectos</span>
                <span>susceptibles de apoyo por el fideicomiso empresarial del estado de baja california</span>                
            </div>
            <div>
                <span>Organismo Intermedio</span>
                <img src="/imagenes/principal/CDEM_LOGO.png" width="180" height="50">
            </div>
        </div>
        <div class="seccion">
            <span class="numero">XIII.</span>
            <span class="titulo">autorización del proyecto</span>

            <div>
                <table id="tabla13-1" style="table-layout: fixed;width: 100%">
                    <tbody>
                        <tr>
                            <th style="white-space: -o-pre-wrap;
                                       word-wrap: break-word;
                                       white-space: pre-wrap;
                                       white-space: -moz-pre-wrap;
                                       white-space: -pre-wrap; text-align: left; text-transform: justify;">
                                LOS INTEGRANTES DEL COMITE TECNICO DEL FIDEICOMISO EMPRESARIAL DEL ESTADO DE BAJA CALIFORNIA CON FUNDAMENTO EN SU CONTRATO DE CREACION, EN LAS REGLAS DE OPERACION Y DE MAS NORMATIVIDAD ESTATAL APLICABLE A ESTE FIDEICOMISO TIENE A BIEN AUTORIZAR EL PROYECTO '<?php echo $proyecto->proyecto; ?>' POR LA CANTIDAD DE <?php echo '$' . $proyecto->apoyo_fidem_solicitado . ' (' . $proyecto->cantidad_letra . ' 00/100 M.N.)'?> Y ORDENA EL SECRETARIO EJECUTIVO DE ESTE COMITE PARA QUE SE INSTRUYA AL FIDUCIARIO A CANALIZAR LOS RECUROS DE ACUERDO A LA SOLICITUD QUE EL ORGANISMO INTERMEDIO SOLICITE.

                            </th>
                        </tr>
                    </tbody>
                </table>

                <div id="firmas">
				
					<div>
                        <span>por la secretaria de planeación y finanzas</span>
                    </div>
                    
					<div>
                        <span>el presidente del comite técnico del fidem</span>
                    </div>

                    <div>
                        <span>por la secretaría de educacion y bienestar social</span>
                    </div>

                    <div>
                        <span>por la secretaria de seguridad pública</span>
                    </div>

                    <div>
                        <span>por el consejo de desarrollo económico de mexicali</span>
                    </div>
					
					<div>
                        <span>por el consejo de desarrollo económico de tijuana</span>
                    </div>
                    
					<div>
                        <span>por el consejo de desarrollo económico de tecate</span>
                    </div>
					
					<div>
                        <span>por el consejo de desarrollo económico de ensenada</span>
                    </div>

                    <div>
                        <span>por el consejo consultivo de desarrollo económico de playas de rosarito</span>
                    </div>

                </div>

                <div id="fecha-reporte">
                    <?php if ($proyecto->fecha_reunion == "" || $proyecto->fecha_reunion == "1969-12-31 00:00:00" || $proyecto->fecha_reunion == "1970-01-01 00:00:00") : ?>
                    <p></p>
                    <?php else : ?>
                    <td class="alinear-centro"><p>
                        <?php 
                        list($dia, $mes, $anio) = @split('[/]', @date("d/m/Y", strtotime($proyecto->fecha_reunion)));
                        ?>
                        <?php foreach($ciudad->result() as $ciudad_por_proyecto) : ?>   
                                <?php if($ciudad_por_proyecto->id == $proyecto->ciudadid) : ?>
                                    <?php echo ucfirst(strtolower($ciudad_por_proyecto->ciudad)); ?>
                                <?php endif; ?>
                        <?php endforeach; ?>
                        Baja California, a <?php echo $dia; ?> de 
                        <?php 
                        $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

                        echo @$arrayMeses[$mes - 1];?> de <?php echo $anio; ?>

                        </p></td>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div id="pie-hoja">
            <div>
                <!--<span>Revision Vigente: 1</span>
                <span>22/03/15</span>
                -->
            </div>
            <div>
                <span>"Toda copia en PAPEL es un Documento No Controlado a excepción del original"</span>
                <span>Teléfono Organismo Intermedio del Municipio de Mexicali (CDEM) (686) 554.74.29</span>
                <span>Página Web: http://cdem.org.mx/cdem#fidem | Correo Electrónico: gestion.fidem@cdem.org.mx</span>
            </div>
            <div>
                <span>Página <strong>5</strong> de <strong>5</strong></span>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("[data-moneda]").formatCurrency();
    });

</script>