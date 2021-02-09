<?php
class Proyecto_model extends CI_Model
{
    function obtener_proyectos()
    {  
        $query = "select p.id, p.folio, p.proyecto as proyecto, p.fecha_envio_cedula, i.nombre as institucion, e.estatus as estatus_evaluacion from institucion i, proyecto p LEFT OUTER Join estatus e on p.id_estatus_evaluacion = e.id where p.id_institucion = i.id and (p.id_estatus!=2 or p.id_estatus is null) order by id desc";
        //$query = "select p.id, p.folio, p.proyecto as proyecto, p.fecha_envio_cedula, p.otro_estudio, i.nombre as institucion from proyecto p, institucion i where p.id_institucion = i.id and (p.id_estatus!=2 or p.id_estatus is null) order by id desc";-->
        if ($this->db->query($query)->num_rows() > 0)
            return $this->db->query($query);
        else
            return false;
    }
    
    function obtener_proyectos_evaluar()
    {  
        $query = "SELECT evaluadores_proyecto.id as proyecto_evaluador_id, proyecto.* FROM evaluadores_proyecto, proyecto where evaluadores_proyecto.id_evaluador=" . $this->session->userdata('id') . " and evaluadores_proyecto.estatus_evaluacion=6 and evaluadores_proyecto.id_proyecto=proyecto.id";

        if ($this->db->query($query)->num_rows() > 0)
            return $this->db->query($query);
        else
            return false;
    }
    
    function obtener_proyectos_evaluados()
    {  
        $query = "SELECT ep.id as proyecto_evaluador_id, 
SUM( r.valor ) AS resultado, 
p . * 
FROM evaluaciones e, respuestas r, evaluadores_proyecto ep, proyecto p
WHERE 1 =1
AND ep.id_evaluador = e.id_evaluador
AND ep.id_proyecto = e.id_proyecto
AND e.id_respuesta = r.id
AND e.id_proyecto = p.id
AND ep.estatus_evaluacion =7
AND e.id_evaluador=" . $this->session->userdata('id') . " GROUP BY ep.id order by ep.fecha_fin_evaluacion desc";

        if ($this->db->query($query)->num_rows() > 0)
            return $this->db->query($query);
        else
            return false;
    }

    function obtener_tipos_proyecto()
    {  
        if ($this->db->get('tipo_proyecto')->num_rows() > 0)
            return $this->db->get('tipo_proyecto');
        else
            return false;
    }

    function obtener_proyecto($id)
    {
        $query = "SELECT p.*, tp.tipo as tipo_proyecto, i.nombre as solicitante
                    FROM proyecto p, tipo_proyecto tp, institucion i 
                    WHERE p.id_tipo_proyecto = tp.id and p.id_institucion = i.id and p.id = " . $id;

        return $this->db->query($query)->row();
    }

    function abrir_proyecto($folio, $contrasenia)
    {
        $query = "select * from proyecto where folio = '" . $folio . "' and clave = '" . $contrasenia ."'";

        return $this->db->query($query)->row();
    }

