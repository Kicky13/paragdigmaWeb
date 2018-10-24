<div class="col-md-12 col-xs-12 col-lg-12" style="padding: 0px; height: 250px">
    <div class="col-md-12 col-xs-12" style="height:29px; margin-bottom:34px;padding: 0px;">
        <div class="small-box " style="background-image: url(media/full-pattern.png); background-size: 40%; background-repeat: repeat-y; background-color: #f9f9f9; color: #4e4e4e;  border: 1px #e4e4e4 solid; margin-bottom: 5px;">
            <div class="row">
                <div class="col-md-1 col-xs-1" style="padding-left: 20px; padding-right: 0px; text-align: center" ><img src="media/icKota1.png" class="img-logos"></div>
                <div class="col-md-11 col-xs-1" style="padding-left: 1px;">
                    <p class="tittle-logos" style="font-size: 35px; font-weight: bold; font-family: Segoe UI; margin-bottom: 2px">SEMEN GRESIK</p>
                    <p style="margin: 1px; padding: 1px;">Create, Update, Delete or doing something with your data of Prodcution, RKAP, Prognose, Capacity, Kiln Operation etc.</p>
                </div>
            </div>
        </div>			
    </div>
    <!--------------------------KONTEN PRODUKSI--------------------------------->
    <a href="<?php echo base_url(); ?>index.php/master_data/gresik?bulan=<?php echo date('m');?>&tahun=<?php echo date('Y');?>">
        <div class="col-md-2 col-xs-4" style="height:29px; padding: 10px; margin-top: 20px">
            <div class="info-box" style="background: #666; color:#FFFFFF; text-align: center">
                <img style="padding-top: 5px" class="scale" src="media/icon/factor2.png" width="64px"  alt="...">
                <div class="info-box-text" style="font-size:15px;">PRODUCTION DATA</div>
            </div>
        </div>
    </a>
    <!--------------------------KONTEN STOCK--------------------------------->
    <a href="<?php echo base_url(); ?>index.php/master_data/stock_rembang">
        <div class="col-md-2 col-xs-4" style="height:29px; padding: 10px; margin-top: 20px">
            <div class="info-box" style="background: #666; color:#FFFFFF; text-align: center">
                <img style="padding-top: 5px" class="scale" src="media/icon/stock.png" width="64px"  alt="...">
                <div class="info-box-text" style="font-size:15px;">STOCK DATA</div>
            </div>
        </div>
    </a>
    <!--------------------------KONTEN PROGNOSE --------------------------------->
    <a href="<?php echo base_url(); ?>index.php/master_data/prognose_opco/2">
        <div class="col-md-2 col-xs-4" style="height:29px; padding: 10px; margin-top: 20px">
            <div class="info-box" style="background: #666; color:#FFFFFF; text-align: center">
                <img style="padding-top: 5px" class="scale" src="media/icon/m_prognose.png" width="64px"  alt="...">
                <div class="info-box-text" style="font-size:15px;">PROGNOSE DATA</div>
            </div>
        </div>
    </a>
    <!--------------------------KONTEN CAPACITY --------------------------------->
    <a href="<?php echo base_url(); ?>index.php/master_data/capacity/2?plant=1&tahun=<?php echo date('Y');?>">
        <div class="col-md-2 col-xs-4" style="height:29px; padding: 10px; margin-top: 20px">
            <div class="info-box" style="background: #666; color:#FFFFFF; text-align: center">
                <img style="padding-top: 5px" class="scale" src="media/icon/m_capacity.png" width="64px"  alt="...">
                <div class="info-box-text" style="font-size:15px;">CAPACITY DATA</div>
            </div>
        </div>
    </a>
    <!--------------------------KONTEN RKAP TOTAL --------------------------------->
    <a href="<?php echo base_url(); ?>index.php/master_data/rkap_total/2?tahun=<?php echo date('Y');?>">
        <div class="col-md-2 col-xs-4" style="height:29px; padding: 10px; margin-top: 20px">
            <div class="info-box" style="background: #666; color:#FFFFFF; text-align: center">
                <img style="padding-top: 5px" class="scale" src="media/icon/m_rkap.png" width="64px"  alt="...">
                <div class="info-box-text" style="font-size:15px;">RKAP DATA (OPCO)</div>
            </div>
        </div>
    </a>
    <!--------------------------KONTEN RKAP PLANT --------------------------------->
    <a href="<?php echo base_url(); ?>index.php/master_data/rkap_plant/2?plant=1&tahun=<?php echo date('Y');?>">
        <div class="col-md-2 col-xs-4" style="height:29px; padding: 10px; margin-top: 20px">
            <div class="info-box" style="background: #666; color:#FFFFFF; text-align: center">
                <img style="padding-top: 5px" class="scale" src="media/icon/m_rkapplant.png" width="64px"  alt="...">
                <div class="info-box-text" style="font-size:15px;">RKAP DATA (PER PLANT)</div>
            </div>
        </div>
    </a>
    <!--------------------------KONTEN KILN OPS --------------------------------->
<!--    <a href="<?php echo base_url(); ?>index.php/master_data/kiln_sg/2">
        <div class="col-md-2 col-xs-4" style="height:29px; padding: 10px; margin-top: 20px">
            <div class="info-box" style="background: #666; color:#FFFFFF; text-align: center">
                <img style="padding-top: 5px" class="scale" src="media/icon/m_kilnops.png" width="64px"  alt="...">
                <div class="info-box-text" style="font-size:15px;">KILN OPERATIONS</div>
            </div>
        </div>
    </a>-->
</div>
<div style="margin-bottom: 10px">This button used to run job manually. The Job is to obtain Production Confirmation data from SAP, you can compare with T-Code "<b>COOIS</b>"</div>
<div class="col-md-12 col-xs-12 col-lg-12">
    <div class="col-xs-6 col-md-6 col-lg-6">
        <div style="text-align: center">
            <a href="plant_system/data_sap_sg" target="_blank"><button class="btn btn-info center">Update Data from SAP</button></a>
        </div>
    </div>
    <div class="col-xs-6 col-md-6 col-lg-6">
        <div style="text-align: center">
        <a href="plant_administrator/mass_upload_rembang" ><button class="btn btn-warning center">Excel Mass Upload</button></a>
    </div>
    <div align="center" style="margin-bottom: 10px">This button used to upload data with Excel files</div>
    </div>
</div>