<?php
class danhmuc_model extends CI_model
{
  public function __contruct()
  {
      parent::__contruct();
  }
  public function show()
  {
    $query= $this->db->get('danhmuc');
    $query_result= $query->result_object();
    return $query_result;
    }
   public  function taoma($madm = NULL)
  {
      $ma=$madm;
      $this->load->model('taoma_model');
      $ma=$this->taoma_model->Timmacuoi("madm","danhmuc","DM",5);
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

    public function update($id)
    {
      $this->madm=$id;
     $this->tendm= $this->input->post('tendm');
      $suadanhmuc= $this->input->post('suadanhmuc');
      if(isset($suadanhmuc))
      $this->db->where('macth',$id);
      $this->db->update('danhmuc',$this );
    }
    public function delete($id)
    {
      $this->db->where('madm',$id);
      $this->db->delete('danhmuc');
    }
    
}
  ?>