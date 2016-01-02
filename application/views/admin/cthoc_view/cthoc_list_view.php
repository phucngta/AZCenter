<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid" >
  <div class="row">
    <div class="col-lg-12">
      <h1>Danh Sách Chương Trình Đào Tạo </h1>
      <a href="<?php echo base_url('admin/cthoc/add');?>" class="btn btn-primary">Thêm Chương Trình</a> 
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <table class="table table-hover table-bordered table-condensed">
      <tr><td></td><td>Mã chương trình đào tạo</td><td>Tên chương trình đào tạo</td><td></td></tr>
      <?php foreach ($chuongtrinhhoc as $cth) { ?>
        <tr>
          <td><a href="<?php echo base_url('admin/cthoc/update/'.$cth->macth); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
          <a href="<?php echo base_url('admin/cthoc/delete/'.$cth->macth); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
          <td id ="macth"><?php echo $cth->macth ?></td>
          <td><?php echo $cth->tencth ?></td>
          <?php echo '<td><a href="#"  onclick="getLesson()" class="btn btn-primary">Xem bài học</a></td>'; ?>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
  <div class="row" id='ajax_display'></div>
</div>