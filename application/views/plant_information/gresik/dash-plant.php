<script type="text/javascript" src="bootstrap/plantView/master_opc/js/opc-lib-min.js"></script>
<script>
    OPC_config = {
        token:'7e61b230-481d-4551-b24b-ba9046e3d8f2',
        serverURL: 'http://10.15.3.146:58725'
    };
    $(function(){
        $('#btn_rm341').click(function(){
            window.location.href = '<?= base_url() ?>index.php/plant_gresik/overview_341';
        });
    })
</script>
<style>
    .tittleops{
            text-align: center;
    border-bottom: 1px solid #ecd8d5;
    font-size: x-large;
    }
    .noPadding{
        padding-top:1px;
        padding-left:1px;
        padding-right:1px;
        padding-bottom:1px;
    }
    .cubesRun{
        height:95px;
        width:100%;
    }
    .onzi{
        float: right;
        color: #fff;
        padding-top: 27px;
    }
    .onzi-up{
        float: right;
        color: #fff;
        padding-top: 11px;
    }
    .onzi-down{
        float: right;
        color: #fff;
        padding-top: 11px;
    }
    .TagName{
        font-size: 12px;
        /* font-weight: bold; */
        /* border-style: solid; */
        color: #656565;
    }
    .TagData{
        font-size: 26px;
        /*    font-weight: bold;*/
        color: #312828;
    }
    .scale{
            transition: all .2s ease-in-out;
    transition-property: all;
    transition-duration: 0.2s;
    transition-timing-function: ease-in-out;
    transition-delay: initial;
    }
    .scale:hover{
            transform: scale(1.1);
    }


</style>

<!--        batas-->

<section class="content-header" style="margin-bottom:15px;">
      <h1>
        Plant Overview
        <small>Option page</small>
      </h1>
      
    </section>
<div class="row" style="height:29px; margin-bottom:34px;">
    <a href="<?php echo base_url(); ?>index.php/plant_gresik/overview">
<div class="col-md-4 col-xs-12">
<div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
            <span class="info-box-icon bg-red"><img class="scale" src="media/icon/3.png" width="64px"  alt="..."></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:24px;">Overview</span>
              <span class="info-box-number" style="font-size:14px;">See about your machine status, temperature, perfomance and other parameter</span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div></a>
    <a href="<?php echo base_url(); ?>index.php/plant_gresik/stock">
<div class="col-md-4 col-xs-12">
<div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
            <span class="info-box-icon bg-red"><img class="scale" src="media/icon/1.png" width="64px"  alt="..."></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:24px;">Stock</span>
              <span class="info-box-number" style="font-size:14px;">Check your stock everyday to make sure your stock at normal level and maintaince issue</span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div></a>
    <a  href="<?php echo base_url(); ?>index.php/plant_gresik/emission">
<div class="col-md-4 col-xs-12">
<div class="info-box" style="background: #dd4b39; color:#FFFFFF;">
            <span class="info-box-icon bg-red"><img class="scale" src="media/icon/2.png" width="64px"  alt="..."></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:24px;">Emission</span>
              <span class="info-box-number" style="font-size:14px;">Monitor your plant emission and keep your machine eco-friendly, it's important information</span>
            </div>
            <!-- /.info-box-content -->
          </div>
</div></a>

</div>

<?php
    //Deklarasi String Name 
$sg_string_fm1 = 'Finish Mill 1';
$sg_string_fm2 = 'Finish Mill 2';
$sg_string_fm3 = 'Finish Mill 3';
$sg_string_fm4 = 'Finish Mill 4';
$sg_string_fm5 = 'Finish Mill 5';
$sg_string_fm6 = 'Finish Mill 6';
$sg_string_fm7 = 'Finish Mill 7';
$sg_string_fm8 = 'Finish Mill 8';
$sg_string_fm9 = 'Finish Mill 9';
$sg_string_fma = 'Finish Mill a';
$sg_string_fmb = 'Finish Mill b';
$sg_string_fmc = 'Finish Mill c';

