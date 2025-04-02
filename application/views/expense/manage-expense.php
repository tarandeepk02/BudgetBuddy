<div class="col-sm-9 col-lg-10 p-3">
  <div class="row">
    <div class="col-12">
      <h1 class="page-header">Expenses</h1>
    </div>
  </div>
  <!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <!--success message -->
          <?php if($this->session->flashdata('success')){?>
          <p style="color:red">
            <?php  echo $this->session->flashdata('success');?>
          </p>
          <?php } ?>
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>Expense Item</th>
                    <th>Expense Cost</th>
                    <th>Expense Date</th>
                    <th>Posting Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
if(count($expensedetails)):
foreach($expensedetails as $k=>$row):
?>
                <tbody>
                  <tr>
                    <td><?php echo $k+1;?></td>
                    <td><?php  echo $row->ExpenseItem;?></td>
                    <td><?php  echo $row->ExpenseCost;?></td>
                    <td><?php  echo $row->ExpenseDate;?></td>
                    <td><?php  echo $row->NoteDate?></td>
                    <td><?php echo anchor("expense/delete/{$row->ID}",'<i class="fa fa-trash-o"></i> Delete', ['class' => 'btn btn-danger']); ?> </td>
                  </tr>
                  <?php 
endforeach;
else:
?>
                  <tr>
                    <td colspan="6" style="color:red; text-align:center">No Record found</td>
                  </tr>
                  <?php endif;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.panel-->
    </div>
  </div>
  <!-- /.row -->
</div>
