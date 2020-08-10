<div id="proyectos-por-evaluar">
    <div>        
    <span>EVALUADOR</span>
        <span>
<?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('ap_paterno') . ' ' . $this->session->userdata('ap_materno'); ?>
            </span>
    </div>
    
    <div>
         <?php if(@$proyectos != null) : ?>
        
        <table id="registros-por-evaluar">
            <thead>
                <th>PROYECTO</th>
                <th style="text-align: center;">CÉDULA</th>
                <th style="text-align: center;">EVALUACIÓN</th>
                <th style="text-align: center;">RESULTADO</th>
            </thead>
            <tbody>
               
                <?php foreach(@$proyectos->result() as $proyecto) : ?>
                    <tr>
                        <td><?php echo $proyecto->proyecto; ?></td>
                        <td style="text-align: center;">
                            <a href="/cedula_administrador/mostrar/<?php echo $proyecto->id; ?>/1">Ver</a> |
                            <a href="#" class="lnkEvaluadorImprimirCedula" data-rel="<?php echo $proyecto->id; ?>">Imprimir</a>
                        </td>
                         <td style="text-align: center;">
                           <a href="/proyecto/evaluar/<?php echo $proyecto->proyecto_evaluador_id; ?>/1">Ver</a>
                      
                        </td>
                        <td style="text-align: center;"><?php echo number_format($proyecto->resultado,2); ?></td>
                    </tr>
                <?php endforeach; ?>                 
            </tbody>
        </table>
         <?php else : ?>
                No existen proyectos por evaluar
                <?php endif; ?>
    </div>
</div>


        <form id="forma-imprimir-cedula" action="/cedula/imprimir" method="post">  
            <input type="hidden" name="proyecto_id" value="0">
        </form>