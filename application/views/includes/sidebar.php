<div id="navbarNav" class="col-sm-3 col-lg-2 bg-light border p-3 sidebar">
  <div class="profile-sidebar">
    <div class="profile-userpic"> <img src="https://placehold.co/100x100" class="img-fluid" alt=""> </div>
    <div class="profile-usertitle">
      <div class="profile-usertitle-name"><?php echo $this->session->userdata('fname'); ?></div>
      <div class="profile-usertitle-status">Online</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <ul class="nav flex-column">
    <li class="nav-item"> <a class="nav-link active" href="<?php echo site_url('account/dashboard');?>"> <i class="fa fa-dashboard"></i> Dashboard </a> </li>
    <li class="nav-item"> <a class="nav-link collapsed" data-bs-toggle="collapse" href="#sub-item-1"> <i class="fa fa-money"></i> Expenses <i class="fa fa-plus float-end"></i> </a>
      <ul class="collapse" id="sub-item-1">
        <li><a class="nav-link" href="<?php echo site_url('expense/add');?>">Add Expenses </a></li>
        <li><a class="nav-link" href="<?php echo site_url('expense/manage');?>">View Expenses </a></li>
      </ul>
    </li>
    <li class="nav-item"> <a class="nav-link collapsed" data-bs-toggle="collapse" href="#sub-item-2"> <i class="fa fa-sitemap"></i> Reports <i class="fa fa-plus float-end"></i> </a>
      <ul class="collapse" id="sub-item-2">
        <li><a class="nav-link" href="<?php echo site_url('expense/datewiserport');?>">Daily</a></li>
        <li><a class="nav-link" href="<?php echo site_url('expense/monthwiserport');?>">Monthly</a></li>
        <li><a class="nav-link" href="<?php echo site_url('expense/yearwiserport');?>">Yearly</a></li>
      </ul>
    </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('account/profile');?>"> <i class="fa fa-user"></i> Profile </a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('account/password');?>"> <i class="fa fa-clone"></i> Password </a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('user/logout');?>"> <i class="fa fa-power-off"></i> Logout </a> </li>
  </ul>
</div>
