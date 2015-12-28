<?php
class cthoc_model extends CI_model
{
  public function __contruct()
  {
      parent::__contruct();
  }
  public function show()
  {
    $query= $this->db->get('chuongtrinhhoc');
    $query_result= $query->result_object();
    return $query_result; 
  }
   public  function taoma($macth = NULL)
  {
      $ma=$macth;
      $this->load->model('taoma_model');
      $ma=$this->taoma_model->Timmacuoi("macth","chuongtrinhhoc",$ma,5);
      return $ma;
  }
  public function add()
  {
    $macth=$this->taoma();
    $data=array(
      'macth'=> $macth,
      'tencth'=> $this->input->post('tencth'),
      'mota'=> $this->input->post('mota'),
      );
    $themcthoc= $this->input->post('themcthoc');
    if(isset($themcthoc))
    {
      $this->db->insert('chuongtrinhhoc',$data);
    }
  }

    public function update($id)
    {
      $this->MACTH=$id;
     $this->TENCTH= $this->input->post('tencth');
     $this->MOTA= $this->input->post('mota');
      $suacthoc= $this->input->post('suacthoc');
      if(isset($suacthoc))
      $this->db->where('macth',$id);
      $this->db->update('chuongtrinhhoc',$this );
    }
    public function delete($id)
    {
      $this->db->where('macth',$id);
      $this->db->delete('chuongtrinhhoc');
    }
    
}
  ?>
