<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard BOD</title>
        <link rel="icon" type="img/ico" href="media/icon/icons.png">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href="bootstrap/plantView/bootstrap3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/plantView/fontA/css/font-awesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="bootstrap/plantView/bootstrap3.3.5/css/simple-sidebar.css" rel="stylesheet">
        <link href="bootstrap/plantView/dropdown_new.css" rel="stylesheet">
        <link href="bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
        <script src="bootstrap/plantView/bootstrap3.3.5/js/jquery-1.11.0.js"></script>
        <script src="bootstrap/plantView/bootstrap3.3.5/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/jquery.dataTables.min.js"></script>
        <script src="bootstrap/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-toggle.min.js"></script>
        <script>
			var base_url = "<?php echo base_url();?>";
			var current_url = "<?php echo $this->router->fetch_class();?>";
			<?php $current_url =  $this->router->fetch_class();?>
			<?php 
			$sub = $this->router->fetch_method();
			if(isset($sub) && !empty($sub)){
			$current_url .= "/".$sub;
			?>
			current_url += "<?php echo "/".$sub;?>";
			<?php }?>
			<?php 
			$sub2 = $this->uri->segment(3);
			if(isset($sub2) && !empty($sub2)){
			$current_url .= "/".$sub2;
			?>
			current_url += "<?php echo "/".$sub2;?>";
			<?php }?>
			<?php 
			$sub3 = $this->uri->segment(4);
			if(isset($sub3) && !empty($sub3)){
			$current_url .= "/".$sub3;
			?>
			current_url += "<?php echo "/".$sub3;?>";
			<?php }?>
			<?php if($this->router->fetch_class()=="sales_dashboard"){ ?>
			var url_redirect = [	
				"sales_dashboard/volume",
				"sales_dashboard/trend/volume",
				"sales_dashboard/volume_detail/7000",
				"sales_dashboard/trend/volume/7000",
				"sales_dashboard/volume_detail/3000",
				"sales_dashboard/trend/volume/3000",
				"sales_dashboard/volume_detail/4000",
				"sales_dashboard/trend/volume/4000",
				"sales_dashboard/volume_detail/6000",
				"sales_dashboard/trend/volume/6000",
				"sales_dashboard/volume_detail/5000",
				"sales_dashboard/trend/volume/5000",
				"sales_dashboard/revenue",
				"sales_dashboard/trend/revenue",
				"sales_dashboard/revenue_detail/7000",
				"sales_dashboard/trend/revenue/7000",
				"sales_dashboard/revenue_detail/3000",
				"sales_dashboard/trend/revenue/3000",
				"sales_dashboard/revenue_detail/4000",
				"sales_dashboard/trend/revenue/4000",
				"sales_dashboard/revenue_detail/6000",
				"sales_dashboard/trend/revenue/6000",
				"sales_dashboard/revenue_detail/5000",
				"sales_dashboard/trend/revenue/5000",
				"sales_dashboard/market_share",
				"sales_dashboard/market_share/7000",
				"sales_dashboard/market_share/3000",
				"sales_dashboard/market_share/4000",
				// "sales_dashboard/trend_harga",
			]; 
			var title_page = [
				"Sales Volume",
				"Sales Volume Trend SMIG ",
				"Sales Volume",
				"Sales Volume Trend | Semen Indonesia",
				"Sales Volume",
				"Sales Volume Trend | Semen Padang",
				"Sales Volume",
				"Sales Volume Trend | Semen Tonasa",
				"Sales Volume",
				"Sales Volume Trend | TLCC",
				"Sales Volume",
				"Sales Volume Trend | Semen Gresik - Rembang",
				"Sales Revenue",
				"Sales Revenue Trend SMIG",
				"Sales Revenue",
				"Sales Revenue Trend | Semen Indonesia",
				"Sales Revenue",
				"Sales Revenue Trend | Semen Padang",
				"Sales Revenue",
				"Sales Revenue Trend | Semen Tonasa",
				"Sales Revenue",
				"Sales Revenue Trend | TLCC",
				"Sales Revenue",
				"Sales Revenue Trend | Semen Gresik - Rembang",
				"Market Share SMIG",
				"Market Share | Semen Gresik",
				"Market Share | Semen Padang",
				"Market Share | Semen Tonasa",
				// "Harga Tebus",
			]; 
			<?php }elseif($this->router->fetch_class()=="finance_dashboard"){ ?>
			var url_redirect = [
				"finance_dashboard/finance",
				"finance_dashboard/finance_detail/7000",
				"finance_dashboard/finance_detail/3000",
				"finance_dashboard/finance_detail/4000",
				"finance_dashboard/finance_detail/6000",
				"finance_dashboard/finance_detail/5000",
				"finance_dashboard/income",
				"finance_dashboard/income_statement",
				"finance_dashboard/operation_expense",
				"finance_dashboard/finance_home",
				"finance_dashboard/cost_sheet",
			]; 
			var title_page = [
				"Cash & Liquidity SMIG",
				"Cash & Liquidity Semen Indonesia",
				"Cash & Liquidity Semen Padang",
				"Cash & Liquidity Semen Tonasa",
				"Cash & Liquidity TLCC",
				"Cash & Liquidity Semen Gresik - Rembang",
				"Income Statement SMIG",
				"Income Statement SMIG",
				"Income Statement SMIG",
				"HOME",
				"Cost Sheet",
			];
			<?php }elseif($this->router->fetch_class()=="material_management"){ ?>
			var url_redirect = [
				"material_management/procurement",
				"material_management/report",
			]; 
			var title_page = [
				"Procurement Tracking",
				"Monthly Report",
			];
			<?php }elseif($this->router->fetch_class()=="production"){ ?>
			var url_redirect = [
				"production/prod_overview",
				"production/prod_report",
			]; 
			var title_page = [
				"Production Overview",
				"Monthly Report",
			];
			<?php }elseif($this->router->fetch_class()=="pos_dashboard"){ ?>
			var url_redirect = [
				"pos_dashboard/index"
			]; 
			var title_page = [
				"Point Of Sales SMIG | Wilayah Jawa Timur"
			];
			<?php }elseif($this->router->fetch_class()=="treasury"){ ?>
			var url_redirect = [
				"treasury/cashposition",
				"treasury/exchangerate",
			]; 
			var title_page = [
				"Cash Position",
				"Exchange Rate",
			];
			<?php }elseif($this->router->fetch_class()=="cogs"){ ?>
			var url_redirect = [
				"cogs/trend",
				
			]; 
			var title_page = [
				"Trend COGS",
				
			];
			<?php }elseif(strtolower($this->router->fetch_class())=="crm"){ ?>
			var url_redirect = [
				"crm/index/40",
				"crm/index/50",
			]; 
			var title_page = [
				"CRM SMIG | Kemasan 40Kg",
				"CRM SMIG | Kemasan 50Kg"
			];
			<?php }elseif($this->router->fetch_class()=="stock"){ ?>
			var url_redirect = [
				"stock/index/7000/1700",
				"stock/index/7000/1600",
				"stock/index/7000/1100",
				"stock/index/7000/2700",
				"stock/index/7000/1300",
				"stock/index/7000/1400",
				"stock/index/7000/1500",
				"stock/index/7000/1200",
				"stock/index/7000/1000",
				"stock/index/3000/1600",
				"stock/index/3000/2400",
				"stock/index/3000/1100",
				"stock/index/3000/1800",
				"stock/index/3000/2200",
				"stock/index/3000/2300",
				"stock/index/3000/2100",
				"stock/index/4000/1600",
				"stock/index/4000/2600",
				"stock/index/4000/1100",
				"stock/index/4000/2200",
				"stock/index/4000/1200",
				"stock/index/4000/2100",
				"stock/index/4000/1000"
			]; 
			var title_page = [
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Indonesia",
				"Material Stock | Semen Padang",
				"Material Stock | Semen Padang",
				"Material Stock | Semen Padang",
				"Material Stock | Semen Padang",
				"Material Stock | Semen Padang",
				"Material Stock | Semen Padang",
				"Material Stock | Semen Padang",
				"Material Stock | Semen Tonasa",
				"Material Stock | Semen Tonasa",
				"Material Stock | Semen Tonasa",
				"Material Stock | Semen Tonasa",
				"Material Stock | Semen Tonasa",
				"Material Stock | Semen Tonasa",
				"Material Stock | Semen Tonasa",
			];
			<?php }else{ ?>
			var url_redirect = [
				"plant_gresik/overview",
				"plant_rembang/overview",
				"plant_padang/overview",
				"plant_tonasa/overview",
				"plant_tlcc/overview",
				"plant_gresik/stock",
				"plant_rembang/stock",
				"plant_padang/stock",
				"plant_tonasa/stock",
				"plant_tlcc/stock",
				"plant_system/dashboard_all",
				"plant_system/production",
				"plant_system/production/SPCement",
				"plant_system/production/SGRCement",
				"plant_system/production/SGCement",
				"plant_system/production/STCement",
				"plant_system/production/TLCCCement",
				"plant_system/production_clinker",
				"plant_system/production_clinker/SPCement",
				"plant_system/production_clinker/SGRCement",
				"plant_system/production_clinker/SGCement",
				"plant_system/production_clinker/STCement",
				"plant_system/production_clinker/TLCCCement",
				"plant_gresik/emission",
				"plant_rembang/emission",
				"plant_padang/emission",
				"plant_tonasa/emission",
				"plant_tlcc/emission",
				
				"plant_tonasa/power_btg",
				"plant_tonasa/load_shed",
				"plant_tonasa/pltu_mon",
				"plant_rembang/packer_plant",
				
				"plant_system/dashboard_semen",
				"plant_system/dashboard_klin",
				"plant_padang/prod_semen",
				"plant_padang/klin_semen",
				"plant_rembang/prod_semen",
				"plant_rembang/klin_semen",
				"plant_gresik/prod_semen",
				"plant_gresik/klin_semen",
				"plant_tonasa/prod_semen",
				"plant_tonasa/klin_semen",
				"plant_tlcc/prod_semen",
				"plant_tlcc/klin_semen",
				"plant_gresik/offstate",
			]; 
			var title_page = [
				"Production | Semen Indonesia",
				"Production | Semen Gresik - Rembang",
				"Production | Semen Padang",
				"Production | Semen Tonasa",
				"Production | TLCC",
				"Production | Semen Indonesia",
				"Production | Semen Gresik - Rembang",
				"Production | Semen Padang",
				"Production | Semen Tonasa",
				"Production | TLCC",
				"Production ",
				"Production ",
				"Production | Semen Padang",
				"Production | Semen Gresik - Rembang",
				"Production | Semen Indonesia",
				"Production | Semen Tonasa",
				"Production | TLCC",
				"Production ",
				"Production | Semen Padang",
				"Production | Semen Gresik - Rembang",
				"Production | Semen Indonesia",
				"Production | Semen Tonasa",
				"Production | TLCC",
				"Production | Semen Indonesia",
				"Production | Semen Gresik - Rembang",
				"Production | Semen Padang",
				"Production | Semen Tonasa",
				"Production | TLCC",
				
				"Production | Semen Tonasa",
				"Production | Semen Tonasa",
				"Production | Semen Tonasa",
				"Production Semen Gresik - Rembang",
				
				"Production | Cement",
				"Production | Clinker",
				"Production | Semen Padang",
				"Production | Semen Padang",
				"Production | Semen Gresik - Rembang",
				"Production | Semen Gresik - Rembang",
				"Production | Semen Indonesia",
				"Production | Semen Indonesia",
				"Production | Semen Tonasa",
				"Production | Semen Tonasa",
				"Production | TLCC",
				"Production | TLCC",
				"Production | Off Statement"
			];
		<?php } ?>
		</script>
        <script src="assets/js/sidenav.min.js"></script>
		<?php if($this->router->fetch_class()=="sales_dashboard" && $sub=="trend_harga"){ ?>
        <script src="assets/js/slide_trend.js"></script>
		<?php }else{?>
        <script src="assets/js/slide.js"></script>
		<?php }?>
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
		<link rel="stylesheet" href="assets/css/slide.css">
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
	<body class="add_fix" id="body">
		<button class="burger-menu burger-menu-x is-active" id="menu-toggle">
			<span>toggle menu</span>
		</button>
		<div id="backdrop"></div>
		<header id="header">
			<div class="centering add_fix">
				
				<div class="page_title">
					<h1 id="page_title"></h1>
					<!-- <div class="dateandtime">
						<div id="clock" class="clock"></div>
						<div id="date_clock" class="date_clock"></div>
					</div> -->
					<div class="logo">
						<img src="assets/images/logo.png">
					</div>
					<!-- <div class="prev">
						<span class="left"></span><span class="right"></span>
					</div>
					<div class="control pause">
						<span class="left"></span><span class="right"></span>
					</div>
					<div class="next">
						<span class="left"></span><span class="right"></span>
					</div> -->
				</div>
			</div>
			<div class="loading"></div>
		</header><!--/#header -->
		<div class="loading_overlay"><div class="loader"></div></div>
		<?php if($this->router->fetch_class()=="sales_dashboard"){ ?>
		<div id="sidenav">
			<h1>Menu</h1>
            <ul>
            	<li class="haschild">
                    <a onclick="openInNewTab('finance_dashboard/income', this)"><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('material_management/procurement', this)"><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
				</li>
				<li class="haschild">
                    <a><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
                    <ul>
                        <li <?php echo ($current_url=='sales_dashboard/volume')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('sales_dashboard/volume')">Sales Volume</a></li>
                        <!-- <li <?php echo ($current_url=='sales_dashboard/trend/volume')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('sales_dashboard/trend/volume')">Sales Volume Trend</a></li> -->
                        <li <?php echo ($current_url=='sales_dashboard/revenue')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('sales_dashboard/revenue')">Sales Revenue</a></li>
                        <!-- <li <?php echo ($current_url=='sales_dashboard/trend/revenue')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('sales_dashboard/trend/revenue')">Sales Revenue Trend</a></li> -->
                        <li <?php echo ($current_url=='sales_dashboard/market_share')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('sales_dashboard/market_share')">Market Share</a></li>
                        <li <?php echo ($current_url=='sales_dashboard/trend_harga')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('sales_dashboard/trend_harga')">Harga Tebus Distributor</a></li>
					</ul>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('plant_system/dashboard_all', this)"><i class="medium material-icons">domain</i>&nbsp;Production</a>
				</li>
                <li class="haschild">
                    <a onclick="openInNewTab('pos_dashboard/index', this)"><i class="medium material-icons">receipt</i>&nbsp;Point Of Sales</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('crm/index/40', this)"><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('treasury/cashposition', this)"><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
				</li>
				<li class="haschild">
					<a onclick="openInNewTab('cogs/trend', this)"><i class="medium material-icons">attach_money</i>&nbsp;COGS</a>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout', this)"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>

                <!-- <li class="haschild">
                    <a>Sales Volume</a>
                    <ul>
                        <li <?php echo ($current_url=='sales_dashboard/volume' || stristr($current_url,'sales_dashboard/trend/volume'))? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/volume')">SMI Group</a><a onclick="changepage('sales_dashboard/trend/volume')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/volume_detail/7000' || $current_url=='sales_dashboard/trend/volume/7000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/volume_detail/7000')">Semen Indonesia</a><a onclick="changepage('sales_dashboard/trend/volume/7000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/volume_detail/3000' || $current_url=='sales_dashboard/trend/volume/3000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/volume_detail/3000')">Semen Padang</a><a onclick="changepage('sales_dashboard/trend/volume/3000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/volume_detail/4000' || $current_url=='sales_dashboard/trend/volume/4000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/volume_detail/4000')">Semen Tonasa</a><a onclick="changepage('sales_dashboard/trend/volume/4000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/volume_detail/6000' || $current_url=='sales_dashboard/trend/volume/6000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/volume_detail/6000')">TLCC</a><a onclick="changepage('sales_dashboard/trend/volume/6000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/volume_detail/5000' || $current_url=='sales_dashboard/trend/volume/5000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/volume_detail/5000')">Semen Gresik - Rembang</a><a onclick="changepage('sales_dashboard/trend/volume/5000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
            		</ul>
            	</li>
                <li class="haschild">
                    <a>Sales Revenue</a>
                    <ul>
                        <li <?php echo ($current_url=='sales_dashboard/revenue' || $current_url=='sales_dashboard/trend/revenue')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/revenue')">SMI Group</a><a onclick="changepage('sales_dashboard/trend/revenue')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/revenue_detail/7000' || $current_url=='sales_dashboard/trend/revenue/7000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/revenue_detail/7000')">Semen Indonesia</a><a onclick="changepage('sales_dashboard/trend/revenue/7000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/revenue_detail/3000' || $current_url=='sales_dashboard/trend/revenue/3000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/revenue_detail/3000')">Semen Padang</a><a onclick="changepage('sales_dashboard/trend/revenue/3000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/revenue_detail/4000' || $current_url=='sales_dashboard/trend/revenue/4000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/revenue_detail/4000')">Semen Tonasa</a><a onclick="changepage('sales_dashboard/trend/revenue/4000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/revenue_detail/6000' || $current_url=='sales_dashboard/trend/revenue/6000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/revenue_detail/6000')">TLCC</a><a onclick="changepage('sales_dashboard/trend/revenue/6000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/revenue_detail/5000' || $current_url=='sales_dashboard/trend/revenue/5000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/revenue_detail/5000')">Semen Gresik - Rembang</a><a onclick="changepage('sales_dashboard/trend/revenue/5000')" align="right"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                        </li>
            		</ul>
            	</li>
                <li class="haschild">
                    <a>Market Share</a>
                    <ul>
                        <li <?php echo ($current_url=='sales_dashboard/market_share' || $current_url=='sales_dashboard/market_share')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/market_share')">SMI Group</a><a></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/market_share/7000' || $current_url=='sales_dashboard/market_share/7000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/market_share/7000')">Semen Indonesia</a><a onclick="changepage('sales_dashboard/market_share/7000')" align="right"><a></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/market_share/3000' || $current_url=='sales_dashboard/market_share/3000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/market_share/3000')">Semen Padang</a><a onclick="changepage('sales_dashboard/market_share/3000')" align="right"><a></a>
                        </li>
                        <li <?php echo ($current_url=='sales_dashboard/market_share/4000' || $current_url=='sales_dashboard/market_share/4000')? "class='active'" : "" ;?>><a onclick="changepage('sales_dashboard/market_share/4000')">Semen Tonasa</a><a onclick="changepage('sales_dashboard/market_share/4000')" align="right"><a></a>
                        </li>
            		</ul>
            	</li>
                <li class="haschild">
                    <a onclick="changepage('sales_dashboard/trend_harga')">Harga Tebus Distributor</a>
            	</li> -->
            </ul>
        </div>
        <?php }elseif($this->router->fetch_class()=="material_management"){ ?>
		<div id="sidenav">
			<h1>Menu</h1>
            <ul>
            	<li class="haschild">
                    <a onclick="openInNewTab('finance_dashboard/income', this)"><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
				</li>
				<li class="haschild">
                    <a><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
                    <ul>
                        <li <?php echo ($current_url=='material_management/procurement')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('material_management/procurement')">Procurement Tracking</a></li>
                        
                        <li <?php echo ($current_url=='material_management/report')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('material_management/report')">Monthly Report</a></li>
					</ul>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('sales_dashboard/volume', this)"><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('plant_system/dashboard_all', this)"><i class="medium material-icons">domain</i>&nbsp;Production</a>
				</li>
                <li class="haschild">
                    <a onclick="openInNewTab('pos_dashboard/index', this)"><i class="medium material-icons">receipt</i>&nbsp;Point Of Sales</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('crm/index/40', this)"><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('treasury/cashposition', this)"><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
				</li>
				<li class="haschild">
					<a onclick="openInNewTab('cogs/trend', this)"><i class="medium material-icons">attach_money</i>&nbsp;COGS</a>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout', this)"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>
            </ul>
        </div>
        <?php }elseif($this->router->fetch_class()=="finance_dashboard"){ ?>
        <div id="sidenav" class="sidenav-prod">
			<h1>Menu</h1>
            <ul>
                <!-- <li class="haschild">
                    <a>Cash &amp; Liquidity</a>
                    <ul>
                        <li <?php echo ($current_url=='finance_dashboard/finance')? "class='active'" : "" ;?>><a onclick="changepage('finance_dashboard/finance')">SMI Group</a></li>
                        <li <?php echo ($current_url=='finance_dashboard/finance_detail/7000')? "class='active'" : "" ;?>><a onclick="changepage('finance_dashboard/finance_detail/7000')">Semen Indonesia</a></li>
                        <li <?php echo ($current_url=='finance_dashboard/finance_detail/5000')? "class='active'" : "" ;?>><a onclick="changepage('finance_dashboard/finance_detail/5000')">Semen Gresik - Rembang</a></li>
                        <li <?php echo ($current_url=='finance_dashboard/finance_detail/3000')? "class='active'" : "" ;?>><a onclick="changepage('finance_dashboard/finance_detail/3000')">Semen Padang</a></li>
                        <li <?php echo ($current_url=='finance_dashboard/finance_detail/4000')? "class='active'" : "" ;?>><a onclick="changepage('finance_dashboard/finance_detail/4000')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='finance_dashboard/finance_detail/6000')? "class='active'" : "" ;?>><a onclick="changepage('finance_dashboard/finance_detail/6000')">TLCC</a></li>
					</ul>
				</li> -->
                <li class="haschild">
                    <a><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
                    <ul>
                        <li <?php echo ($current_url=='finance_dashboard/income')? "class='active'" : "" ;?>><a onclick="openInNewTab('finance_dashboard/income', this)">Overview</a></li>
                        <li <?php echo ($current_url=='finance_dashboard/income_statement')? "class='active'" : "" ;?>><a onclick="openInNewTab('finance_dashboard/income_statement', this)">Cost Of Revenue</a></li>
                        <li <?php echo ($current_url=='finance_dashboard/operation_expense')? "class='active'" : "" ;?>><a onclick="openInNewTab('finance_dashboard/operation_expense', this)">Operation Expense</a></li>
                        
					</ul>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('material_management/procurement', this)"><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('sales_dashboard/volume', this)"><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('plant_system/dashboard_all', this)"><i class="medium material-icons">domain</i>&nbsp;Production</a>
				</li>
                <li class="haschild">
                    <a onclick="openInNewTab('pos_dashboard/index', this)"><i class="medium material-icons">description</i>&nbsp;Point Of Sales</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('crm/index/40', this)"><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('treasury/cashposition', this)"><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
				</li>
				<li class="haschild">
					<a onclick="openInNewTab('cogs/trend', this)"><i class="medium material-icons">attach_money</i>&nbsp;COGS</a>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout')"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>
			</ul>
		</div>
        <?php }elseif($this->router->fetch_class()=="pos_dashboard"){ ?>
		<div id="sidenav" class="sidenav-prod">
			<h1>Menu</h1>
            <ul>
            	<li class="haschild">
                    <a onclick="openInNewTab('finance_dashboard/income', this)"><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('material_management/procurement', this)"><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('sales_dashboard/volume', this)"><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('plant_system/dashboard_all', this)"><i class="medium material-icons">domain</i>&nbsp;Production</a>
				</li>
                <li class="haschild">
                    <a><i class="medium material-icons">description</i>&nbsp;Point Of Sales</a>
                    <ul>
                        <li <?php echo ($current_url=='pos_dashboard/index')? "class='active'" : "" ;?>><a onclick="changepage('pos_dashboard/index')">Semen Indonesia</a></li>
					</ul>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('crm/index/40', this)"><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('treasury/cashposition', this)"><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
				</li>
				<li class="haschild">
					<a onclick="openInNewTab('cogs/trend', this)"><i class="medium material-icons">attach_money</i>&nbsp;COGS</a>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout')"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>
			</ul>
		</div>
		<?php }elseif($this->router->fetch_class()=="treasury"){ ?>
		<div id="sidenav" class="sidenav-prod">
			<h1>Menu</h1>
            <ul>
            	<li class="haschild">
                    <a onclick="openInNewTab('finance_dashboard/income', this)"><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('material_management/procurement', this)"><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('sales_dashboard/volume', this)"><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('plant_system/dashboard_all', this)"><i class="medium material-icons">domain</i>&nbsp;Production</a>
				</li>
                <li class="haschild">
                    <a onclick="openInNewTab('pos_dashboard/index', this)"><i class="medium material-icons">description</i>&nbsp;Point Of Sales</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('crm/index/40', this)"><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
				</li>
                <li class="haschild">
                    <a><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
                    <ul>
                        <li <?php echo ($current_url=='treasury/cashposition')? "class='active'" : "" ;?>><a onclick="changepage('treasury/cashposition')">Cash Position</a></li>
					</ul>
					<ul>
                        <li <?php echo ($current_url=='treasury/exchangerate')? "class='active'" : "" ;?>><a onclick="changepage('treasury/exchangerate')">Exchange Rate</a></li>
					</ul>
					<ul>
                        <li <?php echo ($current_url=='maps')? "class='active'" : "" ;?>><a onclick="openInNewTab('maps', this)">Account Receivable</a></li>
					</ul>
				</li>
				<li class="haschild">
					<a onclick="openInNewTab('cogs/trend', this)"><i class="medium material-icons">attach_money</i>&nbsp;COGS</a>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout')"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>
			</ul>
		</div>
		<?php }elseif($this->router->fetch_class()=="cogs"){ ?>
		<div id="sidenav" class="sidenav-prod">
			<h1>Menu</h1>
            <ul>
            	<li class="haschild">
                    <a onclick="openInNewTab('finance_dashboard/income', this)"><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('material_management/procurement', this)"><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('sales_dashboard/volume', this)"><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('plant_system/dashboard_all', this)"><i class="medium material-icons">domain</i>&nbsp;Production</a>
				</li>
                <li class="haschild">
                    <a onclick="openInNewTab('pos_dashboard/index', this)"><i class="medium material-icons">description</i>&nbsp;Point Of Sales</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('crm/index/40', this)"><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('treasury/cashposition', this)"><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
				</li>
				<li class="haschild">
                    <a><i class="medium material-icons">attach_money</i>&nbsp;COGS</a>
                    <ul>
                        <li <?php echo ($current_url=='cogs/trend')? "class='active'" : "" ;?>><a onclick="changepage('cogs/trend')">Trend COGS</a></li>
					</ul>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout')"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>
			</ul>
		</div>
		<?php }elseif(strtolower($this->router->fetch_class())=="crm"){ ?>
		<div id="sidenav" class="sidenav-prod">
			<h1>Menu</h1>
            <ul>
            	<li class="haschild">
                    <a onclick="openInNewTab('finance_dashboard/income', this)"><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('material_management/procurement', this)"><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('sales_dashboard/volume', this)"><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('plant_system/dashboard_all', this)"><i class="medium material-icons">domain</i>&nbsp;Production</a>
				</li>
                <li class="haschild">
                    <a onclick="openInNewTab('pos_dashboard/index', this)"><i class="medium material-icons">description</i>&nbsp;Point Of Sales</a>
				</li>
                <li class="haschild">
					<a><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
					<ul>
                        <li <?php echo ($current_url=='crm/index/40')? "class='active'" : "" ;?>><a onclick="changepage('crm/index/40')">Kemasan 40Kg</a></li>
                        <li <?php echo ($current_url=='crm/index/50')? "class='active'" : "" ;?>><a onclick="changepage('crm/index/50')">Kemasan 50Kg</a></li>
					</ul>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('treasury/cashposition', this)"><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
				</li>
				<li class="haschild">
					<a onclick="openInNewTab('cogs/trend', this)"><i class="medium material-icons">attach_money</i>&nbsp;COGS</a>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout')"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>
			</ul>
		</div>
		<?php }elseif($this->router->fetch_class()=="stock"){ ?>
		<div id="sidenav" class="sidenav-prod">
			<h1>Menu</h1>
            <ul>
                <li class="haschild">
                    <a>Semen Indonesia</a>
                    <ul>
                        <li <?php echo ($current_url=='stock/index/7000/1700')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/1700')">AFR</a></li>
                        <li <?php echo ($current_url=='stock/index/7000/1600')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/1600')">Coal</a></li>
                        <li <?php echo ($current_url=='stock/index/7000/1100')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/1100')">Copper Slag</a></li>
                        <li <?php echo ($current_url=='stock/index/7000/2700')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/2700')">Gypsum Natural</a></li>
                        <li <?php echo ($current_url=='stock/index/7000/1300')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/1300')">Gypsum OPC</a></li>
                        <li <?php echo ($current_url=='stock/index/7000/1400')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/1400')">Gypsum PPC</a></li>
                        <li <?php echo ($current_url=='stock/index/7000/1500')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/1500')">I.D.O</a></li>
                        <li <?php echo ($current_url=='stock/index/7000/1200')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/1200')">Silica Sand</a></li>
                        <li <?php echo ($current_url=='stock/index/7000/1000')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/7000/1000')">Trass</a></li>
					</ul>
				</li>
                <li class="haschild">
                    <a>Semen Padang</a>
                    <ul>
                        <li <?php echo ($current_url=='stock/index/3000/1600')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/3000/1600')">Coal</a></li>
                        <li <?php echo ($current_url=='stock/index/3000/2400')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/3000/2400')">CLAY</a></li>
                        <li <?php echo ($current_url=='stock/index/3000/1100')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/3000/1100')">Copper Slag</a></li>
                        <li <?php echo ($current_url=='stock/index/3000/1800')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/3000/1800')">Flay Ash</a></li>
                        <li <?php echo ($current_url=='stock/index/3000/2200')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/3000/2200')">Gypsum</a></li>
                        <li <?php echo ($current_url=='stock/index/3000/2300')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/3000/2300')">Pozzolan Sand</a></li>
                        <li <?php echo ($current_url=='stock/index/3000/2100')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/3000/2100')">Solar</a></li>
					</ul>
				</li>
                <li class="haschild">
                    <a>Semen Tonasa</a>
                    <ul>
                        <li <?php echo ($current_url=='stock/index/4000/1600')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/4000/1600')">Coal</a></li>
                        <li <?php echo ($current_url=='stock/index/4000/2600')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/4000/2600')">BCO T.2/3</a></li>
                        <li <?php echo ($current_url=='stock/index/4000/1100')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/4000/1100')">Copper Slag</a></li>
                        <li <?php echo ($current_url=='stock/index/4000/2200')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/4000/2200')">Gypsum</a></li>
                        <li <?php echo ($current_url=='stock/index/4000/1200')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/4000/1200')">Silica Sand</a></li>
                        <li <?php echo ($current_url=='stock/index/4000/2100')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/4000/2100')">Solar</a></li>
                        <li <?php echo ($current_url=='stock/index/4000/1000')? "class='active'" : "" ;?>><a onclick="changepage('stock/index/4000/1000')">Trass</a></li>
					</ul>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout')"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>
			</ul>
		</div>
		<?php }else{ ?>
		<div id="sidenav" class="sidenav-prod">
			<h1>MENU</h1>
            <ul>
            	<li class="haschild">
                    <a onclick="openInNewTab('finance_dashboard/income', this)"><i class="medium material-icons">poll</i>&nbsp;Income Statement</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('material_management/procurement', this)"><i class="medium material-icons">dns</i>&nbsp;Material Management</a>
				</li>
				<li class="haschild">
                    <a onclick="openInNewTab('sales_dashboard/volume', this)"><i class="medium material-icons">receipt</i>&nbsp;Sales</a>
				</li>
				<li class="haschild">
                    <a><i class="medium material-icons">domain</i>&nbsp;Production</a>
                    <ul>
                    	<li <?php echo ($current_url=='plant_system/dashboard_all')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('plant_system/dashboard_all')">Production Overview</a></li>
                        <li <?php echo ($current_url=='plant_gresik/offstate')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('plant_gresik/offstate')">Plant Overview</a></li>
                        <li <?php echo ($current_url=='plant_gresik/stock')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('plant_gresik/stock')">Stock</a></li>
                        <li <?php echo ($current_url=='plant_system/production')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('plant_system/production')">Cement Production Report</a></li>
                        <li <?php echo ($current_url=='plant_system/production_clinker')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('plant_system/production_clinker')">Clinker Production Report</a></li>
                        <li <?php echo ($current_url=='plant_gresik/emission')? "class='active'" : "" ;?>>
                        	<a onclick="changepage('plant_gresik/emission')">Emission</a></li>
					</ul>
				</li>
                <li class="haschild">
                    <a onclick="openInNewTab('pos_dashboard/index', this)"><i class="medium material-icons">description</i>&nbsp;Point Of Sales</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('crm/index/40', this)"><i class="medium material-icons">widgets</i>&nbsp;CRM SMIG</a>
				</li>
                <li class="haschild">
					<a onclick="openInNewTab('treasury/cashposition', this)"><i class="medium material-icons">monetization_on</i>&nbsp;Treasury</a>
				</li>
				<li class="haschild">
					<a onclick="openInNewTab('cogs/trend', this)"><i class="medium material-icons">attach_money</i>&nbsp;COGS</a>
				</li>
                <li class="haschild">
                    <a onclick="changepage('ldap_access/logout')"><i class="medium material-icons">exit_to_app</i>&nbsp;Logout</a>
            	</li>
                <!-- <li class="haschild">
                    <a>FINANCE</a>
                    <ul>
                        <li <?php echo ($current_url=='plant_gresik/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_gresik/overview')">Revenue</a></li>
                        <li <?php echo ($current_url=='plant_rembang/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_rembang/overview')">Cost of Revenue</a></li>
                        <li <?php echo ($current_url=='plant_padang/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_padang/overview')">Operation Expense</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/overview')">EBITDA</a></li>
                        <li <?php echo ($current_url=='plant_tlcc/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_tlcc/overview')">NET PROFIT</a></li>
					</ul>
				</li>
                <li class="haschild">
                    <a>SALES</a>
                    <ul>
                        <li <?php echo ($current_url=='plant_gresik/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_gresik/overview')">Volume</a></li>
                        <li <?php echo ($current_url=='plant_rembang/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_rembang/overview')">Revenue</a></li>
                        <li <?php echo ($current_url=='plant_padang/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_padang/overview')">Market Share</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/overview')">Harga Tebus Distributor</a></li>
					</ul>
				</li>
                <li class="haschild">
                    <a>PRODUCTION</a>
                    <ul>
                        <li <?php echo ($current_url=='plant_gresik/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_gresik/overview')">Dashboard</a></li>
                        <li <?php echo ($current_url=='plant_rembang/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_rembang/overview')">Plant Overview</a></li>
                        <li <?php echo ($current_url=='plant_padang/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_padang/overview')">Cement</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/overview')">Clinker</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/overview')">Stock</a></li>
					</ul>
				</li>
				<li <?php echo ($current_url=='plant_system/dashboard_all')? "class='active'" : "" ;?>>
                    <a onclick="changepage('plant_system/dashboard_all')">Dashboard Production Report</a>
				</li>
                <li class="haschild">
                    <a>Power Plant</a>
                    <ul>
                        <li <?php echo ($current_url=='plant_gresik/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_gresik/overview')">Semen Indonesia</a></li>
                        <li <?php echo ($current_url=='plant_rembang/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_rembang/overview')">Semen Gresik - Rembang</a></li>
                        <li <?php echo ($current_url=='plant_padang/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_padang/overview')">Semen Padang</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/overview')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='plant_tlcc/overview')? "class='active'" : "" ;?>><a onclick="changepage('plant_tlcc/overview')">TLCC</a></li>
					</ul>
				</li>
				<li class="haschild">
                    <a>Stock</a>
                    <ul>
                        <li <?php echo ($current_url=='plant_gresik/stock')? "class='active'" : "" ;?>><a onclick="changepage('plant_gresik/stock')">Semen Indonesia</a></li>
                        <li <?php echo ($current_url=='plant_rembang/stock')? "class='active'" : "" ;?>><a onclick="changepage('plant_rembang/stock')">Semen Gresik - Rembang</a></li>
                        <li <?php echo ($current_url=='plant_padang/stock')? "class='active'" : "" ;?>><a onclick="changepage('plant_padang/stock')">Semen Padang</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/stock')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/stock')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='plant_tlcc/stock')? "class='active'" : "" ;?>><a onclick="changepage('plant_tlcc/stock')">TLCC</a></li>
					</ul>
				</li>
				<li class="haschild">
                    <a>Cement Production Report</a>
                    <ul>
                        <li <?php echo ($current_url=='plant_system/production')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production')">SMI Group</a></li>
                        <li <?php echo ($current_url=='plant_system/production/SPCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production/SPCement')">Semen Padang</a></li>
                        <li <?php echo ($current_url=='plant_system/production/SGRCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production/SGRCement')">Semen Gresik - Rembang</a></li>
                        <li <?php echo ($current_url=='plant_system/production/SGCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production/SGCement')">Semen Indonesia</a></li>
                        <li <?php echo ($current_url=='plant_system/production/STCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production/STCement')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='plant_system/production/TLCCCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production/TLCCCement')">TLCC</a></li>
                	</ul>
				</li>
				<li class="haschild">
                    <a>Clinker Production Report</a>
                    <ul>        
						<li <?php echo ($current_url=='plant_system/production_clinker')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production_clinker')">SMI Group</a></li>
                        <li <?php echo ($current_url=='plant_system/production_clinker/SPCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production_clinker/SPCement')">Semen Padang</a></li>
                        <li <?php echo ($current_url=='plant_system/production_clinker/SGRCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production_clinker/SGRCement')">Semen Gresik - Rembang</a></li>
                        <li <?php echo ($current_url=='plant_system/production_clinker/SGCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production_clinker/SGCement')">Semen Indonesia</a></li>
                        <li <?php echo ($current_url=='plant_system/production_clinker/STCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production_clinker/STCement')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='plant_system/production_clinker/TLCCCement')? "class='active'" : "" ;?>><a onclick="changepage('plant_system/production_clinker/TLCCCement')">TLCC</a></li>
					</ul>
				</li>
				<li class="haschild">
                    <a>Emission</a>
                    <ul>
                        <li <?php echo ($current_url=='plant_gresik/emission')? "class='active'" : "" ;?>><a onclick="changepage('plant_gresik/emission')">Semen Indonesia</a></li>
                        <li <?php echo ($current_url=='plant_rembang/emission')? "class='active'" : "" ;?>><a onclick="changepage('plant_rembang/emission')">Semen Gresik - Rembang</a></li>
                        <li <?php echo ($current_url=='plant_padang/emission')? "class='active'" : "" ;?>><a onclick="changepage('plant_padang/emission')">Semen Padang</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/emission')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/emission')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='plant_tlcc/emission')? "class='active'" : "" ;?>><a onclick="changepage('plant_tlcc/emission')">TLCC</a></li>
						<?php /*
                        <li <?php echo ($current_url=='plant_tonasa/power_btg')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/power_btg')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/load_shed')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/load_shed')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='plant_tonasa/pltu_mon')? "class='active'" : "" ;?>><a onclick="changepage('plant_tonasa/pltu_mon')">Semen Tonasa</a></li>
                        <li <?php echo ($current_url=='plant_rembang/packer_plant')? "class='active'" : "" ;?>><a onclick="changepage('plant_rembang/packer_plant')">Semen Gresik - Rembang</a></li>
						*/?>
            		</ul>
            	</li> -->
            </ul>
        </div>
		<?php } ?>

		<script type="text/javascript">
			function startTime() {
				var today=new Date(),
					curr_hour=today.getHours(),
					curr_min=today.getMinutes(),
					curr_sec=today.getSeconds();
				curr_hour=checkTime(curr_hour);
				curr_min=checkTime(curr_min);
				curr_sec=checkTime(curr_sec);
				var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
				var date = new Date();
				var day = date.getDate();
				var month = date.getMonth();
				var yy = date.getYear();
				var year = (yy < 1000) ? yy + 1900 : yy;
				// document.getElementById('clock').innerHTML=curr_hour+"<span class='blinksec'>:</span>"+curr_min;
				// document.getElementById('date_clock').innerHTML=day + " " + months[month] + " " + year;
			}
			function checkTime(i) {
				if (i<10) {
					i="0" + i;
				}
				return i;
			}
			setInterval(startTime, 1000);
		</script>
		
		<div id="content_wrap"></div>
		<?= $contents; ?>
		
		<!-- <footer id="footer">
			<div class="centering add_fix" align="left" style="padding: 0 15px 12px 0; font-size: 14px">
				Last Update : <?php echo date('d/m/Y H:i');?>
			</div>
		</footer> -->
	</body>
</html>