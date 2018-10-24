<?php $current_url =  $this->router->fetch_class();?>
<?php 
$sub = $this->router->fetch_method();
if(isset($sub) && !empty($sub)){
$current_url .= "/".$sub;
?>
<?php }?>
<?php 
$sub2 = $this->uri->segment(3);
if(isset($sub2) && !empty($sub2)){
$current_url .= "/".$sub2;
?>
<?php }?>
<?php 
$sub3 = $this->uri->segment(4);
if(isset($sub3) && !empty($sub3)){
$current_url .= "/".$sub3;
?>
<?php }?>
<script src="assets/js/stok_bahan.js"></script>
<script src="assets/js/accounting.min.js"></script>
<section id="content">	
	<div class="centering add_fix">
		<div class="col-md-12 mtr_box" style="background:#fff;padding-bottom:10px;margin-top: 10px;padding-right:10px;">
            <div class="opcobox" id="opco7000">
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/7000/1700')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/7000/1700')" >
                    <div class="col-xs-12 box" id="ar_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">AFR</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="ar_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="ar_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="ar_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo ($current_url=='stock/index/7000/1600')? "active" : "" ;?>" style="padding: 4px"
                        onclick="changepage('stock/index/7000/1600')"> <!--//1600-->
                    <div class="col-xs-12 box " id="bb_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Coal</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="bb_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="bb_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="bb_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="bb_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo ($current_url=='stock/index/7000/1100')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/7000/1100')" >
                    <div class="col-xs-12 box " id="cp_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Copper Slag</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="cp_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="cp_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="cp_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="cp_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo ($current_url=='stock/index/7000/2700')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/7000/2700')" >
                    <div class="col-xs-12 box " id="gn_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Gypsum Natural</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="gn_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="gn_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="gn_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="gn_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo ($current_url=='stock/index/7000/1300')? "active" : "" ;?>" style="padding: 4px"
                       onclick="changepage('stock/index/7000/1300')" >
                    <div class="col-xs-12 box " id="gtj_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style=" font-size: 16px;">Gypsum OPC</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="gtj_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="gtj_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="gtj_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="gtj_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo ($current_url=='stock/index/7000/1400')? "active" : "" ;?>" style="padding: 4px"
                       onclick="changepage('stock/index/7000/1400')" >
                    <div class="col-xs-12 box " id="gpg_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Gypsum PPC</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="gpg_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="gpg_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="gpg_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="gpg_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo ($current_url=='stock/index/7000/1500')? "active" : "" ;?>" style="padding: 4px"
                       onclick="changepage('stock/index/7000/1500')" >
                    <div class="col-xs-12 box " id="id_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">I.D.O</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="id_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="id_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="id_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="id_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo ($current_url=='stock/index/7000/1200')? "active" : "" ;?>" style="padding: 4px"
                       onclick="changepage('stock/index/7000/1200')" >
                    <div class="col-xs-12 box " id="sl_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Silica Sand</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="sl_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="sl_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="sl_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="sl_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo ($current_url=='stock/index/7000/1000')? "active" : "" ;?>" style="padding: 4px"
                       onclick="changepage('stock/index/7000/1000')" >
                    <div class="col-xs-12 box " id="bt_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Trass</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="bt_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="bt_stok">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="bt_min">0</td>
    	                                </tr>
    	                                <tr rel="asset" class="f19">
    	                                    <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="bt_max">0</td>
    	                                </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="opcobox" id="opco3000">
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/3000/1600')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/3000/1600')" >
                    <div class="col-xs-12 box" id="bb_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Coal</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="bb_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="bb_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="bb_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/3000/2400')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/3000/2400')" >
                    <div class="col-xs-12 box" id="cy_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">CLAY</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="cy_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="cy_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="cy_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/3000/1100')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/3000/1100')" >
                    <div class="col-xs-12 box" id="cp_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Copper Slag</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="cp_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="cp_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="cp_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/3000/1800')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/3000/1800')" >
                    <div class="col-xs-12 box" id="fa_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Flay Ash</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="fa_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="fa_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="fa_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/3000/2200')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/3000/2200')" >
                    <div class="col-xs-12 box" id="gy_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Gypsum</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="gy_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="gy_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="gy_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/3000/2300')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/3000/2300')" >
                    <div class="col-xs-12 box" id="pz_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Pozzolan Sand</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="pz_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="pz_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="pz_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/3000/2100')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/3000/2100')" >
                    <div class="col-xs-12 box" id="sr_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Solar</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="sr_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="sr_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="sr_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="opcobox" id="opco4000">
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/4000/1600')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/4000/1600')" >
                    <div class="col-xs-12 box" id="bb_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Coal</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="bb_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="bb_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="bb_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/4000/2600')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/4000/2600')" >
                    <div class="col-xs-12 box" id="bco_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">BCO T.2/3</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="bco_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="bco_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="bco_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/4000/1100')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/4000/1100')" >
                    <div class="col-xs-12 box" id="cp_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Copper Slag</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="cp_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="cp_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="cp_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/4000/2200')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/4000/2200')" >
                    <div class="col-xs-12 box" id="gy_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Gypsum</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="gy_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="gy_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="gy_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/4000/1200')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/4000/1200')" >
                    <div class="col-xs-12 box" id="sl_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Silica Sand</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="sl_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="sl_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="sl_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/4000/2100')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/4000/2100')" >
                    <div class="col-xs-12 box" id="sr_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Solar</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="sr_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="sr_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="sr_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bagan <?php echo (strtolower($current_url)=='stock/index/4000/1000')? "active" : "" ;?>" style="padding: 4px" onclick="changepage('stock/index/4000/1000')" >
                    <div class="col-xs-12 box" id="bt_sd">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undertx" id="headcol_sg" style="    font-size: 16px;">Trass</span>
                            <i class="fa fa-chevron-right right grp_ico" aria-hidden="true" id="ar_bt"></i>
                        </div>
                        <div style="margin-bottom:0px;">
                            <div id="container" style="width: 100%; margin: 0 auto; padding: 2%;">
                                <table class="table" style="margin-bottom: 0px; padding-bottom: 100px;">
                                    <tbody>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Stock</td><td valign="middle" align="right" id="bt_stok">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Min</td><td valign="middle" align="right" id="bt_min">0</td>
                                        </tr>
                                        <tr rel="asset" class="f19">
                                            <td valign="middle" align="left">Max</td><td valign="middle" align="right" id="bt_max">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12" align="center" style="margin-bottom: 12px;margin-top: 3px;">
                        <i class="fa fa-circle" aria-hidden="true" style="color: #6fc962"></i>&nbsp;:&nbsp;Stok Save
                        &nbsp;&nbsp;<i class="fa fa-circle" aria-hidden="true" style="color: #f64747"></i>&nbsp;:&nbsp;Under
                        Min
                        &nbsp;&nbsp;<i class="fa fa-circle" aria-hidden="true" style="color: #636363"></i>&nbsp;:&nbsp;Over Max
                        &nbsp;&nbsp;&nbsp;
            </div>
            <div class="col-xs-12 highlight dtl_box" style="padding:0; margin:2px 5px 0 5px;width:99%;overflow:hidden;">
                <div class="col-xs-12 ttl nopadding" align="center" style="padding:8px 0;margin:0px 0 15px 0;font-size:20px;font-weight: bold;border-bottom:1px solid #f3f3f3;">
                    AFR
                </div>
                <div class="col-xs-6" style="margin: 3px 0px 15px 0px; padding-right:2.5px" align="left">
                    <div class="col-xs-12 nopadding">
                        <i class="fa fa-bar-chart" aria-hidden="true" style="font-size: 16px;  color: #e54b37;font-weight: bold;"></i>
                        <span style="color: #4d4d4d;font-size: 16px;"> &nbsp; Penerimaan Dan Pemakaian</span>
                    </div> 
                    <div id="trialchart" style="width:100%; height: 50vh;position:relative;left:-10px;padding-top:20px;"></div>
                </div> 
                <div class="col-xs-6" style="margin: 3px 0px 15px 0px;display:inline-block; padding-left:2.5px" align="left">
                    <div class="col-xs-12 nopadding">
                        <i class="fa fa-bar-chart" aria-hidden="true" style="    font-size: 16px;  color: #e54b37;font-weight: bold;"></i>
                        <span style="color: #4d4d4d;font-size: 16px;"> &nbsp; Min & Max Stock</span>
                    </div>
                    <div id="trialchartmm" style="width:100%; height: 50vh; position:relative;left:-10px;padding-top:20px;"></div> 
                </div>
                <div class="bagan2" style="padding: 4px">
                    <div class="col-xs-12 box hght">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undln f8" id="headcol_sg">Usage Avg (7 days)</span>
                        </div>
                        <div style="margin-bottom:12px;">
                        <!--<span class="inex fblack" id="ar_ua">0</span>-->
    					<span class="inex fblack" id="usage_stock">-</span>
                        </div>
                    </div>
                </div>
                <div class="bagan2" style="padding: 4px">
                    <div class="col-xs-12 box hght">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undln f8" id="headcol_sg">Sisa PO</span>
                        </div>
                        <div style="margin-bottom:12px;">
                        <span class="inex fblack">0</span>
                        </div>
                    </div>
                </div>
                <div class="bagan2" style="padding: 4px">
                    <div class="col-xs-12 box hght">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undln f8" id="headcol_sg">Days of Inventory</span>
                        </div>
                        <div style="margin-bottom:12px;">
                        <span class="inex fblack" id="ar_din">0</span>
    					
                        </div>
                    </div>
                </div>
                <div class="bagan2" style="padding: 4px">
                    <div class="col-xs-12 box hght">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undln f8" id="headcol_sg">Real Reci Upto</span>
                        </div>
                        <div style="margin-bottom:12px;">
                        <span class="inex fblack" id="ar_real_rc">0</span>
                        </div>
                    </div>
                </div>
                <div class="bagan2" style="padding: 4px">
                    <div class="col-xs-12 box hght">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undln f8" id="headcol_sg">Real Usage Upto</span>
                        </div>
                        <div style="margin-bottom:12px;">
                        <span class="inex fblack" id="ar_real_us">0</span>
                        </div>
                    </div>
                </div>
                <div class="bagan2" style="padding: 4px">
                    <div class="col-xs-12 box hght">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undln f8" id="headcol_sg">RKAP Usage</span>
                        </div>
                        <div style="margin-bottom:12px;">
                        <span class="inex fblack" id="ar_rkap_us">0</span>
                        </div>
                    </div>
                </div>
                <div class="bagan2" style="padding: 4px">
                    <div class="col-xs-12 box hght">
                        <div class="col-xs-12 noPadding titl" style="padding-top: 10px;">
                            <span class="undln f8" id="headcol_sg">Prognose Usage</span>
                        </div>
                        <div style="margin-bottom:12px;">
                            <span class="inex fblack" id="ar_prog">0</span>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section><!--/#content -->
