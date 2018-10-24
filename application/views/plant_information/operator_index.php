<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $Title; ?></title>
        <link rel="icon" type="img/ico" href="media/icon/icons.png">
        <link href="bootstrap/plantView/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/plantView/fontA/css/font-awesome.css" rel="stylesheet">
        <link href="bootstrap/plantView/bootstrap3.3.5/css/simple-sidebar.css" rel="stylesheet">
        <link href="bootstrap/plantView/dropdown_new.css" rel="stylesheet">
        <script src="bootstrap/plantView/bootstrap3.3.5/js/jquery-1.11.0.js"></script>
        <script src="bootstrap/plantView/bootstrap3.3.5/js/bootstrap.js"></script>
        <link rel="stylesheet" href="bootstrap/plantView/assets/css/dash-elements.css">
        <link rel="stylesheet" href="bootstrap/plantView/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="bootstrap/plantView/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="bootstrap/plantView/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="bootstrap/plantView/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="bootstrap/plantView/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="bootstrap/plantView/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="bootstrap/plantView/plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="bootstrap/plantView/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="bootstrap/plantView/fontA/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bootstrap/plantView/ionicons/css/ionicons.min.css">

        <script>
            $(function () {<?php echo $li_active; ?>
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
                $("#btnLogOut").click(function () {
                    window.location.assign("<?php echo base_url() . "/ldap_access/logout"; ?>");
                });
            });

        </script>
        <style>
            .navbar-header2 {
                float: none;
            }
            navbar-default2 {
                background-image: url(media/head-nw.png);
                border-color: #e7e7e7;
            }
            .navbar-fixed-top2 {
                top: -10px;
                border-width: 0 0 1px;
                position: fixed;
            }
            .tittlehead{
                margin-top: 15px;
                margin-bottom: 10px;
                font-family:"Segoe UI";
            }
            .navtopdev{
                background: #fff;
                box-shadow: 0 0 5px rgba(57, 70, 78, 0.2);
            }
        </style>
    </head>
    <body style="background-color:#eee;">
        <!-- Fixed navbar -->
        <nav class="navbar navtopdev navbar-fixed-top">
            <div class="col-lg-9 navbar-header" style="float: none;">
                <a class="navbar-brand" href="javascript:void(0);" id="menu-toggle"> <img src="media/logo_header.png" alt="PT.Semen indonesia" class="img-responsive" style="margin-top: -10px"></a>
                <h3 class="tittlehead" >Plant Information System | <span style="font-size: 16px">Welcome&nbsp;</span><span style="font-size: 18px; font-style: italic"><?php $name = $this->session->userdata('name'); echo $name;?></span></h3>
            </div>
        </nav>
        <div id="wrapper" >
            <!-- Sidebar -->
            <div id="sidebar-wrapper" style="width: 180px">
                <ul id="ulmenuUtama" class="sidebar-nav">
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/plant_system/dashboard_all" id="li_dashboard"> <img src="media/icon/bar-chart.png" width="24px" style="margin-right:10px; margin-left: 10px;" >Dashboard</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>index.php/plant_system/portal_plant" id="li_overview">  <img src="media/icon/indus.png" width="24px" style="margin-right:10px; margin-left: 10px;" >Plant Overview</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>index.php/plant_system/portal_production" id="li_production">  <img src="media/icon/layers.png" width="24px" style="margin-right:10px; margin-left: 10px;" >Production</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/master_data" id="li_production">  <img src="media/icon/checklist.png" width="24px" style="margin-right:10px; margin-left: 10px;" >Master Data</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>index.php/plant_system/portal_maintenance" id="li_maintenance">  <img src="media/icon/settings.png" width="24px" style="margin-right:10px; margin-left: 10px;" >Maintenance</a>
                    </li>

                    <li>
                        <a id="btnLogOut" href="<?php echo base_url() . "ldap_access/logout"; ?>"><img src="media/icon/exit.png" width="24px" style="margin-right:10px; margin-left: 10px;">Log Out </a>
                    </li>
                </ul>
            </div>

            <!-- Page Content -->
            <div id="page-content-wrapper" style="padding-top: 3px; padding-left: 3px; padding-right: 3px; padding-bottom: 1px">
                <div class="container-fluid" style="padding-bottom: 1px;">
                    <div class="row">
                        <div class="col-lg-12" style="padding: 10px;">
                            <?= $contents; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>