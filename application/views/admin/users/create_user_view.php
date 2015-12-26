<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top: 60px;">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <h1>Create user</h1>
      <?php echo form_open_multipart('', array('class'=>'form-horizontal'))?>

      <div class="form-group">
        <?php 
        echo form_label('Avatar','avatar').'<br>';
        echo '<img alt="Avatar" id="view" class="img-responsive" src="'.base_url('uploads/avatar/no-user-image.gif').'">'; 
        ?>
      </div>

      <div class="form-group">
        <!-- Select Image To Upload:<br /> -->
        <input type="file" name="userfile" onchange="previewImage(this)"/>
        <!-- <input type="button" onclick="upload()" value="Upload" class="btn btn-primary "> -->
      </div>

      <div class="form-group">
        <?php
        echo form_label('Name','name');
        echo form_error('name');
        echo form_input('name',set_value('name'),'class="form-control"');
        ?>
      </div>

      <div class="form-group">
        <?php
        echo form_label('Phone','phone');
        echo form_error('phone');
        echo form_input('phone',set_value('phone'),'class="form-control"');
        ?>
      </div>

      <div class="form-group">
        <?php
        echo form_label('Age','age');
        echo form_error('age');
        echo form_input('age',set_value('age'),'class="form-control"');
        ?>
      </div>

      <div class="form-group">
        <?php
        echo form_label('Username','username');
        echo form_error('username');
        echo form_input('username',set_value('username'),'class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Email','email');
        echo form_error('email');
        echo form_input('email','','class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Password','password');
        echo form_error('password');
        echo form_password('password','','class="form-control"');
        ?>
      </div>
      <div class="form-group">
        <?php
        echo form_label('Confirm password','password_confirm');
        echo form_error('password_confirm');
        echo form_password('password_confirm','','class="form-control"');
        ?>
      </div>

      <div class="form-group">
        <?php
        if(isset($groups))
        {
          echo form_label('Groups','groups[]');
          foreach($groups as $group)
          {
            echo '<div class="radio">';
            echo '<label>';
            echo form_radio('groups[]', $group->id, set_radio('groups[]', $group->id));
            echo ' '.$group->name;
            echo '</label>';
            echo '</div>';
          }
        }
        ?>
      </div>

      <?php echo form_submit('submit', 'Create user', 'class="btn btn-primary btn-lg btn-block"');?>
      <?php echo form_close();?>
    </div>
  </div>
</div>