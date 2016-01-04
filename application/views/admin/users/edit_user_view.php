<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top: 30px;">
  <div class="row">
    <div class="col-lg-3">
      <label class="col-lg-offset-3">Ảnh đại diện</label>
      <?php
      if ($user->picture != NULL) {
        echo '<img alt="Avatar"  id="view" class="img-responsive" src="'.base_url($user->picture).'">';
      }
      else echo '<img alt="Avatar" id="view" class="img-responsive" src="'.base_url('uploads/avatar/no-user-image.gif').'">';
      ?>
    </div>

    <div class="col-lg-8">
      <?php echo form_open_multipart('', array('class'=>'form-horizontal'))?>

      <div class="form-group">
        <label class="control-label col-sm-2">Đổi ảnh:</label>
        <div class="col-sm-6">
          <input type="file" name="userfile" onchange="previewImage(this)"/>
        </div>
      </div>

      <div class="form-group">
        <label for="name" class="control-label col-sm-2">Họ tên</label>
        <?php
        echo '<div class="col-sm-6">';
        echo form_input('name',set_value('name',$user->name),'class="form-control"');
        echo form_error('name');
        echo '</div>';
        ?>
      </div>

      <div class="form-group">
        <label for="phone" class="control-label col-sm-2">Điện thoại</label>
        <?php
        echo '<div class="col-sm-6">';
        echo form_input('phone',set_value('phone', $user->phone),'class="form-control"');
        echo form_error('phone');
        echo '</div>';
        ?>
      </div>

      <div class="form-group">
        <label for="age" class="control-label col-sm-2">Tuổi</label>
        <?php
        echo '<div class="col-sm-6">';
        echo form_input('age',set_value('age', $user->age),'class="form-control"');
        echo form_error('age');
        echo '</div>';
        ?>
      </div>

      <div class="form-group">
        <label for="username" class="control-label col-sm-2">Username</label>
        <?php
        echo '<div class="col-sm-6">';
        echo form_input('username',set_value('username', $user->username),'class="form-control"');
        echo form_error('username');
        echo '</div>';
        ?>
      </div>
      <div class="form-group">
        <label for="email" class="control-label col-sm-2">Email</label>
        <?php
        echo '<div class="col-sm-6">';
        echo form_input('email',set_value('email', $user->email),'class="form-control"');
        echo form_error('email');
        echo '</div>';
        ?>
      </div>
      <div class="form-group">
        <label for="password" class="control-label col-sm-2">Password</label>
        <?php
        echo '<div class="col-sm-6">';
        echo form_password('password','','class="form-control"');
        echo form_error('password');
        echo '</div>';
        ?>
      </div>
      <div class="form-group">
        <label for="password_confirm" class="control-label col-sm-2">Confirm password</label>
        <?php
        echo '<div class="col-sm-6">';
        echo form_password('password_confirm','','class="form-control"');
        echo form_error('password_confirm');
        echo '</div>';
        ?>
      </div>

      <div class="form-group">
        <label for="groups[]" class="control-label col-sm-2">Group</label>
        <div class="col-sm-6">
          <?php
          // $option = array();
          if(isset($groups))
          {

            foreach($groups as $group)
            {
              // $option[$group->id] = $group->name;
              // if (in_array($group->id, $usergroups)) {
              //   $selected_id = $group->id;
              // }
              echo '<div class="radio">';
              echo '<label>';
              echo form_radio('groups[]', $group->id, set_radio('groups[]', $group->id, in_array($group->id,$usergroups)));
              echo ' '.$group->name;
              echo '</label>';
              echo '</div>';
            }
            // echo form_dropdown('group', $option, $selected_id, 'class="form-control"');
          }
          ?>
        </div>
      </div>

        <div class="col-sm-3"><?php echo form_hidden('user_id',$user->id);?></div>
        <div class="col-sm-4">
          <?php echo form_submit('submit', 'Update user', 'class="btn btn-primary btn-lg btn-block"');?>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>