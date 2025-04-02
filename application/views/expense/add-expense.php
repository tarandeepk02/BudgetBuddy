<div class="col-sm-9 col-lg-10 p-3">
  <div class="row">
    <div class="col-12">
      <h1 class="page-header">Expenses</h1>
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
          <div class="col-md-12"> <?php echo form_open('expense/add',['name'=>'add_expense']);?>
            <div class="form-group mb-3">
              <label>Date of Expense</label>
              <?php echo form_input(['name'=>'expensedate','id'=>'expensedate','class'=>'form-control','autocomplete'=>'off','data-date-format'=>'yyyy-mm-dd','value'=>set_value('expensedate')]);?> <?php echo form_error('expensedate','<div style="color:red">','<div>');?> </div>
            <div class="form-group mb-3">
              <label style="color:#000">Item</label>
              <?php echo form_input(['name'=>'item','id'=>'item','class'=>'form-control','value'=>set_value('item'),'autocomplete'=>'off'])?> <?php echo form_error('item','<div style="color:red">','<div>')?> </div>
            <div class="form-group mb-3">
              <label style="color:#000">Cost of Item</label>
              <?php echo form_input(['name'=>'costitem','id'=>'costitem','class'=>'form-control','autocomplete'=>'off','value'=>set_value('costitem')])?> <?php echo form_error('costitem','<div style="color:red">','<div>')?> </div>
            <div class="form-group has-success"> <?php echo form_submit(['name'=>'submit','id'=>'submit','class'=>'btn btn-primary','value'=>'Add'])?> </div>
          </div>
          <?php echo form_close();?> </div>
      </div>
    </div>
    <!-- /.panel-->
  </div>
</div>
