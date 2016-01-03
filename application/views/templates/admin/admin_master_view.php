<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/admin/_parts/admin_master_header_view'); ?>

		<?php echo $the_view_content; ?>

	</div>
	<!-- End container -->
</div>
<!-- End page-wrapper -->
<?php $this->load->view('templates/admin/_parts/admin_master_footer_view');?>