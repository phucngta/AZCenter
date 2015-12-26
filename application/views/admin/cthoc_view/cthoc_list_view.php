<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<dv class="container-fluid" >
  <div class="row">
    <div class="col-lg-12">
      <h1>Danh Sách Chương Trình Học </h1>
      <a href="<?php echo base_url('admin/cthoc/add');?>" class="btn btn-primary">Thêm Chương Trình Học</a> 
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <table class="table table-hover table-bordered table-condensed">
      <tr><td></td><td>Mã chương trình học</td><td>Tên chương trình học</td></tr>
      <?php foreach ($chuongtrinhhoc as $cth) { ?>
        <tr>
          <?php if($this->ion_auth->in_group('teacher'))
          { ?>
          <td><a href="<?php echo base_url('admin/cthoc/update/'.$cth->MACTH); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
          <a href="<?php echo base_url('admin/cthoc/delete/'.$cth->MACTH); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
          <?php } else echo '<td></td>'?>
          <td><?php echo $cth->MACTH ?></td>
          <td><?php echo $cth->TENCTH ?></td>
          <!-- <td><?php echo $cth->MOTA ?></td> -->
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
</div>