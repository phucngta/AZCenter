<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($ctkhoc as $ct)
{
  $id= $this->uri->segment(4);
  if($id== $ct->id)
  {
  $id= $ct->id;
  $student_id= $ct->student_id;
  $makh= $ct->makh;
  }
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Sửa Chi Tiết Khóa Học</h1>
      <form enctype="multipart/form-data" method="post" name="suactkhoahoc">
        <div class="form-group">
          <label >Mã Chi Tiết Khóa Học</label>
          <input type="text" value="<?php echo "$id"  ?>"  class="form-control" name="id" placeholder="" required>
        </div>
        <div class="form-group">
          <label >Tên Học Viên</label>
          <?php
            $str=$this->db->get('users');
            $object=$str->result_object();
            echo "<select name='student_id' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value=".$value->id.">".$value->name."</option>";
            }
            echo "</select>";
          ?>
        </div>
        <div class="form-group">
          <label >Tên Khóa Học</label>
          <?php
            $str=$this->db->get('khoahoc');
            $object=$str->result_object();
            echo "<select name='makh' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value='$value->makh'>$value->tenkh</option>";
            }
            echo "</select>";
          ?>
        </div> 
        <button type="submit" name="suactkhoahoc" class="btn btn-primary btn-lg btn-block">Sửa Chi Tiết Khóa Học</button>
    </form>
    </div>
  </div>
</div>