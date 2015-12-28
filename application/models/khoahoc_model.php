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
  public  function taoma($makh = NULL)
  {
    $ma=$makh;
    $this->load->model('taoma_model');
    $ma=$this->taoma_model->Timmacuoi("makh","khoahoc",$ma,5);
    return $ma;
  }
  public function add($makh, $img)
  {
    // $MAKH=$this->taoma();
    $data=array(
      'makh'=> $makh,
      'tenkh'=> $this->input->post('tenkh'),
      'tgbd'=> $this->input->post('tgbd'),
      'tgkt'=> $this->input->post('tgkt'),
      'madm'=> $this->input->post('madm'),
      'macth'=> $this->input->post('macth'),
      'hocphi'=> $this->input->post('hocphi'),
      'picture'=>$img,
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
    $this->makh=$id;
    $this->tenkh= $this->input->post('tenkh');
    $this->hocphi= $this->input->post('hocphi');
    $this->tgbd= $this->input->post('tgbd');
    $this->tgkt= $this->input->post('tgkt');
    $this->picture= $img;
    $this->teacher_id= $this->input->post('teacher_id');
    $this->madm= $this->input->post('madm');
    $this->macth= $this->input->post('macth');
    $suakhoahoc= $this->input->post('suakhoahoc');
    if(isset($suakhoahoc))
      $this->db->where('makh',$id);
    $this->db->update('khoahoc',$this );
  }
  public function delete($id)
  {
    $this->db->where('makh',$id);
    $this->db->delete('khoahoc');
  }

}
?>
