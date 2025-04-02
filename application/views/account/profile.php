<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-12">
      <h1 class="page-header">My Profile</h1>
    </div>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12"> <?php echo form_open('account/updateprofile',['name'=>'userprofile'])?>
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
          <div class="col-md-6">
            <div class="form-group mb-3">
              <label>Full Name</label>
              <?php echo form_input(['name'=>'fullname','id'=>'fullname','class'=>'form-control','value'=>set_value('fromdate',$profile->FullName)]);?> <?php echo form_error('fullname','<div style="color:red">','<div>')?> </div>
            <div class="form-group mb-3">
              <label style="color:#000">Email</label>
              <?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','readonly'=>'true','value'=>set_value('fromdate',$profile->Email)]);?> <?php echo form_error('email','<div style="color:red">','<div>')?> </div>
            <div class="form-group mb-3">
              <label style="color:#000">Mobile Number</label>
              <?php echo form_input(['name'=>'MobileNumber','id'=>'MobileNumber','class'=>'form-control','value'=>set_value('fromdate',$profile->MobileNumber)]);?> <?php echo form_error('MobileNumber','<div style="color:red">','<div>')?> </div>
            <div class="form-group has-success"> <?php echo form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?> </div>
          </div>
          <?php echo form_close();?>
          </form>
        </div>
      </div>
    </div>
    <!-- /.panel-->
  </div>
</div>
