<?php
    class Preguntas_model extends CI_Model
    {
        function obtener_preguntas($proyecto, $evaluacion_proyecto)
        {
            $query="select v.variable, p.pregunta, p.pregunta_calculada, r.*, e.id_respuesta 
                    from variable v ,preguntas p, respuestas r 
                    LEFT OUTER Join evaluaciones e ON (e.id_respuesta =r.id)

                WHERE 
                    v.id_tipo_proyecto=" .$proyecto->id_tipo_proyecto . "
                    and e.id_evaluador=".$evaluacion_proyecto->id_evaluador . "
                    and e.id_proyecto=".$proyecto->id . "
                    and p.variable_id=v.id 
                    and r.pregunta_id=p.id
                UNION ALL

                select 
                    v.variable,
                    p.pregunta,
                    p.pregunta_calculada,
                    r.*,
                    null as id_respuesta
                from 
                    variable v ,
                    preguntas p, 
                    respuestas r
                    
                WHERE 
                    v.id_tipo_proyecto=". $proyecto->id_tipo_proyecto . "
                    and p.variable_id=v.id 
                    and r.pregunta_id=p.id
                    and r.id not in 
                        (select r.id
                            from 
                            variable v ,
                            preguntas p, 
                            respuestas r LEFT OUTER Join evaluaciones e ON (e.id_respuesta =r.id)
                        WHERE 
                             v.id_tipo_proyecto=" . $proyecto->id_tipo_proyecto . "
                             and e.id_evaluador=" . $evaluacion_proyecto->id_evaluador . "
                             and e.id_proyecto=" . $proyecto->id . "
                             and p.variable_id=v.id 
                             and r.pregunta_id=p.id)";
            
            return $this->db->order_by('id', 'ASC')->query($query);
            
            
        }
        
        
    }
?>