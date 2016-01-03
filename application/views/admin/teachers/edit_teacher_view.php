<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top: 60px;">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <?php echo form_open_multipart('',array('class'=>'form-horizontal'));?>

      <div class="form-group">
        <?php 
        echo form_label('Avatar','avatar').'<br>';
        if ($user->picture != NULL) {
            echo '<img alt="Avatar" id="view" class="img-responsive" src="'.base_url($user->picture).'">';
        }
        else echo '<img alt="Avatar" id="view" class="img-responsive" src="'.base_url('uploads/avatar/no-user-image.gif').'">';
        ?>
      </div>

      <div class="form-group">
        Select Image To Upload:<br />
        <input type="file" name="userfile" onchange="previewImage(this)"/><br />
      </div>
      
      <div class="form-group">
        <?php
        echo form_label('Họ tên','name');
        echo form_error('name');
        echo form_input('name',set_value('name',$user->name),'class="form-control"');
        ?>
      </div>

      <div class="form-group">
        <?php
        echo form_label('Điện thoại','phone');
        echo form_error('phone');
        echo form_input('phone',set_value('phone',$user->phone),'class="form-control"');
        ?>
      </div>

      <div class="form-group">
        <?php
        echo form_label('Tuổi','age');
        echo form_error('age');
        echo form_input('age',set_value('age',$user->age),'class="form-control"');
        ?>
      </div>

      <div class="form-group">
        <?php
        echo form_label('Email','email');
        echo form_error('email');
        echo form_input('email',set_value('email',$user->email),'class="form-control"');
        ?>
      </div>

      <?php echo form_hidden('user_id',$user->id);?>
      <?php echo form_hidden('username',$user->username);?>
      <?php echo form_submit('submit', 'Cập nhập', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>
    </div>
  </div>
</div>