$sp_string_fm2 = 'Finish Mill 2';
$sp_string_fm3 = 'Finish Mill 3';
$sp_string_fm41 = 'Finish Mill 4-1';
$sp_string_fm42 = 'Finish Mill 4-2';
$sp_string_fm51 = 'Finish Mill 5-1';
$sp_string_fm52 = 'Finish Mill 5-2';

$st_string_fm2 = 'Finish Mill 2';
$st_string_fm3 = 'Finish Mill 3';
$st_string_fm41 = 'Finish Mill 4-1';
$st_string_fm42 = 'Finish Mill 4-2';
$st_string_fm51 = 'Finish Mill 5-1';
$st_string_fm52 = 'Finish Mill 5-2';

$tlcc_string_fmb = 'Finish Mill MP';
$tlcc_string_fmc = 'Finish Mill HCM';

$sg_string_rm1 = 'Raw Mill 1';
$sg_string_rm2 = 'Raw Mill 2';
$sg_string_rm3 = 'Raw Mill 3';
$sg_string_rm4 = 'Raw Mill 4';

$sp_string_rm2 = 'Raw Mill 2';
$sp_string_rm3 = 'Raw Mill 3';
$sp_string_rm41 = 'Raw Mill 4-1';
$sp_string_rm42 = 'Raw Mill 4-2';
$sp_string_rm51 = 'Raw Mill 5-1';
$sp_string_rm52 = 'Raw Mill 5-2';

$st_string_rm2 = 'Raw Mill 2';
$st_string_rm3 = 'Raw Mill 3';
$st_string_rm41 = 'Raw Mill 4-1';
$st_string_rm42 = 'Raw Mill 4-2';
$st_string_rm51 = 'Raw Mill 5-1';

$tlcc_string_rm1 = 'Raw Mill 1';

$sg_string_kl1 = 'Kiln 1';
$sg_string_kl2 = 'Kiln 2';
$sg_string_kl3 = 'Kiln 3';
$sg_string_kl4 = 'Kiln 4';

$sp_string_kl2 = 'Kiln 2';
$sp_string_kl3 = 'Kiln 3';
$sp_string_kl4 = 'Kiln 4';
$sp_string_kl5 = 'Kiln 5';

$st_string_kl2 = 'Kiln 2';
$st_string_kl3 = 'Kiln 3';
$st_string_kl4 = 'Kiln 4';
$st_string_kl5 = 'Kiln 5';

$tlcc_string_kl1 = 'Kiln 1';

//Deklarasi Variable Feed
$sg_feed_fm1 = $data_feednrun[1141]['produksi'];
$sg_feed_fm2 = $data_feednrun[90000]['produksi'];
$sg_feed_fm3 = $data_feednrun[1225]['produksi'];
$sg_feed_fm4 = $data_feednrun[4691]['produksi'];
$sg_feed_fm5 = $data_feednrun[6798]['produksi'];
$sg_feed_fm6 = $data_feednrun[3977]['produksi'];
$sg_feed_fm7 = $data_feednrun[3543]['produksi'];
$sg_feed_fm8 = $data_feednrun[15788]['produksi'];
$sg_feed_fm9 = $data_feednrun[15780]['produksi'];
$sg_feed_fma = $data_feednrun[90010]['produksi'];
$sg_feed_fmb = $data_feednrun[90030]['produksi'];
$sg_feed_fmc = $data_feednrun[90020]['produksi'];

$sp_feed_fm2 = $data_feednrun['N13.Z1_MV_TOTAL']['produksi'];
$sp_feed_fm3 = $data_feednrun['N23.Z2_MV_TOTAL']['produksi'];
$sp_feed_fm41 = $data_feednrun['PIS.4Z1_FEED']['produksi'];
$sp_feed_fm42 = $data_feednrun['PIS.4Z2_FEED']['produksi'];
$sp_feed_fm51 = $data_feednrun['PIS.5Z1_FEED']['produksi'];
$sp_feed_fm52 = $data_feednrun['PIS.5Z2_FEED']['produksi'];
$sp_feed_fmdm = $data_feednrun['DUMAI.FM1']['produksi'];

