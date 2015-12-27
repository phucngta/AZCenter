<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title;?></title>

	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/flat-ui.min.css')?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css')?>">

	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/ajax.js')?>"></script>
</head>

<body>
	<nav class="navbar navbar navbar-inverse navbar-embossed" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url('home');?>"><?php echo $this->config->item('cms_title');?></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> &nbsp; Danh Mục Khóa Học<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Tiếng Anh Thương Mại</a></li>
						<li><a href="#">Tiếng Anh Học Thuật</a></li>
						<li><a href="#">Tiếng Anh TOIEC</a></li>
						<li><a href="#">Tiếng Anh Thi TOFEL</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> &nbsp; Liên Hệ <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
			</ul>
			
			
			<?php 
			if(!$this->ion_auth->logged_in()) {    ?>
			<!-- Dropdown login -->
			<ul class="nav navbar-nav navbar-right">
				<!-- <li><p class="navbar-text"></p></li> -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Đăng nhập</b> 
						<span class="caret"></span></a>
					<ul id="login-dp" class="dropdown-menu">
						<li>
							<div class="row">
								<div class="col-md-12">
									<!-- <span class="text-login">Đăng nhập bằng</span> -->
									<div class="social-buttons">
										<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
										<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
									</div>
									<b class="text-login">hoặc</b>
									<form class="form" role="form" method="post" action="<?php echo base_url('public/user/login')?>" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											<label class="sr-only" for="email">Tên đăng nhập</label>
											<input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" required>
										</div>
										<div class="form-group">
											<label class="sr-only" for="Password">Password</label>
											<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
											<div class="help-block text-right"><a href="#">Quên Mật Khẩu?</a></div>
										</div>
										<div class="form-group">
											<!-- <div class="form-group"> -->
											<?php echo form_checkbox('remember','1',FALSE);?>
											<span class="text-login">Ghi nhớ</span>
										</div>

										<div class="form-group">
											<input align="right" type="submit"  name="login" class="btn btn-primary btn-block" value="Đăng Nhập">
										</div>
									</form>
								</div>
								<div class="bottom text-center">
									Bạn chưa có tài khoản? <a href="<?php echo base_url('public/user/register');?>"><button type="submit" class="btn btn-primary btn-block">Đăng Ký</button></a>
								</div>
							</div>
						</li>
					</ul>
				</li>
			</ul>
			<!-- End dropdown login -->
			<?php } 
			else {
			?>
			<!-- Dropdown menu -->
			<ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $current_user->name;?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo site_url('public/profile');?>">Hồ sơ</a></li>
                  <!-- <?php echo $current_user_drop_menu?> -->
                  <!-- <li class="divider"></li> -->
                  <li><a href="<?php echo site_url('public/user/logout');?>">Thoát</a></li>
                </ul>
              </li>
            </ul>
            <!-- End dropdown menu -->
            <?php } ?>

		</div><!-- /.navbar-collapse -->
	</nav>

	<?php
    if($this->session->flashdata('message'))
    {
      ?>
      <!-- <div class="container" style="padding-top:40px;"> -->
        <div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('message');?>
          </div>
        <!-- </div> -->
        <?php
      }
      ?>