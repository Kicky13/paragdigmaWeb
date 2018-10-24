<!DOCTYPE HTML>
<html>
    <head>
        <title>.:: PIS Camera Stream ::.</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/css/bootstrap.min.css">
        <script src="<?php echo base_url() ?>bootstrap/plantView/assets/js/jquery-1.12.4.js"></script>
        <script src="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="col-sm-12 col-xs-12  " >
            <div class="small-box " style="background-image: url(<?php echo base_url(); ?>media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
                <div class="row">
                    <div class="col-sm-1 col-xs-12" style="text-align: center;"><img src="<?php echo base_url(); ?>media/icon/camera.png" class="img-logos" width="38px"></div>
                    <div class="col-sm-11 col-xs-12  " >
                        <div class="col-xs-8 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI;">LIVE STREAM CAMERA</div>
                        <div class="col-xs-4 tittle-logos" style="font-size: 23px; font-weight: bold; font-family: Segoe UI; text-align: right;"><a id="login_sg" class="blink_me" href="<?php echo base_url(); ?>ldap_access/login">LOGIN</a></div>
                    </div>
                </div>
            </div>		
        </div>
        <video align="center" width="320" height="240" autoplay>
            <source src="<?php echo base_url() ?>media/video/video.mp4" type="video/mp4">
        </video>
        <video align="center" width="320" height="240" autoplay>
            <source src="<?php echo base_url() ?>media/video/video.mp4" type="video/mp4">
        </video>
        <video align="center" width="320" height="240" autoplay>
            <source src="<?php echo base_url() ?>media/video/video.mp4" type="video/mp4">
        </video>
        <video align="center" width="320" height="240" autoplay>
            <source src="<?php echo base_url() ?>media/video/video.mp4" type="video/mp4">
        </video>
    </body>
</html>