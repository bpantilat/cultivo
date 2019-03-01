<?php     session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['email']) || !isset($_SESSION['first_name']) || !isset($_SESSION['last_name'])) 
{
 header("Location: index.php?err=login_fail");
}
else
{
    $admin_id=$_SESSION['id'];
    $admin_email=$_SESSION['email'];
    $admin_fname=$_SESSION['first_name'];
    $admin_lname=$_SESSION['last_name'];
    $admin_image=$_SESSION['image'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cultivo - Admin Panel 2019</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  
  <script src="js/common.js"></script>
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a> -->
        <a class="navbar-brand brand-logo" href="index.html"><img src="images/dark_logo.png" alt="" class="logo-img"></a>
        <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link" href="logout.php">
              Logout
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="images/faces/face21.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $admin_fname .' '.$admin_lname; ?></span>
               
              </div>
              <i class="mdi mdi-bookmark-check text-purple nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add-blog.php">
              <span class="menu-title">Add Blog</span>
              <i class="mdi mdi-pencil-box-outline menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view-blog.php">
              <span class="menu-title">View Blog</span>
              <i class="mdi mdi-eye menu-icon"></i>
            </a>
          <li class="nav-item">
            <a class="nav-link" href="add-portfolio.php">
              <span class="menu-title">Add Portfolio</span>
              <i class="mdi mdi-pencil-box-outline menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view-portfolio.php">
              <span class="menu-title">View Portfolio</span>
              <i class="mdi mdi-eye menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <span class="menu-title">Logout</span>
              <i class="mdi mdi-lock menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>

      