<?php

class Career_model extends CI_Model
{
    public function findByCode($code){
        try{
            $this->db->where('code_career', $code);
            $query = $this->db->get('university_careers');
            return $query->result_array()[0];
        }catch (Exception $e){
            return null;
        }
    }

}
 
