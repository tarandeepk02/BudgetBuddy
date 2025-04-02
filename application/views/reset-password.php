<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Budget Buddy :: Track Today, Save Tomorrow.</title>
<?php echo link_tag('assets/css/bootstrap.min.css')?><?php echo link_tag('assets/css/datepicker3.css')?><?php echo link_tag('assets/css/font-awesome.min.css')?>
</head>
<body>
<div class="">
  <h2 align="center">Budget Buddy</h2>
  <h5 class="text-center">Track Today, Save Tomorrow.</h5>
  <hr />
  <div class="col-10 offset-1 col-sm-8 offset-sm-2 col-md-4 offset-md-4">
    <div class="login-panel panel panel-default">
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
        <?php echo form_open('user/resetpassword',['name'=>'resetpassword'])?>
        <fieldset>
        <div class="form-group mb-3">
          <label style="color:#000">Registered Email id</label>
          <?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Registered Email d','value'=>set_value('fromdate')]);?> <?php echo form_error('email','<div style="color:red">','<div>')?> </div>
        <div class="form-group mb-3">
          <label style="color:#000">Registeres Mobile no.</label>
          <?php echo form_input(['name'=>'MobileNumber','id'=>'MobileNumber','class'=>'form-control','placeholder'=>'Registered Mobile number','value'=>set_value('fromdate')]);?> <?php echo form_error('MobileNumber','<div style="color:red">','<div>')?> </div>
        <div class="form-group mb-3">
          <label style="color:#000">New Password</label>
          <?php echo form_password(['name'=>'newpassword','id'=>'newpassword','class'=>'form-control','placeholder'=>'Enter the Password','value'=>set_value('newpassword')]);?> <?php echo form_error('newpassword','<div style="color:red">','<div>')?> </div>
        <div class="form-group mb-3">
          <label style="color:#000">Confirm Password</label>
          <?php echo form_password(['name'=>'confirmpassword','id'=>'confirmpassword','class'=>'form-control','placeholder'=>'Confirm the Password','value'=>set_value('confirmpassword')]);?> <?php echo form_error('confirmpassword','<div style="color:red">','<div>')?> </div

							
							>
        <div class="checkbox mb-3"> <?php echo form_submit(['name'=>'submit','value'=>'Reset','class'=>'btn btn-primary']);?> <span style="padding-left:250px"> <a href="<?php echo site_url('user/login');?>" class="btn btn-primary">Login Here</a></span> </div>
        </fieldset>
        <?php echo form_close();?> </div>
    </div>
  </div>
  <!-- /.col-->
</div>
<!-- /.row -->
<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</body>
</html>
