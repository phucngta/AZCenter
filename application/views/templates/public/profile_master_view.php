<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<?php $this->load->view('templates/public/_parts/profile_sidebar_view.php') ;?>
			</div>
			<center>
				<?php echo $profile_content ;?>
			</center>
			<br>
			<br>