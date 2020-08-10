<?php
$this->load->view('estructura/encabezado.php');
?>

<a href="<?php echo base_url(); ?>" class="atras">Atrás</a>


<div id="sesion" class="contenido-pagina">
    <img src="/imagenes/principal/CDEM_LOGO.png"> 

    <div id="informacion-sesion">
        <div>
            Evaluación de Proyectos
            <img src="/imagenes/triangulo-cafe.png">
        </div>
        <form id="form-iniciar-sesion" action="<?php echo base_url(); ?>Sesion/iniciar/4" method="post">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario">
            <br>
            <label for="contrasenia">Contraseña</label>
            <input type="password" name="contrasenia">

            <br><br>
            <input type="submit" class="boton" value="Aceptar">     
        </form>

    </div>
</div>