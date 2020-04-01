<?php
class Operator_model extends CI_Model
{

    public function getOperator($id = null)
    {
        if ($id === null) {
            return $this->db->get('operator')->result_array();
        } else {
            return $this->db->get_where('operator', ['id' => $id])->result_array();
        }
    }

    public function deleteOperator($id)
    {
        $this->db->delete('operator', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createOperator($data)
    {
        $this->db->insert('operator', $data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($data, $id)
    {
        $this->db->update('operator', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
