<div id="membrete-superior">
    <div>
        <a href="http://cdem.org.mx" target="_blank"><img src="/imagenes/principal/CDEM_LOGO.png"></a>
    </div>

    <div>
        Sistema para la presentación y aprobación de proyectos susceptibles de apoyo por el fidem
        <img src="/imagenes/triangulo-morado.png">
    </div>

</div>
<?php if(@$this->session->flashdata('mensaje')): ?>
<div id="mensaje-notificador">
    <?php echo $this->session->flashdata('mensaje'); ?>
</div> 
<?php endif; ?>

<?php if(@$this->session->flashdata('error')): ?>
<div id="mensaje-error">
    <?php echo $this->session->flashdata('error'); ?>
</div> 
<?php endif; ?>