$st_feed_fm2 = $data_feednrun['Tonasa 2/3.FM1_TNS2_Feed']['produksi'];
$st_feed_fm3 = $data_feednrun['Tonasa 2/3.FM1_TNS3_Feed']['produksi'];
$st_feed_fm41 = $data_feednrun['Tonasa 4.FM1_TNS4_Feed']['produksi'];
$st_feed_fm42 = $data_feednrun['Tonasa 4.FM2_TNS4_Feed']['produksi'];
$st_feed_fm51 = $data_feednrun['Tonasa 5.FM2_TNS5_Feed']['produksi'];
$st_feed_fm52 = $data_feednrun['Tonasa 5.FM1_TNS5_Feed']['produksi'];

$tlcc_feed_fmb = $data_feednrun['TLCC.FMMP']['produksi'];
$tlcc_feed_fmc = $data_feednrun['TLCC.FM_HCM']['produksi'];

$sg_feed_rm1 = $data_feednrun[666]['produksi'];
$sg_feed_rm2 = $data_feednrun[697]['produksi'];
$sg_feed_rm3 = $data_feednrun[993]['produksi'];
$sg_feed_rm4 = $data_feednrun[14638]['produksi'];

$sp_feed_rm2 = $data_feednrun['N11.R1_MV_TOTAL_ORIGINAL']['produksi'];
$sp_feed_rm3 = $data_feednrun['N21.R2_MV_TOTAL_ORIGINAL']['produksi'];
$sp_feed_rm41 = $data_feednrun['PIS.4R1_FEED']['produksi'];
$sp_feed_rm42 = $data_feednrun['PIS.4R2_FEED']['produksi'];
$sp_feed_rm51 = $data_feednrun['PIS.5R1_FEED']['produksi'];
$sp_feed_rm52 = $data_feednrun['PIS.5R2_FEED']['produksi'];
$sp_feed_rmdm = $data_feednrun['TLCC.RM1']['produksi'];

$st_feed_rm2 = $data_feednrun['Tonasa 2/3.RM1_TNS2_Feed']['produksi'];
$st_feed_rm3 = $data_feednrun['Tonasa 2/3.RM1_TNS3_Feed']['produksi'];
$st_feed_rm41 = $data_feednrun['Tonasa 4.RM1_TNS4_Feed']['produksi'];
$st_feed_rm42 = $data_feednrun['Tonasa 4.RM2_TNS4_Feed']['produksi'];
$st_feed_rm51 = $data_feednrun['Tonasa 5.RM_TNS5_Feed']['produksi'];

//$tlcc_feed_rm1 = $data_feednrun[1141]['produksi'];

$sg_feed_kl1 = $data_feednrun[3351]['produksi'];
$sg_feed_kl2 = $data_feednrun[2506]['produksi'];
$sg_feed_kl3 = $data_feednrun[5220]['produksi'];
$sg_feed_kl4 = $data_feednrun[14390]['produksi'];

$sp_feed_kl2 = $data_feednrun['N12.W1A07_09F1']['produksi'];
$sp_feed_kl3 = $data_feednrun['N22.W2A07_09F1']['produksi'];
$sp_feed_kl4 = $data_feednrun['PIS.4W1_FEED']['produksi'];
$sp_feed_kl5 = $data_feednrun['PIS.5W1_FEED']['produksi'];

