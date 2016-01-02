<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <div class="col-lg-12">
    <h1>Danh Sách Khoá Học</h1>
    <a href="<?php echo base_url('admin/khoahoc/add');?>" class="btn btn-primary">Thêm Khóa Học</a> 
  </div>
</div>
<?php
$str=$this->db->get('chuongtrinhhoc');
$cthoc=$str->result_object();
$str1=$this->db->get('danhmuc');
$dmc=$str1->result_object();
$str2=$this->db->get('users');
$sts=$str2->result_object();

?>
<div class="row">
  <div class="col-lg-12" style="margin-top: 10px;">
    <table class="table table-hover table-bordered table-condensed">
      <tr><td></td><td>Mã Khóa Học</td><td>Khóa Học</td><td>Bắt Đầu</td><td>Kết Thúc</td>
        <td>Học Phí</td><td>Giáo Viên</td></tr>
        <?php foreach ($khoahoc as $kh) {?>
        <tr>
          <td><a href="<?php echo base_url('admin/khoahoc/update/'.$kh->makh);?>"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="<?php echo base_url('admin/khoahoc/delete/'.$kh->makh); ?>"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
          <td id="makh"><?php echo $kh->makh ?></td>
          <td><?php echo $kh->tenkh ?></td>
          <td><?php echo $kh->tgbd ?></td>
          <td><?php echo $kh->tgkt ?></td>
          <td><?php echo $kh->hocphi ?></td>
          <td><?php foreach ($sts as $ts) {if($ts->id==$kh->teacher_id){ echo $ts->name; break;}}?></td>
          
          <?php 
          $display = True;
          if (isset($invisible_button)) 
            $display = False;
          if ($display) echo '<td><a href="#"  onclick="getStudents()" class="btn btn-primary">Danh sách học viên</a></td>';
          ?>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <div class="row" >
    <div class="col-lg-12" style="margin-top: 10px;" id='ajax_display'></div>
  </div>