<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top:60px;">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Profile page</h1>
      <?php echo form_open_multipart('',array('class'=>'form-horizontal'));?>

      <div class="form-group">
        <?php 
        echo form_label('Avatar','avatar').'<br>';
        if ($current_user->avatar != NULL) {
          echo '<img alt="Avatar" id="view" src="'.base_url($current_user->avatar).'">';
        }
        else echo '<img alt="Avatar" id="view" src="'.base_url('uploads/avatar/no-user-image.gif').'">';
        ?>
      </div>

      <div class="form-group">
        Select Image To Upload:<br />
        <input type="file" name="userfile" onchange="previewImage(this)"/><br />
      </div>

      <div class="form-group">
        <?php
        echo form_label('Name','name');
        echo form_error('name');
        echo form_input('name',set_value('name',$current_user->name),'class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Phone','phone');
        echo form_error('phone');
        echo form_input('phone',set_value('phone',$current_user->phone),'class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Age','age');
        echo form_error('age');
        echo form_input('age',set_value('age',$current_user->age),'class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Username','username');
        echo form_error('username');
        echo form_input('username',set_value('username',$current_user->username),'class="form-control" readonly');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Email','email');
        echo form_error('email');
        echo form_input('email',set_value('email',$current_user->email),'class="form-control" readonly');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Change password','password');
        echo form_error('password');
        echo form_password('password','','class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Confirm changed password','password_confirm');
        echo form_error('password_confirm');
        echo form_password('password_confirm','','class="form-control"');
        ?>
      </div>
      <?php echo form_submit('submit', 'Save profile', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>
    </div>
  </div>
</div>