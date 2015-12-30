<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($danhmuc as $dmc)
{
  $madm= $this->uri->segment(4);
  if($madm== $dmc->madm)
  {
  $madm= $dmc->madm;
  $tendm= $dmc->tendm;
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
          <input type="text" value="<?php echo "$madm"  ?>" class="form-control" name="madm" placeholder="" readonly>
        </div>
          <label >Tên Danh Mục</label>
          <input type="text" value="<?php echo "$tendm"  ?>"  class="form-control" name="tendm" placeholder="" required>
        </div>
        <button type="submit" name="suadanhmuc" class="btn btn-primary btn-lg btn-block">Sửa danh mục </button>
    </form>
    </div>
  </div>
</div>