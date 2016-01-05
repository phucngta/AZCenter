<div class="container">
	<!--<div class="col-sm-12 col-md-12 col-lg-12">-->
		<div class="col-xs-8 col-sm-8">
			<div id="carousel-id" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-id" data-slide-to="0" class=""></li>
					<li data-target="#carousel-id" data-slide-to="1" class=""></li>
					<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="<?php echo base_url('assets/img/HPNY.jpg')?>">
						<div class="container">
							<!-- <div class="carousel-caption">
								<h1 align="left">Trung Tâm Anh Ngữ AZCenter</h1>
								<p align="left">Trung tâm anh ngữ hàng đầu-Nơi chắp cánh cho ước mơ của bạn</p>
								<p><a class="btn btn-lg btn-primary" href="<?php echo base_url('public/user/register');?>" role="button">Đăng Ký Ngay Hôm Nay</a></p>
							</div> -->
						</div>
					</div>
					<div class="item">
						<img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="<?php echo base_url('assets/img/banner-giao-tiep.jpg')?>">
						<div class="container">
							<!-- <div class="carousel-caption">
								<h2 align="left">Danh Ngôn hay</h2>
								<p align="left">Success is the ability to go from one failure to another with no loss of enthusiasm.</p>
								<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
							</div> -->
						</div>
					</div>
					<div class="item active">
						<img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="<?php echo base_url('assets/img/head-banner.jpg')?>">
						<div class="container">
							<!-- <div class="carousel-caption">
								<h1 align="left">Học Tiếng Anh Miễn Phí</h1>
								<p align="left">Cùng nhau học tiếng anh miễn phí với Trung tâm AZCenter và hàng ngàn khóa học đang chờ đợi bạn</p>
								<p><a class="btn btn-lg btn-primary" href="#" role="button">Tìm Hiểu Thêm</a></p>
							</div> -->
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
		<div class=" col-sm-4 col-md-4">
		<h5 align="center">KHÓA HỌC NỔI BẬT</h5>
		<hr></hr>
				<div class="panel price panel-green">
								<div class="panel-heading text-center">
								</div>
								<div class="panel-body text-center">
									<img src="<?php echo base_url('assets/img/it_logo.jpg')?>" class="img-responsive" alt="Image">
								</div>
								<ul class="list-group list-group-flush text-center">
									<li class="list-group-item"><i class="icon-ok text-danger"></i><strong>Tiếng Anh Chuyên Ngành CNTT</strong></li>
									<li class="list-group-item"><i class="fa fa-money"></i>&nbsp;Miễn Phí</li>
			
								</ul>
								<div class="panel-footer">
									<a class="btn btn-lg btn-block btn-success" href="<?php echo base_url('public/user/register');?>">Đăng Ký Ngay</a>
								</div>
								</div>				

		</div>
		<div class="col-xs-8">
			<div class="col-xs-12 col-sm-12">
			<div id="khoa_hoc">
			<span><h3 align="center">THÔNG TIN CÁC KHÓA HỌC</h3></span>
			<hr></hr>
			
					
						<?php foreach ($khoahoc as $key => $value) {
							$url =$value->picture;
							?>
						<div class="col-md-4">
							<div class="panel price panel-red">
								<div class="panel-heading text-center">
								</div>
								<div class="panel-body text-center">
									<img src="<?php echo base_url().$value->picture?>" class="img-responsive" alt="Image">
								</div>
								<ul class="list-group list-group-flush text-center">
									<li class="list-group-item"><i class="icon-ok text-danger"></i><a href="<?php echo base_url('course/course').'/'.$value->makh;?>"><strong><?php echo $value->tenkh;?></strong></li>
									<li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo number_format($value->hocphi);?>VND</li>
									<li class="list-group-item"><i class="icon-ok text-danger"></i> 24/7 support</li>
								</ul>
								<div class="panel-footer">
								<?php
								if($this->ion_auth->logged_in()){?>
									<a class="btn btn-lg btn-block btn-primary" href="<?php echo base_url('public/user/dkkh').'/'.$current_user->id.'/'.$value->makh;?>">Tham gia</a>
								<?php }else{?>
									<a class="btn btn-lg btn-block btn-danger" href="<?php echo base_url('public/user/register');?>">Đăng ký ngay</a>
								<?php }?>

								</div>
								</div>
							<!-- <div class="panel panel-info cell">
								<div class="panel-heading"><span><i class="fa fa-bus"></i>&nbsp;<?php echo $value->tenkh?></span></div>
								<div class="panel-body">
									<img src="<?php echo $url;?>" class="img-responsive" alt="Image">
								</div>
							</div> -->
						</div>
						<?php }?>
						<!-- <div class="col-md-4">
							<div class="panel panel-info cell">
								<div class="panel-heading"><span><i class="fa fa-bus"></i>&nbsp;Tiếng Anh Giao Tiếp </span></div>
								<div class="panel-body">
									<img src="<?php echo base_url('assets/img/Edit3.png')?>" class="img-responsive" alt="Image">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-info cell">
								<div class="panel-heading"><span><i class="fa fa-bus"></i>&nbsp;Tiếng Anh Người Lớn </span></div>
								<div class="panel-body">
									<img src="<?php echo base_url('assets/img/pencil_icon.png')?>" class="img-responsive" alt="Image">
								</div>
							</div>
						</div> -->
						
						<!-- <div class="col-md-4">
							<div class="panel panel-info cell">
								<div class="panel-heading"><span><i class="fa fa-bus"></i>&nbsp;Tiếng Anh Cho Trẻ Em </span></div>
								<div class="panel-body">
									<img src="<?php echo base_url('assets/img/consult.png')?>" class="img-responsive" alt="Image">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading"><span><i class="fa fa-bus"></i>&nbsp; Tiếng Anh Thi Cử </span></div>
								<div class="panel-body">
									<img src="<?php echo base_url('assets/img/thumbs-up.png')?>" class="img-responsive" alt="Image">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading"><span><i class="fa fa-bus"></i>&nbsp;Tiếng Anh Thi Đại Học </span></div>
								<div class="panel-body">
									<img src="<?php echo base_url('assets/img/design.png')?>" class="img-responsive" alt="Image">
								</div>
							</div>
						</div> -->
					
				</div>
				
			</div>
		</div>
	<!--</div>-->
</div>

