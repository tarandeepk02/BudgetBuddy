<?php
error_reporting(0);
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-12">
      <h1 class="page-header">Monthly Expense Report</h1>
    </div>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="col-md-12"> <?php echo form_open('expense/monthwiserport',['name'=>'expensedqtewiserportds'])?>
            <div class="row">
              <div class="col-3 form-group mb-3">
                <label>From Date</label>
                <?php echo form_input(['name'=>'fromdate','id'=>'fromdate','class'=>'form-control','data-date-format'=>'yyyy-mm-dd','value'=>set_value('fromdate'),'autocomplete'=>'off']);?> <?php echo form_error('fromdate','<div style="color:red">','<div>')?> </div>
              <div class="col-3 form-group mb-3">
                <label>To Date</label>
                <?php echo form_input(['name'=>'todate','id'=>'todate','class'=>'form-control','data-date-format'=>'yyyy-mm-dd','value'=>set_value('todate'),'autocomplete'=>'off']);?> <?php echo form_error('todate','<div style="color:red">','<div>')?> </div>
              <div class="col-3 form-group has-success"> <?php echo form_submit(['name'=>'submit','value'=>'submit','class'=>'btn btn-primary mt-4']);?> </div>
            </div>
          </div>
          <?php echo form_close();?> </div>
      </div>
    </div>
    <!-- /.panel-->
  </div>
  <?php
  if(!empty($this->input->post('fromdate')) && !empty($this->input->post('todate')))
  {
  ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <h5 align="center" style="color:blue">Monthwise Expense Report from <?php echo $fromdate;?> to <?php echo $todate;?></h5>
        <div class="panel-body">
          <div class="col-md-12">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                <tr>
                  <th>S.NO</th>
                  <th>Month-Year</th>
                  <th>Expense Amount</th>
                </tr>
                </tr>
                
              </thead>
              </thead>
              
              <?php
if(count($reportdetails)):
$cnt=1;
foreach($reportdetails as $row)	:

?>
              <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row->m."-".$row->y;?></td>
                <td><?php  echo $ttlsl=$row->ExpenseCost;?></td>
              </tr>
              <?php
                $totalsexp+=$ttlsl; 
$cnt=$cnt+1;
endforeach;?>
              <tr>
                <th colspan="2" style="text-align:center">Grand Total</th>
                <td><?php echo $totalsexp;?></td>
              </tr>
              <?php else :?>
              <tr>
                <th colspan="3" style="text-align:center; color:red">No Record Found</th>
              </tr>
              <?php endif;?>
            </table>
          </div>
        </div>
      </div>
      <!-- /.panel-->
    </div>
  </div>
  <?php
		}
		?>
</div>
