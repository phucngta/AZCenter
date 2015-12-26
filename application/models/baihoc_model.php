<?php
class baihoc_model extends CI_model
{
  public function __contruct()
  {
      parent::__contruct();
  }
  public function show()
  {
    $query= $this->db->get('baihoc');
    $query_result= $query->result_object();
    return $query_result;
    }
  public  function taoma($id = NULL)
  {
      $ma=$id;
      $this->load->model('taoma_model');
      $ma=$this->taoma_model->Timmacuoi("id","baihoc","BH",5);
      return $ma;
  }
  public function add()
  {
    $id=$this->taoma();
    $data=array(
      'id'=>$id,
      'MACTH'=> $this->input->post('MACTH'),
      'TENBH'=> $this->input->post('TENBH'),
      );
    $thembaihoc= $this->input->post('thembaihoc');
    if(isset($thembaihoc))
    {
      $this->db->insert('baihoc',$data);
    }
  }

    public function update($id)
    {
      $this->id=$id;
     $this->MACTH= $this->input->post('MACTH');
     $this->TENBH= $this->input->post('TENBH');
      $suabaihoc= $this->input->post('suabaihoc');
      if(isset($suabaihoc))
      $this->db->where('id',$id);
      $this->db->update('baihoc',$this );
    }
    public function delete($id)
    {
      $this->db->where('id',$id);
      $this->db->delete('baihoc');
    }
    
}
  ?>