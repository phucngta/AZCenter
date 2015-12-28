<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<dv class="container-fluid" >
  <div class="row">
    <div class="col-lg-12">
      <h1>Danh Sách Chi Tiết Khóa Học</h1>
      <a href="<?php echo base_url('admin/ctkhoahoc/add');?>" class="btn btn-primary">Thêm Chi Tiết Khóa Học</a> 
    </div>
  </div>
  <?php
    $str1=$this->db->get('khoahoc');
    $khoc=$str1->result_object();
    $str2=$this->db->get('users');
    $sts=$str2->result_object();
  ?>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <table class="table table-hover table-bordered table-condensed">
      <tr><td></td><td>Mã Chi Tiết Khóa Học</td><td>Khóa Học</td><td>Học Viên</td>
      </tr>
      <?php foreach ($ctkhoc as $ct) {?>
        <tr>
          <?php if($this->ion_auth->in_group('admin'))
          { ?>
          <td><a href="<?php echo base_url('admin/ctkhoahoc/update/'.$ct->id);?>"><span class="glyphicon glyphicon-pencil"></span></a>
              <a href="<?php echo base_url('admin/ctkhoahoc/delete/'.$ct->id);?>"><span class="glyphicon glyphicon-remove"></span></a>
          </td>
          <?php } else echo '<td></td>'?>
          <td><?php echo $ct->id ?></td>
          <td><?php foreach ($sts as $ts) {if($ts->id==$ct->student_id){ echo $ts->name; break;}}?></td>
          <td><?php foreach ($khoc as $kh) {if($kh->makh==$ct->makh){ echo $kh->tenkh; break;}}?></td>
        </tr>
      <?php } ?>
      </table>
    </div>
  </div>
</div>