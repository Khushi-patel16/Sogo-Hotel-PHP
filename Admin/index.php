<?php
require_once ".././Common/connection.php";
//session_start();
$errorMessage;
$emailMessage;
$pwdMessage;
if(isset($_POST["btnLogin"]))
{
   
   
    if($_POST["email"]=="")
    {
        $emailMessage="Email is required";
    }
    else if($_POST["password"]=="")
    {
        $pwdMessage="Password is required";
    }
    else{
        $email = $_POST["email"];
$pwd = $_POST["password"];
$query = "SELECT * FROM AdminMaster where AdmEmail='$email' and AdmPassword='$pwd'";
$result = mysqli_query($connection,$query);
    
if($result->num_rows==0)
{
    $errorMessage="Invalid Credential";
}
else
{
    while($r = mysqli_fetch_assoc($result))
    {
        if($r["AdmStatus"]==1)
        {
            //$_SESSION["AdmEmail"]=$r["AdmEmail"];
            $admEmail = $r["AdmEmail"];
            $admName=$r["AdmName"];
            setcookie("Email",$admEmail,time()+ 60*60*24,"/");
            setcookie("Name",$admName,time()+ 60*60*24,"/");
            setcookie("Role",$r["AdmRole"],time()+ 60*60*24,"/");
            setcookie("Photo",$r["AdmPhoto"],time()+ 60*60*24,"/");
            header("Location: /hotel/admin/dashboard.php");
        }
        else
        {
            $errorMessage="Your account is de-active";
        }
    }
}
    }
}
?>



<!--<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/hotel/admin/material-dashboard-master/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/hotel/admin/material-dashboard-master/assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!- Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="/hotel/admin/material-dashboard-master/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/hotel/admin/material-dashboard-master/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="/hotel/admin/material-dashboard-master/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
  
  
  
  
  
  
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('/hotel/images/login_bg.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form"  method="post" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <span class="text-danger">
<?php 
    if(isset($emailMessage))
    {
        echo $emailMessage; 
    }
    ?>
</span>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label><input name="password" type="password" class="form-control">
                    <span class="text-danger">
<?php 
    if(isset($pwdMessage))
    {
        echo $pwdMessage; 
    }
    ?>
</span>
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <p class="text-danger text-center">
    <?php 
    if(isset($errorMessage))
    {
        echo $errorMessage; 
    }
    
    ?>
</p>
                  <div class="text-center">
                    <button type="submit" name= "btnLogin"class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="/hotel/admin/material-dashboard-master/pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="/hotel/admin/material-dashboard-master/assets/js/core/popper.min.js"></script>
  <script src="/hotel/admin/material-dashboard-master/assets/js/core/bootstrap.min.js"></script>
  <script src="/hotel/admin/material-dashboard-master/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/hotel/admin/material-dashboard-master/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/hotel/admin/material-dashboard-master/assets/js/material-dashboard.min.js?v=3.1.0"></script>


  
</body>