<script type="text/javascript">
    $(function () {
        var d = new Date();
        var tahun = d.getFullYear();
        var month = d.getMonth();
        var yearnow = tahun;
        var bulanSekarang = month+1;
        var opco = "<?php echo $opco ?>";
        var kodemat = "<?php echo $kodemat ?>";

        var plant;
        var itm;
        if(opco=='3000'){
            plant = '3301';
            itm=7;
            $('#opco4000').remove();
            $('#opco7000').remove();
        }else if(opco=='4000'){
            plant = '4401';
            itm=7;
            $('#opco3000').remove();
            $('#opco7000').remove();
        }else{
            plant = '7403';
            itm=9;
            $('#opco4000').remove();
            $('#opco3000').remove();
        }

        $('.bagan').width(($('.mtr_box').width()/itm)-11);
        $('.bagan2').width(($('.dtl_box').width()/7)-.5);

        var namemat;
        if (kodemat == '1700') {
            namemat = 'AFR'
        }
        if (kodemat == '1100') {
            namemat = 'Copper Slag'
        }
        if (kodemat == '1600') {
            namemat = 'Coal'
        }
        if (kodemat == '1200') {
            namemat = 'Silica Sand'
        }
        if (kodemat == '1300') {
            namemat = 'Gypsum OPC'
        }
        if (kodemat == '1400') {
            namemat = 'Gypsum PPC'
        }
        if (kodemat == '1800') {
            namemat = 'Flay Ash'
        }
        if (kodemat == '1500') {
            namemat = 'I.D.O'
        }
        if (kodemat == '1000') {
            namemat = 'Trass'
        }
        if (kodemat == '2700') {
            namemat = 'Gypsum Natural'
        }
        if (kodemat == '2400') {
            namemat = 'Clay'
        }
        if (kodemat == '2100') {
            namemat = 'Solar'
        }
        if (kodemat == '2300') {
            namemat = 'Pozzolan Sand'
        }
        if (kodemat == '2600') {
            namemat = 'BCO T.2/3'
        }
        if (kodemat == '2200') {
            namemat = 'Gypsum'
        }
        $('.ttl').html(namemat);
        bahan_data(bulanSekarang, opco, yearnow, plant, kodemat);
        bahan_data_detail(bulanSekarang, opco, tahun, kodemat, plant);

    })
