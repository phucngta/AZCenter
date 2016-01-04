<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid" >
  
  <div class="row">
    <div class="col-lg-12">
      <button onclick="themdm()" class="btn btn-primary">Thêm Danh Mục</button> 
    </div>
  </div>

  <div class="row" >
    <div class="col-lg-12" style="margin-top: 10px;" id='ajax_display'></div>
  </div>

  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <table class="table table-hover table-bordered table-condensed">
        <tr><td></td><td>Mã Danh Mục</td><td>Tên Danh Mục</td></tr>
        <?php foreach ($danhmuc as $dmc) { ?>
        <tr>
          <?php if($this->ion_auth->in_group('admin'))
          { 
            echo '<td><a href="#" onclick="suadm(\''.$dmc->madm.'\')"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="'.base_url('admin/danhmuc/delete/'.$dmc->madm).'"><span class="glyphicon glyphicon-remove"></span></a></td>';}
            else 
              echo '<td></td>';?>
            <td><?php echo $dmc->madm ?></td>
            <td><?php echo $dmc->tendm ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>

</div>