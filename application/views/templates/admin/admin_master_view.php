<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/admin/_parts/admin_master_header_view'); ?>

<div id="page-wrapper">
	<div class="container-fluid">
<!-- <div class="container">
	<div class="main-content" style="padding-top:40px;"> -->
		<?php echo $the_view_content; ?>
	</div>
	<!-- End container -->
</div>
<!-- End page-wrapper -->
<?php $this->load->view('templates/admin/_parts/admin_master_footer_view');?>