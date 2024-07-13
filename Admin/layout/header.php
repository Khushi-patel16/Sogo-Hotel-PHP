<?php

include_once("../common/connection.php");


$usrq="SELECT * from sitesettingmaster";
$usrres=mysqli_query($connection,$usrq);
$usr=mysqli_fetch_array($usrres);

$page = "";
$p = $_SERVER['PHP_SELF'];{
if($_SERVER['PHP_SELF']=='/hotel/admin/dashboard.php')
{
  $page='Dashboard';
}

$role = $_COOKIE['Role'];

if($p =='/hotel/admin/roomtype/index.php' 
  || $p =='/hotel/admin/roomtype/create.php' 
  || $p =='/hotel/admin/roomtype/edit.php'
  || $p == '/hotel/admin/roomtype/Amenities.php')
{
  $page = "Rooms Setting";
}

if($p =='/hotel/admin/rooms_gallery/index.php' 
  || $p =='/hotel/admin/rooms_gallery/create.php' 
  || $p =='/hotel/admin/rooms_gallery/edit.php')
  {
    $page = "Rooms Gallery";
  }

  if($p =='/hotel/admin/room_amenities/index.php' 
  || $p =='/hotel/admin/room_amenities/create.php' 
  || $p =='/hotel/admin/room_amenities/edit.php')
  {
    $page = "Rooms Amenities";
  }  
  if($p =='/hotel/admin/setting.php' )
{
  $page = "Site Setting";
}  

if($p =='/hotel/admin/userdata/index.php'   )
{
  $page = "User List";
}  

if($p =='/hotel/admin/bookings/index.php' 
|| $p =='/hotel/admin/bookings/edit.php')
{
  $page = "Bookings";
}  

if($p =='/hotel/admin/categories/index.php' 
|| $p =='/hotel/admin/categories/create.php' 
|| $p =='/hotel/admin/categories/edit.php')
{
  $page = "Categories";
}  

if($p =='/hotel/admin/products/index.php' 
|| $p =='/hotel/admin/products/create.php' 
|| $p =='/hotel/admin/products/edit.php')
{
  $page = "Products";
}  

if($p =='/hotel/admin/review/index.php' 
|| $p =='/hotel/admin/review/display.php' )
{
  $page = "Reviews";
}  

if($p =='/hotel/admin/booking_report/index.php'  )
{
  $page = "Booking Report";
}  

if($p =='/hotel/admin/events/index.php'  
|| $p =='/hotel/admin/events/edit.php')
{
  $page = "Events";
}  

if($p =='/hotel/admin/contacts/index.php')
{
  $page = "Contacts";
} 

if($p =='/hotel/admin/dynamic_pages/index.php' 
|| $p =='/hotel/admin/dynamic_pages/create.php' 
|| $p =='/hotel/admin/dynamic_pages/edit.php')
{
  $page = "Dynamic Pages";
}  

if($p =='/hotel/admin/adminuser/index.php' 
|| $p =='/hotel/admin/adminuser/create.php' 
|| $p =='/hotel/admin/adminuser/edit.php')
{
  $page = "Admin User";
}  
}
?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/hotel/admin/material-dashboard-master/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/hotel/admin/material-dashboard-master/assets/img/favicon.png">
  <title>
    Admin Panel
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Sl">
  <!-- Nucleo Icons -->
  <link href="/hotel/admin/material-dashboard-master/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/hotel/admin/material-dashboard-master/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"/>
  <!-- CSS Files -->
  <link id="pagestyle" href="/hotel/admin/material-dashboard-master/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="/hotel/Admin/material-dashboard-master/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?php echo $usr["ssmTitle"];?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <?php
        if($role=="Admin" || $role == "Receptionist")
        {
          ?>
          <li class="nav-item">
  <a class="nav-link text-white <?php $page=='Dashboard'? print "bg-gradient-primary": print ""; ?> " href="/hotel/admin/dashboard.php">
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">dashboard</i>
    </div>
    <span class="nav-link-text ms-1">Dashboard</span>
  </a>
</li>
          <?php
        }
        ?>
        
        
        
        
        <?php
 if($role=="Admin")
 {
   ?>  
        
        
        
        <li class="nav-item">
          <a class="nav-link text-white <?php $page == "Site Setting" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/setting.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1"> Site Setting</span>
          </a>
        </li>
        <?php
 }
 ?>
        
        
        
        
        
        <?php
 if($role=="Admin" )
 {
   ?>
        
        <li class="nav-item">
   <a class="nav-link text-white <?php $page == "Admin User" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/adminuser">
     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
       <i class="material-icons opacity-10">dashboard</i>
     </div>
     <span class="nav-link-text ms-1"> Admin User</span>
   </a>
 </li>
 <?php
 }
 ?>


 <?php
 if($role=="Admin" )
 {
   ?>
        <li class="nav-item">
  <a class="nav-link text-white <?php $page == "Rooms Setting" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/roomtype">
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">dashboard</i>
    </div>
    <span class="nav-link-text ms-1">Rooms Setting</span>
  </a>
</li>
<?php
 }
 ?>


