<?php
$this->load->view('estructura/encabezado.php');
$this->load->view('estructura/membrete-superior.php');

?>
<div class="contenido-pagina">
    <div id="titulos">
        <div>
            <div class="cuadro-titulo-anaranjado">
                Administrador de Proyectos  
            </div>
            <img src="/imagenes/triangulo-cafe.png">
            <a href="<?php echo base_url(); ?>" class="atras">Atrás</a>
        </div>

        <div class="cuadro-titulo-anaranjado">
            <?php if ($opcion_panel == "mantenimientos") : ?>
            Mantenimientos 
            <?php endif; ?>
            <?php if ($opcion_panel == "mantenimiento-usuarios") : ?>
            Mantenimiento a Usuarios
            <?php endif; ?>
            <?php if ($opcion_panel == "solicitudes-registro") : ?>
            Solicitudes de Registro
            <?php endif; ?>
             <?php if ($opcion_panel == "presentacion-proyectos") : ?>
            Presentación de Proyectos
            <?php endif; ?>
              <?php if ($opcion_panel == "evaluar-proyecto") : ?>
            Evaluación de Proyecto
            <?php endif; ?>
        </div>
    </div>

</div>

<div id="panel-control">
    <div id="panel">
        <span>Panel de Control</span>
        <a href="<?php echo base_url(); ?>panel_control/mostrarPresentacionProyectos" class="presentacion-proyectos">Presentación de Proyectos</a>
        <a href="#" class="seguimiento-proyectos">Seguimiento de Proyectos</a>
        <a href="<?php echo base_url(); ?>panel_control/mostrarMantenimientos" class="mantenimientos">Mantenimientos</a>
        <a href="<?php echo base_url(); ?>panel_control/mostrarMantenimientoUsuarios" class="mantenimiento-usuarios">Mto. a Usuarios</a>
        <a href="#" class="solicitudes-registro">Solicitudes de Registro</a>
        <div>
            <ul>
                <li>
                    <a href="<?php echo base_url(); ?>panel_control/mostrarSolicitudesRegistro">SOLICITUDES PENDIENTES</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>panel_control/mostrarInstitucionesRegistradas">INSTITUCIONES REGISTRADAS</a>
                </li>
            </ul>
        </div>
        <a href="#" class="reportes">Reportes</a>
    </div>
    <div id="opcion">
        <?php $this->load->view($opcion_panel); ?>    
    </div>
</div>

<?php
$this->load->view('estructura/pie.php');   
?>