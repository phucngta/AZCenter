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
   public  function taoma($MADM = NULL)
  {
      $ma=$MADM;
      $this->load->model('taoma_model');
      $ma=$this->taoma_model->Timmacuoi("MADM","danhmuc","DM",5);
      return $ma;
  }
  public function add()
  {
    $MADM=$this->taoma();
    $data=array(
      'MADM'=> $MADM,
      'TENDM'=> $this->input->post('TENDM'),
       );
    $themdanhmuc= $this->input->post('themdanhmuc');
    if(isset($themdanhmuc))
    {
      $this->db->insert('danhmuc',$data);
    }
  }

    public function update($id)
    {
      $this->MADM=$id;
     $this->TENDM= $this->input->post('TENDM');
      $suadanhmuc= $this->input->post('suadanhmuc');
      if(isset($suadanhmuc))
      $this->db->where('MACTH',$id);
      $this->db->update('danhmuc',$this );
    }
    public function delete($id)
    {
      $this->db->where('MADM',$id);
      $this->db->delete('danhmuc');
    }
    
}
  ?>