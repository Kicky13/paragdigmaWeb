<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class plant_link {

    var $CI = NULL;

    function __construct() {
        $this->CI = & get_instance();
    }

    function global_link($plant, $link) {
        $username = $this->CI->session->userdata('ldap_id');
        if ($username == "helios.y" or $username == "indra.nofiandi") {
            $administrator = "	$('#li_administrator').click(function(){
								window.location.href = 'index.php/plant_administrator/';
							});";
        } else {
            $administrator = "";
        }
        $load = "
				$('#li_dashboard').click(function(){
					window.location.href = 'index.php/plant_system/dashboard_semen'; /*'index.php/plant_" . $plant . "/overview'*/
				});
				
				$('#li_overview').click(function(){
					window.location.href = 'index.php/plant_" . $plant . "/overview';
				});
				
				$('#li_production').click(function(){
					window.location.href = 'index.php/plant_" . $plant . "/production';
				});
				$('#li_stock').click(function(){
					window.location.href = 'index.php/plant_" . $plant . "/stock';
				});

				$('#li_emission').click(function(){
					window.location.href = 'index.php/plant_" . $plant . "/emission';
				});
				$('#li_maintenance').click(function(){
					window.location.href = 'index.php/plant_" . $plant . "/maintenance';
				});
				$('#li_eksekutif').click(function(){
					window.location.href = 'index.php/eksekutif_report/';
				});
				$('#link_padang').click(function(){
					window.location.href = 'index.php/plant_padang/" . $link . "';
				});
				$('#link_gresik').click(function(){
					window.location.href = 'index.php/plant_gresik/" . $link . "';
				});
				$('#link_tonasa').click(function(){
					window.location.href = 'index.php/plant_tonasa/" . $link . "';
				});
                $('#link_tlcc').click(function(){
					window.location.href = 'index.php/plant_tlcc/" . $link . "';
				});				
				" . $administrator;

        return $load;
    }

    function plant_production($plant, $link) {
        $load = "$('#li_" . $plant . "').addClass('active'); 
				$('#li_production').addClass('active');
				" . $this->global_link($plant, $link) . "
				";
        return $load;
    }

    function plant_overview($plant, $link) {
        $load = "$('#li_" . $plant . "').addClass('active'); 
				$('#li_overview').addClass('active');
					" . $this->global_link($plant, $link) . "
				";
        return $load;
    }

    function plant_dashboard($plant, $link) {
        $load = "$('#li_" . $plant . "').addClass('active'); 
				$('#li_dashboard').addClass('active');
					" . $this->global_link($plant, $link) . "
				";
        return $load;
    }

    function plant_stock($plant, $link) {
        $load = "$('#li_" . $plant . "').addClass('active'); 
				$('#li_stock').addClass('active');
					" . $this->global_link($plant, $link) . "
				";
        return $load;
    }

    function plant_emission($plant, $link) {
        $load = "$('#li_" . $plant . "').addClass('active'); 
				$('#li_emission').addClass('active');
					" . $this->global_link($plant, $link) . "
				";
        return $load;
    }

    function plant_administrator($plant, $link) {
        $load = "$('#li_" . $link . "').addClass('active'); 
				$('#li_administrator').addClass('active');
					" . $this->Administrator_link($plant, $link) . "
				";
        return $load;
    }
    
    
    function plant_administrator2($plant, $link) {
//                            <li id="li_user"><a href="javascript:void(0);" id="link_user">User Access</a></li>
//                    <li id="li_rkap"><a href="javascript:void(0);" id="link_rkap">RKAP Produksi</a></li>
//                    <li id="li_report"><a href="javascript:void(0);" id="link_report">Report Eksekutif</a></li>
        $load = "
                $('#ulmenuUtama').append('" . '<li><a href="javascript:void(0);" id="link_user" style="padding-left:5px;"><i class="fa fa-shopping-basket fa-lg" style="margin-right:10px;"></i>User Access</a></li> ' . "');
                $('#ulmenuUtama').append('" . '<li><a href="javascript:void(0);" id="link_rkap" style="padding-left:5px;"><i class="fa fa-road fa-lg" style="margin-right:10px;"></i>Report Eksekutif</a></li> ' . "');
                $('#ulmenuUtama').append('" . '<li><a href="javascript:void(0);" id="link_report" style="padding-left:5px;"><i class="fa fa-wrench fa-lg" style="margin-right:10px;"></i>RKAP Produksi</a></li> ' . "');
                $('#li_" . $plant . "').addClass('active'); 
                $('#li_" . $link . "').addClass('active');
                " . $this->Administrator_link($plant, $link) . "
                ";
        return $load;
    }
    
    
    function plant_eksekutif($plant, $link, $input) {
        $load = "
				$('#ulplant').append('" . '<li id="li_tlcc"><a href="javascript:void(0);" id="link_tlcc">Tlcc</a></li> ' . "');
				$('#ulmenuUtama').append('" . '<li><a href="javascript:void(0);" id="li_cement" style="padding-left:10px;"><i class="fa fa-shopping-basket fa-lg" style="margin-right:10px;"></i> Cement Report</a></li> ' . "');
				$('#ulmenuUtama').append('" . '<li><a href="javascript:void(0);" id="li_effisiensi" style="padding-left:10px;"><i class="fa fa-wrench fa-lg" style="margin-right:10px;"></i> Kiln Effisiensi</a></li> ' . "');
				$('#ulmenuUtama').append('" . '<li><a href="javascript:void(0);" id="li_operation" style="padding-left:10px;"><i class="fa fa-road fa-lg" style="margin-right:10px;"></i> Kiln Operation</a></li> ' . "');
				$('#ulmenuUtama').append('" . '<li><a href="javascript:void(0);" id="li_BatuBara" style="padding-left:10px;"><i class="fa fa-fire fa-lg" style="margin-right:10px;"></i> Batu Bara</a></li> ' . "');
				$('#li_" . $plant . "').addClass('active'); 
				$('#li_" . $link . "').addClass('active');
				" . $this->Eksekutif_link($plant, $link, $input) . "
				";
        return $load;
    }

    function Eksekutif_link($plant, $link, $input) {
        if (empty($input['periode'])) {
            $input['periode'] = date('n');
        }
        if (empty($input['tahun'])) {
            $input['tahun'] = date('Y');
        }
        $load = "
				$('#li_dashboard').click(function(){
					window.location.href = 'index.php/plant_system/overview';
				});
				
				$('#li_overview').click(function(){
					window.location.href = 'index.php/plant_system/overview';
				});
				
				$('#li_production').click(function(){
					window.location.href = 'index.php/plant_system/production';
				});
				$('#li_stock').click(function(){
					window.location.href = 'index.php/plant_system/stock';
				});

				$('#li_emission').click(function(){
					window.location.href = 'index.php/plant_system/emission';
				});
				$('#li_maintenance').click(function(){
					window.location.href = 'index.php/plant_system/maintenance';
				});
				$('#li_eksekutif').click(function(){
					window.location.href = 'index.php/eksekutif_report/';
				});
				$('#li_cement').click(function(){
					window.location.href = 'index.php/eksekutif_report/Cement_1';
				});
				$('#li_effisiensi').click(function(){
					window.location.href = 'index.php/eksekutif_report/KilnEfisiensi';
				});
				$('#li_operation').click(function(){
					window.location.href = 'index.php/eksekutif_report/KlinOperation';
				});
				$('#li_BatuBara').click(function(){
					window.location.href = 'index.php/eksekutif_report/BatuBara';
				});
				$('#li_administrator').click(function(){
					window.location.href = 'index.php/plant_administrator/';
				});
				$('#link_padang').click(function(){
					window.location.href = 'index.php/eksekutif_report/padang" . $link . "?input[periode]=" . $input['periode'] . "&input[tahun]=" . $input['tahun'] . "';
				});
				$('#link_gresik').click(function(){
					window.location.href = 'index.php/eksekutif_report/gresik" . $link . "?input[periode]=" . $input['periode'] . "&input[tahun]=" . $input['tahun'] . "';
				});
				$('#link_tonasa').click(function(){
					window.location.href = 'index.php/eksekutif_report/tonasa" . $link . "?input[periode]=" . $input['periode'] . "&input[tahun]=" . $input['tahun'] . "';
				});
				$('#link_tlcc').click(function(){
					window.location.href = 'index.php/eksekutif_report/eksekutif_report_terak/5" . $link . "?input[periode]=" . $input['periode'] . "&input[tahun]=" . $input['tahun'] . "';
				});
			";
        return $load;
    }

    function Administrator_link($plant, $link) {
        $load = "
				$('#li_dashboard').click(function(){
					window.location.href = 'index.php/plant_system/overview';
				});
				
				$('#li_overview').click(function(){
					window.location.href = 'index.php/plant_system/overview';
				});
				
				$('#li_production').click(function(){
					window.location.href = 'index.php/plant_system/production';
				});
				$('#li_stock').click(function(){
					window.location.href = 'index.php/plant_system/stock';
				});

				$('#li_emission').click(function(){
					window.location.href = 'index.php/plant_system/emission';
				});
				$('#li_maintenance').click(function(){
					window.location.href = 'index.php/plant_system/maintenance';
				});
				$('#li_rkap').click(function(){
					window.location.href = 'index.php/plant_administrator/LoadRkap';
				});
				$('#li_report').click(function(){
					window.location.href = 'index.php/plant_administrator/LoadReport';
				});
				$('#li_administrator').click(function(){
					window.location.href = 'index.php/plant_administrator/';
				});
				$('#li_eksekutif').click(function(){
					window.location.href = 'index.php/eksekutif_report/';
				});
			";
        return $load;
    }

}