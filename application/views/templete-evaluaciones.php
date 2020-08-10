<?php
$this->load->view('estructura/encabezado.php');
$this->load->view('estructura/membrete-superior.php');

?>
<div class="contenido-pagina">
    <div id="titulos">
        <div>
            <div class="cuadro-titulo-anaranjado">
               Evaluación de Proyectos
            </div>
            <img src="/imagenes/triangulo-cafe.png">
            <a href="<?php echo base_url(); ?>" class="atras">Atrás</a>
        </div>

        <div class="cuadro-titulo-anaranjado">
            <?php if ($opcion_panel == "proyectos-por-evaluar") : ?>
            Proyectos por evaluar 
            <?php endif; ?>
            <?php if ($opcion_panel == "proyectos-evaluados") : ?>
            Proyectos evaluados
            <?php endif; ?>     
            <?php if ($opcion_panel == "evaluador-cambio-contrasena") : ?>
            Cambiar mi contraseña
            <?php endif; ?>     
        </div>
      
    </div>

</div>

<div id="panel-control">
    <div id="panel">
        <!-- <span>Panel de Control</span> -->
        <a href="<?php echo base_url(); ?>evaluacion/mostrarProyectosPorEvaluar">Proyectos por Evaluar</a>
       <a href="<?php echo base_url(); ?>evaluacion/mostrarProyectosEvaluados">Proyectos Evaluados</a>
          <a href="<?php echo base_url(); ?>evaluacion/cambiarContrasena">Cambiar mi contraseña</a>
    </div>
    <div id="opcion">
        <?php $this->load->view($opcion_panel); ?>    
    </div>
</div>

<?php
$this->load->view('estructura/pie.php');   
?>