<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($khoahoc as $kh)
{
  $id= $this->uri->segment(4);
  if($id== $kh->makh)
  {
  $makh= $kh->makh;
  $tenkh= $kh->tenkh;
  $tgkt= $kh->tgkt;
  $tgbd= $kh->tgbd;
  $hocphi= $kh->hocphi;
  $teacher_id= $kh->teacher_id;
  $picture= $kh->picture;
  $madm= $kh->madm;
  $macth= $kh->macth;
  }
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Sửa Khóa Học</h1>
      <form enctype="multipart/form-data" method="post" name="suakhoahoc">
        <div class="form-group">
          <!-- <label >PICTURE</label> -->
        <?php 
        if ($picture != NULL) {
            echo '<img alt=""  id="view" class="img-responsive" src="'.base_url($picture).'">';
        }
        else echo '<img alt="" id="view" class="img-responsive" src="'.base_url('uploads/course/no-images.jpg').'">';
        ?>
        </div>
        <div class="form-group">
          <input type="file" name="userfile" onchange="previewImage(this)"/>
        </div>  
        <div class="form-group">
          <label >Mã Khóa Học</label>
          <input type="text" value="<?php echo "$makh"  ?>"  class="form-control" name="makh" placeholder="" required>
        </div>
        <div class="form-group">
          <label  >Tên Khóa Học</label>
          <input type="text" value="<?php echo "$tenkh"  ?>"  class="form-control" name="tenkh" placeholder="" required>
        </div>
        <div class="form-group">
          <label  >Thời Gian Bắt Đầu</label>
          <input type="date" value="<?php echo "$tgbd"  ?>"  class="form-control" name="tgbd" placeholder="" required>
        </div>
        <div class="form-group">
          <label  >Thời Gian Kết Thúc</label>
          <input type="date" value="<?php echo "$tgkt"  ?>"  class="form-control" name="tgkt" placeholder="" required>
        </div>
        <div class="form-group">
          <label  >Học Phí</label>
          <input type="number" value="<?php echo "$hocphi"  ?>"  class="form-control" name="hocphi" placeholder="" min="10000" max="10000000" step="100000" value="10000" required>
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
        <button type="submit" name="suakhoahoc" class="btn btn-primary btn-lg btn-block">Sửa khóa học</button>
    </form>
    </div>
  </div>
</div>