$st_feed_kl2 = $data_feednrun['Tonasa 2/3.KL1_TNS2_Feed']['produksi'];
$st_feed_kl3 = $data_feednrun['Tonasa 2/3.KL1_TNS3_Feed']['produksi'];
$st_feed_kl4 = $data_feednrun['Tonasa 4.KL_TNS4_Feed']['produksi'];
$st_feed_kl5 = $data_feednrun['Tonasa 5.KL_TNS5_Feed']['produksi'];

$tlcc_feed_kl1 = $data_feednrun['TLCC.KL']['produksi'];
//Deklarasi Variable Run
$sg_run_fm1 = $data_feednrun[1141]['rundays'];
$sg_run_fm2 = $data_feednrun[90000]['rundays'];
$sg_run_fm3 = $data_feednrun[1225]['rundays'];
$sg_run_fm4 = $data_feednrun[4691]['rundays'];
$sg_run_fm5 = $data_feednrun[6798]['rundays'];
$sg_run_fm6 = $data_feednrun[3977]['rundays'];
$sg_run_fm7 = $data_feednrun[3543]['rundays'];
$sg_run_fm8 = $data_feednrun[15788]['rundays'];
$sg_run_fm9 = $data_feednrun[15780]['rundays'];
$sg_run_fma = $data_feednrun[90010]['rundays'];
$sg_run_fmb = $data_feednrun[90030]['rundays'];
$sg_run_fmc = $data_feednrun[90020]['rundays'];

$sp_run_fm2 = $data_feednrun['N13.Z1_MV_TOTAL']['rundays'];
$sp_run_fm3 = $data_feednrun['N23.Z2_MV_TOTAL']['rundays'];
$sp_run_fm41 = $data_feednrun['PIS.4Z1_FEED']['rundays'];
$sp_run_fm42 = $data_feednrun['PIS.4Z2_FEED']['rundays'];
$sp_run_fm51 = $data_feednrun['PIS.5Z1_FEED']['rundays'];
$sp_run_fm52 = $data_feednrun['PIS.5Z2_FEED']['rundays'];
$sp_run_fmdm = $data_feednrun['DUMAI.FM1']['rundays'];

$st_run_fm2 = $data_feednrun['Tonasa 2/3.FM1_TNS2_Feed']['rundays'];
$st_run_fm3 = $data_feednrun['Tonasa 2/3.FM1_TNS3_Feed']['rundays'];
$st_run_fm41 = $data_feednrun['Tonasa 4.FM1_TNS4_Feed']['rundays'];
$st_run_fm42 = $data_feednrun['Tonasa 4.FM2_TNS4_Feed']['rundays'];
$st_run_fm51 = $data_feednrun['Tonasa 5.FM2_TNS5_Feed']['rundays'];
$st_run_fm52 = $data_feednrun['Tonasa 5.FM1_TNS5_Feed']['rundays'];

$tlcc_run_fmb = $data_feednrun['TLCC.FMMP']['rundays'];
$tlcc_run_fmc = $data_feednrun['TLCC.FM_HCM']['rundays'];

$sg_run_rm1 = $data_feednrun[666]['rundays'];
$sg_run_rm2 = $data_feednrun[697]['rundays'];
$sg_run_rm3 = $data_feednrun[993]['rundays'];
$sg_run_rm4 = $data_feednrun[14638]['rundays'];

$sp_run_rm2 = $data_feednrun['N11.R1_MV_TOTAL_ORIGINAL']['rundays'];
$sp_run_rm3 = $data_feednrun['N21.R2_MV_TOTAL_ORIGINAL']['rundays'];
$sp_run_rm41 = $data_feednrun['PIS.4R1_FEED']['rundays'];
$sp_run_rm42 = $data_feednrun['PIS.4R2_FEED']['rundays'];
$sp_run_rm51 = $data_feednrun['PIS.5R1_FEED']['rundays'];
$sp_run_rm52 = $data_feednrun['PIS.5R2_FEED']['rundays'];
$sp_run_rmdm = $data_feednrun['TLCC.RM1']['rundays'];

