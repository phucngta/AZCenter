<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <button onclick="thembaihoc()" class="btn btn-primary">Thêm Bài Học</a> 
    </div>
  </div>

  <div class="row" >
    <div class="col-lg-12" style="margin-top: 10px;" id='ajax_display_form'></div>
  </div>

  <?php
  $str=$this->db->get('chuongtrinhhoc');
  $cthoc=$str->result_object();
  ?>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <table class="table table-hover table-bordered table-condensed">
        <tr><td></td><td>Tên Bài Học</td><td>Chương Trình Đào Tạo</td></tr>
        <?php foreach ($baihoc as $bh) {?>
        <tr>
          <?php echo '<td><a href="#" onclick="suabh('.$bh->id.')">'?><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="<?php echo base_url('admin/baihoc/delete/'.$bh->id); ?>"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
          <td hidden><?php echo $bh->id ?></td>
          <td><?php echo $bh->tenbh ?></td>
          <td><?php foreach ($cthoc as $t) {if($t->macth==$bh->macth){ echo $t->tencth; break;}}?></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>