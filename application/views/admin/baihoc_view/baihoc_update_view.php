<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($baihoc as $tr)
{
  $id= $this->uri->segment(4);
  if($id== $tr->id)
  {
  $id= $tr->id;
  $macth= $tr->macth;
  $tenbh= $tr->tenbh;
  }
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <form method="post" name="suabaihoc">
        <div class="form-group">
          <input type="hidden" value="<?php echo "$id"  ?>" class="form-control" name="id" placeholder="1111" readonly>
        </div>
        <div class="form-group">
          <label  >Tên Bài Học</label>
          <input type="text" value="<?php echo "$tenbh"  ?>"  class="form-control" name="tenbh" placeholder="3333" required>
        </div>
        <div class="form-group">
            <label >Tên Chương Trình Đào Tạo</label>
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
        <button type="submit" name="suabaihoc" class="btn btn-primary btn-lg btn-block">Sửa bài học</button>
    </form>
    </div>
  </div>
</div>