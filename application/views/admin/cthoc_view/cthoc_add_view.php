<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top: 30px;">
  <div class="row">
    <form method="post" name="themcthoc">
      <div class="row">
        <div class="col-lg-3">
          <div class="form-group">
            <label >Tên Chương Trình</label>
            <input type="text" class="form-control" name="tencth" placeholder="" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label >Mô Tả</label>
            <textarea name="mota" class="form-control" rows="10" required></textarea>
          </div>   
        </div>
      </div>
      <div class="col-lg-2 col-lg-offset-4">
        <button type="submit" name="themcthoc" class="btn btn-primary btn-lg btn-block">Thêm</button>
      </div>
    </form>

  </div>
</div>