<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<li>
	<a href="<?php echo site_url('admin');?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
</li>
<li>
	<a href="<?php echo site_url('admin/students');?>"><i class="fa fa-users"></i> Quản lý học viên</a>
</li>
<li>
	<a href="<?php echo site_url('admin/teachers');?>"><i class="fa fa-graduation-cap"></i>Quản lý giảng viên</a>
</li>
<li>
	<a href="<?php echo site_url('admin/khoahoc');?>"><i class="fa fa-calendar"></i> Quản lý khóa học</a>
</li>
<li>
	<a href="javascript:;" data-toggle="collapse" data-target="#hocvu"><i class="fa fa-pencil-square-o"></i> Quản lý học vụ <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="hocvu" class="collapse">
		<li>
			<a href="<?php echo site_url('admin/cthoc');?>"><i class="fa fa-language"></i> Chương trình đào tạo</a>
		</li>
		<li>
			<a href="<?php echo site_url('admin/baihoc');?>"><i class="fa fa-book"></i> Bài học</a>
		</li>
	</ul>
</li>

<li>
	<a href="<?php echo site_url('admin/danhmuc');?>"><i class="fa fa-th-list"></i> Quản lý danh mục</a>
</li>
<li>
	<a href="javascript:;" data-toggle="collapse" data-target="#caidat"><i class="fa fa-fw fa-wrench"></i>Quản lý tài khoản <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="caidat" class="collapse">
		<li><a href="<?php echo site_url('admin/groups'); ?>">Groups</a></li>
		<li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
	</ul>
</li>