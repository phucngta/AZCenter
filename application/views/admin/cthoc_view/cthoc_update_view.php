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
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Sửa Chương Trình Học</h1>
      <form method="post" name="suabaihoc">
        <div class="form-group">
            <div class="form-group">
          <label >Mã Chương Trình Học</label>
          <input type="text" value="<?php echo "$macth"  ?>" class="form-control" name="macth" placeholder="" readonly>
        </div>
          <label >Tên Chương Trình Học</label>
          <input type="text" value="<?php echo "$tencth"  ?>"  class="form-control" name="tencth" placeholder="" required>
        </div>
        <div class="form-group">
          <label  >Mô Tả</label>
          <input type="text" value="<?php echo "$mota"  ?>"  class="form-control" name="mota" placeholder="" required>
        </div>
        <button type="submit" name="suacthoc" class="btn btn-primary btn-lg btn-block">Sửa chương trình học</button>
    </form>
    </div>
  </div>
</div>