<?php
class Ctkhoahoc_model extends CI_model
{
  public function __contruct()
  {
      parent::__contruct();
  }
  public function show()
  {
    $query= $this->db->get('ctkhoahoc');
    $query_result= $query->result_object();
    return $query_result;
    }
   public  function taoma($id = NULL)
  {
      $ma=$id;
      $this->load->model('Taoma_model');
      $ma=$this->Taoma_model->Timmacuoi("id","ctkhoahoc","ct",5);
      return $ma;
  }
  public function add()
  {
    $id=$this->taoma();
    $data=array(
      'id'=> $id,
      'makh'=> $this->input->post('makh'),
      'student_id'=> $this->input->post('student_id'),
       );
    $themctkhoahoc= $this->input->post('themctkhoahoc');
    if(isset($themctkhoahoc))
    {
      $this->db->insert('ctkhoahoc',$data);
    }
  }

    public function update($id)
    {
      $this->id=$id;
     $this->makh= $this->input->post('makh');
     $this->student_id= $this->input->post('student_id');
      $suadanhmuc= $this->input->post('suactkhoahoc');
      if(isset($suactkhoahoc))
      $this->db->where('id',$id);
      $this->db->update('ctkhoahoc',$this );
    }
    public function delete($id)
    {
      $this->db->where('id',$id);
      $this->db->delete('ctkhoahoc');
    }
    
}
  ?>