</script>
<style>
	.bagan{display:inline-block;margin-right:-2px;box-sizing:border-box;padding:0 5px 5px 5px !important;margin-top:10px;opacity:.5;cursor: pointer;-webkit-transition: all .3s ease; -moz-transition: all .3s ease; -ms-transition: all .3s ease; -o-transition: all .3s ease; transition: all .3s ease;}
    .bagan2{display:inline-block;margin-right:-2px;box-sizing:border-box;padding:0 !important;padding-bottom:-3px !important;text-align: center;margin-bottom:-3px;border-top:1px solid #f3f3f3;}
	.bagan2 .titl+div{font-size:20px;font-weight:bold;}
	.bagan tr td:last-child{font-weight: bold;}
	.bagan #container{padding:0 !important;}
    .bagan .box{padding:0 !important; margin-bottom: 0;border:0;overflow: hidden;}
	.bagan2 .box{padding:0 !important; margin-bottom: 0;border:0;overflow: hidden;border-radius:0;}
    .bagan.active, .bagan:hover{opacity:1;}
    .bagan.active .box{opacity:1;-webkit-box-shadow: 1px 1px 15px #999;
-moz-box-shadow: 1px 1px 15px #999;
box-shadow: 1px 1px 15px #999;}
	.bagan .titl{padding:3px 10px 5px 10px !important;color:#fff;font-weight: bold;background:#ed2d34;text-align: center;}
	.bagan i{float:right;position:relative;top:5px;font-weight: normal;display:none;}
	.bagan th{text-align:center;color:#949494;}
	.bagan th strong{font-weight: normal;}
	.highcharts-legend-item tspan{font-size:16px;font-weight:normal;}
	.highcharts-tooltip .total-legend{display:none;}
	.redmm .titl{background:#ed2d34;}
	.ylmm .titl{background:#f9bf3b;}
	.grmm .titl{background:#6fc962;}
	.blmm .titl{background:#636363;}
    .hght{background:#f7f7f7;}
</style>
<script type="text/javascript" src="assets/js/modernizr-2.7.1.custom.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>