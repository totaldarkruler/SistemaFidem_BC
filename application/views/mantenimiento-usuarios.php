<div>
    <div class="subopcion">
        <span>REGISTRO DE USUARIOS</span>
        <?php if($usuario == null) : ?>        
        <div class="formulario">
            <form action="/usuarios/guardar" method="post">  
                <input type="hidden" name="id" value="0" />

                <div class="seccion-formulario"> 
                    <div class="campo">
                        <label for="tipo_usuario" class="columna_3">Tipo de usuario:</label>
                        <select name="tipo_usuario">
                            <?php foreach($tipos_usuario->result() as $tipo_usuario) : ?>                           
                            <option value="<?php echo $tipo_usuario->id; ?>" class="columna_6"><?php echo $tipo_usuario->tipo; ?></option>                       
                            <?php endforeach; ?>
                        </select>  
                    </div>   
                      <div class="campo">
                        <label for="usuario" class="columna_3">Usuario:</label>
                        <input type="text" name="usuario" class="columna_6" />                       
                    </div>  
                    <div class="campo">
                        <label for="nombre" class="columna_3">Nombre:</label>
                        <input type="text" name="nombre" class="columna_6" />                       
                    </div>    
                    <div class="campo">
                        <label for="ap_paterno" class="columna_3">Ap. Paterno:</label>
                        <input type="text" name="ap_paterno" class="columna_2" />
                        <label for="ap_materno" class="columna_2">Ap. Materno:</label>
                        <input type="text" name="ap_materno" class="columna_2" />
                    </div>
                    <div class="campo">
                        <label for="puesto" class="columna_3">Puesto:</label>
                        <input type="text" name="puesto" class="columna_6" />
                    </div>   
                    <div class="campo">
                        <label for="contrasenia" class="columna_3">Contraseña:</label>
                        <input type="password" name="contrasenia" class="columna_6" />
                    </div> 
                    <div class="campo">
                        <label for="confirmacion_contrasenia" class="columna_3">Confirmar Contraseña:</label>
                        <input type="password" name="confirmacion_contrasenia" class="columna_6" />
                    </div>   
                      <div class="campo">
                        <label for="correo" class="columna_3">Correo:</label>
                        <input type="text" name="correo" class="columna_6" />
                    </div>  
                </div>
                <div class="columna_9">
                    <div class="alinear-derecha">
                        <input type="submit" class="boton" value="Guardar">     
                    </div>
                </div>

            </form> 
        </div>
        <?php else : ?>
        <!-- aqui el formulario para modificar -->
        <div class="formulario">
            <form action="/usuarios/guardar" method="post">  
                <input type="hidden" name="id" value="<?php echo $usuario->id; ?>" />

                <div class="seccion-formulario"> 
                    <div class="campo">
                        <label for="tipo_usuario" class="columna_3">Tipo de usuario:</label>
                        <select name="tipo_usuario">
                            <?php foreach($tipos_usuario->result() as $tipo_usuario) : ?>                           
                            <option value="<?php echo $tipo_usuario->id; ?>" class="columna_6" <?php if($usuario->id_tipo_usuario == $tipo_usuario->id) echo 'selected'; ?>><?php echo $tipo_usuario->tipo; ?></option>                       
                            <?php endforeach; ?>
                        </select>  
                    </div>   
                    <div class="campo">
                        <label for="usuario" class="columna_3">Usuario:</label>
                        <input type="text" name="usuario" class="columna_6" value="<?php echo $usuario->usuario; ?>" />                       
                    </div>    
                    <div class="campo">
                        <label for="nombre" class="columna_3">Nombre:</label>
                        <input type="text" name="nombre" class="columna_6" value="<?php echo $usuario->nombre; ?>" />                       
                    </div>    
                    <div class="campo">
                        <label for="ap_paterno" class="columna_3">Ap. Paterno:</label>
                        <input type="text" name="ap_paterno" class="columna_2" value="<?php echo $usuario->ap_paterno; ?>" />
                        <label for="ap_materno" class="columna_2">Ap. Materno:</label>
                        <input type="text" name="ap_materno" class="columna_2" value="<?php echo $usuario->ap_materno; ?>" />
                    </div>
                    <div class="campo">
                        <label for="puesto" class="columna_3">Puesto:</label>
                        <input type="text" name="puesto" class="columna_6" value="<?php echo $usuario->puesto; ?>" />
                    </div>   
                    <div class="campo">
                        <label for="contrasenia" class="columna_3">Contraseña:</label>
                        <input type="password" name="contrasenia" class="columna_6" value="<?php echo $usuario->contrasenia; ?>" />
                    </div> 
                    <div class="campo">
                        <label for="confirmacion_contrasenia" class="columna_3">Confirmar Contraseña:</label>
                        <input type="password" name="confirmacion_contrasenia" class="columna_6" value="<?php echo $usuario->contrasenia; ?>" />
                    </div>  
                    <div class="campo">
                        <label for="correo" class="columna_3">Correo:</label>
                        <input type="text" name="correo" class="columna_6" value="<?php echo $usuario->correo; ?>" />
                    </div>  
                </div>
                <div class="columna_9">
                    <div class="alinear-derecha">
                        <input type="submit" class="boton" value="Guardar">     
                    </div>
                </div>

            </form> 
        </div>


        <?php endif; ?>

        <br><br>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th></th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php if (@$usuarios->num_rows() > 0) : ?>
                    <?php foreach ($usuarios->result() as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario->nombre . ' ' . $usuario->ap_paterno . ' ' . $usuario->ap_materno; ?></td>
                        <td><?php echo $usuario->usuario; ?></td>
                        <td>
                            <a href="/usuarios/editar/<?php echo $usuario->id ?>">Editar</a>
                            <a href="/usuarios/eliminar/<?php echo $usuario->id ?>" onclick="return confirm('Esta usted seguro de eliminar el usuario seleccionado?');">Eliminar</a>                            
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>