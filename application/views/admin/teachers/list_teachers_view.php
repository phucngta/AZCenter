<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container-fluid" >
  <div class="row">
    <div class="col-lg-12">
      <h1>Danh Sách Giảng Viên</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12" style="margin-top: 10px;">
      <?php
      echo '<table class="table table-hover table-bordered table-condensed">';
      echo '<tr>
      <td></td><td>Avatar</td><td>Tên Giảng Viên</td><td>Tuổi</td><td>Email</td><td>Số Điện Thoại</td><td></td></tr>';
      foreach ($users as $tch) 
      {
        echo '<tr>';
        
        echo '<td>'.anchor('admin/teachers/edit/'.$tch->id,'<span class="glyphicon glyphicon-pencil"></span>');
        if($this->ion_auth->in_group('admin'))
        {
          echo ' '.anchor('admin/teachers/delete/'.$tch->id,'<span class="glyphicon glyphicon-remove"></span>');
        }
        echo '</td>';

        if ($tch->thumbnail != NULL) {
          echo '<td><img alt="Avatar" class="img-responsive" src="'.base_url($tch->thumbnail).'"></td>';
        }
        else echo '<td><img alt="Avatar" class="img-responsive" src="'.base_url('uploads/avatar/no-user-image-icon.gif').'"></td>';

        echo '<td>'.$tch->name.'</td>
        <td>'.$tch->age.'</td>
        <td>'.$tch->email.'</td>
        <td>'.$tch->phone.'</td>'; 
        echo '<td><a href="#"  onclick="getCoursesByTeacher('.$tch->id.')" class="btn btn-primary">Xem khóa học</a></td>';
        echo '</tr>';
        
      }
      echo '</table>';
      ?>
    </div>
  </div>
  <div class="row" id='ajax_display'></div>
</div>