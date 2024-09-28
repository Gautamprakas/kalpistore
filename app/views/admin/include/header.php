 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes" name="viewport">
    <title><?php echo strtoupper(PROJECT_NAME); ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url("assets/layout/favicon.png"); ?>" type="image/x-icon">

   <?php $this->load->view($headerCss); ?>

   <style>
   	.myClass{
   		background: #254756;
   		color: white;
   	}
   	.dataTables_wrapper .dt-buttons a.dt-button{
       background: #254756;
   		color: white;
   	}
   	.pagination li.active a{
   		background: #254756;
   		color: white;
   	}

    .bootstrap-select .bs-searchbox .form-control, .bootstrap-select .bs-actionsbox .form-control, .bootstrap-select .bs-donebutton .form-control{
        margin-left: unset;
    }

    

    .blink_me{
        animation: blinkingBackground 1s infinite;
    }
    @keyframes blinkingBackground{
        50%     { background-color:teal;}
    }
    

    /*#mycardTable th,td{
                            border: 2px solid #607d8b;
                            padding: 1px;
    }*/

    #mycardTable tr:nth-child(odd) {
        border-top: 2px solid #ccc;
    }
    [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
    position: absolute;
    left: auto; !important;
    opacity: 0;
    }
}
</style>
</head>

<body class="<?php echo THEME_BLUE_GREY; ?> ls-closed">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer <?php echo PL_BLUE_GREY; ?>">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
             <noscript>
                 Please Enable JavaScript.
                 <a href="https://www.enable-javascript.com/" target="_blank">Click Here</a> <br> 
                 <a href="<?php echo base_url('Login'); ?>">Go Back Login Page</a>      
            </noscript>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper2">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer <?php echo PL_BLUE_GREY; ?>">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...!</p>
        </div>
    </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" style="" href="<?php echo base_url("railway/dashboard"); ?>">K
                    <i class="material-icons" style="font-size: 30px;margin-top: 0px">local_grocery_store</i>S
                </a>
            </div>
            <div style="float:right;color: white; display: none;">
                Public IP : <span id="public_ip"></span>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style="">
                <div class="image">
                    <img src="<?php echo base_url("assets/layout/images/user.png");?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <?php echo ucwords($this->session->userdata("name"))." (".
                            ucwords($this->session->userdata("id")).")"; ?>
                            

                    </div>

                    <div class="email"><?php echo $this->session->userdata("email"); ?>
                    </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url('Login/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->