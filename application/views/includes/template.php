<?php $this->load->view('includes/header'); ?>
<div class="container-fluid">
  <div class="row min-vh-100">
    <?php $this->load->view('includes/sidebar'); ?>
    <?php $this->load->view($main_content); ?>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>
