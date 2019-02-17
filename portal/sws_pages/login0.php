<?php
// Include config file
require_once '../config.php';
$link=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Define variables and initialize with empty values
$user = $pass = $type = "";
$user_err = $pass_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $user = trim($_POST["user"]);
  $pass = trim($_POST["pass"]);
  // Validate credentials
  if(empty($user_err) && empty($pass_err)){
      // Prepare a select statement
      $sql = "SELECT USER_NAME, PWD, USER_TYPE FROM ATT_SEC_USER WHERE USER_NAME = ?";

      if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_user);

          // Set parameters
          $param_user = $user;

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Store result
              mysqli_stmt_store_result($stmt);

              // Check if username exists, if yes then verify password
              if(mysqli_stmt_num_rows($stmt) == 1){
                  // Bind result variables
                  mysqli_stmt_bind_result($stmt, $user, $hashed_password, $type);
                  if(mysqli_stmt_fetch($stmt)){
                      if(password_verify($pass, $hashed_password)){
                          /* Password is correct, so start a new session and
                          save the username to the session */
                          session_start();
                          $_SESSION['user'] = $user;
                          if($type==1)
                          {
                            header("location: ./index.php");
                          }
                          else
                          {
                            header("location: ../sws_student/view_exercise.php");
                          }

                      } else{
                          // Display an error message if password is not valid
                          $pass_err = 'The password you entered was not valid.';

                      }
                  }
              } else{
                $user_err = 'No account found with that username.';
                echo "<script type='text/javascript'>alert('$user_err');</script>";
                //echo "<script>document.getElementById('err_msg').innerHTML = ".$user_err.";</script> ";
              }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
      }

      // Close statement
      mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SWSSTUDIO | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color:#E5F67B;">
<div class="login-box">
  <div class="login-logo">
    <a href="./login.html"><b>SWS</b>Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user" placeholder="USER ID">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button><br/>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p id="err_msg">----</p>
      <a href="#" class="btn btn-block btn-primary big-btn"><i class="fa fa-android"></i>&emsp;Available on Android</a>
      <a href="#" class="btn btn-block btn-success big-btn android-btn"><i class="fa fa-apple"></i>&emsp;Comming Soon</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>

</html>
