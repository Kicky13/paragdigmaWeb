<html>
    <head>
        <title>Login</title>
        <base href="<?php echo base_url(); ?>" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/plantView/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/plantView/fontA/css/font-awesome.css" rel="stylesheet">
        <link href="bootstrap/plantView/bootstrap3.3.5/css/simple-sidebar.css" rel="stylesheet">

       <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap/plantView/assets/css/form-elements.css">
        <link rel="stylesheet" href="bootstrap/plantView/assets/css/style.css">

        <script src="bootstrap/plantView/bootstrap3.3.5/js/jquery.js"></script>

        <script src="bootstrap/plantView/assets/js/jquery-1.11.1.min.js"></script>
        <script src="bootstrap/plantView/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/plantView/assets/js/jquery.backstretch.min.js"></script>
        <script src="bootstrap/plantView/assets/js/scripts.js"></script>

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="bootstrap/plantView/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="bootstrap/plantView/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="bootstrap/plantView/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="bootstrap/plantView/assets/ico/apple-touch-icon-57-precomposed.png">

        <style>
            .custom_head {
                padding-top: 10px;
                padding-bottom: 10px;
            }
            .img-shadow {
                border-radius: 200px 200px 200px 200px;
                -moz-border-radius: 200px 200px 200px 200px;
                -webkit-border-radius: 200px 200px 200px 200px;
                border: 0px solid #000000;
            }
            .blink_me {
                animation: blinker 1s linear infinite;
            }
            @keyframes blinker {  
                50% { opacity: 0; }
            }
            footer {
                position: absolute;
                left: 0;
                bottom: 0;
                /*height: 100px;*/
                width: 100%;
                overflow:hidden;
            }
            .txt {
            	font-family: 'Montserrat', sans-serif;
            }
            
        </style>
    </head>
    <body>
        <div class="top-content">

            <div class="inner-bg custom_head"> <!-- headerpadding -->
                <div class="container" style="margin-top: 100px;position: relative;" align="center">
                    <!-- <div class="row">                        
                        <div class="col-sm-8 col-sm-offset-2 text" style="margin-top: 50px;">
                            <a href="ldap_access/plg_all"><img src="<?php echo base_url(); ?>/bootstrap/plantView/images/logosmignew.png" alt="logo_smig" width="80px" ></a>
                            <div style="margin-top: 10px;">
                                <a href="ldap_access/plg_sgr"><img src="<?php echo base_url(); ?>media/icKota1.png" alt="logo_sg" width="64px" ></a>&nbsp;&nbsp;
                                <a href="ldap_access/plg_sp"><img src="<?php echo base_url(); ?>media/icKota2.png" alt="logo_sp" width="60px" ></a>&nbsp;&nbsp;
                                <a href="ldap_access/plg_st"><img src="<?php echo base_url(); ?>media/icKota3.png" alt="logo_st" width="64px" ></a>&nbsp;&nbsp;
                                <a href="ldap_access/plg_tlcc"><img src="<?php echo base_url(); ?>media/icKota4.png" alt="logo_tlcc" width="64px" ></a>
                            </div>
                            <h2>Board of Directors Dashboard</h2>
                        </div>
                    </div> -->
                    <div class="row" style="position: relative;">
                    	<div class="col-sm-1"></div>
                    	<div class="col-sm-10" style="padding: 0" align="center">
                    		<div class="col-sm-8 form-box login-pic" align="left" style="padding:0; background: #fff;height: 500px">
                    			<div class="logosi" style="margin-top: 32px;" align="center">
                    				<img src="<?php echo base_url(); ?>/bootstrap/plantView/images/logosmignew.png" alt="logo_smig" width="80px">
                    			</div>
                    			<div class="logoall" style="margin-top: 20px;" align="center">
	                                <img src="<?php echo base_url(); ?>media/icKota1.png" alt="logo_sg" width="40px" >&nbsp;&nbsp;
	                                <img src="<?php echo base_url(); ?>media/icKota2.png" alt="logo_sp" width="36px" >&nbsp;&nbsp;
	                                <img src="<?php echo base_url(); ?>media/icKota3.png" alt="logo_st" width="40px" >&nbsp;&nbsp;
	                                <img src="<?php echo base_url(); ?>media/icKota4.png" alt="logo_tlcc" width="36px" >
	                            </div>
	                            <div class="txt" align="center" style="font-weight: 500;margin-top: 6px;color: #464646;font-size: 20px"><span>Board of Directors Dashboard</span></div>
	                            <div class="image_comp" style="margin-top: 32px;" align="center">
                    				<img src="<?php echo base_url(); ?>media/factory.png" alt="logo_sg" width="200px" >
                    			</div>
	                            <div class="txt txcopy" align="center" style="font-weight: 200;position: absolute;color: #888;bottom: 30px; width: 100%; font-size: 12px"><span>Copyright 2018 All rights reserved. PT Semen Indonesia.</span></div>

	                        </div>
                    		<div class="col-sm-4 form-box login-form " align="left" style="height: 500px; background: #008840">
	                            <div class="form-top txt" style="background: #008840">
	                                
	                                    <h3 class="logtitle" style="font-weight: 500; color: #fff;margin-top: 60px;font-size: 14px">Login to your account</h3>
	                                
	                            </div>
	                            <div class="form-bottom" style="padding-bottom:10px;background: #008840">                    
	                                <form id="login" method="post" action="" class="login-form">
	                                    <div class="form-group" style="margin-bottom: 24px">
	                                        <label class="sr-only" for="form-username">Username</label>
	                                        <input type="text" name="username" placeholder="Username" class="form-username form-control" id="form-username" style="color: #464646; background: #fff;border: 3px solid #fff">
	                                    </div>
	                                    <div class="form-group">
	                                        <label class="sr-only" for="form-password">Password</label>
	                                        <input type="password" name="password" placeholder="Password" required="true" class="form-password form-control" id="form-password" style="color: #464646; background: #fff;border: 3px solid #fff">
	                                    </div>
	                                    <button type="submit" class="btn btn-primary btn-lg btn-block txt btlogin" style="margin-top:130px;background: #cdead5;color: #008840; font-weight: 600;font-family: 'Montserrat', sans-serif;">
	                                        <span class="loading_x" style="display:none;" ><i  class="fa fa-cog fa-spin fa-1x" ></i></span> 
	                                        LOGIN
	                                        <span class="loading_x" style="display:none;" ><i  class="fa fa-cog fa-spin fa-1x" ></i></span>
	                                    </button>   
	                                </form>
	                            </div>
	                        </div>
                    	</div>
                    	<div class="col-sm-1"></div>
                        <!-- <div class="col-sm-6 col-sm-offset-3 form-box" style="padding:0;">
                            <div class="form-top">
                                <div align="center">
                                    <h3>Login to your Account</h3>
                                </div>
                            </div>
                            <div class="form-bottom" style="padding-bottom:10px;">                    
                                <form id="login" method="post" action="" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="User Name" class="form-username form-control" id="form-username" style="text-transform: lowercase;">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password" required="true" class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        <span class="loading_x" style="display:none;" ><i  class="fa fa-cog fa-spin fa-1x" ></i></span> 
                                        Login
                                        <span class="loading_x" style="display:none;" ><i  class="fa fa-cog fa-spin fa-1x" ></i></span>
                                    </button>   
                                </form>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <p class="copyright">Copyright 2018 All rights reserved. PT Semen Indonesia.</p>
                        </div>
                    </div>  --> 
                </div>
            </div>
        </div>
        <?php
        if (!empty($error)) {
            echo $error;
        }
        ?>  
        <div id="GetPeringatan"></div>
        <script>
            $(function () {
                $('form#login').submit(function () {
                    $('.loading_x').show();
                });
            });
            function direct() {
                window.location.assign("<?php echo base_url(); ?>");
            }
        </script>
    </body>
    <!-- <footer style="font-size:12px;padding-bottom:10px;">
       Copyright 2018 All rights reserved. PT Semen Indonesia.
    </footer> -->
</html>