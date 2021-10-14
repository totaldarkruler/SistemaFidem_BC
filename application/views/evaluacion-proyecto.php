<div id="contenedor-evaluacion" class="contenido-pagina">
    <form id="frmEvaluacionProyecto" method="post" action="/proyecto/guardar_evaluacion/">
       <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
       <input type="hidden" name="evaluador_id" value="<?php echo $evaluador_id; ?>">
       <input type="hidden" name="evaluador_proyecto_id" value="<?php echo $evaluador_proyecto_id; ?>">
        
    </form>
      
    <div id="titulos">
        <div id="titulo-administrador">
            <div class="cuadro-titulo-anaranjado">
                Evaluación de Proyectos
            </div>
            <img src="/imagenes/triangulo-cafe.png">
            <?php if($this->session->userdata('tipo_usuario_id') == 1) : ?>
                <a href="javascript:history.back(1);" class="atras">Atrás</a>
            <?php else : ?>
                <a href="/evaluacion" class="atras">Atrás</a>
            <?php endif; ?>
        </div>      
    </div>
    
    <?php if($deshabilitar == 1) : ?>
        <div class="capa-bloqueo">
        </div>
    <?php endif; ?>
    
    <div id="informacion-evaluacion">
        <a id="lnkGuardarEvaluacionProyecto" href="#" class="guardar"><img src="/imagenes/guardar.png" width="30" height="30"></a>
        <p>Proyecto: <?php echo $proyecto->proyecto; ?></p>
        <p>Tipo de Proyecto: <?php echo $proyecto->tipo_proyecto; ?></p>
        <p>Montoo: <?php echo '$'.number_format($proyecto->apoyo_fidem_solicitado,2,'.',','); ?></p>
    </div>
    
    <div id="preguntas">
        <?php $iPreguntaID = 0 ?>
        <div class="contenido-pregunta">
        <?php foreach($preguntas as $pregunta) : ?>
            <?php if($pregunta[4] != $iPreguntaID) : ?>
              </div>
              <div class="contenido-pregunta <?php if($pregunta[7] == 1) echo ' calculada'; ?>">
                <p class="titulo-pregunta"><?php echo $pregunta[1]; ?></p>
                <?php $iPreguntaID = $pregunta[4]; ?>
           <?php endif; ?>
                <div>
                    <input type="radio" name="<?php echo $pregunta[4]; ?>" value="<?php echo $pregunta[2]; ?>" <?php if($pregunta[6] != null) echo 'checked'; ?> data-rel="<?php echo $pregunta[6] ?>">
                    <label><?php echo $pregunta[3]; ?></label>
                </div>
        
        <?php endforeach; ?>
               </div>
        
        
    </div>
    
    
    <div id="finalizar-evaluacion">
          <!--  <form action="/proyecto/finalizar_evaluacion/" method="post"> -->
                <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
                <input type="hidden" name="evaluador_proyecto_id" value="<?php echo $evaluador_proyecto_id; ?>">
                <label>Comentarios y Recomendaciones del CEI:</label>
                <textarea id="txtObservaciones" name="observaciones" rows="50" maxlength="2000">
                  
                 <?php echo $observaciones; ?>
                </textarea>

                <!-- <?php echo @$observaciones->observaciones; ?> -->
        <a id="lnkFinalizarEvaluacionProyecto" href="#" class="boton">Finalizar Evaluación</a>
         <!--       <input type="submit" class="boton" value="Finalizar Evaluación" onclick="return confirm('Una vez finalizada la evaluación no se podrá realizar modificaciones. &iquest;Desea continuar?')">
        -->
                    
        
           <!--  </form> -->
        </div>
    
             
</div>


 <form id="frmFinalizarProyecto" method="post" action="/proyecto/finalizar_evaluacion/">
       <input type="hidden" name="proyecto_id" value="<?php echo $proyecto->id; ?>">
       <input type="hidden" name="evaluador_id" value="<?php echo $evaluador_id; ?>">
       <input type="hidden" name="evaluador_proyecto_id" value="<?php echo $evaluador_proyecto_id; ?>">
        
    </form>

<script>

    $(function(){
        var iTotalPreguntas = $("div.contenido-pregunta").size() - 1;
        var iTotalRespuestas = $("input[type=radio]:checked").size();

        if (iTotalPreguntas > iTotalRespuestas)
                $("a#lnkFinalizarEvaluacionProyecto").addClass("disabled");
        else
                $("a#lnkFinalizarEvaluacionProyecto").removeClass("disabled");
         
        
        $("#contenedor-evaluacion input[type=radio]").change(function(){
              var iTotalPreguntas = $("div.contenido-pregunta").size() - 1;
        var iTotalRespuestas = $("input[type=radio]:checked").size();

        if (iTotalPreguntas > iTotalRespuestas)
             $("a#lnkFinalizarEvaluacionProyecto").addClass("disabled");
        else
             $("a#lnkFinalizarEvaluacionProyecto").removeClass("disabled");
        });
        
        
    });
</script>