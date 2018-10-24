<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>.:: PIS ::.</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/assets/css/animate.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/css/bootstrap.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/bootstrap3.3.5/css/bootstrap.min.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/fontA/css/font-awesome.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/fontA/css/font-awesome.min.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/dist/css/AdminLTE.css"><link>
        <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/plantView/dist/css/AdminLTE.min.css"><link>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body {
                color: #888;
                line-height: 30px;
                text-align: center;
                background-color: ghostwhite;
                background-image: url(../PlantSystem/bootstrap/plantView/assets/img/full-pattern.png);
                background-repeat: repeat;
                background-size: 25%;
            }
            div {
                -webkit-animation-delay: 0.5s;
                animation-delay: 0.5s;
                -webkit-animation-duration: 2s;
                animation-duration: 2s;
            }
            .my_shadow {
                -webkit-text-shadow: white 0.1em 0.1em 0.2em;
                -moz-text-shadow: white 0.1em 0.1em 0.2em;
                text-shadow: white 0.1em 0.1em 0.2em;
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
        </style>
    </head>
    <body>
        <div class="container">
            <div class="container animated fadeInUp" id="home" style="text-align: center;">
                <img src="<?php echo base_url(); ?>media/nuclear-plant.png" alt="logo_pis" width="128px" style="padding-top: 10px">
                <div style="padding-bottom: 20px;">
                    <h1 class="my_shadow" id="homeHeading" style="color: black;">Plant Information System</h1>
                    <p class="my_shadow">Give any information about Plant in Semen Indonesia</p>
                    <a href="ldap_access/login" class="btn btn-success btn-xl">Login to your account</a>
                </div>
            </div>
        </div>
    </body>
    <footer>
        <div class="col-xs-12">
            <div class="col-xs-4 panel panel-default">
                <div class="panel panel-heading">
                    <b>Top 5 User</b>
                </div>
                <div class="panel panel-body" style="height: 200px;">

                </div>
            </div>
            <div class="col-xs-4 panel panel-default">
                <div class="panel panel-heading">
                    <b>Top 5 Menu</b>
                </div>
                <div class="panel panel-body" style="height: 200px;">

                </div>
            </div>
            <div class="col-xs-4 panel panel-default">
                <div class="panel panel-heading">
                    <b>Top 5 Sub Menu</b>
                </div>
                <div class="panel panel-body" style="height: 200px;">

                </div>
            </div>
        </div>
    </footer>
</html>