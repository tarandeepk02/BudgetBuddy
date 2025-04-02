<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-12">
      <h1 class="page-header">Change Password</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="panel panel-default">
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
        <div class="panel-body">
          <div class="col-md-12"> <?php echo form_open('account/password',['name'=>'signup']);?>
            <div class="form-group mb-3">
              <label>Current Password</label>
              <?php echo form_password(['name'=>'currentpassword','id'=>'currentpassword','class'=>'form-control','placeholder'=>'Enter the Password','value'=>set_value('currentpassword')]);?> <?php echo form_error('currentpassword','<div style="color:red">','<div>')?> </div>
            <div class="form-group mb-3">
              <label style="color:#000">New Password</label>
              <?php echo form_password(['name'=>'newpassword','id'=>'newpassword','class'=>'form-control','placeholder'=>'Enter the Password','value'=>set_value('newpassword')]);?> <?php echo form_error('newpassword','<div style="color:red">','<div>')?> </div>
            <div class="form-group mb-3">
              <label style="color:#000">Confirm Password</label>
              <?php echo form_password(['name'=>'confirmpassword','id'=>'confirmpassword','class'=>'form-control','placeholder'=>'Confirm the Password','value'=>set_value('confirmpassword')]);?> <?php echo form_error('confirmpassword','<div style="color:red">','<div>')?> </div>
            <div class="form-group has-success"> <?php echo form_submit(['name'=>'submit','id'=>'submit','class'=>'btn btn-primary','value'=>'Change Password']);?> </div>
            <?php echo form_close();?> </div>
        </div>
      </div>
      <!-- /.panel-->
    </div>
  </div>
  <!-- /.row -->
</div>
