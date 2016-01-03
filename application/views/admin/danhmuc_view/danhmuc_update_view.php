<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($danhmuc as $dmc)
{
  // $madm= $this->uri->segment(4);
  // if($madm== $dmc->madm)
  // {
  //   $madm= $dmc->madm;
  //   $tendm= $dmc->tendm;
  // }
  echo $dmc->madm.'<div>'.$dmc->tendm.'</div>';
}
?>
<div class="row">
  <div class="col-lg-7">
    <form action="<?php echo base_url().'admin/danhmuc/update'?>" method="post" name="suadanhmuc"  class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-3">Tên Danh Mục</label>
        <div class="col-sm-6">
          <input type="text" value="" class="form-control" name="tendm" placeholder="" required>
        </div>
        <div class="col-sm-3">
         <button type="submit" name="suadanhmuc" class="btn btn-primary">Cập nhập</button>
       </div>
       <input type="hidden" name="madm" value="">
     </form>
   </div>
 </div>