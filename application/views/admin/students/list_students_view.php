<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">

      <?php
      echo '<table class="table table-hover table-bordered table-condensed">';
      echo '<tr>
      <td></td><td>Avatar</td><td>Tên Học Viên</td><td>Tuổi</td><td>Email</td><td>Số Điện Thoại</td></tr>';
      foreach ($students as $std) 
      {
        echo '<tr>';
        echo '<td>'.anchor('admin/students/edit/'.$std->id,'<span class="glyphicon glyphicon-pencil"></span>');
        if($this->ion_auth->in_group('admin'))
        {
          echo ' '.anchor('admin/students/delete/'.$std->id,'<span class="glyphicon glyphicon-remove"></span>');
        }
        echo '</td>';
        
        if ($std->thumbnail != NULL) {
          echo '<td><img alt="Avatar" class="img-responsive" src="'.base_url($std->thumbnail).'"></td>';
        }
        else echo '<td><img alt="Avatar" class="img-responsive" src="'.base_url('uploads/avatar/no-user-image-icon.gif').'"></td>';

        echo '<td>'.$std->name.'</td>
        <td>'.$std->age.'</td>
        <td>'.$std->email.'</td>
        <td>'.$std->phone.'</td>';
        
        $display = True;
        if (isset($invisible_button))  $display = False;
        if($display) echo '<td><a href="#"  onclick="getCoursesByStudent('.$std->id.')" class="btn btn-primary">Xem khóa học</a></td>';
        echo '</tr>';
      }
      echo '</table>';
      ?>
    </div>
  </div>
  <div class="row" >
    <div class="col-lg-12" style="margin-top: 10px;" id='ajax_display'></div>
  </div>