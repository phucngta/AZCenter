<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
foreach($baihoc as $tr)
{
  $id= $this->uri->segment(4);
  if($id== $tr->id)
  {
  $id= $tr->id;
  $MACTH= $tr->MACTH;
  $TENBH= $tr->TENBH;
  }
}
 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Sửa Bài Học</h1>
      <form method="post" name="suabaihoc">
        <div class="form-group">
          <label >ID Bài Học</label>
          <input type="text" value="<?php echo "$id"  ?>" class="form-control" name="id" placeholder="1111" readonly>
        </div>
        <div class="form-group">
          <label  >Tên Bài Học</label>
          <input type="text" value="<?php echo "$TENBH"  ?>"  class="form-control" name="TENBH" placeholder="3333" required>
        </div>
        <div class="form-group">
            <label >Tên Chương Trình Học</label>
          <?php
            $str=$this->db->get('chuongtrinhhoc');
            $object=$str->result_object();
            echo "<select name='MACTH' class='form-control'>";
            foreach ($object as $value) {
              echo "<option value='$value->MACTH'>$value->TENCTH</option>";
            }
            echo "</select>";
          ?>
        </div>
        <button type="submit" name="suabaihoc" class="btn btn-primary btn-lg btn-block">Sửa bài học</button>
    </form>
    </div>
  </div>
</div>