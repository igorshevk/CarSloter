<header class="main-header">
    <!-- Logo -->
    <a href="myaccount.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?=SITE_NAME;?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
	  <?php
	  $h_admsession_id=$_SESSION['ADM_ID'];
      $h_stmt=$conn->prepare("select * from tbl_admin where adm_id='$h_admsession_id'");
      $h_stmt->execute();
      $h_row=$h_stmt->fetch(PDO::FETCH_OBJ);
	  ?>
        <ul class="nav navbar-nav">
		  <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php if($h_row->adm_image !="") { ?>
              <img src="uploaded_file/profile/<?=$h_row->adm_image;?>" class="user-image rounded" alt="User Image">
			  <?php } else { ?>
			  <img class="user-image rounded" src="images/user.png" alt="User profile picture">
              <?php } ?>			
			</a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
			  	<?php if($h_row->adm_image !="") { ?>
                <img src="uploaded_file/profile/<?=$h_row->adm_image;?>" class="rounded float-left" alt="User Image">
                  <?php } else { ?>
			  <img class="rounded float-left" src="images/user.png" alt="User profile picture">
              <?php } ?>	
                <p>
                  <?=$h_row->adm_name;?>
				  <?php $adm_type=$h_row->adm_type; ?>
                  <small><?php if($adm_type=='1') {echo 'Superadmin';} else {echo 'User';} ?> </small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-block btn-primary">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-block btn-danger">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>