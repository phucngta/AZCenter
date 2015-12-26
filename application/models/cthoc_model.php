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
   public  function taoma($MACTH = NULL)
  {
      $ma=$MACTH;
      $this->load->model('taoma_model');
      $ma=$this->taoma_model->Timmacuoi("MACTH","chuongtrinhhoc",$ma,5);
      return $ma;
  }
  public function add()
  {
    $MACTH=$this->taoma();
    $data=array(
      'MACTH'=> $MACTH,
      'TENCTH'=> $this->input->post('TENCTH'),
      'MOTA'=> $this->input->post('MOTA'),
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
     $this->TENCTH= $this->input->post('TENCTH');
     $this->MOTA= $this->input->post('MOTA');
      $suacthoc= $this->input->post('suacthoc');
      if(isset($suacthoc))
      $this->db->where('MACTH',$id);
      $this->db->update('chuongtrinhhoc',$this );
    }
    public function delete($id)
    {
      $this->db->where('MACTH',$id);
      $this->db->delete('chuongtrinhhoc');
    }
    
}
  ?>
