<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo strtoupper(PROJECT_NAME); ?></title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url("assets/layout/plugins/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url("assets/layout/plugins/node-waves/waves.css"); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url("assets/layout/plugins/animate-css/animate.css"); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url("assets/layout/css/style.css"); ?>" rel="stylesheet">

    <style type="text/css">
             
            /* body{
                background: linear-gradient(to right,#607d8b, #7ea7bb, #607d8b);
             }*/

             
             .card{
                width: 96%;
                margin: auto;
                box-shadow: 0px 2.5px 30px black;
             }
             .logo{
/*                text-shadow: 0px 2.5px 30px black;*/
                text-transform: uppercase;
                letter-spacing: 4px;
                background-color: red;
             }
             .login-page .login-box .logo small {
                margin-top: 10px;
                letter-spacing: 1px;
                background-repeat: no-repeat;                
             }

            .login-page{
                background: url("<?php echo base_url("assets/background.png"); ?>");
                  height: 100vh;
                  background-size: 100% 900px;
                background-size: cover;
                background-repeat: no-repeat; 
            }
            @media (max-width: 767px) {
                .login-page {
                    background: url("<?php echo base_url('assets/background.png'); ?>") no-repeat center center;
                    background-size: cover;
                    /* Ensure it covers the full viewport height in mobile view as well */
                    height: 100vh; 
                }
            }
            .msg{
                background: pink;
            }
           /* @media (max-width: 600px) {
                .login-page {
                    background: url("<?php echo base_url('assets/background_mobile3.jpg'); ?>");
                      height: 100%;
/*                    background-size: cover;*/
                }

                /*.title {
                    font-size: 2.5em;
                }*/
            }*/

             
    </style>
</head>
<body class="login-page" >

    <div class="login-box">
        
        <div class="card">
            <div class="logo">
            <a href="javascript:void(0);"><b><?php echo strtoupper(LOGO); ?></title></b></a>
            <small><b><?php echo strtoupper(PROJECT_NAME); ?></b></small>
        </div>
            <div class="body">
                <form  action="<?php echo base_url("Login/auth"); ?>" method="POST" autocomplete="off" target="_self">
                    
                    
                    <div class="msg"><span style='font-size:30px;'>&#127829;</span>Happy To See You<span style='font-size:30px;'>&#127828;</span></div>
    
                    <h6 style="color: red;text-align: center;">
                        <noscript>
                             Please Enable JavaScript.
                             <a href="https://www.enable-javascript.com/" target="_blank">Click Here</a>
                        </noscript>
                        <?php if($authFail = $this->session->flashdata('authFail')) echo $authFail; ?>
                    </h6>


                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control" name="username" placeholder="Mobile" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password"  class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-indigo">
                           <label for="rememberme">Remember Me</label>
                            <!-- <a href="">Download Android App</a> -->
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-indigo waves-effect" type="submit">Login</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url('/Signup') ;?>">Create Account</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot_password.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery/jquery.min.js"); ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url("assets/layout/plugins/bootstrap/js/bootstrap.js"); ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/node-waves/waves.js"); ?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url("assets/layout/plugins/jquery-validation/jquery.validate.js"); ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url("assets/layout/js/admin.js"); ?>"></script>
    <script src="<?php echo base_url("assets/layout/js/pages/examples/sign-in.js"); ?>"></script>
</body>

</html>