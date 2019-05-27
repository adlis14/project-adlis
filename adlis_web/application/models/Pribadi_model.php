<?php 
class Pribadi_model extends CI_Model{
    public function getPribadi($id = null) {
        if($id != ''){
            return $this->db->get_where('pribadi', array('id' => $id))->result();
        }else{
            return $this->db->get('pribadi')->result();
        }
    }

    public function tambahDataPribadi($data){
        $this->db->insert('pribadi', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataPribadi($id){
        $this->db->where("id = $id");
        return $this->db->delete('pribadi');;
    }

    public function ubahDataPribadi($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('pribadi', $data);
    }
    
}