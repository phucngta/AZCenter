<?php
class Khoahoc_model extends CI_model
{
  public function __contruct()
  {
    parent::__contruct();
  }

  public function show_theo_danh_muc($madm)
  {
    $madm = $this->db->escape($madm);
    $str = 'select * from khoahoc where madm ='.$madm;
    $query = $this->db->query($str);
    $query_result = $query->result();
    return $query_result;
  }

  public function show($teacher_id = NULL)
  {
    if ($teacher_id != NULL) {
      $this->db->where("teacher_id", $teacher_id);
    }
    $query = $this->db->get('khoahoc');
    $query_result= $query->result_object();
    return $query_result;
  }

  public function listByStudents($student_id)
  {
    $query = $this->db->query('SELECT kh.makh, kh.tenkh, kh.macth, kh.tgbd, kh.tgkt, kh.teacher_id 
              FROM users AS us 
              INNER JOIN ctkhoahoc AS ctkh ON us.id = ctkh.student_id
              INNER JOIN khoahoc AS kh ON ctkh.makh = kh.makh
              WHERE us.id ='.$student_id);
    $query_result= $query->result_array();
    return $query_result; 
  }

  public  function taoma($MAKH = NULL)
  {
    $ma=$MAKH;
    $this->load->model('Taoma_model');
    $ma=$this->Taoma_model->Timmacuoi("MAKH","khoahoc","KH",5);
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

