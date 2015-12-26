<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Thêm Danh Mục</h1>
      <form method="post" name="themdanhmuc">
        <div class="form-group">
            <div class="form-group">
          <label >Mã Danh Mục</label>
          <input type="text" class="form-control" name="MADM" placeholder="1111" required>
        </div>
          <label >Tên Danh Mục</label>
          <input type="text" class="form-control" name="TENDM" placeholder="2222" required>
        </div>
        <button type="submit" name="themdanhmuc" class="btn btn-primary btn-lg btn-block">Thêm danh mục</button>
    </form>
    </div>
  </div>
</div>