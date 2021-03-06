<?php
class Danhmuc_model extends CI_model
{
  public function __contruct()
  {
    parent::__contruct();
  }
  public function show($madm = NULL)
  {
    if ($madm != NULL) {
      $this->db->where("madm", $madm);
    }
    $query= $this->db->get('danhmuc');
    $query_result= $query->result_object();
    return $query_result;
  }
  public  function taoma($madm = NULL)
  {
    $ma=$madm;
    $this->load->model('Taoma_model');
    $ma=$this->Taoma_model->Timmacuoi("madm","danhmuc","DM",5);
    return $ma;
  }
  public function add()
  {
    $madm=$this->taoma();
    $data=array(
      'madm'=> $madm,
      'tendm'=> $this->input->post('tendm'),
      );
    $themdanhmuc= $this->input->post('themdanhmuc');
    if(isset($themdanhmuc))
    {
      $this->db->insert('danhmuc',$data);
    }
  }

  public function update()
  {
    $this->madm= $this->input->post('madm');
    $this->tendm= $this->input->post('tendm');
    $suadanhmuc= $this->input->post('suadanhmuc');
    if(isset($suadanhmuc))
      $this->db->where('madm',$this->madm);
    $this->db->update('danhmuc',$this);
  }
  public function delete($id)
  {
    $this->db->where('madm',$id);
    $this->db->delete('danhmuc');
  }

}
?>