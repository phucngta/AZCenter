<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <div class="col-lg-10">
    <form action="<?php echo base_url().'admin/baihoc/add'?>" method="post" name="thembaihoc" class="form-horizontal">
      <div class="form-group">
        <!-- <label ></label> -->
        <div class="col-sm-4">
          <input type="text" class="form-control" name="tenbh" placeholder="Tên Bài Học" required>
        </div>
        <div class="col-sm-4">
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
        <div class="col-sm-3">
          <button type="submit" name="thembaihoc" class="btn btn-primary">Thêm</button>
        </div>
    </form>
  </div>
</div>