$st_run_rm2 = $data_feednrun['Tonasa 2/3.RM1_TNS2_Feed']['rundays'];
$st_run_rm3 = $data_feednrun['Tonasa 2/3.RM1_TNS3_Feed']['rundays'];
$st_run_rm41 = $data_feednrun['Tonasa 4.RM1_TNS4_Feed']['rundays'];
$st_run_rm42 = $data_feednrun['Tonasa 4.RM2_TNS4_Feed']['rundays'];
$st_run_rm51 = $data_feednrun['Tonasa 5.RM_TNS5_Feed']['rundays'];

//$tlcc_run_rm1 = $data_feednrun[1141]['rundays'];

$sg_run_kl1 = $data_feednrun[3351]['rundays'];
$sg_run_kl2 = $data_feednrun[2506]['rundays'];
$sg_run_kl3 = $data_feednrun[5220]['rundays'];
$sg_run_kl4 = $data_feednrun[14390]['rundays'];

$sp_run_kl2 = $data_feednrun['N12.W1A07_09F1']['rundays'];
$sp_run_kl3 = $data_feednrun['N22.W2A07_09F1']['rundays'];
$sp_run_kl4 = $data_feednrun['PIS.4W1_FEED']['rundays'];
$sp_run_kl5 = $data_feednrun['PIS.5W1_FEED']['rundays'];

$st_run_kl2 = $data_feednrun['Tonasa 2/3.KL1_TNS2_Feed']['rundays'];
$st_run_kl3 = $data_feednrun['Tonasa 2/3.KL1_TNS3_Feed']['rundays'];
$st_run_kl4 = $data_feednrun['Tonasa 4.KL_TNS4_Feed']['rundays'];
$st_run_kl5 = $data_feednrun['Tonasa 5.KL_TNS5_Feed']['rundays'];

$tlcc_run_kl1 = $data_feednrun['TLCC.KL']['rundays'];

//=========================================Data RUN Gresik=========================================//
$show_run_sg_fm1 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm1.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm1,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fm2 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm2.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm2,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fm3 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm3.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm3,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fm4 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm4.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm4,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fm5 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm5.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm5,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fm6 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm6.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm6,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fm7 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm7.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm7,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fm8 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm8.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm8,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fm9 = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fm9.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fm9,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fma = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fma.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fma,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fmb = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fmb.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fmb,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';
$show_run_sg_fmc = '<p style="color:#4e4e4e; text-align: center;">'.$sg_string_fmc.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_fmc,0).'<sup style="font-size: 20px"> Day (s)</sup></h3>';

$show_run_sg_rm1 = '<div class="inner"><p style="color:#4e4e4e; text-align: center;">'.$sg_string_rm1.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_rm1,0).'<sup style="font-size: 20px"> Day (s)</sup></h3></div>';
$show_run_sg_rm2 = '<div class="inner"><p style="color:#4e4e4e; text-align: center;">'.$sg_string_rm2.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_rm2,0).'<sup style="font-size: 20px"> Day (s)</sup></h3></div>';
$show_run_sg_rm3 = '<div class="inner"><p style="color:#4e4e4e; text-align: center;">'.$sg_string_rm3.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_rm3,0).'<sup style="font-size: 20px"> Day (s)</sup></h3></div>';
$show_run_sg_rm4 = '<div class="inner"><p style="color:#4e4e4e; text-align: center;">'.$sg_string_rm4.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_rm4,0).'<sup style="font-size: 20px"> Day (s)</sup></h3></div>';

