<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/admin/_parts/admin_master_header_view'); ?>

<div id="page-wrapper">
	<?php
	if($this->session->flashdata('message'))
		{ ?>
		<div class="col-lg-12">
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
					aria-hidden="true">&times;</span></button>
					<?php echo $this->session->flashdata('message');?>
				</div>
			</div>
		<?php } ?>
	<div class="container-fluid">

	<!-- <div class="container">
	<div class="main-content" style="padding-top:40px;"> -->
		<?php echo $the_view_content; ?>
	</div>
	<!-- End container -->
</div>
<!-- End page-wrapper -->
<?php $this->load->view('templates/admin/_parts/admin_master_footer_view');?>