<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Budget Buddy :: Track Today, Save Tomorrow.</title>
<?php echo link_tag('assets/css/bootstrap.min.css')?>
<body>
<div class="row mt-5">
<h2 class="text-center mb-1">Budget Buddy</h2>
<h5 class="text-center">Track Today, Save Tomorrow.</h5>
<hr />
<div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-4 offset-md-4">
<div class="login-panel panel panel-default">
<div class="panel-heading mb-3">Don't have an account? Sign Up</div>
<div class="panel-body">
<!--success message -->
<?php if($this->session->flashdata('success')){?>
<p style="color:red">
  <?php  echo $this->session->flashdata('success');?>
</p>
<?php } ?>
<!--error message -->
<?php if($this->session->flashdata('error')){?>
<p style="color:red">
  <?php  echo $this->session->flashdata('error');?>
</p>
<?php } ?>
<form role="form" action="" method="post" id="" name="signup">
<?php echo form_open('signup',['name'=>'signup']);?>
<fieldset>
<div class="form-group mb-3"> <?php echo form_input(['name'=>'fullname','id'=>'fullname','class'=>'form-control','placeholder'=>'Enter your Full Name','value'=>set_value('fullname')]);?> <?php echo form_error('fullname','<div style="color:red">','<div>')?> </div>
<div class="form-group mb-3"> <?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Enter your Email ID','value'=>set_value('email')]);?> <?php echo form_error('email','<div style="color:red">','<div>')?> </div>
<div class="form-group mb-3"> <?php echo form_input(['name'=>'mobileno','id'=>'mobileno','class'=>'form-control','placeholder'=>'Enter Mobile Number','value'=>set_value('mobileno')]);?> <?php echo form_error('mobileno','<div style="color:red">','<div>')?> </div>
<div class="form-group mb-3"> <?php echo form_password(['name'=>'newpassword','id'=>'newpassword','class'=>'form-control','placeholder'=>'Enter Password','value'=>set_value('newpassword')]);?> <?php echo form_error('newpassword','<div style="color:red">','<div>')?> </div>
<div class="form-group mb-3"> <?php echo form_password(['name'=>'repeatpassword','id'=>'repeatpassword','class'=>'form-control','placeholder'=>'Confirm Password','value'=>set_value('repeatpassword')]);?> <?php echo form_error('repeatpassword','<div style="color:red">','<div>')?> </div>
<div class="checkbox"> <?php echo form_submit(['name'=>'submit','id'=>'submit','class'=>'btn btn-primary','value'=>'Submit']);?>
  <p class="mt-3 text-center" style="color:blue"> Already have an account <a href="<?php echo site_url('user/login');?>">Login</a></p>
</div>
</fieldset>
<?php echo form_close();?>
</div>
</div>
</div>
<!-- /.col-->
</div>
<!-- /.row -->
<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>