$show_run_sg_kl1 = '<div class="inner"><p style="color:#4e4e4e; text-align: center;">'.$sg_string_kl1.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_kl1,0).'<sup style="font-size: 20px"> Day (s)</sup></h3></div>';
$show_run_sg_kl2 = '<div class="inner"><p style="color:#4e4e4e; text-align: center;">'.$sg_string_kl2.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_kl2,0).'<sup style="font-size: 20px"> Day (s)</sup></h3></div>';
$show_run_sg_kl3 = '<div class="inner"><p style="color:#4e4e4e; text-align: center;">'.$sg_string_kl3.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_kl3,0).'<sup style="font-size: 20px"> Day (s)</sup></h3></div>';
$show_run_sg_kl4 = '<div class="inner"><p style="color:#4e4e4e; text-align: center;">'.$sg_string_kl4.'</p><h3 style="color: #3c8dbc; text-align: center;">'.number_format($sg_run_kl4,0).'<sup style="font-size: 20px"> Day (s)</sup></h3></div>';

$gresik_array = array($show_run_sg_fm1,$show_run_sg_fm2,$show_run_sg_fm3,$show_run_sg_fm4,
    $show_run_sg_fm5,$show_run_sg_fm6,$show_run_sg_fm7,$show_run_sg_fm8,
    $show_run_sg_fm9,$show_run_sg_fma,$show_run_sg_fmb,$show_run_sg_fmc
    );
//=========================================Data FEED=========================================//
?>

<div class="row">
    <div class="col-sm-3 col-xs-6  ">
        <div class="small-box " style="background-image: url(media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <p class="tittleops">Gresik Plant Operation Days</p>
            
            <div class="row">
            </div>
            <div class="col-xs-12">
			<div class="inner">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=175 scrolldelay=100>
                <?php for($i = 0; $i<= 11;$i++){
                        echo ''.$gresik_array[$i].'';
                    }?>
					</marquee>
					</div>
            </div>
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-6  ">
        <div class="small-box " style="background-image: url(media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <p class="tittleops">Padang Plant Operation Days</p>

            <div class="row">
            </div>
            <div class="col-xs-12">
              <div class="inner">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=175 scrolldelay=100>
                <?php for($i = 0; $i<= 11;$i++){
                        echo ''.$gresik_array[$i].'';
                    }?>
					</marquee>
					</div>
            </div>
            
            
            
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-6  ">
        <div class="small-box " style="background-image: url(media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <p class="tittleops">Tonasa Plant Operation Days</p>

            <div class="row">
            </div>
            <div class="col-xs-12">
                <div class="inner">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=175 scrolldelay=100>
                <?php for($i = 0; $i<= 11;$i++){
                        echo ''.$gresik_array[$i].'';
                    }?>
					</marquee>
					</div>
            </div>
            
            
            
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-6  ">
        <div class="small-box " style="background-image: url(media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <p class="tittleops">TLCC Plant Operation Days</p>

            <div class="row">
            </div>
            <div class="col-xs-12">
               <div class="inner">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=175 scrolldelay=100>
                <?php for($i = 0; $i<= 11;$i++){
                        echo ''.$gresik_array[$i].'';
                    }?>
					</marquee>
					</div>
            </div>
            
            
            
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
    </div>

