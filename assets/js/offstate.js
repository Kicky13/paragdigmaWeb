var url_src = "http://par4digma.semenindonesia.com";
function dataUpdate() {
    $.ajax({
        url: url_src + '/api/index.php/plant_rembang/get_statefeed',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");
            var dataJson = JSON.parse(data3);

            var o_rmb_rm1, o_rmb_cm1, o_rmb_kl1, o_rmb_fm1, o_rmb_fm2;

            //Raw Mill
            rmb_rm1 = dataJson[0].tags[1].props[0].val;
            q_rmb_rm1 = dataJson[0].tags[1].props[0].quality === 'undefined' ? false : dataJson[0].tags[1].props[0].quality;
            //Coal Mill
            rmb_cm1 = dataJson[0].tags[3].props[0].val;
            q_rmb_cm1 = dataJson[0].tags[3].props[0].quality === 'undefined' ? false : dataJson[0].tags[3].props[0].quality;
            //KILN
            rmb_kl1 = dataJson[0].tags[5].props[0].val;
            q_rmb_kl1 = dataJson[0].tags[5].props[0].quality === 'undefined' ? false : dataJson[0].tags[5].props[0].quality;
            //Finish Mill
            rmb_fm1 = dataJson[0].tags[7].props[0].val;
            q_rmb_fm1 = dataJson[0].tags[7].props[0].quality === 'undefined' ? false : dataJson[0].tags[7].props[0].quality;
            
            rmb_fm2 = dataJson[0].tags[9].props[0].val;
            q_rmb_fm2 = dataJson[0].tags[9].props[0].quality === 'undefined' ? false : dataJson[0].tags[9].props[0].quality;

            if (rmb_rm1 !== 'True' && q_rmb_rm1 === true) {
                o_rmb_rm1 = '<div class="col-xs-12 noPadding" id="rmb_rm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">RMB</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_rembang').find('#rmb_rm1').length === 0) {
                    $('#data_off_rembang').append(o_rmb_rm1);
                }
            } else {
                $('#rmb_rm1').remove();
            }

            if (rmb_cm1 !== 'True' && q_rmb_cm1 === true) {
                o_rmb_cm1 = '<div class="col-xs-12 noPadding" id="rmb_cm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">RMB</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_rembang').find('#rmb_cm1').length === 0) {
                    $('#data_off_rembang').append(o_rmb_cm1);
                }
            } else {
                $('#rmb_cm1').remove();
            }

            if (rmb_kl1 !== 'True' && q_rmb_kl1 === true) {
                o_rmb_kl1 = '<div class="col-xs-12 noPadding" id="rmb_kl1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">RMB</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Kiln</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
               if ($('#data_off_rembang').find('#rmb_kl1').length === 0) {
                    $('#data_off_rembang').append(o_rmb_kl1);
                }
            } else {
                $('#rmb_kl1').remove();
            }

            if (rmb_fm1 !== 'True' && q_rmb_fm1 === true) {
                o_rmb_fm1 = '<div class="col-xs-12 noPadding" id="rmb_fm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">RMB</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
               if ($('#data_off_rembang').find('#rmb_fm1').length === 0) {
                    $('#data_off_rembang').append(o_rmb_fm1);
                }
            } else {
                $('#rmb_fm1').remove();
            }

            if (rmb_fm2 !== 'True' && q_rmb_fm2 === true) {
                o_rmb_fm2 = '<div class="col-xs-12 noPadding" id="rmb_fm2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">RMB</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
               if ($('#data_off_rembang').find('#rmb_fm2').length === 0) {
                    $('#data_off_rembang').append(o_rmb_fm2);
                }
            } else {
                $('#rmb_fm2').remove();
            }
        }
    }).done(function (data) {}).fail(function () {
    });

    $.ajax({
        url: url_src + '/api/index.php/plant_tlcc/get_statefeed',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");
            var dataJson = JSON.parse(data3);

            var o_tlcc_rm1, o_tlcc_cm1, o_tlcc_kl1, o_tlcc_fm1, o_tlcc_fm2;

            //Raw Mill
            tlcc_rm1 = dataJson[0].tags[5].props[0].val;
            q_tlcc_rm1 = dataJson[0].tags[5].props[0].quality === 'undefined' ? false : dataJson[0].tags[5].props[0].quality;
            //Coal Mill
            tlcc_cm1 = dataJson[0].tags[6].props[0].val;
            q_tlcc_cm1 = dataJson[0].tags[6].props[0].quality === 'undefined' ? false : dataJson[0].tags[6].props[0].quality;
            //KILN
            tlcc_kl1 = dataJson[0].tags[7].props[0].val;
            q_tlcc_kl1 = dataJson[0].tags[7].props[0].quality === 'undefined' ? false : dataJson[0].tags[7].props[0].quality;
            //Finish Mill
            tlcc_fm1 = dataJson[0].tags[8].props[0].val;
            q_tlcc_fm1 = dataJson[0].tags[8].props[0].quality === 'undefined' ? false : dataJson[0].tags[8].props[0].quality;
            
            tlcc_fm2 = dataJson[0].tags[9].props[0].val;
            q_tlcc_fm2 = dataJson[0].tags[9].props[0].quality === 'undefined' ? false : dataJson[0].tags[9].props[0].quality;

            if (tlcc_rm1 !== 'True' && q_tlcc_rm1 === true) {
                o_tlcc_rm1 = '<div class="col-xs-12 noPadding" id="tlcc_rm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">MP</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tlcc').find('#tlcc_rm1').length === 0) {
                    $('#data_off_tlcc').append(o_tlcc_rm1);
                }
            } else {
                $('#tlcc_rm1').remove();
            }

            if (tlcc_cm1 !== 'True' && q_tlcc_cm1 === true) {
                o_tlcc_cm1 = '<div class="col-xs-12 noPadding" id="tlcc_cm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">MP</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tlcc').find('#tlcc_cm1').length === 0) {
                    $('#data_off_tlcc').append(o_tlcc_cm1);
                }
            } else {
                $('#tlcc_cm1').remove();
            }

            if (tlcc_kl1 !== 'True' && q_tlcc_kl1 === true) {
                o_tlcc_kl1 = '<div class="col-xs-12 noPadding" id="tlcc_kl1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">MP</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tlcc').find('#tlcc_kl1').length === 0) {
                    $('#data_off_tlcc').append(o_tlcc_kl1);
                }
            } else {
                $('#tlcc_kl1').remove();
            }

            if (tlcc_fm1 !== 'True' && q_tlcc_fm1 === true) {
                o_tlcc_fm1 = '<div class="col-xs-12 noPadding" id="tlcc_fm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">MP</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill MP</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tlcc').find('#tlcc_fm1').length === 0) {
                    $('#data_off_tlcc').append(o_tlcc_fm1);
                }
            } else {
                $('#tlcc_fm1').remove();
            }

            if (tlcc_fm2 !== 'True' && q_tlcc_fm2 === true) {
                o_tlcc_fm2 = '<div class="col-xs-12 noPadding" id="tlcc_fm2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">MP</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill HCM</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tlcc').find('#tlcc_fm2').length === 0) {
                    $('#data_off_tlcc').append(o_tlcc_fm2);
                }
            } else {
                $('#tlcc_fm2').remove();
            }
        }
    }).done(function (data) {}).fail(function () {
    });

    $.ajax({
        url: url_src + '/api/index.php/plant_tonasa/get_statefeed',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");
            var dataJson = JSON.parse(data3);

            //TONASA 2/3
            var data_tns23 = [];

            ocm1tns2 = dataJson[0].tags[0].props[0].val;
            ocm1tns3 = dataJson[0].tags[1].props[0].val;
            ofm1tns2 = dataJson[0].tags[2].props[0].val;
            ofm1tns3 = dataJson[0].tags[3].props[0].val;
            okl1tns2 = dataJson[0].tags[4].props[0].val;
            okl1tns3 = dataJson[0].tags[5].props[0].val;
            orm1tns2 = dataJson[0].tags[6].props[0].val;
            orm1tns3 = dataJson[0].tags[7].props[0].val;
            
            q_ocm1tns2 = dataJson[0].tags[0].props[0].quality === 'undefined' ? false : dataJson[0].tags[0].props[0].quality;
            q_ocm1tns3 = dataJson[0].tags[1].props[0].quality === 'undefined' ? false : dataJson[0].tags[1].props[0].quality;
            q_ofm1tns2 = dataJson[0].tags[2].props[0].quality === 'undefined' ? false : dataJson[0].tags[2].props[0].quality;
            q_ofm1tns3 = dataJson[0].tags[3].props[0].quality === 'undefined' ? false : dataJson[0].tags[3].props[0].quality;
            q_okl1tns2 = dataJson[0].tags[4].props[0].quality === 'undefined' ? false : dataJson[0].tags[4].props[0].quality;
            q_okl1tns3 = dataJson[0].tags[5].props[0].quality === 'undefined' ? false : dataJson[0].tags[5].props[0].quality;
            q_orm1tns2 = dataJson[0].tags[6].props[0].quality === 'undefined' ? false : dataJson[0].tags[6].props[0].quality;
            q_orm1tns3 = dataJson[0].tags[7].props[0].quality === 'undefined' ? false : dataJson[0].tags[7].props[0].quality;

            var o_cm1tns2, o_cm1tns3, o_fm1tns2, o_fm1tns3, o_kl1tns2, o_kl1tns3, o_rm1tns2, o_rm1tns3;

            //Raw Mill
            if (orm1tns2 !== 'True' && q_orm1tns2 === true) {
                o_rm1tns2 = '<div class="col-xs-12 noPadding" id="orm1tns2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#orm1tns2').length === 0) {
                    $('#data_off_tonasa').append(o_rm1tns2);
                }
            } else {
                $('#orm1tns2').remove();
            }
            if (orm1tns3 !== 'True' && q_orm1tns3 === true) {
                o_rm1tns3 = '<div class="col-xs-12 noPadding" id="orm1tns3"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#orm1tns3').length === 0) {
                    $('#data_off_tonasa').append(o_rm1tns3);
                }
            } else {
                $('#orm1tns3').remove();
            }
            //Coal Mill
            if (ocm1tns2 !== 'True' && q_ocm1tns2 === true) {
                o_cm1tns2 = '<div class="col-xs-12 noPadding" id="ocm1tns2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ocm1tns2').length === 0) {
                    $('#data_off_tonasa').append(o_cm1tns2);
                }
            } else {
                $('#ocm1tns2').remove();
            }
            if (ocm1tns3 !== 'True' && q_ocm1tns3 === true) {
                o_cm1tns3 = '<div class="col-xs-12 noPadding" id="ocm1tns3"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ocm1tns3').length === 0) {
                    $('#data_off_tonasa').append(o_cm1tns3);
                }
            } else {
                $('#ocm1tns3').remove();
            }
            //Kiln
            if (okl1tns2 !== 'True' && q_okl1tns2 === true) {
                o_kl1tns2 = '<div class="col-xs-12 noPadding" id="okl1tns2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#okl1tns2').length === 0) {
                    $('#data_off_tonasa').append(o_kl1tns2);
                }
            } else {
                $('#okl1tns2').remove();
            }
            if (okl1tns3 !== 'True' && q_okl1tns3 === true) {
                o_kl1tns3 = '<div class="col-xs-12 noPadding" id="okl1tns3"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#okl1tns3').length === 0) {
                    $('#data_off_tonasa').append(o_kl1tns3);
                }
            } else {
                $('#okl1tns3').remove();
            }
            //Finish Mill
            if (ofm1tns2 !== 'True' && q_ofm1tns2 === true) {
                o_fm1tns2 = '<div class="col-xs-12 noPadding" id="ofm1tns2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ofm1tns2').length === 0) {
                    $('#data_off_tonasa').append(o_fm1tns2);
                }
            } else {
                $('#ofm1tns2').remove();
            }
            if (ofm1tns3 !== 'True' && q_ofm1tns3 === true) {
                o_fm1tns3 = '<div class="col-xs-12 noPadding" id="ofm1tns3"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ofm1tns3').length === 0) {
                    $('#data_off_tonasa').append(o_fm1tns3);
                }
            } else {
                $('#ofm1tns3').remove();
            }

            //TONASA 4
            ocm1tns4 = dataJson[0].tags[25].props[0].val;
            ocm2tns4 = dataJson[0].tags[26].props[0].val;
            orm1tns4 = dataJson[0].tags[30].props[0].val;
            orm2tns4 = dataJson[0].tags[31].props[0].val;
            ofm1tns4 = dataJson[0].tags[27].props[0].val;
            ofm2tns4 = dataJson[0].tags[28].props[0].val;
            okl1tns4 = dataJson[0].tags[29].props[0].val;
            
            q_ocm1tns4 = dataJson[0].tags[25].props[0].quality === 'undefined' ? false : dataJson[0].tags[25].props[0].quality;
            q_ocm2tns4 = dataJson[0].tags[26].props[0].quality === 'undefined' ? false : dataJson[0].tags[26].props[0].quality;
            q_orm1tns4 = dataJson[0].tags[30].props[0].quality === 'undefined' ? false : dataJson[0].tags[30].props[0].quality;
            q_orm2tns4 = dataJson[0].tags[31].props[0].quality === 'undefined' ? false : dataJson[0].tags[31].props[0].quality;
            q_ofm1tns4 = dataJson[0].tags[27].props[0].quality === 'undefined' ? false : dataJson[0].tags[27].props[0].quality;
            q_ofm2tns4 = dataJson[0].tags[28].props[0].quality === 'undefined' ? false : dataJson[0].tags[28].props[0].quality;
            q_okl1tns4 = dataJson[0].tags[29].props[0].quality === 'undefined' ? false : dataJson[0].tags[29].props[0].quality;

            var o_cm1tns4, o_cm2tns4, o_rm1tns4, o_rm2tns4, o_fm1tns4, o_fm2tns4, o_kl1tns4;

            if (orm1tns4 !== 'True' && q_orm1tns4 === true) {
                o_rm1tns4 = '<div class="col-xs-12 noPadding" id="orm1tns4"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#orm1tns4').length === 0) {
                    $('#data_off_tonasa').append(o_rm1tns4);
                }
            } else {
                $('#orm1tns4').remove();
            }
            if (orm2tns4 !== 'True' && q_orm2tns4 === true) {
                o_rm2tns4 = '<div class="col-xs-12 noPadding" id="orm2tns4"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#orm2tns4').length === 0) {
                    $('#data_off_tonasa').append(o_rm2tns4);
                }
            } else {
                $('#orm2tns4').remove();
            }
            if (ocm1tns4 !== 'True' && q_ocm1tns4 === true) {
                o_cm1tns4 = '<div class="col-xs-12 noPadding" id="ocm1tns4"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ocm1tns4').length === 0) {
                    $('#data_off_tonasa').append(o_cm1tns4);
                }
            } else {
                $('#ocm1tns4').remove();
            }
            if (ocm2tns4 !== 'True' && q_ocm2tns4 === true) {
                o_cm2tns4 = '<div class="col-xs-12 noPadding" id="ocm2tns4"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ocm2tns4').length === 0) {
                    $('#data_off_tonasa').append(o_cm2tns4);
                }
            } else {
                $('#ocm2tns4').remove();
            }
            if (okl1tns4 !== 'True' && q_okl1tns4 === true) {
                o_kl1tns4 = '<div class="col-xs-12 noPadding" id="okl1tns4"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#okl1tns4').length === 0) {
                    $('#data_off_tonasa').append(o_kl1tns4);
                }
            } else {
                $('#okl1tns4').remove();
            }
            if (ofm1tns4 !== 'True' && q_ofm1tns4 === true) {
                o_fm1tns4 = '<div class="col-xs-12 noPadding" id="ofm1tns4"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ofm1tns4').length === 0) {
                    $('#data_off_tonasa').append(o_fm1tns4);
                }
            } else {
                $('#ofm1tns4').remove();
            }
            if (ofm2tns4 !== 'True' && q_ofm2tns4 === true) {
                o_fm2tns4 = '<div class="col-xs-12 noPadding" id="ofm2tns4"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ofm2tns4').length === 0) {
                    $('#data_off_tonasa').append(o_fm2tns4);
                }
            } else {
                $('#ofm2tns4').remove();
            }
            //TONASA 5
            ofm1tns5 = dataJson[0].tags[38].props[0].val;
            ofm2tns5 = dataJson[0].tags[39].props[0].val;
            ocm1tns5 = dataJson[0].tags[37].props[0].val;
            orm1tns5 = dataJson[0].tags[41].props[0].val;
            okl1tns5 = dataJson[0].tags[40].props[0].val;
            
            q_ofm1tns5 = dataJson[0].tags[38].props[0].quality === 'undefined' ? false : dataJson[0].tags[38].props[0].quality;
            q_ofm2tns5 = dataJson[0].tags[39].props[0].quality === 'undefined' ? false : dataJson[0].tags[39].props[0].quality;
            q_ocm1tns5 = dataJson[0].tags[37].props[0].quality === 'undefined' ? false : dataJson[0].tags[37].props[0].quality;
            q_orm1tns5 = dataJson[0].tags[41].props[0].quality === 'undefined' ? false : dataJson[0].tags[41].props[0].quality;
            q_okl1tns5 = dataJson[0].tags[40].props[0].quality === 'undefined' ? false : dataJson[0].tags[40].props[0].quality;

            var o_fm1tns5, o_fm2tns5, o_cm1tns5, o_rm1tns5, o_kl1tns5;

            if (orm1tns5 !== 'True' && q_orm1tns5 === true) {
                o_rm1tns5 = '<div class="col-xs-12 noPadding" id="orm1tns5"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#orm1tns5').length === 0) {
                    $('#data_off_tonasa').append(o_rm1tns5);
                }
            } else {
                $('#orm1tns5').remove();
            }
            if (ocm1tns5 !== 'True' && q_ocm1tns5 === true) {
                o_cm1tns5 = '<div class="col-xs-12 noPadding" id="ocm1tns5"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ocm1tns5').length === 0) {
                    $('#data_off_tonasa').append(o_cm1tns5);
                }
            } else {
                $('#ocm1tns5').remove();
            }
            if (okl1tns5 !== 'True' && q_okl1tns5 === true) {
                o_kl1tns5 = '<div class="col-xs-12 noPadding" id="okl1tns5"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#okl1tns5').length === 0) {
                    $('#data_off_tonasa').append(o_kl1tns5);
                }
            } else {
                $('#okl1tns5').remove();
            }
            if (ofm1tns5 !== 'True' && q_ofm1tns5 === true) {
                o_fm1tns5 = '<div class="col-xs-12 noPadding" id="ofm1tns5"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ofm1tns5').length === 0) {
                    $('#data_off_tonasa').append(o_fm1tns5);
                }
            } else {
                $('#ofm1tns5').remove();
            }
            if (ofm2tns5 !== 'True' && q_ofm2tns5 === true) {
                o_fm2tns5 = '<div class="col-xs-12 noPadding" id="ofm2tns5"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TNS5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tonasa').find('#ofm2tns5').length === 0) {
                    $('#data_off_tonasa').append(o_fm2tns5);
                }
            } else {
                $('#ofm2tns5').remove();
            }
        }
    }).done(function (data) {
    }).fail(function (data) {
    });

    $.ajax({
        url: url_src + '/api/index.php/plant_padang/get_state',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");
            var dataJson = JSON.parse(data3);

            var o_ind2_rm1, o_ind2_cm1, o_ind2_kl1, o_ind2_fm1, o_ind3_rm1, o_ind3_cm1, o_ind3_kl1, o_ind3_fm1, o_ind4_rm1, o_ind4_rm2, o_ind4_cm1
                    , o_ind4_cm2, o_ind4_kl1, o_ind4_fm1, o_ind4_fm2, o_ind5_rm1, o_ind5_rm2, o_ind5_cm1, o_ind5_kl1, o_ind5_fm1, o_ind5_fm2;

            ind2_rm1 = dataJson.values[0];
            ind3_rm1 = dataJson.values[1];
            ind4_rm1 = dataJson.values[2];
            ind4_rm2 = dataJson.values[3];
            ind5_rm1 = dataJson.values[4];
            ind5_rm2 = dataJson.values[5];
            
            q_ind2_rm1 = dataJson.qualities[0] === 'undefined' ? false : dataJson.qualities[0];
            q_ind3_rm1 = dataJson.qualities[1] === 'undefined' ? false : dataJson.qualities[1];
            q_ind4_rm1 = dataJson.qualities[2] === 'undefined' ? false : dataJson.qualities[2];
            q_ind4_rm2 = dataJson.qualities[3] === 'undefined' ? false : dataJson.qualities[3];
            q_ind5_rm1 = dataJson.qualities[4] === 'undefined' ? false : dataJson.qualities[4];
            q_ind5_rm2 = dataJson.qualities[5] === 'undefined' ? false : dataJson.qualities[5];

            ind2_cm1 = dataJson.values[10];
            ind3_cm1 = dataJson.values[11];
            ind4_cm1 = dataJson.values[12];
            ind4_cm2 = dataJson.values[13];
            ind5_cm1 = dataJson.values[14];
            
            q_ind2_cm1 = dataJson.qualities[10] === 'undefined' ? false : dataJson.qualities[10];
            q_ind3_cm1 = dataJson.qualities[11] === 'undefined' ? false : dataJson.qualities[11];
            q_ind4_cm1 = dataJson.qualities[12] === 'undefined' ? false : dataJson.qualities[12];
            q_ind4_cm2 = dataJson.qualities[13] === 'undefined' ? false : dataJson.qualities[13];
            q_ind5_cm1 = dataJson.qualities[14] === 'undefined' ? false : dataJson.qualities[14];

            ind2_kl1 = dataJson.values[6];
            ind3_kl1 = dataJson.values[7];
            ind4_kl1 = dataJson.values[8];
            ind5_kl1 = dataJson.values[9];
            
            q_ind2_kl1 = dataJson.qualities[6] === 'undefined' ? false : dataJson.qualities[6];
            q_ind3_kl1 = dataJson.qualities[7] === 'undefined' ? false : dataJson.qualities[7];
            q_ind4_kl1 = dataJson.qualities[8] === 'undefined' ? false : dataJson.qualities[8];
            q_ind5_kl1 = dataJson.qualities[9] === 'undefined' ? false : dataJson.qualities[9];

            ind2_fm1 = dataJson.values[15];
            ind3_fm1 = dataJson.values[16];
            ind4_fm1 = dataJson.values[17];
            ind4_fm2 = dataJson.values[18];
            ind5_fm1 = dataJson.values[19];
            ind5_fm2 = dataJson.values[20];
            
            q_ind2_fm1 = dataJson.qualities[15] === 'undefined' ? false : dataJson.qualities[6];
            q_ind3_fm1 = dataJson.qualities[16] === 'undefined' ? false : dataJson.qualities[6];
            q_ind4_fm1 = dataJson.qualities[17] === 'undefined' ? false : dataJson.qualities[6];
            q_ind4_fm2 = dataJson.qualities[18] === 'undefined' ? false : dataJson.qualities[6];
            q_ind5_fm1 = dataJson.qualities[19] === 'undefined' ? false : dataJson.qualities[6];
            q_ind5_fm2 = dataJson.qualities[20] === 'undefined' ? false : dataJson.qualities[6];

            //Finish Mill
            if (ind2_fm1 !== '1' && q_ind2_fm1 === 'GOOD') {
                o_ind2_fm1 = '<div class="col-xs-12 noPadding" id="ind2_fm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind2_fm1').length === 0) {
                    $('#data_off_paddang').append(o_ind2_fm1);
                }
            } else {
                $('#ind2_fm1').remove();
            }
            if (ind3_fm1 !== '1' && q_ind3_fm1 === 'GOOD') {
                o_ind3_fm1 = '<div class="col-xs-12 noPadding" id="ind3_fm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind3_fm1').length === 0) {
                    $('#data_off_paddang').append(o_ind3_fm1);
                }
            } else {
                $('#ind3_fm1').remove();
            }
            if (ind4_fm1 !== '1' && q_ind4_fm1 === 'GOOD') {
                o_ind4_fm1 = '<div class="col-xs-12 noPadding" id="ind4_fm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind4_fm1').length === 0) {
                    $('#data_off_paddang').append(o_ind4_fm1);
                }
            } else {
                $('#ind4_fm1').remove();
            }
            if (ind4_fm2 !== '1' && q_ind4_fm2 === 'GOOD') {
                o_ind4_fm2 = '<div class="col-xs-12 noPadding" id="ind4_fm2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind4_fm2').length === 0) {
                    $('#data_off_paddang').append(o_ind4_fm2);
                }
            } else {
                $('#ind4_fm2').remove();
            }
            if (ind5_fm1 !== '32768' && q_ind5_fm1 === 'GOOD') {
                o_ind5_fm1 = '<div class="col-xs-12 noPadding" id="ind5_fm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                 if ($('#data_off_paddang').find('#ind5_fm1').length === 0) {
                    $('#data_off_paddang').append(o_ind5_fm1);
                }
            } else {
                $('#ind5_fm1').remove();
            }
            if (ind5_fm2 !== '32768' && q_ind5_fm2 === 'GOOD') {
                o_ind5_fm2 = '<div class="col-xs-12 noPadding" id="ind5_fm2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind5_fm2').length === 0) {
                    $('#data_off_paddang').append(o_ind5_fm2);
                }
            } else {
                $('#ind5_fm2').remove();
            }
            //KILN
            if (ind2_kl1 !== '1' && q_ind2_kl1 === 'GOOD') {
                o_ind2_kl1 = '<div class="col-xs-12 noPadding" id="ind2_kl1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind2_kl1').length === 0) {
                    $('#data_off_paddang').append(o_ind2_kl1);
                }
            } else {
                $('#ind2_kl1').remove();
            }
            if (ind3_kl1 !== '1' && q_ind3_kl1 === 'GOOD') {
                o_ind3_kl1 = '<div class="col-xs-12 noPadding" id="ind3_kl1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind3_kl1').length === 0) {
                    $('#data_off_paddang').append(o_ind3_kl1);
                }
            } else {
                $('#ind3_kl1').remove();
            }
            if (ind4_kl1 !== '1' && q_ind4_kl1 === 'GOOD') {
                o_ind4_kl1 = '<div class="col-xs-12 noPadding" id="ind4_kl1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind4_kl1').length === 0) {
                    $('#data_off_paddang').append(o_ind4_kl1);
                }
            } else {
                $('#ind4_kl1').remove();
            }
            if (ind5_kl1 !== '32768' && q_ind5_kl1 === 'GOOD') {
                o_ind5_kl1 = '<div class="col-xs-12 noPadding" id="ind5_kl1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind5_kl1').length === 0) {
                    $('#data_off_paddang').append(o_ind5_kl1);
                }
            } else {
                $('#ind5_kl1').remove();
            }
            //Raw Mill
            if (ind2_rm1 !== '1' && q_ind2_rm1 === 'GOOD') {
                o_ind2_rm1 = '<div class="col-xs-12 noPadding" id="ind2_rm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind2_rm1').length === 0) {
                    $('#data_off_paddang').append(o_ind2_rm1);
                }
            } else {
                $('#ind2_rm1').remove();
            }
            if (ind3_rm1 !== '1' && q_ind3_rm1 === 'GOOD') {
                o_ind3_rm1 = '<div class="col-xs-12 noPadding" id="ind3_rm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind3_rm1').length === 0) {
                    $('#data_off_paddang').append(o_ind3_rm1);
                }
            } else {
                $('#ind3_rm1').remove();
            }
            if (ind4_rm1 !== '1' && q_ind4_rm1 === 'GOOD') {
                o_ind4_rm1 = '<div class="col-xs-12 noPadding" id="ind4_rm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind4_rm1').length === 0) {
                    $('#data_off_paddang').append(o_ind4_rm1);
                }
            } else {
                $('#ind4_rm1').remove();
            }
            if (ind4_rm2 !== '1' && q_ind4_rm2 === 'GOOD') {
                o_ind4_rm2 = '<div class="col-xs-12 noPadding" id="ind4_rm2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind4_rm2').length === 0) {
                    $('#data_off_paddang').append(o_ind4_rm2);
                }
            } else {
                $('#ind4_rm2').remove();
            }
            if (ind5_rm1 !== '32768' && q_ind5_rm1 === 'GOOD') {
                o_ind5_rm1 = '<div class="col-xs-12 noPadding" id="ind5_rm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind5_rm1').length === 0) {
                    $('#data_off_paddang').append(o_ind5_rm1);
                }
            } else {
                $('#ind5_rm1').remove();
            }
            if (ind5_rm2 !== '32768' && q_ind5_rm2 === 'GOOD') {
                o_ind5_rm2 = '<div class="col-xs-12 noPadding" id="ind5_rm2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind5_rm2').length === 0) {
                    $('#data_off_paddang').append(o_ind5_rm2);
                }
            } else {
                $('#ind5_rm2').remove();
            }
            //Coal Mill
            if (ind2_cm1 !== '1' && q_ind2_cm1 === 'GOOD') {
                o_ind2_cm1 = '<div class="col-xs-12 noPadding" id="ind2_cm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind2_cm1').length === 0) {
                    $('#data_off_paddang').append(o_ind2_cm1);
                }
            } else {
                $('#ind2_cm1').remove();
            }
            if (ind3_cm1 !== '1' && q_ind3_cm1 === 'GOOD') {
                o_ind3_cm1 = '<div class="col-xs-12 noPadding" id="ind3_cm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind3_cm1').length === 0) {
                    $('#data_off_paddang').append(o_ind3_cm1);
                }
            } else {
                $('#ind3_cm1').remove();
            }
            if (ind4_cm1 !== '1' && q_ind4_cm1 === 'GOOD') {
                o_ind4_cm1 = '<div class="col-xs-12 noPadding" id="ind4_cm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind4_cm1').length === 0) {
                    $('#data_off_paddang').append(o_ind4_cm1);
                }
            } else {
                $('#ind4_cm1').remove();
            }
            if (ind4_cm2 !== '1' && q_ind4_cm2 === 'GOOD') {
                o_ind4_cm2 = '<div class="col-xs-12 noPadding" id="ind4_cm2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind4_cm2').length === 0) {
                    $('#data_off_paddang').append(o_ind4_cm2);
                }
            } else {
                $('#ind4_cm2').remove();
            }
            if (ind5_cm1 !== '32768' && q_ind5_cm1 === 'GOOD') {
                o_ind5_cm1 = '<div class="col-xs-12 noPadding" id="ind5_cm1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">IND5</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_paddang').find('#ind5_cm1').length === 0) {
                    $('#data_off_paddang').append(o_ind5_cm1);
                }
            } else {
                $('#ind5_cm1').remove();
            }
        },
