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
                text-shadow: 0px 2.5px 30px black;
                text-transform: uppercase;
                letter-spacing: 1px;
                background-color: indigo;
             }
             .login-page .login-box .logo small {
                margin-top: 10px;
                letter-spacing: 1px;
                background-repeat: no-repeat;                
             }

            .login-page{
                background: url("<?php echo base_url("assets/background5.jpg"); ?>");
                  height: 100%;
                  background-size: 100% 900px;
                background-size: cover;
                background-repeat: no-repeat; 
            }
            @media (max-width: 767px) {
    .login-page {
        background: url("<?php echo base_url('assets/background_mobile.jpg'); ?>") no-repeat center center;
        background-size: cover;
        /* Ensure it covers the full viewport height in mobile view as well */
        height: 100vh; 
    }
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
<body class="signup-page ls-closed">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">KALPI <b>STORE</b></a>
            <small>Multi Purpose App</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" novalidate="novalidate">
                    <div class="msg">Register a new customer</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line error">
                            <input type="text" class="form-control" name="namesurname" placeholder="Name Surname" required="" autofocus="" aria-required="true" aria-invalid="true">
                        </div>
                    <label id="namesurname-error" class="error" for="namesurname">This field is required.</label></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line error">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required="" aria-required="true">
                        </div>
                    <label id="email-error" class="error" for="email">This field is required.</label></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line error">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required="" aria-required="true">
                        </div>
                    <label id="password-error" class="error" for="password">This field is required.</label></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line error">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required="" aria-required="true">
                        </div>
                    <label id="confirm-error" class="error" for="confirm">This field is required.</label></div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink" aria-required="true">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="sign-in.html">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/examples/sign-up.js"></script>


</body>

</html>