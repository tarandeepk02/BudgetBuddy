<div class="col-sm-9 col-lg-10 p-3 ">
  <div class="row">
    <div class="col-12">
      <h1 class="page-header">Dashboard</h1>
    </div>
  </div>
  <!-- /.row -->
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <!-- Today's Expense Card -->
    <div class="col">
      <div class="card">
        <div class="card-body text-center">
          <h6 class="card-title">Today's Expense</h6>
          <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $texp; ?>"> <span class="percent"><?php echo ($texp == "") ? "0" : $texp; ?></span> </div>
        </div>
      </div>
    </div>
    <!-- Yesterday's Expense Card -->
    <div class="col">
      <div class="card">
        <div class="card-body text-center">
          <h6 class="card-title">Yesterday's Expense</h6>
          <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $yesterdayexpense; ?>"> <span class="percent"><?php echo ($yesterdayexpense == "") ? "0" : $yesterdayexpense; ?></span> </div>
        </div>
      </div>
    </div>
    <!-- Last 7 Days' Expense Card -->
    <div class="col">
      <div class="card">
        <div class="card-body text-center">
          <h6 class="card-title">Last 7 Days' Expense</h6>
          <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $last7daysexpenses; ?>"> <span class="percent"><?php echo ($last7daysexpenses == "") ? "0" : $last7daysexpenses; ?></span> </div>
        </div>
      </div>
    </div>
    <!-- Last 30 Days' Expense Card -->
    <div class="col">
      <div class="card">
        <div class="card-body text-center">
          <h6 class="card-title">Last 30 Days' Expense</h6>
          <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $last30daysexpenses; ?>"> <span class="percent"><?php echo ($last30daysexpenses == "") ? "0" : $last30daysexpenses; ?></span> </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.main -->
