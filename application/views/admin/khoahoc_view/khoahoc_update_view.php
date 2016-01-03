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
<div class="container" style="margin-top: 30px;">
  <div class="row">

    <div class="col-lg-3">
      <label class="col-lg-offset-3">Ảnh khóa học</label>
      <?php 
      if ($picture != NULL) {
        echo '<img alt=""  id="view" class="img-responsive" src="'.base_url($picture).'">';
      }
      else echo '<img alt="" id="view" class="img-responsive" src="'.base_url('uploads/course/no-images.jpg').'">';
      ?>
    </div>

    <div class="col-lg-8">
      <form enctype="multipart/form-data" method="post" name="suakhoahoc" class="form-horizontal">

        <div class="form-group">
          <label class="control-label col-sm-2">Đổi ảnh</label>
          <div class="col-sm-6">
            <input type="file" name="userfile" onchange="previewImage(this)"/>
          </div>
        </div>  

        <input type="hidden" value="<?php echo "$makh"  ?>"  class="form-control" name="makh" placeholder="" required>

        <div class="form-group">
          <label class="control-label col-sm-2">Khóa Học</label>
          <div class="col-sm-6">
            <input type="text" value="<?php echo "$tenkh"  ?>"  class="form-control" name="tenkh" placeholder="" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Bắt Đầu</label>
          <div class="col-sm-6">
            <input type="date" value="<?php echo "$tgbd"  ?>"  class="form-control" name="tgbd" placeholder="" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Kết Thúc</label>
          <div class="col-sm-6">
            <input type="date" value="<?php echo "$tgkt"  ?>"  class="form-control" name="tgkt" placeholder="" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Học Phí</label>
          <div class="col-sm-6">
            <input type="number" value="<?php echo "$hocphi"  ?>"  class="form-control" name="hocphi" placeholder="" min="10000" max="10000000" step="100000" value="10000" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Giảng Viên</label>
          <div class="col-sm-6">
            <?php
            $object = $this->ion_auth->users('3')->result();
            echo "<select name='teacher_id' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value=".$value->id.">".$value->name."</option>";
            }
            echo "</select>";
            ?>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Chương Trình</label>
          <div class="col-sm-6">
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
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Danh Mục</label>
          <div class="col-sm-6">
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
        </div>  

        <div class="col-sm-3"></div>
        <div class="col-sm-4">
          <button type="submit" name="suakhoahoc" class="btn btn-primary btn-lg btn-block">Cập nhập</button>
        </div>
      </form>
    </div>
  </div>