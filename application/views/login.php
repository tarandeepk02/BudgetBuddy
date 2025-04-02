<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Budget Buddy :: Track Today, Save Tomorrow.</title>
<?php echo link_tag('assets/css/bootstrap.min.css') ?>
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center mb-1">Budget Buddy</h2>
  <h5 class="text-center">Track Today, Save Tomorrow.</h5>
  <hr />
  <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">
    <div class="card">
      <div class="card-header">User Log in</div>
      <div class="card-body">
        <p style="font-size:16px; color:red" class="text-center"></p>
        <?php if ($this->session->flashdata('error')) { ?>
        <p style="color:red" class="text-center"> <?php echo $this->session->flashdata('error'); ?> </p>
        <?php } ?>
        <?php echo form_open('user/login', ['name' => 'login']); ?>
        <div class="mb-3"> <?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Enter Email ID', 'value' => set_value('email')]); ?> <?php echo form_error('email', '<div style="color:red">', '</div>'); ?> </div>
        <div class="mb-3"> <?php echo form_password(['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter Password', 'value' => set_value('password')]); ?> <?php echo form_error('password', '<div style="color:red">', '</div>'); ?> </div>
        <p class="text-end"><a href="<?php echo site_url('user/resetpassword'); ?>">Forgot Password?</a></p>
        <div class="mb-3"> <?php echo form_submit(['name' => 'login', 'id' => 'login', 'class' => 'btn btn-primary w-100', 'value' => 'Login']); ?> </div>
        <hr />
        <p class="text-center" style="color:blue">Don't have an account? <a href="<?php echo site_url('user/signup'); ?>">Sign Up</a></p>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
<!-- /.container -->
<script src="<?php echo base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
