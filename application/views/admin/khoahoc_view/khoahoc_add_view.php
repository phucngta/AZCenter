<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <form enctype="multipart/form-data" method="post" name="themkhoahoc">
         <div class="form-group">
          <!-- <label >PICTURE</label> -->
          <img alt="Avatar" id="view" class="img-responsive" src="<?php echo base_url('uploads/course/no-images.jpg');?>">
        </div>
        <div class="form-group">
          <input type="file" name="userfile" onchange="previewImage(this)"/>
        </div>  
        
        <div class="form-group">
          <label  >Tên Khóa Học</label>
          <input type="text" class="form-control" name="tenkh" placeholder="" required>
        </div>
         <div class="form-group">
          <label >Học Phí</label>
          <input type="number" class="form-control" name="hocphi" placeholder="" min="10000" max="10000000" step="100000" value="10000" required>
        </div> 
        <div class="form-group">
          <label >Thời Gian Bắt Đầu</label>
          <input type="date" class="form-control" name="tgbd" placeholder="" required>
        </div> 
         <div class="form-group">
          <label >Thời Gian Kết Thúc</label>
          <input type="date" class="form-control" name="tgkt" placeholder="" required>
        </div> 
         <div class="form-group">
          <label >Tên Giảng Viên</label>
          <?php
            $object = $this->ion_auth->users('3')->result();
            echo "<select name='teacher_id' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value=".$value->id.">".$value->name."</option>";

            }
            echo "</select>";
          ?>
        </div>
                <div class="form-group">
          <label >Tên Chương Trình Học</label>
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
                <div class="form-group">
          <label >Tên Danh Mục</label>
          <?php
            $str=$this->db->get('danhmuc');
            $object=$str->result_object();
            echo "<select name='madm' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value='$value->madm'>$value->tendm</option>";
            }
            echo "</select>";
          ?>
        </div>  
        <button type="submit" name="themkhoahoc" class="btn btn-primary btn-lg btn-block">Thêm khóa học</button>
    </form>
    </div>
  </div>
</div>