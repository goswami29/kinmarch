<?php

class Auth_model extends CI_Model
{
    public function _construct()
    {
        parent::__construct();
    }
    function add_data($data, $table) {
        return $this->db->insert($table, $data);
    }
    function update_data($data, $where, $table) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                if (is_array($val)) {
                    $s = substr($key, 0, 1);
                    $st = substr($key, 1);
                    if ($s == '!') {
                        $this->db->where_not_in($st, $val);
                    } else {
                        $this->db->where_in($key, $val);
                    }
                } else {
                    $this->db->where($key, $val);
                }
            }
        }
        return $this->db->update($table, $data);
    }
    
    function upload_data($data, $table) {
        
        return $this->db->insert($table, $data);
    }
}
?>
