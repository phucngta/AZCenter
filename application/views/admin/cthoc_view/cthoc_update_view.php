<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($chuongtrinhhoc as $tr)
{
  $MACTH= $this->uri->segment(4);
  if($MACTH== $tr->MACTH)
  {
  $MACTH= $tr->MACTH;
  $TENCTH= $tr->TENCTH;
  $MOTA= $tr->MOTA;
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
          <input type="text" value="<?php echo "$MACTH"  ?>" class="form-control" name="MACTH" placeholder="" readonly>
        </div>
          <label >Tên Chương Trình Học</label>
          <input type="text" value="<?php echo "$TENCTH"  ?>"  class="form-control" name="TENCTH" placeholder="" required>
        </div>
        <div class="form-group">
          <label  >Mô Tả</label>
          <input type="text" value="<?php echo "$MOTA"  ?>"  class="form-control" name="MOTA" placeholder="" required>
        </div>
        <button type="submit" name="suacthoc" class="btn btn-primary btn-lg btn-block">Sửa chương trình học</button>
    </form>
    </div>
  </div>
</div>