//                            timeout: 5000
    }).done(function (data) {
    }).fail(function (data) {
    });
    
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_statefeed',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");
            var dataJson = JSON.parse(data3);
            
            var o_OnOffKL1, o_OnOffKL2, o_OnOffRM1, o_OnOffRM2, o_OnOffCM1, o_OnOffCM2, o_OnOffFM1, o_OnOffHRC1, o_OnOffFM2, o_OnOffHRC2, o_OnOffFM3, o_OnOffFM4;
            // KILN 3
            OnOffKL1 = dataJson[0].tags[10].props[0].val;
            q_OnOffKL1 = dataJson[0].tags[10].props[0].quality === 'undefined' ? false : dataJson[0].tags[10].props[0].quality;
            //KILN 4
            OnOffKL2 = dataJson[0].tags[11].props[0].val;
            q_OnOffKL2 = dataJson[0].tags[11].props[0].quality === 'undefined' ? false : dataJson[0].tags[11].props[0].quality;
            //Raw Mill 3
            OnOffRM1 = dataJson[0].tags[8].props[0].val;
            q_OnOffRM1 = dataJson[0].tags[8].props[0].quality === 'undefined' ? false : dataJson[0].tags[8].props[0].quality;
            //Raw Mill 4
            OnOffRM2 = dataJson[0].tags[9].props[0].val;
            q_OnOffRM2 = dataJson[0].tags[9].props[0].quality === 'undefined' ? false : dataJson[0].tags[9].props[0].quality;
            //Coal Mill 3
            OnOffCM1 = dataJson[0].tags[12].props[0].val;
            q_OnOffCM1 = dataJson[0].tags[12].props[0].quality === 'undefined' ? false : dataJson[0].tags[12].props[0].quality;
            //Coal Mill 4
            OnOffCM2 = dataJson[0].tags[13].props[0].val;
            q_OnOffCM2 = dataJson[0].tags[13].props[0].quality === 'undefined' ? false : dataJson[0].tags[13].props[0].quality;
            //Finish Mill 5
            OnOffFM1 = dataJson[0].tags[14].props[0].val;
            q_OnOffFM1 = dataJson[0].tags[14].props[0].quality === 'undefined' ? false : dataJson[0].tags[14].props[0].quality;
            OnOffHRC1 = dataJson[0].tags[20].props[0].val;
            q_OnOffHRC1 = dataJson[0].tags[20].props[0].quality === 'undefined' ? false : dataJson[0].tags[20].props[0].quality;
            //Finish Mill 6
            OnOffFM2 = dataJson[0].tags[16].props[0].val;
            q_OnOffFM2 = dataJson[0].tags[16].props[0].quality === 'undefined' ? false : dataJson[0].tags[16].props[0].quality;
            OnOffHRC2 = dataJson[0].tags[21].props[0].val;
            q_OnOffHRC2 = dataJson[0].tags[21].props[0].quality === 'undefined' ? false : dataJson[0].tags[21].props[0].quality;
            //Finish Mill 7
            OnOffFM3 = dataJson[0].tags[15].props[0].val;
            q_OnOffFM3 = dataJson[0].tags[15].props[0].quality === 'undefined' ? false : dataJson[0].tags[15].props[0].quality;
            //Finish Mill 8
            OnOffFM4 = dataJson[0].tags[19].props[0].val;
            q_OnOffFM4 = dataJson[0].tags[19].props[0].quality === 'undefined' ? false : dataJson[0].tags[19].props[0].quality;


            if (OnOffKL1 !== 'True' && q_OnOffKL1 === true) {
                o_OnOffKL1 = '<div class="col-xs-12 noPadding" id="OnOffKL1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffKL1').length === 0) {
                    $('#data_off_tuban').append(o_OnOffKL1);
                }
            } else {
                $('#OnOffKL1').remove();
            }

            if (OnOffKL2 !== 'True' && q_OnOffKL2 === true) {
                o_OnOffKL2 = '<div class="col-xs-12 noPadding" id="OnOffKL2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffKL2').length === 0) {
                    $('#data_off_tuban').append(o_OnOffKL2);
                }
            } else {
                $('#OnOffKL2').remove();
            }

            if (OnOffRM1 !== 'True' && q_OnOffRM1 === true) {
                o_OnOffRM1 = '<div class="col-xs-12 noPadding" id="OnOffRM1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffRM1').length === 0) {
                    $('#data_off_tuban').append(o_OnOffRM1);
                }
            } else {
                $('#OnOffRM1').remove();
            }

            if (OnOffRM2 !== 'True' && q_OnOffRM2 === true) {
                o_OnOffRM2 = '<div class="col-xs-12 noPadding" id="OnOffRM2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffRM2').length === 0) {
                    $('#data_off_tuban').append(o_OnOffRM2);
                }
            } else {
                $('#OnOffRM2').remove();
            }

            if (OnOffCM1 !== 'True' && q_OnOffCM1 === true) {
                o_OnOffCM1 = '<div class="col-xs-12 noPadding" id="OnOffCM1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffCM1').length === 0) {
                    $('#data_off_tuban').append(o_OnOffCM1);
                }
            } else {
                $('#OnOffCM1').remove();
            }

            if (OnOffCM2 !== 'True' && q_OnOffCM2 === true) {
                o_OnOffCM2 = '<div class="col-xs-12 noPadding" id="OnOffCM2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffCM2').length === 0) {
                    $('#data_off_tuban').append(o_OnOffCM2);
                }
            } else {
                $('#OnOffCM2').remove();
            }

            if (OnOffFM1 !== 'True' && q_OnOffFM1 === true) {
                o_OnOffFM1 = '<div class="col-xs-12 noPadding" id="OnOffFM1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #5</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM1').length === 0) {
                    $('#data_off_tuban').append(o_OnOffFM1);
                }
            } else {
                $('#OnOffFM1').remove();
            }

            if (OnOffFM2 !== 'True' && q_OnOffFM2 === true) {
                o_OnOffFM2 = '<div class="col-xs-12 noPadding" id="OnOffFM2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #6</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM2').length === 0) {
                    $('#data_off_tuban').append(o_OnOffFM2);
                }
            } else {
                $('#OnOffFM2').remove();
            }

            if (OnOffFM3 !== 'True' && Q_OnOffFM3 === true) {
                o_OnOffFM3 = '<div class="col-xs-12 noPadding" id="OnOffFM3"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #7</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM3').length === 0) {
                    $('#data_off_tuban').append(o_OnOffFM3);
                }
            } else {
                $('#OnOffFM3').remove();
            }

            if (OnOffFM4 !== 'True' && q_OnOffFM4 === true) {
                o_OnOffFM4 = '<div class="col-xs-12 noPadding" id="OnOffFM4"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB4</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #8</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM4').length === 0) {
                    $('#data_off_tuban').append(o_OnOffFM4);
                }
            } else {
                $('#OnOffFM4').remove();
            }

            if (OnOffHRC1 !== 'True' && q_OnOffHRC1 === true) {
                o_OnOffHRC1 = '<div class="col-xs-12 noPadding" id="OnOffHRC1"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">HRC #5</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffHRC1').length === 0) {
                    $('#data_off_tuban').append(o_OnOffHRC1);
                }
            } else {
                $('#OnOffHRC1').remove();
            }

            if (OnOffHRC2 !== 'True' && q_OnOffHRC2 === true) {
                o_OnOffHRC2 = '<div class="col-xs-12 noPadding" id="OnOffHRC2"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB3</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">HRC #6</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffHRC2').length === 0) {
                    $('#data_off_tuban').append(o_OnOffHRC2);
                }
            } else {
                $('#OnOffHRC2').remove();
            }
        }
    }).done(function (data) {}).fail(function () {
    });
    
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_statefeedtb12',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");
            var dataJson = JSON.parse(data3);
            var dataJson = JSON.parse(data3);
            
            var o_OnOffKL1, o_OnOffKL2, o_OnOffRM1, o_OnOffRM2, o_OnOffCM1, o_OnOffCM2, o_OnOffFM1, o_OnOffHRC1, o_OnOffFM2, o_OnOffHRC2, o_OnOffFM3, o_OnOffFM4, o_OnOffHRC3, o_OnOffHRC4, o_OnOffNVM, o_OnOffATX;
            // KILN 1
            OnOffKL1 = dataJson[0].tags[10].props[0].val;
            q_OnOffKL1 = dataJson[0].tags[10].props[0].quality === 'undefined' ? false : dataJson[0].tags[10].props[0].quality;
            //KILN 2
            OnOffKL2 = dataJson[0].tags[25].props[0].val;
            q_OnOffKL2 = dataJson[0].tags[25].props[0].quality === 'undefined' ? false : dataJson[0].tags[25].props[0].quality;
            //Raw Mill 1
            OnOffRM1 = dataJson[0].tags[3].props[0].val;
            q_OnOffRM1 = dataJson[0].tags[3].props[0].quality === 'undefined' ? false : dataJson[0].tags[3].props[0].quality;
            //Raw Mill 2
            OnOffRM2 = dataJson[0].tags[17].props[0].val;
            q_OnOffRM2 = dataJson[0].tags[17].props[0].quality === 'undefined' ? false : dataJson[0].tags[17].props[0].quality;
            //Coal Mill 1
            OnOffCM1 = dataJson[0].tags[4].props[0].val;
            q_OnOffCM1 = dataJson[0].tags[4].props[0].quality === 'undefined' ? false : dataJson[0].tags[4].props[0].quality;
            //Coal Mill 2
            OnOffCM2 = dataJson[0].tags[19].props[0].val;
            q_OnOffCM2 = dataJson[0].tags[19].props[0].quality === 'undefined' ? false : dataJson[0].tags[19].props[0].quality;
            //Finish Mill 1
            OnOffFM1 = dataJson[0].tags[6].props[0].val;
            q_OnOffFM1 = dataJson[0].tags[6].props[0].quality === 'undefined' ? false : dataJson[0].tags[6].props[0].quality;
            OnOffHRC1 = dataJson[0].tags[9].props[0].val;
            q_OnOffHRC1 = dataJson[0].tags[9].props[0].quality === 'undefined' ? false : dataJson[0].tags[9].props[0].quality;
            //Finish Mill 2
            OnOffFM2 = dataJson[0].tags[11].props[0].val;
            q_OnOffFM2 = dataJson[0].tags[11].props[0].quality === 'undefined' ? false : dataJson[0].tags[11].props[0].quality;
            OnOffHRC2 = dataJson[0].tags[0].props[0].val;
            q_OnOffHRC2 = dataJson[0].tags[0].props[0].quality === 'undefined' ? false : dataJson[0].tags[0].props[0].quality;
            //Finish Mill 3
            OnOffFM3 = dataJson[0].tags[24].props[0].val;
            q_OnOffFM3 = dataJson[0].tags[24].props[0].quality === 'undefined' ? false : dataJson[0].tags[24].props[0].quality;
            OnOffHRC3 = dataJson[0].tags[14].props[0].val;
            q_OnOffHRC3 = dataJson[0].tags[14].props[0].quality === 'undefined' ? false : dataJson[0].tags[14].props[0].quality;
            //Finish Mill 4
            OnOffFM4 = dataJson[0].tags[20].props[0].val;
            q_OnOffFM4 = dataJson[0].tags[20].props[0].quality === 'undefined' ? false : dataJson[0].tags[20].props[0].quality;
            OnOffHRC4 = dataJson[0].tags[15].props[0].val;
            q_OnOffHRC4 = dataJson[0].tags[15].props[0].quality === 'undefined' ? false : dataJson[0].tags[15].props[0].quality;
            //Finish Mill 9
            OnOffNVM = dataJson[0].tags[12].props[0].val;
            q_OnOffNVM = dataJson[0].tags[12].props[0].quality === 'undefined' ? false : dataJson[0].tags[12].props[0].quality;
            OnOffATX = dataJson[0].tags[7].props[0].val;
            q_OnOffATX = dataJson[0].tags[7].props[0].quality === 'undefined' ? false : dataJson[0].tags[7].props[0].quality;

            if (OnOffKL1 !== 'True' && q_OnOffKL1 === true) {
                o_OnOffKL1 = '<div class="col-xs-12 noPadding" id="OnOffKL1tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffKL1tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffKL1);
                }
            } else {
                $('#OnOffKL1tb12').remove();
            }

            if (OnOffKL2 !== 'True' && q_OnOffKL2 === true) {
                o_OnOffKL2 = '<div class="col-xs-12 noPadding" id="OnOffKL2tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">KILN</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffKL2tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffKL2);
                }
            } else {
                $('#OnOffKL2tb12').remove();
            }

            if (OnOffRM1 !== 'True' && q_OnOffRM1 === true) {
                o_OnOffRM1 = '<div class="col-xs-12 noPadding" id="OnOffRM1tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffRM1tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffRM1);
                }
            } else {
                $('#OnOffRM1tb12').remove();
            }

            if (OnOffRM2 !== 'True' && q_OnOffRM1 === true) {
                o_OnOffRM2 = '<div class="col-xs-12 noPadding" id="OnOffRM2tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Raw Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffRM2tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffRM2);
                }
            } else {
                $('#OnOffRM2tb12').remove();
            }

            if (OnOffCM1 !== 'True' && q_OnOffCM1 === true) {
                o_OnOffCM1 = '<div class="col-xs-12 noPadding" id="OnOffCM1tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffCM1tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffCM1);
                }
            } else {
                $('#OnOffCM1tb12').remove();
            }

            if (OnOffCM2 !== 'True' && q_OnOffCM2 === true) {
                o_OnOffCM2 = '<div class="col-xs-12 noPadding" id="OnOffCM2tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Coal Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffCM2tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffCM2);
                }
            } else {
                $('#OnOffCM2tb12').remove();
            }

            if (OnOffFM1 !== 'True' && q_OnOffFM1 === true) {
                o_OnOffFM1 = '<div class="col-xs-12 noPadding" id="OnOffFM1tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM1tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffFM1);
                }
            } else {
                $('#OnOffFM1tb12').remove();
            }

            if (OnOffFM2 !== 'True' && q_OnOffFM2 === true) {
                o_OnOffFM2 = '<div class="col-xs-12 noPadding" id="OnOffFM2tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM2tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffFM2);
                }
            } else {
                $('#OnOffFM2tb12').remove();
            }

            if (OnOffFM3 !== 'True' && q_OnOffFM3 === true) {
                o_OnOffFM3 = '<div class="col-xs-12 noPadding" id="OnOffFM3tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #3</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM3tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffFM3);
                }
            } else {
                $('#OnOffFM3tb12').remove();
            }

            if (OnOffFM4 !== 'True' && q_OnOffFM4 === true) {
                o_OnOffFM4 = '<div class="col-xs-12 noPadding" id="OnOffFM4tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill #4</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM4tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffFM4);
                }
            } else {
                $('#OnOffFM4tb12').remove();
            }

            if (OnOffHRC1 !== 'True'  && q_OnOffHRC1 === true) {
                o_OnOffHRC1 = '<div class="col-xs-12 noPadding" id="OnOffHRC1tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">HRC #1</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffHRC1tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffHRC1);
                }
            } else {
                $('#OnOffHRC1tb12').remove();
            }


            if (OnOffHRC2 !== 'True' && q_OnOffHRC2 === true) {
                o_OnOffHRC2 = '<div class="col-xs-12 noPadding" id="OnOffHRC2tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">HRC #2</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffHRC2tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffHRC2);
                }
            } else {
                $('#OnOffHRC12tb12').remove();
            }

            if (OnOffHRC3 !== 'True' && q_OnOffHRC3 === true) {
                o_OnOffHRC3 = '<div class="col-xs-12 noPadding" id="OnOffHRC3tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">HRC #3</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffHRC3tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffHRC3);
                }
            } else {
                $('#OnOffHRC3tb12').remove();
            }

            if (OnOffHRC4 !== 'True' && q_OnOffHRC4 === true) {
                o_OnOffHRC4 = '<div class="col-xs-12 noPadding" id="OnOffHRC4tb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB2</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">HRC #4</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffHRC4tb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffHRC4);
                }
            } else {
                $('#OnOffHRC4tb12').remove();
            }

            if (OnOffNVM !== 'True' && q_OnOffNVM === true) {
                o_OnOffNVM = '<div class="col-xs-12 noPadding" id="OnOffNVMtb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">New Vertical Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffNVMtb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffNVM);
                }
            } else {
                $('#OnOffNVMtb12').remove();
            }

            if (OnOffATX !== 'True' && q_OnOffATX === true) {
                o_OnOffATX = '<div class="col-xs-12 noPadding" id="OnOffATXtb12"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">TB1</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Atox Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffATXtb12').length === 0) {
                    $('#data_off_tuban').append(o_OnOffATX);
                }
            } else {
                $('#OnOffATXtb12').remove();
            }
        }
    }).done(function (data) {}).fail(function () {
    });
    
    $.ajax({
        url: url_src + '/api/index.php/plant_tuban/get_statefeedcgd',
        type: 'GET',
        success: function (data) {
            var data1 = data.replace("<title>Json</title>", "");
            var data2 = data1.replace("(", "[");
            var data3 = data2.replace(");", "]");
            var dataJson = JSON.parse(data3);
            
            var o_fmcgd;
            OnOffFM1Cgd = dataJson[0].tags[1].props[0].val;
            QualityFM1Cgd = dataJson[0].tags[1].props[0].quality === 'undefined' ? false : dataJson[0].tags[1].props[0].quality;
            
            if (OnOffFM1Cgd !== 'True' && QualityFM1Cgd !== false) {
                o_fmcgd = '<div class="col-xs-12 noPadding" id="OnOffFM1Cgd"> <div class="img-thumbnail cubesoffstate padding-offstate" > <div class="col-xs-9 noPadding" align="left" style="padding-left: 12px"> <div class="plantName" id="plant-padang" style="color: rgba(0, 0, 0, .5);">CGD</div> <span class="eqname" id="plant-padang" style="margin-top: 6px; font-weight: 600;color: #464646">Finish Mill</span> </div> <div class="col-xs-3 noPadding" align="center" style="line-height: 39px; font-size: 20px; color: #F53240"> <i class="fa fa-power-off" aria-hidden="true"></i> </div> </div> </div>';
                if ($('#data_off_tuban').find('#OnOffFM1Cgd').length === 0) {
                    $('#data_off_tuban').append(o_fmcgd);
                }
            } else {
                $('#OnOffFM1Cgd').remove();
            }
        }
    }).done(function (data) {}).fail(function () {
    });

};
setInterval(dataUpdate, 1000);
// dataUpdate();


