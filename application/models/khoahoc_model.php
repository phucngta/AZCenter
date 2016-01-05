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

  public function listByStudents($student_id = NULL)
  {
    $query = $this->db->query('SELECT kh.makh, kh.tenkh, kh.macth, kh.tgbd, kh.tgkt, kh.teacher_id, kh.hocphi
      FROM users AS us 
      INNER JOIN ctkhoahoc AS ctkh ON us.id = ctkh.student_id
      INNER JOIN khoahoc AS kh ON ctkh.makh = kh.makh
      WHERE us.id ='.$student_id);
    $query_result= $query->result_object();
    return $query_result; 
  }

  public function getStudents($makh = NULL)
  {
    $query = $this->db->query('SELECT us.id, us.name, us.age, us.email, us.phone, us.thumbnail 
      FROM users AS us 
      INNER JOIN ctkhoahoc AS ctkh ON us.id = ctkh.student_id
      WHERE ctkh.makh LIKE "'.$makh.'"');
    $query_result= $query->result_object();
    return $query_result; 
  }

  public  function taoma($MAKH = NULL)
  {
    $ma=$MAKH;
    $this->load->model('Taoma_model');
    $ma=$this->Taoma_model->Timmacuoi("MAKH","khoahoc","KH",5);
    return $ma;
  }
  public function add($makh, array $img)
  {
    $data=array(
      'makh'=> $makh,
      'tenkh'=> $this->input->post('tenkh'),
      'tgbd'=> $this->input->post('tgbd'),
      'tgkt'=> $this->input->post('tgkt'),
      'madm'=> $this->input->post('madm'),
      'macth'=> $this->input->post('macth'),
      'hocphi'=> $this->input->post('hocphi'),
      'teacher_id'=> $this->input->post('teacher_id'),
      );
    //Insert link picture
    $data_kh = array_merge($this->_filter_data('khoahoc', $img), $data);

    $themkhoahoc= $this->input->post('themkhoahoc');
    if(isset($themkhoahoc))
    {
      $this->db->insert('khoahoc',$data_kh);
    }
  }

  public function update($id, array $img)
  {
    $data=array(
      'makh'=> $id,
      'tenkh'=> $this->input->post('tenkh'),
      'tgbd'=> $this->input->post('tgbd'),
      'tgkt'=> $this->input->post('tgkt'),
      'madm'=> $this->input->post('madm'),
      'macth'=> $this->input->post('macth'),
      'hocphi'=> $this->input->post('hocphi'),
      'teacher_id'=> $this->input->post('teacher_id'),
      );
    //Insert link picture
    $data_kh = array_merge($this->_filter_data('khoahoc', $img), $data);

    $suakhoahoc= $this->input->post('suakhoahoc');
    if(isset($suakhoahoc)){
      $this->db->update('khoahoc', $data_kh, array('makh' => $id));
    }
  }
  public function delete($id)
  {
    $this->db->where('makh',$id);
    if($this->db->delete('khoahoc'))
    {
      $msg = $this->db->_error_message();
      $num = $this->db->_error_number();
      return "Error(".$num.") ".$msg;
    }
  }

  public function _filter_data($table, $data)
  {
    $filtered_data = array();
    $columns = $this->db->list_fields($table);

    if (is_array($data))
    {
      foreach ($columns as $column)
      {
        if (array_key_exists($column, $data))
          $filtered_data[$column] = $data[$column];
      }
    }
    return $filtered_data;
  }

  public function dangkykhoahoc($student_id, $makh)
  {
    $data=array(
      'student_id'=> $student_id,
      'makh'=> $makh,
        );

    $this->db->update('ctkhoahoc', $data);
  }
}
?>