<div class="row">
    <div class="col-sm-3 col-xs-6">
        <div class="small-box " style="background-image: url(media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <p class="tittleops">Gresik Plant Production Amount</p>

            <div class="row">
            </div>
            <div class="col-xs-12">
                <div class="inner">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=175 scrolldelay=100>
                <?php for($i = 0; $i<= 11;$i++){
                        echo ''.$gresik_array[$i].'';
                    }?>
					</marquee>
					</div>
            </div>
            
            
            
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="small-box " style="background-image: url(media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <p class="tittleops">Padang Plant Production Amount</p>

            <div class="row">
            </div>
            <div class="col-xs-12">
                <div class="inner">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=175 scrolldelay=100>
                <?php for($i = 0; $i<= 11;$i++){
                        echo ''.$gresik_array[$i].'';
                    }?>
					</marquee>
					</div>
            </div>
            
            
            
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="small-box " style="background-image: url(media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <p class="tittleops">Tonasa Plant Production Amount</p>

            <div class="row">
            </div>
            <div class="col-xs-12">
                <div class="inner">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=175 scrolldelay=100>
                <?php for($i = 0; $i<= 11;$i++){
                        echo ''.$gresik_array[$i].'';
                    }?>
					</marquee>
					</div>
            </div>
            
            
            
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
    <div class="col-sm-3 col-xs-6">
        <div class="small-box " style="background-image: url(media/full-pattern.png);    background-size: 15%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <p class="tittleops">TLCC Plant Production Amount</p>

            <div class="row">
            </div>
            <div class="col-xs-12">
                <div class="inner">
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" height=175 scrolldelay=100>
                <?php for($i = 0; $i<= 11;$i++){
                        echo ''.$gresik_array[$i].'';
                    }?>
					</marquee>
					</div>
            </div>
            
            
            
            <div class="inner"><p class="text-center" style="color:#4e4e4e;" ></p> 
                <h3 style="color: #d9534f;">
                    <sup style="font-size: 20px"></sup></h3>
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-6"></div>
                </div>
            </div>
            <div class="small-box-footer"></div>
        </div>
    </div>
    </div>
    
    
    
    
    
<!--<div class="col-md-12 col-xs-12">        
    <div class="box">
            <div class="box-header">
              <h3 align="center" class="box-title">Overview Information</h3>
      </div>
             /.box-header 
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody>
                  <tr>
                    <th style="width: 10px">&nbsp;</th>
                    <th colspan="3"> Finish Mill 1 (Raw Mill <span class="badge bg-green">ON</span>/ Kiln ON / Coal MIll <span class="badge bg-full-pattern">OFF</span> / Finish Mill ON / Finish Mill ON / Finish Mill ON / Finish Mill ON /) </th>
                    <th style="width: 40px">&nbsp;</th>
                  </tr>
                  <tr>
                  <th style="width: 10px">#</th>
                  <th>Stock Information</th>
                  <th>&nbsp;</th>
                  <th>Emission Information</th>
                  <th style="width: 40px">Label</th>
                </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><marquee direction="left" scrolldelay="125" onmouseover="this.stop();" onmouseout="this.start();">
 Finish Mill 1 (Silo 1 14573 T / Silo 1 14573 T / Silo 1 14573 T / Silo 1 14573 T / Silo 1 14573 T /)
                    </marquee>                      <marquee direction="left" scrolldelay="90" onmouseover="this.stop();" onmouseout="this.start();">
                    </marquee></td>
                    <td>&nbsp;</td>
                    <td><marquee direction="left" scrolldelay="110"  onmouseover="this.stop();" onmouseout="this.start();">
                    Tuban 1 (RAw mill 0,00 (in mg/Nm3) / Kiln 0,00 (in mg/Nm3)
                    </marquee></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>&nbsp;</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>                  </td>
                  <td><span class="badge bg-full-pattern">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>&nbsp;</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>&nbsp;</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>Overview Information</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="4">&nbsp;</td>
                  </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="4">&nbsp;</td>
                  </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>.</td>
                  <td colspan="4">&nbsp;</td>
                  </tr>
              </tbody></table>
      </div>
             /.box-body 
          </div>
        
        
    </div>-->
    
    
    
<!--<div class="col-md-12 col-xs-12">
                  <p class="text-center">
                    <strong>Tuban Overview</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Raw Mill (/Days)</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                   /.progress-group 
                  <div class="progress-group">
                    <span class="progress-text">Kiln (/Days)</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-full-pattern" style="width: 80%"></div>
                    </div>
                  </div>
                   /.progress-group 
                  <div class="progress-group">
                    <span class="progress-text">Coal Mill (/Days)</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                   /.progress-group 
                  <div class="progress-group">
                    <span class="progress-text">Finish Mill (/Days)</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress progress-sm active">
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                  <span class="sr-only">20% Complete</span>
                </div>
              </div>
                  </div>
                   /.progress-group 
                </div>-->


<div class="row">

</div>



