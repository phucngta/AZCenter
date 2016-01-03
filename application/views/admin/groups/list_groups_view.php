<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
  <div class="col-lg-12">
    <a href="<?php echo site_url('admin/groups/create');?>" class="btn btn-primary">Create group</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12" style="margin-top: 10px;"> 
    <?php
    if(!empty($groups))
    {
      echo '<table class="table table-hover table-bordered table-condensed">';
      echo '<tr><td>ID</td><td>Group name</td></td><td>Group description</td><td>Operations</td></tr>';
      foreach($groups as $group)
      {
        echo '<tr>';
        echo '<td>'.$group->id.'</td>';
          // echo '<td>'.anchor('admin/users/index/'.$group->id,$group->name).'</td>';   
        echo '<td><a href ="#" onclick="getUsers('.$group->id.')" >'.$group->name.'</a></td>
        <td>'.$group->description.'</td><td>';
        if(!in_array($group->name, array('admin','student','teacher'))) echo ' '.anchor('admin/groups/edit/'.$group->id,'<span class="glyphicon glyphicon-pencil"></span>').' '.anchor('admin/groups/deleteGroup/'.$group->id,'<span class="glyphicon glyphicon-remove"></span>');
        echo '</td>';
        echo '</tr>';
      }
      echo '</table>';
    }
    ?>
  </div>
</div>
<div class="row" >
  <div class="col-lg-12" style="margin-top: 10px;" id='ajax_display'></div>
</div>
