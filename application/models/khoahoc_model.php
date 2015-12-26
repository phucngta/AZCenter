<?php
class khoahoc_model extends CI_model
{
  public function __contruct()
  {
    parent::__contruct();
  }
  public function show()
  {
    $query= $this->db->get('khoahoc');
    $query_result= $query->result_object();
    return $query_result; 
  }
  public  function taoma($MAKH = NULL)
  {
    $ma=$MAKH;
    $this->load->model('taoma_model');
    $ma=$this->taoma_model->Timmacuoi("MAKH","khoahoc",$ma,5);
    return $ma;
  }
  public function add($makh, $img)
  {
    // $MAKH=$this->taoma();
    $data=array(
      'MAKH'=> $makh,
      'TENKH'=> $this->input->post('TENKH'),
      'TGBD'=> $this->input->post('TGBD'),
      'TGKT'=> $this->input->post('TGKT'),
      'MADM'=> $this->input->post('MADM'),
      'MACTH'=> $this->input->post('MACTH'),
      'HOCPHI'=> $this->input->post('HOCPHI'),
      'PICTURE'=>$img,
      'teacher_id'=> $this->input->post('teacher_id'),
      );
    $themkhoahoc= $this->input->post('themkhoahoc');
    if(isset($themkhoahoc))
    {
      $this->db->insert('khoahoc',$data);
    }
  }

  public function update($id, $img)
  {
    $this->MAKH=$id;
    $this->TENKH= $this->input->post('TENCTH');
    $this->HOCPHI= $this->input->post('HOCPHI');
    $this->TGBD= $this->input->post('TGBD');
    $this->TGKT= $this->input->post('TGKT');
    $this->PICTURE= $img;
    $this->teacher_id= $this->input->post('teacher_id');
    $this->MADM= $this->input->post('MADM');
    $this->MACTH= $this->input->post('MACTH');
    $suakhoahoc= $this->input->post('suakhoahoc');
    if(isset($suakhoahoc))
      $this->db->where('MAKH',$id);
    $this->db->update('khoahoc',$this );
  }
  public function delete($id)
  {
    $this->db->where('MAKH',$id);
    $this->db->delete('khoahoc');
  }

}
?>
