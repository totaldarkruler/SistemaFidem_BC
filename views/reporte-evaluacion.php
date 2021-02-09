<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/javascript/funciones.js" type="text/javascript"></script>
<script src="/javascript/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
<link href="/css/estilos.css" rel="stylesheet" type="text/css">
<div class="content">  
        <div>
                <div id="panelImprimir">  
                    <a id="lnkImprimir" href="javascript:printPage()">Imprimir</a>
                </div>
            </div>          

    <div id="reporte">
        <div class="hoja">
            <div id="encabezado-hoja">
                <div>
                    <img src="/imagenes/logo_fidem.jpg" width="180" height="100">
                </div>       
                <div>
                    <span>comité evaluador interno</span>
                    <span>tabla de evaluación de proyecto</span>                
                </div>
                <div>
                    <span>Organismo Intermedio</span>
                    <img src="/imagenes/principal/CDEM_LOGO.png" width="180" height="50">
                </div>
            </div>
            <div class="seccion">
            
                <div>
                    <table id="tabla-evaluacion">
                        <tbody>
                            <tr>
                                <th class="alinear-izquierda" style="width:150px">Nombre del Proyecto:</th>
                                <td colspan="5" style="width:900px"><?php echo $proyecto->proyecto; ?></td>
                            </tr>
                            <tr>
                                <th class="alinear-izquierda" style="width:150px">Solicitante:</th>
                                <td colspan="5" style="width:900px"><?php echo $proyecto->solicitante; ?></td>
                            </tr>
                            <tr>
                                <th class="alinear-izquierda" style="width:150px">Clave:</th>
                                <td ><?php echo $proyecto->clave_proyecto; ?></td>
                                <th class="alinear-izquierda" style="width:150px">Area de Influencia:</th>
                                <td ><?php echo $proyecto->area_influencia; ?></td>
                                <th class="alinear-izquierda" style="width:150px">Monto:</th>
                               
                                <td> <?php echo '$'.number_format($proyecto->costo_total,2,'.',','); ?></td>
                            </tr>
                            <tr>
                                <th class="alinear-izquierda" style="width:150px">Tipo de Proyecto:</th>
                                <td colspan="5" style="width:900px"><?php echo $proyecto->tipo_proyecto; ?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
            
            <?php $dValor = 0; ?>
            
            <div class="seccion">
                <div>
                    <table id="tabla-evaluacion-valores">
                            <tbody>
                                <?php foreach($valores->result() as $valor) : ?>
                                    <tr>
                                        <td style="width:300px"><?php echo $valor->variable; ?></td>
                                        <td style="width: 900px;"><?php echo number_format($valor->resultado,2); ?></td>
                                    </tr>
                                <?php $dValor = $dValor + $valor->resultado; ?>
        
                                <?php endforeach; ?>                            
                            </tbody>
                        <tfoot>
                        <tr>
                                        <td style="width:315px">Calificación Final</td>
                                        <td style="width: 900px;"><?php echo number_format($dValor,2); ?></td>
                                    </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <div class="seccion">
                <p style="text-align: center;">(Calificación máxima 50 puntos. Calificación Mínima para que continue en el proceso: 30 Puntos)</p>
            </div>
            
            <div class="seccion">
                <div>
                    <table id="tabla-evaluacion-comentarios">
                        <thead>
                        <tr>
                                <th style="max-width: 1000px;">Comentarios y Recomendaciones del CEI:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="max-width: 1000px;"><?php echo $proyecto->observaciones_evaluacion; ?></td>
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
                    <span>Página <strong>1</strong> de <strong>1</strong></span>
                </div>
            </div>
        </div>
    </div>
</div>