<?php
 if($role=="Admin")
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Rooms Gallery" ? print "bg-gradient-primary" :print ""; ?>" href="/hotel/admin/rooms_gallery">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Rooms Gallery</span>
 </a>
</li>
<?php
 }
 ?>


<?php
 if($role=="Admin" )
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Rooms Amenities" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/room_amenities">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Rooms Amenities</span>
 </a>
</li>
<?php
 }
 ?>


<?php
 if($role=="Admin")
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "User List" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/userdata">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">User List</span>
 </a>
</li>
<?php
 }
 ?>

<?php
if($role=="Admin" || $role == "Receptionist")
{
  ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Bookings" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/bookings">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Bookings</span>
 </a>
</li>

<?php
 }
 ?>



<?php
 if($role=="Admin")
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Categories" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/categories">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Categories</span>
 </a>
</li>
<?php
 }
 ?>

<?php
 if($role=="Admin" )
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Products" ? print "bg-gradient-primary" :print ""; ?>" href="/hotel/admin/products">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Products</span>
 </a>
</li>
<?php
 }
 ?>

<?php
 if($role=="Admin")
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Reviews" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/review">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Reviews</span>
 </a>
</li>
<?php
 }
 ?>

<?php
 if($role=="Admin" )
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Booking Report" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/booking_report">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Booking Report</span>
 </a>
</li>
<?php
 }
 ?>

<?php
 if($role=="Admin" )
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Events" ? print "bg-gradient-primary" :print ""; ?> " href="/hotel/admin/events">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Events</span>
 </a>
</li>
<?php
 }
 ?>

<?php
if($role=="Admin" || $role == "Receptionist")
{
  ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Contacts" ? print "bg-gradient-primary" :print ""; ?>" href="/hotel/admin/contacts">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Contacts</span>
 </a>
</li>
<?php
 }
 ?>


<?php
 if($role=="Admin" )
 {
   ?>
<li class="nav-item">
 <a class="nav-link text-white <?php $page == "Dynamic Pages" ? print "bg-gradient-primary" :print ""; ?>" href="/hotel/admin/dynamic_pages/create.php">
   <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
     <i class="material-icons opacity-10">dashboard</i>
   </div>
   <span class="nav-link-text ms-1">Dynamic Pages</span>
 </a>
</li>
<?php
 }
 ?>


      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-primary mt-4 w-100" href="/hotel/Admin/logout.php" type="button">Logout</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

<div style="width: 100%;text-align:right;">

        <a href="/hotel/admin/index.php" class="nav-link text-body font-weight-bold px-0">
   <i class="fa fa-user me-sm-1"></i>
   <span class="d-sm-inline d-none"><?php echo $_COOKIE["Name"]; ?></span>
 </a>
 </div>
          
        
        
        
        
          
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
