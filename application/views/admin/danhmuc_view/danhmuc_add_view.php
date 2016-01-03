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

<!-- <div class="container" style="margin-top: 30px;">
  <div class="row">
    <div class="col-lg-6">

      <form method="post" name="themdanhmuc" class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-sm-4">Mã Danh Mục</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="madm" placeholder="" readonly>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-4">Tên Danh Mục</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="tendm" placeholder="" required>
          </div>
        </div>

        <div class="col-sm-5"></div>
        <div class="col-sm-4">
          <button type="submit" name="themdanhmuc" class="btn btn-primary btn-lg btn-block">Thêm</button>
        </div>
      </form>
    </div>
  </div>
</div> -->