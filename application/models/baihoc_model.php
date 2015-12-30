<?php
class Baihoc_model extends CI_model
{
  public function __contruct()
  {
      parent::__contruct();
  }
  public function show($macth = NULL)
  {
    if ($macth != NULL) {
      $this->db->where("macth", $macth);
    }
    $query= $this->db->get('baihoc');
    $query_result= $query->result_object();
    return $query_result;
    }
  public  function taoma($id = NULL)
  {
      $ma=$id;
      $this->load->model('Taoma_model');
      $ma=$this->Taoma_model->Timmacuoi("id","baihoc","BH",5);
      return $ma;
  }
  public function add()
  {
    $id=$this->taoma();
    $data=array(
      'id'=>$id,
      'macth'=> $this->input->post('macth'),
      'tenbh'=> $this->input->post('tenbh'),
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
     $this->macth= $this->input->post('macth');
     $this->tenbh= $this->input->post('tenbh');
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