<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<dv class="container-fluid" >
  <div class="row">
    <div class="col-lg-12">
      <h1>Danh Sách Bài Học</h1>
      <a href="<?php echo base_url('admin/baihoc/add');?>" class="btn btn-primary">Thêm Bài Học</a> 
    </div>
  </div>
  <?php
    $str=$this->db->get('chuongtrinhhoc');
    $cthoc=$str->result_object();
  ?>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <table class="table table-hover table-bordered table-condensed">
      <tr><td></td><td>ID</td><td>Tên Bài Học</td><td>Chương Trình Học</td></tr>
      <?php foreach ($baihoc as $bh) {?>
        <tr>
          <?php if($this->ion_auth->in_group('teacher'))
          { ?>
          <td><a href="<?php echo base_url('admin/baihoc/update/'.$bh->id);?>"><span class="glyphicon glyphicon-pencil"></span></a>
              <a href="<?php echo base_url('admin/baihoc/delete/'.$bh->id); ?>"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
          <?php } else echo '<td></td>'?>
          <td><?php echo $bh->id ?></td>
          <td><?php echo $bh->TENBH ?></td>
          <td><?php foreach ($cthoc as $t) {if($t->MACTH==$bh->MACTH){ echo $t->TENCTH; break;}}?></td>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
</div>