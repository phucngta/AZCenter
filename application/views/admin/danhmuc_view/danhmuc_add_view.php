<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <form method="post" name="themdanhmuc">
        <div class="form-group">
            <div class="form-group">
          <label >Mã Danh Mục</label>
          <input type="text" class="form-control" name="madm" placeholder="" readonly>
        </div>
          <label >Tên Danh Mục</label>
          <input type="text" class="form-control" name="tendm" placeholder="" required>
        </div>
        <button type="submit" name="themdanhmuc" class="btn btn-primary btn-lg btn-block">Thêm danh mục</button>
    </form>
    </div>
  </div>
</div>