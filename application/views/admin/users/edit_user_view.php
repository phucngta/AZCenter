<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <?php echo form_open_multipart('',array('class'=>'form-horizontal'));?>

    <div class="form-group">
      <?php 
      echo form_label('Avatar','avatar').'<br>';
      if ($user->picture != NULL) {
        echo '<img alt="Avatar"  id="view" class="img-responsive" src="'.base_url($user->picture).'">';
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
      echo form_label('Name','name');
      echo form_error('name');
      echo form_input('name',set_value('name',$user->name),'class="form-control"');
      ?>
    </div>

    <div class="form-group">
      <?php
      echo form_label('Phone','phone');
      echo form_error('phone');
      echo form_input('phone',set_value('phone',$user->phone),'class="form-control"');
      ?>
    </div>

    <div class="form-group">
      <?php
      echo form_label('Age','age');
      echo form_error('age');
      echo form_input('age',set_value('age',$user->age),'class="form-control"');
      ?>
    </div>

    <div class="form-group">
      <?php
      echo form_label('Username','username');
      echo form_error('username');
      echo form_input('username',set_value('username',$user->username),'class="form-control"');
      ?>
    </div>
    <div class="form-group">
      <?php
      echo form_label('Email','email');
      echo form_error('email');
      echo form_input('email',set_value('email',$user->email),'class="form-control"');
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
    <div class="form-group">
      <?php
      if(isset($groups))
      {
        echo form_label('Groups','groups[]');
        foreach($groups as $group)
        {
          echo '<div class="radio">';
          echo '<label>';
          echo form_radio('groups[]', $group->id, set_radio('groups[]', $group->id, in_array($group->id,$usergroups)));
          echo ' '.$group->name;
          echo '</label>';
          echo '</div>';
        }
      }
      ?>
    </div>
    <?php echo form_hidden('user_id',$user->id);?>
    <?php echo form_submit('submit', 'Edit user', 'class="btn btn-primary btn-lg btn-block"');?>
    <?php echo form_close();?>
  </div>
</div>
