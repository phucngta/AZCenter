<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <form method="post" name="themcthoc">
        <div class="form-group">
          <label >Tên Chương Trình Đào Tạo</label>
          <input type="text" class="form-control" name="tencth" placeholder="" required>
        </div>
        <div class="form-group">
          <label >Mô Tả</label>
          <textarea name="mota" class="form-control" cols="40" rows="5" required></textarea>
        </div>   
        <button type="submit" name="themcthoc" class="btn btn-primary btn-lg btn-block">Thêm chương trình đào tạo</button>
    </form>
    </div>
  </div>
</di