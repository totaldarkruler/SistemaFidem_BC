<div id="abrir-proyecto" class="contenido-pagina">
    <a href="<?php echo base_url(); ?>" class="atras">Abrir Proyecto</a>

    <div id="informacion-proyecto" class="margen-izquierdo">
            <form action="<?php echo base_url(); ?>cedula/mostrar" method="post">
                <label for="folio_proyecto">Folio del Proyecto</label>
                <input type="text" name="folio_proyecto" placeholder="0000/15">
                <br>
                <label for="contrasenia">Contraseña</label>
                <input type="password" name="contrasenia">

                <div class="alinear-derecha">
                    <input type="submit" class="boton" value="Aceptar">     
                </div>
            </form>  
    </div>
</div>