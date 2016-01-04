<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <div class="col-lg-10">
    <form action="<?php echo base_url().'admin/baihoc/update'?>" method="post" name="suabaihoc" class="form-horizontal">
      <?php 
      foreach($baihoc as $bh)
        { ?>

      <div class="form-group">
        <div class="col-sm-4">
          <input type="text" value="<?php echo "$bh->tenbh"  ?>"  class="form-control" name="tenbh" placeholder="Tên Bài Học" required>
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
          <button type="submit" name="suabaihoc" class="btn btn-primary ">Cập nhập</button>
        </div>

      </div>
      <input type="hidden" value="<?php echo "$bh->id"  ?>" class="form-control" name="id">
    </form>
    <?php }?>
  </div>
</div>
