<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> </title>

	<?php 
	if(!isset($base_url) && $debug) echo 'no base url set'; 
	 ?>
    <!-- Bootstrap -->
    <link href="<?php echo $base_url; ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $base_url; ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $base_url; ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Animate.css -->
    <link href="<?php echo $base_url; ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo $base_url; ?>assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
                    	<form action="<?php if(isset($form_action)) echo $form_action; ?>" method="post" >
                              <div class="form-group">
                                <input type="email" class="form-control" name="email" required id="exampleInputEmail1" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-control" name="password" required id="exampleInputPassword1" placeholder="Password">
                              </div>
                              
                              <div class="checkbox">
                                <!--<label>
                                  <input type="checkbox"> Remember me
                                </label>-->
                                <label style="float:right;color:#0abcfa;">
                                  Forgot password?
                                </label>
                              </div>
                              <button type="submit" class="btn btn-default">Login</button>
                              <p class="signup">Sign up to your account</p>
                        </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1></h1>
                  <p>©2016 All Rights Reserved.  Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
