

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


     <form enctype="multipart/form-data" action="" method="post" role="form" class="form-horizontal">
          <h4>Đăng Ký Thông Tin Học Viên</h4>
          <div class="form-group">
               <label class="control-label col-sm-3"></label>
               <div class="col-sm-5">
                  <img alt="Avatar" id="view" class="img-responsive" src="<?php echo base_url('uploads/avatar/no-user-image.gif');?>">
               </div>
          </div>

          <div class="form-group">
               <label class="control-label col-sm-3">Ảnh đại diện</label>
               <div class="col-sm-5">
                  <input type="file" name="userfile" onchange="previewImage(this)"/>
               </div>
          </div>
          <div class="form-group">
               <label class="control-label col-sm-3">Tên Đăng Nhập</label>
               <div class="col-sm-5">
                    <input type="text" class="form-control" id="username" name="username" required onblur="kiem_tra_user()" value="<?php echo set_value('username')?>"/>

               </div>
               <div class="col-sm-4"id="ketqua"></div>
          </div>
          <div class="form-group">
               <label class="control-label col-sm-3">Mật khẩu:</label>
               <div  class="col-sm-5">
                    <input type="password" class="form-control" id="password" name="password" required>
               </div>
          </div>
          <div class="form-group">
               <label for="param_re_password" class="control-label col-sm-3">Nhập lại mật khẩu:</label>
               <div  class="col-sm-5">
                    <input type="password" class="form-control" id="re_password" name="re_password" required="TRUE" onblur="load()">
                    <span id="correct"></span>
               </div>
          </div>
          <div class="form-group">
               <label for="param_email" class="control-label col-sm-3">Email:<span class="req">*</span></label>
               <div  class="col-sm-5">
                    <input type="email" class="form-control" id="email" name="email" required="TRUE" value="<?php echo set_value('email')?>">
               </div>
          </div>
          <div class="form-group">
               <label for="param_name" class="control-label col-sm-3">Họ và tên:</label>
               <div  class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required="TRUE" value="<?php echo set_value('name')?>">
               </div>
          </div>
          <div class="form-group">
               <label for="param_phone" class="control-label col-sm-3">Số điện thoại:</label>
               <div  class="col-sm-5">
                    <input type="text" class="form-control" id="phone" name="phone" maxlenght = "10" required="TRUE" value="<?php echo set_value('phone')?>">
               </div>
          </div>
          <div class="form-group">
              <label for="param_age" class="control-label col-sm-3">Tuổi:<span class="req">*</span></label>
              <div  class="col-sm-5">
               <input type="number" class="form-control" id="age" name="age" required="TRUE" value="<?php echo set_value('age')?>"><Br>
          </div>
     </div>
     <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          <input style="float: right;" type="submit" class="btn btn-inverse" name="register" value="Đăng Ký Thông Tin">
     </div>
</form>
</div>