<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($chuongtrinhhoc as $tr)
{
  $macth= $this->uri->segment(4);
  if($macth== $tr->macth)
  {
  $macth= $tr->macth;
  $tencth= $tr->tencth;
  $mota= $tr->mota;
  }
}
 ?>
<div class="container" style="margin-top: 30px;">
  <div class="row">
    <form method="post" name="suacthoc">
      <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
            <label >Tên Chương Trình</label>
            <input type="text" value="<?php echo "$tencth"  ?>" class="form-control" name="tencth" placeholder="" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label >Mô Tả</label>
            <textarea name="mota" class="form-control" rows="10" required><?php echo "$mota"?></textarea>
          </div>   
        </div>
      </div>
      <div class="col-lg-2 col-lg-offset-4">
        <button type="submit" name="suacthoc" class="btn btn-primary btn-lg btn-block">Cập nhập</button>
      </div>
    </form>

  </div>
</div>