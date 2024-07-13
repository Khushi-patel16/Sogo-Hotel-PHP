
<?php
    include_once("../Admin/RecpAuth.php");

    include_once("../common/connection.php");
    
    $usquery = "SELECT * FROM registration";
$usresult = mysqli_query($connection,$usquery);
$numrow1 = $usresult->num_rows;

$bkquery = "SELECT * FROM bookingmaster";
$bkresult = mysqli_query($connection,$bkquery);
$numrow2 = $bkresult->num_rows;

$inquery = "SELECT * FROM contactmaster";
$inresult = mysqli_query($connection,$inquery);
$numrow3 = $inresult->num_rows;

$rmquery = "SELECT * FROM roomtypemaster";
$rmresult = mysqli_query($connection,$rmquery);
$numrow4 = $rmresult->num_rows;



    include_once("../Admin/layout/header.php"); ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Users</p>
                <h4 class="mb-0"><?php echo $numrow1;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!--<p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>-->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Bookings</p>
                <h4 class="mb-0"><?php echo $numrow2;?></</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <!--<p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>-->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Inquiries</p>
                <h4 class="mb-0"><?php echo $numrow3;?></</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <!--<p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>-->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Room's Type</p>
                <h4 class="mb-0"><?php echo $numrow4;?></</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <!--<p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>-->
            </div>
          </div>
        </div>
      </div>
      
    
          
</div>
      <?php include_once("../Admin/layout/footer.php"); ?>