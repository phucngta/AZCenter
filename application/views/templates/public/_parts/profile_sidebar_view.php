<div class="profile-sidebar">
	<!-- SIDEBAR USERPIC -->
	<div class="profile-userpic">
		<img src="<?php echo base_url($current_user->picture)?>" class="img-responsive" alt="Avatar">
	</div>
	<!-- END SIDEBAR USERPIC -->
	<!-- SIDEBAR USER TITLE -->
	<div class="profile-usertitle">
		<div class="profile-usertitle-name">
			<?php echo $current_user->name?>
		</div>
		<div class="profile-usertitle-job">
			<?php foreach($usergroups as $group)
			{
				echo $group->name;
			}?>
		</div>
	</div>
	<!-- END SIDEBAR USER TITLE -->
	<!-- SIDEBAR BUTTONS -->

	<!-- END SIDEBAR BUTTONS -->
	<!-- SIDEBAR MENU -->
	<div class="profile-usermenu">
		<ul class="nav">
			<li class="active">
				<a href="#">
					<i class="glyphicon glyphicon-home"></i>
					Bảng Điều Khiển</a>
				</li>
				<li>
					<a href="#">
						<i class="glyphicon glyphicon-user"></i>
						Chỉnh sửa thông tin</a>
					</li>
					<li>
						<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Các khóa đã học</a>
						</li>
						<li>
							<a href="#">
								<i class="glyphicon glyphicon-flag"></i>
								Trợ giúp </a>
							</li>
						</ul>
					</div>
					<!-- END MENU -->
				</div>
			