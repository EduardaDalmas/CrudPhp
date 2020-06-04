<?php
    class usuario_model extends CI_Model {

        public function getUsuarios() {
            $sql = "SELECT * FROM usuarios ORDER BY nome";
            $result = $this->db->query($sql);
            $array_resultado = $result->result_array();
            return $array_resultado;
        }

        public function get($id = null) {
            if ($id) {
                $this->db->where('id', $id);
            }
            $this->db->order_by("nome");
            return $this->db->get('usuarios');

        }

        public function gravar($dados = null, $id = null) {
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->update('usuarios', $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
            if ($this->db->insert('usuarios', $dados)) {
                return true;
            } else {
                return false;
            }
        }

        public function excluir($id = null) 
        {
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->delete('usuarios')) {
                    return true;
                } else {
                    return false;
                }
            }
        }

    }
?>