<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Thêm Chi Tiết Khóa Học</h1>
      <form enctype="multipart/form-data" method="post" name="themctkhoahoc">        
        <div class="form-group">
          <label  >Tên Khóa Học</label>
          <input type="text" class="form-control" name="TENKH" placeholder="" required>
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
        <button type="submit" name="themctkhoahoc" class="btn btn-primary btn-lg btn-block">Thêm chi tiết khóa học</button>
    </form>
    </div>
  </div>
</div>