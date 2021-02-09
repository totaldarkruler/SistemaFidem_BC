<div class="contenido-pagina">
    <div class="cuadro-titulo-amarillo">
        Términos de Referencia  
    </div>
    <img src="/imagenes/triangulo-cafe.png">
    <a href="<?php echo base_url(); ?>" class="atras">Inicio</a>

    <div id="mensaje-confirmacion-termino-referencia">
        <span>Finalizado</span>

        <div>
            <span>Nombre del Proyecto:</span>
            <span><?php echo $proyecto->proyecto; ?></span>
        </div>

        <div>
            <span>Solicitante:</span>
            <span><?php echo $solicitante->nombre; ?></span>
        </div>

        <div>
            <div>
                <span>Folio:</span>
                <span><?php echo $proyecto->folio; ?></span>
            </div>
            <div>
                <span>Contraseña:</span>
                <span><?php echo $proyecto->clave; ?></span>
            </div>
        </div>

        <div>
            <p>
                Para acceder al llenado de la cédula es necesario que ingrese el folio y la contraseña, por lo que le recomendamos anotarlas o si lo prefiere imprimirlos. Se le ha enviado esta información al correo que usted proporciono en caso de olvido de contraseña.
            </p>
        </div>
    </div>
</div>
