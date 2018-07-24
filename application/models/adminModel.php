<?php
class AdminModel extends CI_Model{
   public function register($enc_password){
       // Array data user
       $data = array(
           'nama' => $this->input->post('nama'),
           'email' => $this->input->post('email'), 
           'username' => $this->input->post('username'),
           'password' => $enc_password
       );

       // Insert user
       return $this->db->insert('admin', $data);
   }

   public function login($username, $password){
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('admin');


       if($result->num_rows() == 1){
           return $result->row(0)->admin_id;
       } else {
           return false;
       }
   }

   function get_admin_details($admin_id)
    {
        $this->db->select('*');
        $this->db->where('admin_id', $admin_id);

        $result = $this->db->get('admin');

        if($result->num_rows() == 1){
            return $result->row(0);
        } else {
            return false;
        }
    }

    public function GetAdmin()
    {
      $this->db->select('*');
      $this->db->from('admin');
      $data=$this->db->get();
      return $data->result_array();
    }

    public function DeleteData($tabelNama,$where){
    $res = $this->db->delete($tabelNama,$where);
    return $res;
    }

    public function getedit($admin_id=''){
    $data = $this->db->query('SELECT * FROM admin where admin_id = '.$admin_id);
    return $data->result_array();
  }

  public function UpdateData($tabelNama,$data,$where){
    $res = $this->db->update($tabelNama,$data,$where);
    return $res;
  }
}
?>