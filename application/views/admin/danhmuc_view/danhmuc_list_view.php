<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid" >
  <div class="row">
    <div class="col-lg-12">
      <h1>Danh Sách Danh Mục </h1>
      <a href="<?php echo base_url('admin/danhmuc/add');?>" class="btn btn-primary">Thêm Danh Mục</a> 
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <table class="table table-hover table-bordered table-condensed">
      <tr><td></td><td>Mã Danh Mục</td><td>Tên Danh Mục</td></tr>
      <?php foreach ($danhmuc as $dmc) { ?>
        <tr>
          <?php if($this->ion_auth->in_group('admin'))
          { ?>
          <td><a href="<?php echo base_url('admin/danhmuc/update/'.$dmc->madm); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
          <a href="<?php echo base_url('admin/danhmuc/delete/'.$dmc->madm); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
          <?php } else echo '<td></td>'?>
          <td><?php echo $dmc->madm ?></td>
          <td><?php echo $dmc->tendm ?></td>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
</div>