<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <div class="col-lg-12">
    <a href="<?php echo site_url('admin/users/create');?>" class="btn btn-primary">Create user</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12" style="margin-top: 10px;">
    <?php
    if(!empty($users))
    {
      echo '<table class="table table-hover table-bordered table-condensed">';
      echo '<tr><td>ID</td><td>Avatar</td><td>Username</td><td>Group</td></td><td>Name</td><td>Email</td><td>Last login</td><td>Operations</td></tr>';
      foreach($users as $user)
      {
        echo '<tr>';
        echo '<td>'.$user->id.'</td>';
        if ($user->thumbnail != NULL) {
          echo '<td><img alt="Avatar" class="img-responsive" src="'.base_url($user->thumbnail).'"></td>';
        }
        else echo '<td><img alt="Avatar" class="img-responsive" src="'.base_url('uploads/avatar/no-user-image-icon.gif').'"></td>';

        echo '<td>'.$user->username.'</td>
        <td>';
        if($usergroups = $this->ion_auth->get_users_groups($user->id)->result())
        {
          foreach($usergroups as $group)
          {
            echo $group->name.'<br>';
          }
        }
        echo '</td>';
        echo '<td>'.$user->name.'</td>
        <td>'.$user->email.'</td>
        <td>'.date('Y-m-d H:i:s', $user->last_login).'</td>';
        
        if($current_user->id != $user->id) echo '<td>'.anchor('admin/users/edit/'.$user->id,'<span class="glyphicon glyphicon-pencil"></span>').' '.anchor('admin/users/delete/'.$user->id,'<span class="glyphicon glyphicon-remove"></span>').'</td>';
        else echo '<td></td>';

        echo '</tr>';
      }
      echo '</table>';
    }
    ?>
  </div>
</div>
