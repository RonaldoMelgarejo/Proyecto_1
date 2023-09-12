<?php

    class Medicion_model extends CI_Model{
        public function listamediciones()
        {
            $this->db->select('*');
            $this->db->from('mediciones');
            $this->db->where('estado','1');
            return $this->db->get();
        }

        public function listamedicionesdesh()
        {
            $this->db->select('*');
            $this->db->from('mediciones');
            $this->db->where('estado','0');
            return $this->db->get();
        }

        public function agregarmedicion($data)
        {
            $this->db->insert('mediciones',$data); 
        }

        public function eliminarmedicion($idmedicion)
        {
            $this->db->where('idMedicion',$idmedicion);
            $this->db->delete('mediciones');
        }

        public function recuperarmedicion($idmedicion)
        {
            $this->db->select('*');
            $this->db->from('mediciones');
            $this->db->where('idMedicion',$idmedicion);
            return $this->db->get();
        }

        public function modificarmedicion($idmedicion,$data)
        {
            $this->db->where('idMedicion',$idmedicion);
            $this->db->update('mediciones',$data);
        }
        
    }

