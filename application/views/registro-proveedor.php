<div id="terminos-referencia" class="contenido-pagina">
    <div class="cuadro-titulo-amarillo">
        Solicitud de Registro
    </div>
    <img src="/imagenes/triangulo-cafe.png">
    <a href="<?php echo base_url(); ?>terminos_referencia" class="atras">Atrás</a>

    <div class="container_12">
        <div id="formulario-terminos-referencia" class="formulario">
            <form action="/proveedor/registro" method="post" enctype='multipart/form-data'> 
                <div class="seccion-formulario"> 
                    <div class="grid_12">
                        <span class="titulo-formulario">Solicitud de Registro</span>

                        <p class="instrucciones centrado">La solicitud de su registro será enviada al organismo intermedio para su revisión</p>
                    </div>
                </div>
<!--
                <div class="seccion-formulario">
                    <p style="position: relative; display: block; background-color: #cc3333; color: #fff; padding: 10px; height: 80px; ">
                        Por favor, no ingrese acentos, tildes, comillas en las cajas siguientes, ya que de lo contrario se invalidará la información. Muchas gracias por su comprensión 
                    </p>
                </div>
-->
                <div class="seccion-formulario"> 
                    <span class="titulo">Datos de la Institución</span>

                    <div class="grid_12">
                        <label for="nombre" class="grid_3 alpha omega">Institución:</label>
                        <input type="text" name="nombre" class="grid_9 alpha omega" data-requerido/>
                    </div>
                    <div class="grid_12">
                        <label for="direccion" class="grid_3 alpha omega">Dirección:</label>
                        <input type="text" name="direccion" class="grid_9 alpha omega" data-requerido />
                    </div>
                    <div class="grid_12">
                        <label for="representante" class="grid_3 alpha omega">Representante:</label>
                        <input type="text" name="representante" class="grid_9 alpha omega" data-requerido />
                    </div>
                    <div class="grid_12">
                        <label for="cargo_representante" class="grid_3 alpha omega">Cargo del Representante:</label>
                        <input type="text" name="cargo_representante" class="grid_9 alpha omega" data-requerido />
                    </div>
                    <div class="grid_12">
                        <div class="grid_7 alpha">
                            <label for="telefono" class="grid_3 alpha omega">Teléfono de Contacto:</label>
                            <input type="text" name="telefono" class="grid_4 alpha omega" data-requerido />
                        </div>
                        <div class="grid_5 omega">
                            <label for="extension" class="grid_2 alpha omega">Extensión:</label>
                            <input type="text" name="extension" class="grid_3 alpha omega" />
                        </div>
                    </div>
                    <div class="grid_12">
                        <label for="correo_electronico" class="grid_3 alpha omega">Correo Electrónico:</label>
                        <input type="text" name="correo_electronico" class="grid_9 alpha omega" data-requerido />
                    </div>
                </div>

                <div class="seccion-formulario">
                    <span class="titulo">Acta Constitutiva</span>

                    <div class="grid_12">
                        <label for="documento" class="grid_2 alpha omega">Adjuntar Archivo:</label>
                        <input type="file" name="documento" class="grid_10 alpha omega requerido" data-requerido />
                    </div>

                </div>

                <div class="seccion-formulario">
                    <div class="grid_12 centrado">
                        <input type="submit" value="Enviar">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>