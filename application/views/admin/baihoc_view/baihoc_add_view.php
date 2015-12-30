<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Thêm Bài Học</h1>
      <form method="post" name="thembaihoc">
        <div class="form-group">
          <label >Tên Bài Học</label>
          <input type="text" class="form-control" name="tenbh" placeholder="" required>
        </div> 
        <div class="form-group">
          <label >Tên Chương Trình Đào Tạo</label>
          <?php
            $str=$this->db->get('chuongtrinhhoc');
            $object=$str->result_object();
            echo "<select name='macth' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value='$value->macth'>$value->tencth</option>";
            }
            echo "</select>";
          ?>
        </div>  
        <button type="submit" name="thembaihoc" class="btn btn-primary btn-lg btn-block">Thêm bài học</button>
    </form>
    </div>
  </div>
</div>