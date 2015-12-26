<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Thêm Khóa Học</h1>
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
          <input type="text" class="form-control" name="TENKH" placeholder="" required>
        </div>
         <div class="form-group">
          <label >Học Phí</label>
          <input type="number" class="form-control" name="HOCPHI" placeholder="" min="10000" max="10000000" step="100000" value="10000" required>
        </div> 
        <div class="form-group">
          <label >Thời Gian Bắt Đầu</label>
          <input type="date" class="form-control" name="TGBD" placeholder="" required>
        </div> 
         <div class="form-group">
          <label >Thời Gian Kết Thúc</label>
          <input type="date" class="form-control" name="TGKT" placeholder="" required>
        </div> 
         <div class="form-group">
          <label >Tên Giảng Viên</label>
          <?php
            $str=$this->db->get('users');
            $object=$str->result_object();
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
            echo "<select name='MACTH' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value='$value->MACTH'>$value->TENCTH</option>";
            }
            echo "</select>";
          ?>
        </div>
                <div class="form-group">
          <label >Tên Danh Mục</label>
          <?php
            $str=$this->db->get('danhmuc');
            $object=$str->result_object();
            echo "<select name='MADM' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value='$value->MADM'>$value->TENDM</option>";
            }
            echo "</select>";
          ?>
        </div>  
        <button type="submit" name="themkhoahoc" class="btn btn-primary btn-lg btn-block">Thêm khóa học</button>
    </form>
    </div>
  </div>
</div>