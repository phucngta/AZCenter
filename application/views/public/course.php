<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?php foreach ($khoa_hoc as $key => $value) {?>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<img src="<?php echo base_url().$value->picture;?>" class="img-responsive" alt="Image">
	</div>

	<div class="col-xs-9 col-sm-9 col-md-9">
		<div class="col-md-12"><h2><?php echo $value->tenkh;?></h2></div>
		<div class="row">
			<div class="col-md-3"><h3><i class="fa fa-calendar"></i></h3>&nbsp;<?php echo $value->tgbd;?>
</div>
			<div class="col-md-3"><h3><i class="fa fa-calendar"></i></h3>&nbsp;<?php echo $value->tgkt;?></div>
			<div class="col-md-3"><h3><i class="fa fa-money"></i></h3>&nbsp; <?php echo number_format($value->hocphi);?>&nbsp;VND</div>
			<div class="col-md-3"><h3><i class="fa fa-teacher"></i></h3><?php echo $value->teacher;?></div>
		</div>
		<div class="col-md-9"><p><?php echo $value->mota?></p></div>
		
		<div class="row">
			<div class="col-md-10">
			<?php
				if($this->ion_auth->logged_in()){?>
				<a class="btn btn-lg btn-block btn-primary" href="<?php echo base_url('public/user/dkkh').'/'.$current_user->id.'/'.$value->makh;?>">Tham gia</a>
				<?php }else{?>
				<a class="btn btn-lg btn-block btn-danger" href="<?php echo base_url('public/user/register');?>">Đăng ký ngay</a>
				<?php }?>
				</div>
		</div>
		
	</div>
<?php }?>
</div>