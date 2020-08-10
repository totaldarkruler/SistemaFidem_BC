<div id="evaluador-cambio-contrasena">
   <div>
       <form id="frmEvaluadorCambiarContrasena" action="/Usuarios/cambiarContrasenaEvaluador/" method="post">
           <input type="hidden" name="usuario_id" value="<?php echo $this->session->userdata('id'); ?>">
           
           <label>Nueva contraseña</label>
           <input id="txtContrasena" type="password" name="contrasenia" value="">
           
           <br>
           <label>Confirme contraseña</label>
           <input id="txtConfirmacionContrasena" type="password" value="">
           
           <br>
           <div class="alinear-derecha">
               <input type="submit" value="Actualizar">
           </div>
       </form>
       
    </div>
</div>