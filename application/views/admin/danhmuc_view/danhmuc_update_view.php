<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($danhmuc as $dmc)
{
  $MADM= $this->uri->segment(4);
  if($MADM== $dmc->MADM)
  {
  $MADM= $dmc->MADM;
  $TENDM= $dmc->TENDM;
  }
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Sửa Danh Mục</h1>
      <form method="post" name="suadanhmuc">
        <div class="form-group">
            <div class="form-group">
          <label >Mã Danh Mục</label>
          <input type="text" value="<?php echo "$MADM"  ?>" class="form-control" name="MADM" placeholder="1111" readonly>
        </div>
          <label >Tên Danh Mục</label>
          <input type="text" value="<?php echo "$TENDM"  ?>"  class="form-control" name="TENDM" placeholder="2222" required>
        </div>
        <button type="submit" name="suadanhmuc" class="btn btn-primary btn-lg btn-block">Sửa danh mục </button>
    </form>
    </div>
  </div>
</div>