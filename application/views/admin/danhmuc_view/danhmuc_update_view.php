<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row">
  <div class="col-lg-7">
    <form action="<?php echo base_url().'admin/danhmuc/update'?>" method="post" name="suadanhmuc"  class="form-horizontal">
      <?php
      foreach($danhmuc as $dmc)
        {?>

      <div class="form-group">
        <div class="col-sm-6">
          <input type="text" value="<?php echo $dmc->tendm?>" class="form-control" name="tendm" placeholder="Tên Danh Mục" required>
        </div>
        <div class="col-sm-3">
         <button type="submit" name="suadanhmuc" class="btn btn-primary">Cập nhập</button>
       </div>
       <input type="hidden" name="madm" value="<?php echo $dmc->madm?>">
     </form>
   </div>

   <?php }
   ?>
 </div>