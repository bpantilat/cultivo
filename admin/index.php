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
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="images/dark_logo.png">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST" id="login-form" action="login.php">
                <div id="response-msg"></div>
                
                  <?php
                  if(isset($_GET['err']))
                  {
                      $msg=$_GET['err'];
                      if($msg=='invalid_email')
                      {
                        ?>
                        <div class="error-text">Invalid Email.</div>
                      <?php
                      }
                      if($msg=='login_fail')
                      {
                        ?>
                        <div class="error-text">Invalid Credentails.</div>
                      <?php }
                    }
                  ?>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username">
                </div>
                <input type="hidden" name="action" id="action" value="login">
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="button" class="btn btn-block btn-purple btn-rounded btn-lg font-weight-medium auth-form-btn login" >SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                 <!--  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div> -->
                  <a href="#" class="auth-link text-black" data-toggle="modal" data-target="#forgetModal">Forgot password?</a>
                </div>
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <div class="modal fade" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog edit_dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="response-msg1"></div>
            <div class="row">
              <div class="col-md-8">
              <form class="forms-sample">
                
                <div class="form-group">
                  <label for="email">email</label>
                  <input type="email" class="form-control" id="email1" required="">
                </div>
                <div class="text-left">
                  <button type="button" id="forget_password" class="btn btn-purple btn-rounded mr-2">Submit</button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>


  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
  <script src="js/login.js"></script>
  <script src="js/common.js"></script>
  <!-- endinject -->
</body>
</html>
