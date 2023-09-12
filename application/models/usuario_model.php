<?php

    class Usuario_model extends CI_Model{
        public function validar($login, $password)
        {
            /*Validacion con active record
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('login',$login);
            $this->db->where('password',$password);
            return $this->db->get();
            */
            //consulta en MySql puro
            $query="SELECT * FROM usuarios WHERE login='$login' AND password='$password'";
            return $this->db->query($query);
        }
        
        
    }

