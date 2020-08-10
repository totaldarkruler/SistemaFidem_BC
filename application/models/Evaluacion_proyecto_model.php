<?php
class Evaluacion_proyecto_model extends CI_Model
{
    function obtener_observaciones($proyecto_id, $evaluador_id)
    {
        $condiciones = array(
            'id_proyecto' => $proyecto_id,
            'id_evaluador' => $evaluador_id
        );

      return $this->db->where($condiciones)->get('evaluadores_proyecto')->row();
  
    }
    
    function obtener_evaluacion_proyecto($evaluador_proyecto_id)
    {
        $condiciones = array(
            'id' => $evaluador_proyecto_id
        );

      return $this->db->where($condiciones)->get('evaluadores_proyecto')->row();
  
    }
    
      
    function obtenerEvaluadoresDisponibles($proyecto_id = 0)
    {
        $query = "select * from usuario where id_tipo_usuario= 4";
        
        if ($proyecto_id > 0)
            $query = $query . " and id not in (select id_evaluador from evaluadores_proyecto where id_proyecto = " . $proyecto_id . ")";

        return $this->db->query($query);
     
    }
    
     function obtenerEvaluadoresProyecto($proyecto_id)
    {
        $query = "select 
                    e.id_evaluador, 
                    SUM(r.valor) as resultado,
                    ep.id as evaluador_proyecto_id,
                    es.estatus,
                    ep.*, 
                    u.* 
                from 
                    usuario u,
                    evaluadores_proyecto ep, 
                    evaluaciones e, 
                    respuestas r,
                    estatus es
                WHERE 1=1 
                	and ep.estatus_evaluacion=es.id
                    and ep.id_evaluador = u.id
                    and e.id_respuesta=r.id 
                    and ep.id_proyecto=e.id_proyecto 
                    and ep.id_evaluador=e.id_evaluador 
                    and ep.estatus_evaluacion=7 
                    and ep.id_proyecto=" . $proyecto_id . "
                GROUP BY e.id_evaluador, ep.id, ep.fecha_fin_evaluacion desc              

                union

                select 
                    e.id_evaluador, 
                    0 as resultado,
                    ep.id as evaluador_proyecto_id,
                    es.estatus,
                    ep.*, 
                    u.* 
                from 
                    usuario u,
                    evaluadores_proyecto ep, 
                    evaluaciones e, 
                    respuestas r,
                    estatus es
                WHERE 1=1 
                	and ep.estatus_evaluacion=es.id
                    and ep.id_evaluador = u.id
                    and e.id_respuesta=r.id 
                    and ep.id_proyecto=e.id_proyecto 
                    and ep.id_evaluador=e.id_evaluador 
                    and ep.estatus_evaluacion not in (7,8) 
                    and ep.id_proyecto=" . $proyecto_id . "
               GROUP BY e.id_evaluador, ep.id, ep.fecha_fin_evaluacion desc";
        

        return $this->db->query($query);
     
    }

  
}
?>