    function nuevo_proyecto($datos)
    {
        $agregado = false;

        $this->db->trans_begin();

        // agregar el proyecto
        $proyecto = array(
            'proyecto' => strtoupper($datos['nombre_proyecto']),
            'id_institucion' => $datos['id_institucion'],
            'correo' => strtoupper($datos['correo_electronico']),
            'folio' => 'el folio',
            'clave' => 'la clave',
            'id_tipo_proyecto' => 1,
            'costo_total' => 0,
            'apoyo_fidem' => 0,
            'apoyo_fidem_solicitado' => 0,
            'otro_apoyo' => 0,
            'otro_apoyo_porcentaje' => 0,
            'apoyo_fidem_porcentaje' => 0,
            'cantidad_letra' => '',
            'dias_letra' => '',
            'id_estatus' => 3

        );
        $this->db->insert('proyecto', $proyecto);
        $proyecto_id = $this->db->insert_id();

        // actualizar el folio = id/año actual (yy)
        $condiciones = array(
            'id' => $proyecto_id
        );
        $proyecto = array(
            'folio' => $proyecto_id . "/" . date("y"),
            'clave' => 'XWS6' . $proyecto_id . 'WRZ'
        );

        // actualizarlo
        $this->db->where($condiciones)->update("proyecto", $proyecto);

        // agregar por defecto los meses de enero a diciembre
        $actividad_titulo = array(
            'id_proyecto' => $proyecto_id,         
            'titulo_col1' => strtoupper("ENE"),
            'titulo_col2' => strtoupper("FEB"),
            'titulo_col3' => strtoupper("MAR"),
            'titulo_col4' => strtoupper("ABR"),
            'titulo_col5' => strtoupper("MAY"),
            'titulo_col6' => strtoupper("JUN"),
            'titulo_col7' => strtoupper("JUL"),
            'titulo_col8' => strtoupper("AGO"),
            'titulo_col9' => strtoupper("SEP"),
            'titulo_col10' => strtoupper("OCT"),
            'titulo_col11' => strtoupper("NOV"),
            'titulo_col12' => strtoupper("DIC"),

        );
            $this->db->insert('actividad_titulo', $actividad_titulo);


        // agregar los documentos con el id generado del proyecto (exclusivos de gobierno)
        $num_files = 0;
        for($i=0; $i < $num_files;$i++)
        {
            $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/DOCUMENTOS/ANEXOS_GOBIERNO/';
            $uploadfile = $uploaddir . $_FILES['documento']['name'][$i];

            // copy the file to the specified dir 
            if (move_uploaded_file($_FILES['documento']['tmp_name'][$i], $uploadfile)) {
                $proyecto_documento = array(
                    'id_proyecto' => $proyecto_id,
                    'id_clasificacion' => 5, // anexo de gobierno 
                    'documento' => strtoupper($_FILES['documento']['name'][$i]),
                    'ruta' => strtoupper("/DOCUMENTOS/ANEXOS_GOBIERNO/"),
                    'fecha' => date('Y-m-d H:i:s')                   
                );

                // insertar el registro
                $this->db->insert('proyecto_documento', $proyecto_documento);

                if ($this->db->trans_status() === TRUE)
                {
                    $agregado = true;
                    $this->db->trans_commit();
                }
                else
                {
                    $this->db->trans_rollback();
                    $agregado = false;         
                }

            } // fin del if move_uploaded_file
            else
            {
                $agregado = false;
                break;
            }
        }

        // agregar el archivo del termino de referencia
        // agregar el documento de termino de referencia 
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/DOCUMENTOS/TERMINOS_REFERENCIA/';
        $uploadfile = $uploaddir . $_FILES['archivo']['name'];

        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $uploadfile)) 
        {
            $documento_sistema = array(
                'id_proyecto' => $proyecto_id,
                'id_clasificacion' => 4, // terminos de referencia
                'documento' => $_FILES['archivo']['name'],
                'ruta' => strtoupper("/DOCUMENTOS/TERMINOS_REFERENCIA/"),
                'fecha' => date('Y-m-d H:i:s')
            );

            // insertar el registro
            $this->db->insert('proyecto_documento', $documento_sistema);


            if ($this->db->trans_status() === TRUE)
            {
                $agregado = true;
                $this->db->trans_commit();
            }
            else
            {
                $this->db->trans_rollback();
                $agregado = false;         
            }
        } else {
            $agregado = false;
            //break;
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $agregado = false;                       
        }
        else
        {
            $this->db->trans_commit();
            $agregado = true;
        }


        return $proyecto_id;

    }

    function actualizar_proyecto($datos)
    {
        $editado = false;

        $this->db->trans_begin();

        $monto = substr($datos['apoyo_fidem_solicitado'],0,1);

        if ($monto == "$") 
            $monto_aux = str_replace(',', '', substr($datos['apoyo_fidem_solicitado'],1)); 
        else  if ($monto != "$") 
            $monto_aux = str_replace(',', '', $datos['apoyo_fidem_solicitado']);

        $justificacion ="";
        $no_requiere_estudio = 1;
        if (@$datos['seccion-11-justificacion'] == "" || @$datos['seccion-11-justificacion'] == null)
            $no_requiere_estudio = 0;
        else
            $justificacion=strtoupper($datos['seccion-11-justificacion']);

        // agregar el proyecto
        $proyecto = array(
            'proyecto' => strtoupper($datos['proyecto']),
            'id_tipo_proyecto' => $datos['id_tipo_proyecto'],
            'ob_general' => strtoupper($datos['ob_general']),
            'ob_especifico' => strtoupper($datos['ob_especifico']),
            'antecedentes' => strtoupper($datos['antecedentes']),
            'problematica' => strtoupper($datos['problematica']),
            'solucion' => strtoupper($datos['solucion']),
            'alcance' => strtoupper($datos['alcance']),
            'impacto' => strtoupper($datos['impacto']),
            'fecha_inicio' => date('Y-m-d', strtotime($datos['fecha_inicio'])),
            'fecha_fin' => date('Y-m-d', strtotime($datos['fecha_fin'])),
            'cantidad_letra' => strtoupper($datos['cantidad_letra']),
            'dias_letra' => $datos['dias_letra'],
            'apoyo_fidem_solicitado' => $monto_aux,
            'no_requiere_estudio' => $no_requiere_estudio,
            'justificar_otro_estudio' => $justificacion,
            'apoyo_fidem_porcentaje' => $datos['apoyo_fidem_porcentaje'],
            'otro_apoyo_porcentaje' => $datos['otro_apoyo_porcentaje']

        );
        $condiciones = array(
            'id' => $datos['id']
        );
        $this->db->where($condiciones)->update('proyecto', $proyecto);
        /*
        if (@$datos['seccion-11-otros'] != "" || @$datos['seccion-11-otros'] != null 
            || @$datos['seccion-11-justificacion'] != "" || @$datos['seccion-11-justificacion'] != null)
        {
            $proyecto_documento = array(
                'id_proyecto' => $datos['id'],
                'id_clasificacion' => 6,
                'fecha' => date('Y-m-d H:i:s'),
                'id_tipo_estudio' => $datos['tipo_estudio_id']
            );


            // insertar el registro
            $this->db->insert('proyecto_documento', $proyecto_documento);
        }
        */

        // actualizar los titulos
        $condiciones = array(
            'id_proyecto' => $datos['id']
        );
        $actividad_titulo = array(         
            'titulo_col1' => strtoupper($datos['actividad_titulo1']),
            'titulo_col2' => strtoupper($datos['actividad_titulo2']),
            'titulo_col3' => strtoupper($datos['actividad_titulo3']),
            'titulo_col4' => strtoupper($datos['actividad_titulo4']),
            'titulo_col5' => strtoupper($datos['actividad_titulo5']),
            'titulo_col6' => strtoupper($datos['actividad_titulo6']),
            'titulo_col7' => strtoupper($datos['actividad_titulo7']),
            'titulo_col8' => strtoupper($datos['actividad_titulo8']),
            'titulo_col9' => strtoupper($datos['actividad_titulo9']),
            'titulo_col10' => strtoupper($datos['actividad_titulo10']),
            'titulo_col11' => strtoupper($datos['actividad_titulo11']),
            'titulo_col12' => strtoupper($datos['actividad_titulo12'])

        );
        $this->db->where($condiciones)->update('actividad_titulo', $actividad_titulo);


        // guardar el anexo nuevo de tipo de estudio
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/DOCUMENTOS/TIPOS_ESTUDIO/';
        $uploadfile = $uploaddir . $_FILES['archivo_tipo_estudio']['name'];

        if ($_FILES['archivo_tipo_estudio']['name'] != null)
        {
            if (move_uploaded_file($_FILES['archivo_tipo_estudio']['tmp_name'], $uploadfile)) {
                {
                    $proyecto_documento = array(
                        'id_proyecto' => $datos['id'],
                        'id_clasificacion' => 6,
                        'documento' => $_FILES['archivo_tipo_estudio']['name'],
                        'ruta' => strtoupper('/DOCUMENTOS/TIPOS_ESTUDIO/'),
                        'fecha' => date('Y-m-d H:i:s'),
                        'id_tipo_estudio' => $datos['tipo_estudio_id'],
                        'otro_estudio' => strtoupper($datos['seccion-11-otros'])
                    );


                    // insertar el registro
                    $this->db->insert('proyecto_documento', $proyecto_documento);

                    if ($this->db->trans_status() === FALSE)
                    {
                        $this->db->trans_rollback();
                        $editado = false;
                    }
                    else
                    {
                        $this->db->trans_commit();
                        $editado = true;
                    }
                }
            } else {
                $editado = false;
            }
        }
        else
        {
            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                $editado = false;
            }
            else
            {
                $this->db->trans_commit();
                $editado = true;
            }
        }


        return $editado;

    }

    function actualizar_proyecto_administrador($datos)
    {
        $editado = false;

        $this->db->trans_begin();

        // agregar el proyecto
        $proyecto = array(
            
            'ciudadid' => $datos['ciudad_id'],
            
            'clave_proyecto' => strtoupper($datos['clave_proyecto']),
            'fecha_recepcion' => date('Y-m-d', strtotime($datos['fecha_recepcion'])),
            'area_influencia' => strtoupper($datos['area_influencia']),
            'linea_estrategica' => strtoupper($datos['linea_estrategica']),
            'fecha_reunion' => date('Y-m-d', strtotime($datos['fecha_reunion'])),
            'no_reunion' => strtoupper($datos['no_reunion'])
        );
        $condiciones = array(
            'id' => $datos['id']
        );
        $this->db->where($condiciones)->update('proyecto', $proyecto);


        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $editado = false;
        }
        else
        {
            $this->db->trans_commit();
            $editado = true;
        }

        return $editado;

    }
    
    function desbloquear_puntos_proyecto_administrador($datos){
        echo $datos;
    }


    function buscar_proyecto($datos)
    {

        $fecha_inicio = $datos['fecha_inicio'];
        $fecha_fin = $datos['fecha_fin'];

        $institucion_id = $datos['institucion_id'];
        /*
        if ($fecha_inicio != "1969-12-31 00:00:00" && $fecha_fin != "1969-12-31 00:00:00")
            $query = "select p.id, p.folio, p.proyecto as proyecto, p.fecha_envio_cedula, i.nombre as institucion from proyecto p, institucion i where p.id_institucion = i.id and p.fecha_inicio >= '$fecha_inicio' and p.fecha_fin <= '$fecha_fin'";
        else
        */
        $query = "select p.id, p.folio, p.proyecto as proyecto, p.fecha_envio_cedula, i.nombre as institucion from proyecto p, institucion i where p.id_institucion = i.id";

        if ($institucion_id > 0)
            $query .= " and p.id_institucion = $institucion_id";

        if ($fecha_inicio != null)
            $query .= " and p.fecha_inicio >= '$fecha_inicio' and p.fecha_fin <= '$fecha_fin'";

        return $this->db->query($query);
    }

    function enviar_cedula_proyecto($datos)
    {
        $enviada = false;
		$this->db->trans_begin();

        $proyecto = array(
            'fecha_envio_cedula' => date('Y-m-d H:i:s'),
            'id_estatus' => 3, // en revision
            'id_estatus_evaluacion' => 9 // pendiente de evaluar
        );
        $condiciones = array(
            'id' => $datos['proyecto_id']
        );
		
        $this->db->where($condiciones)->update('proyecto', $proyecto);
		
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $enviada = false;
        }
        else
        {
            $this->db->trans_commit();
            $enviada = true;
        }

        return $enviada;

    }

    function eliminar_proyecto_administrador($proyecto_id, $url)
    {
        $eliminado = false;

        $this->db->trans_begin();

        $condicion = array(
            'id' => $proyecto_id
        );
        $proyecto = array(
            'id_estatus' => 2
        );
        $this->db->where($condicion)->update('proyecto',$proyecto);

        // insertar en bitacora
        
        $bitacora = array(
            'tabla' => 'PROYECTO',
            'id_eliminado' => $proyecto_id,
            'usuario' => $this->session->userdata('id'),
            'fecha' => date('Y-m-d H:i:s'),
            'url' => strtoupper(base_url(uri_string()))
        );
        $this->db->insert("bitacora_eliminado", $bitacora);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $eliminado = false;
        }
        else
        {
            $this->db->trans_commit();
            $eliminado = true;
        }

        return $eliminado;

    }
    
    function actualizar_no_evaluadores($datos)
    {
         $actualizado = false;

        $this->db->trans_begin();

        $proyecto = array(
            'no_evaluadores' => $datos['no_evaluadores']
        );
        $condiciones = array(
            'id' => $datos['proyecto_id']
        );
        $this->db->where($condiciones)->update('proyecto', $proyecto);


        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $actualizado = false;
        }
        else
        {
            $this->db->trans_commit();
            $actualizado = true;
        }

        return $actualizado;
    }
    
    function agregar_evaluador($datos)
    {
         $agregado = false;

        $this->db->trans_begin();

        $proyecto = array(
            'id_proyecto' => $datos['proyecto_id'],
            'id_evaluador' => $datos['evaluador_id'],
            'estatus_evaluacion' => 6
        );
        $this->db->insert('evaluadores_proyecto', $proyecto);

        // cambiar el estatus del proyecto a "en evaluacion"
        $condiciones=array(
            'id' => $datos['proyecto_id']
        );
        $proyecto = array(
            'id_estatus_evaluacion' => 6 // en evaluacion
        );
        $this->db->where($condiciones)->update("proyecto", $proyecto);
        
        // agregar respuesta
        $registro = $this->db->query("select i.* 
                                    FROM
                                    gestion_ingresos i,
                                    proyecto p
                                    WHERE 1=1
                                    and p.id_tipo_proyecto=i.tipo_proyecto_id
                                    and p.costo_total BETWEEN limite_inferior and limite_superior
                                    and p.apoyo_fidem_porcentaje BETWEEN porcentaje_inferior AND porcentaje_superior
                                    and p.id=" . $datos['proyecto_id'])->row();
        
        $evaluacion = array(
            'id_proyecto' => $datos['proyecto_id'],
            'id_evaluador' => $datos['evaluador_id'],
            'id_respuesta' => $registro->respuesta_id
        );
        $this->db->insert("evaluaciones", $evaluacion);
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $agregado = false;
        }
        else
        {
            $this->db->trans_commit();
            $agregado = true;
        }

        return $agregado;
    }
    
    function eliminar_evaluador($proyecto_id, $evaluador_id)
    {
         $eliminado = false;

        $this->db->trans_begin();

        $condiciones = array(
            'id_evaluador' => $evaluador_id,
            'id_proyecto' => $proyecto_id
        );
        $evaluador_proyecto = array(
            'estatus_evaluacion' => 8 // evaluacion cancelada
        );
        $this->db->where($condiciones)->update('evaluadores_proyecto', $evaluador_proyecto);

        // revisar, si todas las evaluaciones fueron concluidas (estatus 7), entonces actualizar estatus del proyecto a 7 (evaluado)
        // si no tiene ningun registro en evaluadores_proyecto entonces cambiar el estatus del proyecto a 9 (pendiente evaluar)
        $query ="select * from evaluadores_proyecto where estatus_evaluacion != 8 and id_proyecto = " . $proyecto_id;
        $evaluaciones = $this->db->query($query);
        
        if ($evaluaciones->num_rows() > 0)
        {
            $bTodasEvaluadas = true;
            foreach($evaluaciones->result() as $evaluacion)
            {
                if ($evaluacion->estatus_evaluacion != 7)
                    $bTodasEvaluadas = false;
            }

            if ($bTodasEvaluadas)
            {
                $condiciones = array(
                    'id' => $proyecto_id
                );
                $proyecto = array(
                    'id_estatus_evaluacion' => 7 //evaluado
                );
                $this->db->where($condiciones)->update("proyecto", $proyecto);
            }
             else
            {
                 $condiciones = array(
                      'id' => $proyecto_id
                  );
                  $proyecto = array(
                      'id_estatus_evaluacion' => 6 // en evaluacion
                  );
                  $this->db->where($condiciones)->update("proyecto", $proyecto);
            }
        }
        else
        {
             $condiciones = array(
                  'id' => $proyecto_id
              );
              $proyecto = array(
                  'id_estatus_evaluacion' => 9 // pendiente de evaluar
              );
              $this->db->where($condiciones)->update("proyecto", $proyecto);
        }
        
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $eliminado = false;
        }
        else
        {
            $this->db->trans_commit();
            $eliminado = true;
        }

        return $eliminado;
    }
    
    function guardar_evaluacion()
    {
        $guardada = false;
        $proyecto_id = $_POST['proyecto_id'];
        $evaluador_id = $_POST['evaluador_id'];
        $observaciones = $_POST['observaciones'];
        
        
         $this->db->trans_begin();
        
        // eliminar todas las respuestas guardadas anteriormente
         $condicion = array(
            'id_proyecto' => $proyecto_id,
            'id_evaluador' => $evaluador_id
        );
        $this->db->where($condicion)->delete("evaluaciones");
        
        // agregar cada una de las respuestas nuevas
        //$my_array = $_POST['respuesta_id'];
        //$cont = 0;
        
         foreach($_POST['respuesta_id'] as $respuesta){ 
              $registro = array(
                            'id_proyecto' => $proyecto_id,
                            'id_evaluador' => $evaluador_id,
                            'id_respuesta' => $respuesta
              );
              $this->db->insert('evaluaciones', $registro);
         }
        
         // agregar la observacion a la tabla evaluadores_proyecto
        $evaluador_proyecto = array(
            'observaciones' => $observaciones
        );
        $condiciones = array(
            'id_proyecto' => $proyecto_id,
            'id_evaluador' => $evaluador_id
        );
        $this->db->where($condiciones)->update('evaluadores_proyecto',$evaluador_proyecto);
        
         if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $guardada = false;
        }
        else
        {
            $this->db->trans_commit();
            $guardada = true;
        }

        return $guardada;
        
    }
    
    
    function finalizar_evaluacion()
    {
         $finalizada = false;
        
         $proyecto_id = $_POST['proyecto_id'];
         $observaciones = $_POST['observaciones'];
         $evaluador_id = $_POST['evaluador_id'];
        
        $this->db->trans_begin();
        
        
        // eliminar todas las respuestas guardadas anteriormente
         $condicion = array(
            'id_proyecto' => $proyecto_id,
            'id_evaluador' => $evaluador_id
        );
        $this->db->where($condicion)->delete("evaluaciones");
        
        // agregar cada una de las respuestas nuevas
         foreach($_POST['respuesta_id'] as $respuesta){ 
              $registro = array(
                            'id_proyecto' => $proyecto_id,
                            'id_evaluador' => $evaluador_id,
                            'id_respuesta' => $respuesta
              );
              $this->db->insert('evaluaciones', $registro);
         }
        
        

        // agregar la observacion a la tabla evaluadores_proyecto
        $evaluador_proyecto = array(
            'observaciones' => strtoupper($observaciones),
            'estatus_evaluacion' => 7, // EVALUADO
            'fecha_fin_evaluacion' => @date('Y-m-d H:i:s')
        );
        $condiciones = array(
            'id_proyecto' => $proyecto_id,
            'id_evaluador' => $evaluador_id
        );
        $this->db->where($condiciones)->update('evaluadores_proyecto',$evaluador_proyecto);

        
        // revisar que si todas las evaluaciones (excepto 8 canceladas) de este proyecto estan 7 (evaluado)
        // entonces cambiar el estatus del proyecto a evaluado
        
        $query ="select * from evaluadores_proyecto where estatus_evaluacion != 8 and id_proyecto = " . $proyecto_id;
        $evaluaciones = $this->db->query($query);
        
        if ($evaluaciones->num_rows() > 0)
        {
            $bTodasEvaluadas = true;
            foreach($evaluaciones->result() as $evaluacion)
            {
                if ($evaluacion->estatus_evaluacion != 7)
                    $bTodasEvaluadas = false;
            }

            if ($bTodasEvaluadas)
            {
                $condiciones = array(
                    'id' => $proyecto_id
                );
                $proyecto = array(
                    'id_estatus_evaluacion' => 7 //evaluado
                );
                $this->db->where($condiciones)->update("proyecto", $proyecto);
            }
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $finalizada = false;
        }
        else
        {
            $this->db->trans_commit();
            $finalizada = true;
        }

        return $finalizada;
    }
    
     function obtener_valores($proyecto_id)
    {
        $query = "SELECT 
	v.id, 
	v.variable, 
	v.id_tipo_proyecto, 
	tp.tipo, 
	e.id_proyecto,
	py.proyecto,
	py.clave_proyecto,
	py.area_influencia,
	py.impacto,
	py.costo_total,
	py.apoyo_fidem_solicitado,
	py.id_institucion,
	i.nombre as nombre_institucion,
	p.id, 
	p.pregunta, 
	r.id, 
	r.respuesta, 
	sum(r.valor)/(select COUNT(ep.id_evaluador) from evaluadores_proyecto ep WHERE 1=1 and ep.estatus_evaluacion=7 AND  ep.id_proyecto=$proyecto_id) as resultado, 
	ep.estatus_evaluacion, 
	es.estatus 
FROM 
	variable v, 
	preguntas p, 
	respuestas r, 
	evaluaciones e, 
	evaluadores_proyecto ep, 
	tipo_proyecto tp, 
	usuario u, 
	estatus es,
	proyecto py,
	institucion i
WHERE 1=1 
	AND v.id=p.variable_id 
	AND p.id=r.pregunta_id 
	AND r.id=e.id_respuesta 
	AND e.id_proyecto=ep.id_proyecto 
	AND ep.id_evaluador=e.id_evaluador 
	AND v.id_tipo_proyecto=tp.id 
	AND u.id=e.id_evaluador 
	AND ep.estatus_evaluacion=es.id 
	AND ep.id_proyecto=py.id
	and py.id_institucion=i.id
	AND ep.estatus_evaluacion=7 
	AND ep.id_proyecto=$proyecto_id
GROUP BY v.id
ORDER BY ep.id_evaluador ASC, v.id ASC";

        return $this->db->query($query);
    }

    function guardar_observacion_evaluacion()
    {
        $guardada = false;
        
         $proyecto_id = $_POST['proyecto_id'];
         $comentarios = $_POST['comentarios'];
        
        $this->db->trans_begin();
        
        $proyecto = array(
            'observaciones_evaluacion' => strtoupper($comentarios)
        );
        $condiciones = array(
            'id' => $proyecto_id
        );
        $this->db->where($condiciones)->update('proyecto',$proyecto);


        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $guardada = false;
        }
        else
        {
            $this->db->trans_commit();
            $guardada = true;
        }

        return $guardada;
    }
}
?>