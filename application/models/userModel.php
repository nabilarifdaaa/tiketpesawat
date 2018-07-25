<?php
class UserModel extends CI_Model{
   public function register($enc_password){
       // Array data user
       $data = array(
           'Nama' => $this->input->post('nama'),
           'Ktp' => $this->input->post('ktp'),
           'Email' => $this->input->post('email'),
           'NoHp' => $this->input->post('nohp'),
           'fk_level_id' => $this->input->post('level'),
           'username' => $this->input->post('username'),
           'password' => $enc_password
       );

       // Insert user
       return $this->db->insert('penumpang', $data);
   }

   public function login($username, $password){
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('penumpang');


       if($result->num_rows() == 1){
           return $result->row(0)->IdPenumpang;
       } else {
           return false;
       }
   }

   function get_user_details($IdPenumpang)
    {
        // $this->db->select('*');
        // $this->db->from('penumpang as p');
        $this->db->join('levels', 'levels.level_id=penumpang.fk_level_id');
        $this->db->where('IdPenumpang', $IdPenumpang);


        $result = $this->db->get('penumpang');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }

     function get_book_details($IdPenumpang)
    {
        // $this->db->select('*');
        // $this->db->from('penumpang as p');
        $this->db->join('penumpang', 'penumpang.IdPenumpang=booking.FK_IdPenumpang');
        $this->db->where('penumpang.IdPenumpang', $IdPenumpang);


        $result = $this->db->get('booking');
        // print_r($result);

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }

     public function getedit($IdPenumpang=''){
    $data = $this->db->query('SELECT * FROM penumpang where IdPenumpang = '.$IdPenumpang);
    return $data->result_array();
  }
      public function UpdateData($tabelNama,$data,$where){
    $res = $this->db->update($tabelNama,$data,$where);
    return $res;
  }
}
?>