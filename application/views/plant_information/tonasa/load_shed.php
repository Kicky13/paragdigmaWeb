<script type="text/javascript"  src="<?= base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<style>
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
    .onzi-two{
        float: right;
        color: #fff;
        padding-top: 27px;
        margin-right: -13px;
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
    .blink_me {
        animation: blinker 1s linear infinite;
    }
    @keyframes blinker {  
        50% { opacity: 0; }
    }
    .OnPadang {
        color: #6fc962;
    }
    .OffPadang {
        color: #e54b37;
    }
    .valOPC {
        color: white;
        font-size: xx-large;
    }
    .p-plant-btg{
        font-family: Segoe UI;
        font-size: 22px;
        color: #615859;
        float: left;
        line-height: 38px;
    }
    center_th {
        text-align: center;
    }
    .col_bg_closed {
        font-size: 16px;
        font-weight: bold;
        color: #CD3E52;
    }
    .col_bg_open {
        font-size: 16px;
        font-style: italic;
        font-weight: bold;
        color: #0F6177;
    }
    .col_source_btg {
        font-size: 16px;
        font-weight: bold;
        color: #5E412F;
    }
    .col_source_pln {
        font-size: 16px;
        font-style: italic;
        font-weight: bold;
        color: #FF770B;
    }
</style>
<script>
    $(function () {
        $('#btn_power_mon').click(function () {
            window.location.href = 'index.php/plant_tonasa/power_btg';
        });
        $('#btn_load_shed').click(function () {
            window.location.href = 'index.php/plant_tonasa/load_shed';
        });
        $('#btn_pltu_mon').click(function () {
            window.location.href = 'index.php/plant_tonasa/pltu_mon';
        });
    });
</script>
<div class="row">
    <nav class="navbar navbar-default panelup">
        <div class="container-fluid">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h3 style="text-align: left; padding-left: 12px; margin-top: 10px;">Real Time BTG Power Distribution</h3>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"> <span class="sr-only">(current)</span></a></li>
                    <li>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">

                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" aria-label="Left Align" id="btn_power_mon" type="button">
                            Power Monitoring
                        </button>
                        <button class="btn btn-default" aria-label="Left Align" id="btn_load_shed" type="button">
                            Load Shedding 
                        </button>
                        <button class="btn btn-warning " aria-label="Left Align" id="btn_pltu_mon" type="button">
                            PLTU Monitoring
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>

<div class="row">
    <table class="table table-hover" style="width: 100%;">
        <thead class="thead-inverse">
            <tr>
                <th>CB NAME</th>
                <th>DESCRIPTION</th>
                <th class="center_th">STATUS</th>
                <th class="center_th">DAYA</th>
                <th class="center_th">POWERED BY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">ER55AMV05</td>
                <td>T5 MD KLIN</td>
                <td id="BTG_LS_ER55AMV05_St"></td>
                <td id="BTG_LS_ER55AMV05_P"></td>
                <td id="BTG_LS_ER55AMV05_So"></td>
            </tr>
            <tr>
                <td scope="row">ER55AMV06</td>
                <td>T5 IDF PREHEATER</td>
                <td id="BTG_LS_ER55AMV06_St"></td>
                <td id="BTG_LS_ER55AMV06_P"></td>
                <td id="BTG_LS_ER55AMV06_So"></td>
            </tr>
            <tr>
                <td scope="row">SG4-F07</td>
                <td>T4 IDF 1 KLIN</td>
                <td id="BTG_LS_SG4_F07_St"></td>
                <td id="BTG_LS_SG4_F07_P"></td>
                <td id="BTG_LS_SG4_F07_So"></td>
            </tr>
            <tr>
                <td scope="row">SG4-F08</td>
                <td>T4 IDF 2 KLIN</td>
                <td id="BTG_LS_SG4_F08_St"></td>
                <td id="BTG_LS_SG4_F08_P"></td>
                <td id="BTG_LS_SG4_F08_So"></td>
            </tr>
            <tr>
                <td scope="row">Q26</td>
                <td>T2 IDF KILN 2</td>
                <td id="BTG_LS_Q26_St"></td>
                <td id="BTG_LS_Q26_P"></td>
                <td id="BTG_LS_Q26_So"></td>
            </tr>
            <tr>
                <td scope="row">Q21</td>
                <td>T2 IDF KILN 3</td>
                <td id="BTG_LS_Q21_St"></td>
                <td id="BTG_LS_Q21_P"></td>
                <td id="BTG_LS_Q21_So"></td>
            </tr>
            <tr>
                <td scope="row">ER56MV05</td>
                <td>T5 COAL MILL</td>
                <td id="BTG_LS_ER56MV05_St"></td>
                <td id="BTG_LS_ER56MV05_P"></td>
                <td id="BTG_LS_ER56MV05_So"></td>
            </tr>
            <tr>
                <td scope="row">SG4-F15</td>
                <td>T4 EP FAN COAL MILL</td>
                <td id="BTG_LS_SG4_F15_St"></td>
                <td id="BTG_LS_SG4_F15_P"></td>
                <td id="BTG_LS_SG4_F15_So"></td>
            </tr>
            <tr>
                <td scope="row">SG4A-MV03</td>
                <td>T4 FAN NEW COAL MILL</td>
                <td id="BTG_LS_SG4A_MV03_St"></td>
                <td id="BTG_LS_SG4A_MV03_P"></td>
                <td id="BTG_LS_SG4A_MV03_So"></td>
            </tr>
            <tr>
                <td scope="row">Q20</td>
                <td>T2 MD COAL MILL 1</td>
                <td id="BTG_LS_Q20_St"></td>
                <td id="BTG_LS_Q20_P"></td>
                <td id="BTG_LS_Q20_So"></td>
            </tr>
            <tr>
                <td scope="row">Q22</td>
                <td>T2 MD COAL MILL 2</td>
                <td id="BTG_LS_Q22_St"></td>
                <td id="BTG_LS_Q22_P"></td>
                <td id="BTG_LS_Q22_So"></td>
            </tr>
            <tr>
                <td scope="row">ER58BMV06</td>
                <td>T5 FINISH MILL 1</td>
                <td id="BTG_LS_ER58BMV06_St"></td>
                <td id="BTG_LS_ER58BMV06_P"></td>
                <td id="BTG_LS_ER58BMV06_So"></td>
            </tr>
            <tr>
                <td scope="row">ER58BMV12</td>
                <td>T5 FINISH MILL 2</td>
                <td id="BTG_LS_ER58BMV12_St"></td>
                <td id="BTG_LS_ER58BMV12_P"></td>
                <td id="BTG_LS_ER58BMV12_So"></td>
            </tr>
            <tr>
                <td scope="row">ER54MV05</td>
                <td>T5 RAW MILL</td>
                <td id="BTG_LS_ER54MV05_St"></td>
                <td id="BTG_LS_ER54MV05_P"></td>
                <td id="BTG_LS_ER54MV05_So"></td>
            </tr>
            <tr>
                <td scope="row">SG6-F05</td>
                <td>T4 FINISH MILL 1</td>
                <td id="BTG_LS_SG6_F05_St"></td>
                <td id="BTG_LS_SG6_F05_P"></td>
                <td id="BTG_LS_SG6_F05_So"></td>
            </tr>
            <tr>
                <td scope="row">SG7-F05</td>
                <td>T4 FINISH MILL 2</td>
                <td id="BTG_LS_SG7_F05_St"></td>
                <td id="BTG_LS_SG7_F05_P"></td>
                <td id="BTG_LS_SG7_F05_So"></td>
            </tr>
            <tr>
                <td scope="row">SG2-F07</td>
                <td>T4 RAW MILL 1</td>
                <td id="BTG_LS_SG2_F07_St"></td>
                <td id="BTG_LS_SG2_F07_P"></td>
                <td id="BTG_LS_SG2_F07_So"></td>
            </tr>
            <tr>
                <td scope="row">SG3-F02</td>
                <td>T4 RAW MILL 2</td>
                <td id="BTG_LS_SG3_F02_St"></td>
                <td id="BTG_LS_SG3_F02_P"></td>
                <td id="BTG_LS_SG3_F02_So"></td>
            </tr>
            <tr>
                <td scope="row">Q04</td>
                <td>T3 MD 1 FINISH MILL 2</td>
                <td id="BTG_LS_Q04_St"></td>
                <td id="BTG_LS_Q04_P"></td>
                <td id="BTG_LS_Q04_So"></td>
            </tr>
            <tr>
                <td scope="row">Q18</td>
                <td>T3 MD 2 FINISH MILL 2</td>
                <td id="BTG_LS_Q18_St"></td>
                <td id="BTG_LS_Q18_P"></td>
                <td id="BTG_LS_Q18_So"></td>
            </tr>
            <tr>
                <td scope="row">SG8 F2</td>
                <td>T3 MD 1 FINSIH MILL 3</td>
                <td id="BTG_LS_SG8_F2_St"></td>
                <td id="BTG_LS_SG8_F2_P"></td>
                <td id="BTG_LS_SG8_F2_So"></td>
            </tr>
            <tr>
                <td scope="row">SG8 F3</td>
                <td>T3 MD 2 FINSIH MILL 3</td>
                <td id="BTG_LS_SG8_F3_St"></td>
                <td id="BTG_LS_SG8_F3_P"></td>
                <td id="BTG_LS_SG8_F3_So"></td>
            </tr>
            <tr>
                <td scope="row">Q12</td>
                <td>T3 MD 1 RAW MILL 2</td>
                <td id="BTG_LS_Q12_St"></td>
                <td id="BTG_LS_Q12_P"></td>
                <td id="BTG_LS_Q12_So"></td>
            </tr>
            <tr>
                <td scope="row">Q13</td>
                <td>T3 MD 2 RAW MILL 2</td>
                <td id="BTG_LS_Q13_St"></td>
                <td id="BTG_LS_Q13_P"></td>
                <td id="BTG_LS_Q13_So"></td>
            </tr>
            <tr>
                <td scope="row">Q10</td>
                <td>T3 IDF RAW MILL 3</td>
                <td id="BTG_LS_Q10_St"></td>
                <td id="BTG_LS_Q10_P"></td>
                <td id="BTG_LS_Q10_So"></td>
            </tr>
            <tr>
                <td scope="row">ER51MV02</td>
                <td>T5 MD CRUSHER 1</td>
                <td id="BTG_LS_ER51MV02_St"></td>
                <td id="BTG_LS_ER51MV02_P"></td>
                <td id="BTG_LS_ER51MV02_So"></td>
            </tr>
            <tr>
                <td scope="row">ER51MV03</td>
                <td>T5 MD CRUSHER 2</td>
                <td id="BTG_LS_ER51MV03_St"></td>
                <td id="BTG_LS_ER51MV03_P"></td>
                <td id="BTG_LS_ER51MV03_So"></td>
            </tr>
            <tr>
                <td scope="row">SS52MV02</td>
                <td>T5 PACKER</td>
                <td id="BTG_LS_SS52MV02_St"></td>
                <td id="BTG_LS_SS52MV02_P"></td>
                <td id="BTG_LS_SS52MV02_So"></td>
            </tr>
            <tr>
                <td scope="row">Q11</td>
                <td>T3 LS.CRUSHER 2</td>
                <td id="BTG_LS_Q11_St"></td>
                <td id="BTG_LS_Q11_P"></td>
                <td id="BTG_LS_Q11_So"></td>
            </tr>
            <tr>
                <td scope="row">Q03</td>
                <td>T3 LS.CRUSHER 3</td>
                <td id="BTG_LS_Q03_St"></td>
                <td id="BTG_LS_Q03_P"></td>
                <td id="BTG_LS_Q03_So"></td>
            </tr>
            <tr>
                <td scope="row">Q05</td>
                <td>T3 LS.DRYER</td>
                <td id="BTG_LS_Q05_St"></td>
                <td id="BTG_LS_Q05_P"></td>
                <td id="BTG_LS_Q05_So"></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    function dataUpdate() {
        //STATUS
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tonasa/get_btg_status',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var BTG_LS_ER51MV02_Stx = dataJson[0].tags[0].props[0].val;
                var BTG_LS_ER51MV03_Stx = dataJson[0].tags[1].props[0].val;
                var BTG_LS_ER54MV05_Stx = dataJson[0].tags[2].props[0].val;
                var BTG_LS_ER55AMV05_Stx = dataJson[0].tags[3].props[0].val;
                var BTG_LS_ER55AMV06_Stx = dataJson[0].tags[4].props[0].val;
                var BTG_LS_ER56MV05_Stx = dataJson[0].tags[5].props[0].val;
                var BTG_LS_ER58BMV06_Stx = dataJson[0].tags[6].props[0].val;
                var BTG_LS_ER58BMV12_Stx = dataJson[0].tags[7].props[0].val;
                var BTG_LS_Q03_Stx = dataJson[0].tags[8].props[0].val;
                var BTG_LS_Q04_Stx = dataJson[0].tags[9].props[0].val;
                var BTG_LS_Q05_Stx = dataJson[0].tags[10].props[0].val;
                var BTG_LS_Q10_Stx = dataJson[0].tags[11].props[0].val;
                var BTG_LS_Q11_Stx = dataJson[0].tags[12].props[0].val;
                var BTG_LS_Q12_Stx = dataJson[0].tags[13].props[0].val;
                var BTG_LS_Q13_Stx = dataJson[0].tags[14].props[0].val;
                var BTG_LS_Q18_Stx = dataJson[0].tags[15].props[0].val;
                var BTG_LS_Q20_Stx = dataJson[0].tags[16].props[0].val;
                var BTG_LS_Q21_Stx = dataJson[0].tags[17].props[0].val;
                var BTG_LS_Q22_Stx = dataJson[0].tags[18].props[0].val;
                var BTG_LS_Q26_Stx = dataJson[0].tags[19].props[0].val;
                var BTG_LS_SG2_F07_Stx = dataJson[0].tags[20].props[0].val;
                var BTG_LS_SG3_F02_Stx = dataJson[0].tags[21].props[0].val;
                var BTG_LS_SG4A_MV03_Stx = dataJson[0].tags[22].props[0].val;
                var BTG_LS_SG4_F07_Stx = dataJson[0].tags[23].props[0].val;
                var BTG_LS_SG4_F08_Stx = dataJson[0].tags[24].props[0].val;
                var BTG_LS_SG4_F15_Stx = dataJson[0].tags[25].props[0].val;
                var BTG_LS_SG6_F05_Stx = dataJson[0].tags[26].props[0].val;
                var BTG_LS_SG7_F05_Stx = dataJson[0].tags[27].props[0].val;
                var BTG_LS_SG8_F2_Stx = dataJson[0].tags[28].props[0].val;
                var BTG_LS_SG8_F3_Stx = dataJson[0].tags[29].props[0].val;
                var BTG_LS_SS52MV02_Stx = dataJson[0].tags[30].props[0].val;


                var BTG_LS_ER51MV02_Sty, BTG_LS_ER51MV03_Sty, BTG_LS_ER54MV05_Sty, BTG_LS_ER55AMV05_Sty, BTG_LS_ER55AMV06_Sty, BTG_LS_ER56MV05_Sty, BTG_LS_ER58BMV06_Sty, BTG_LS_ER58BMV12_Sty, BTG_LS_Q03_Sty, BTG_LS_Q04_Sty, BTG_LS_Q05_Sty, BTG_LS_Q10_Sty, BTG_LS_Q11_Sty, BTG_LS_Q12_Sty, BTG_LS_Q13_Sty, BTG_LS_Q18_Sty, BTG_LS_Q20_Sty, BTG_LS_Q21_Sty, BTG_LS_Q22_Sty, BTG_LS_Q26_Sty, BTG_LS_SG2_F07_Sty, BTG_LS_SG3_F02_Sty, BTG_LS_SG4A_MV03_Sty, BTG_LS_SG4_F07_Sty, BTG_LS_SG4_F08_Sty, BTG_LS_SG4_F15_Sty, BTG_LS_SG6_F05_Sty, BTG_LS_SG7_F05_Sty, BTG_LS_SG8_F2_Sty, BTG_LS_SG8_F3_Sty, BTG_LS_SS52MV02_Sty;
                
                if (BTG_LS_ER51MV02_Stx == '1') {
                    BTG_LS_ER51MV02_Sty = 'Closed';
                    $("#BTG_LS_ER51MV02_St").addClass('col_bg_closed');
                    $("#BTG_LS_ER51MV02_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_ER51MV02_Sty = 'Open';
                    $("#BTG_LS_ER51MV02_St").addClass('col_bg_open');
                    $("#BTG_LS_ER51MV02_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_ER51MV03_Stx == '1') {
                    BTG_LS_ER51MV03_Sty = 'Closed';
                    $("#BTG_LS_ER51MV03_St").addClass('col_bg_closed');
                    $("#BTG_LS_ER51MV03_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_ER51MV03_Sty = 'Open';
                    $("#BTG_LS_ER51MV03_St").addClass('col_bg_open');
                    $("#BTG_LS_ER51MV03_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_ER54MV05_Stx == '1') {
                    BTG_LS_ER54MV05_Sty = 'Closed';
                    $("#BTG_LS_ER54MV05_St").addClass('col_bg_closed');
                    $("#BTG_LS_ER54MV05_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_ER54MV05_Sty = 'Open';
                    $("#BTG_LS_ER54MV05_St").addClass('col_bg_open');
                    $("#BTG_LS_ER54MV05_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_ER55AMV05_Stx == '1') {
                    BTG_LS_ER55AMV05_Sty = 'Closed';
                    $("#BTG_LS_ER55AMV05_St").addClass('col_bg_closed');
                    $("#BTG_LS_ER55AMV05_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_ER55AMV05_Sty = 'Open';
                    $("#BTG_LS_ER55AMV05_St").addClass('col_bg_open');
                    $("#BTG_LS_ER55AMV05_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_ER55AMV06_Stx == '1') {
                    BTG_LS_ER55AMV06_Sty = 'Closed';
                    $("#BTG_LS_ER55AMV06_St").addClass('col_bg_closed');
                    $("#BTG_LS_ER55AMV06_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_ER55AMV06_Sty = 'Open';
                    $("#BTG_LS_ER55AMV06_St").addClass('col_bg_open');
                    $("#BTG_LS_ER55AMV06_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_ER56MV05_Stx == '1') {
                    BTG_LS_ER56MV05_Sty = 'Closed';
                    $("#BTG_LS_ER56MV05_St").addClass('col_bg_closed');
                    $("#BTG_LS_ER56MV05_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_ER56MV05_Sty = 'Open';
                    $("#BTG_LS_ER56MV05_St").addClass('col_bg_open');
                    $("#BTG_LS_ER56MV05_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_ER58BMV06_Stx == '1') {
                    BTG_LS_ER58BMV06_Sty = 'Closed';
                    $("#BTG_LS_ER58BMV06_St").addClass('col_bg_closed');
                    $("#BTG_LS_ER58BMV06_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_ER58BMV06_Sty = 'Open';
                    $("#BTG_LS_ER58BMV06_St").addClass('col_bg_open');
                    $("#BTG_LS_ER58BMV06_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_ER58BMV12_Stx == '1') {
                    BTG_LS_ER58BMV12_Sty = 'Closed';
                    $("#BTG_LS_ER58BMV12_St").addClass('col_bg_closed');
                    $("#BTG_LS_ER58BMV12_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_ER58BMV12_Sty = 'Open';
                    $("#BTG_LS_ER58BMV12_St").addClass('col_bg_open');
                    $("#BTG_LS_ER58BMV12_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q03_Stx == '1') {
                    BTG_LS_Q03_Sty = 'Closed';
                    $("#BTG_LS_Q03_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q03_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q03_Sty = 'Open';
                    $("#BTG_LS_Q03_St").addClass('col_bg_open');
                    $("#BTG_LS_Q03_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q04_Stx == '1') {
                    BTG_LS_Q04_Sty = 'Closed';
                    $("#BTG_LS_Q04_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q04_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q04_Sty = 'Open';
                    $("#BTG_LS_Q04_St").addClass('col_bg_open');
                    $("#BTG_LS_Q04_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q05_Stx == '1') {
                    BTG_LS_Q05_Sty = 'Closed';
                    $("#BTG_LS_Q05_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q05_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q05_Sty = 'Open';
                    $("#BTG_LS_Q05_St").addClass('col_bg_open');
                    $("#BTG_LS_Q05_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q10_Stx == '1') {
                    BTG_LS_Q10_Sty = 'Closed';
                    $("#BTG_LS_Q10_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q10_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q10_Sty = 'Open';
                    $("#BTG_LS_Q10_St").addClass('col_bg_open');
                    $("#BTG_LS_Q10_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q11_Stx == '1') {
                    BTG_LS_Q11_Sty = 'Closed';
                    $("#BTG_LS_Q11_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q11_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q11_Sty = 'Open';
                    $("#BTG_LS_Q11_St").addClass('col_bg_open');
                    $("#BTG_LS_Q11_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q12_Stx == '1') {
                    BTG_LS_Q12_Sty = 'Closed';
                    $("#BTG_LS_Q12_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q12_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q12_Sty = 'Open';
                    $("#BTG_LS_Q12_St").addClass('col_bg_open');
                    $("#BTG_LS_Q12_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q13_Stx == '1') {
                    BTG_LS_Q13_Sty = 'Closed';
                    $("#BTG_LS_Q13_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q13_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q13_Sty = 'Open';
                    $("#BTG_LS_Q13_St").addClass('col_bg_open');
                    $("#BTG_LS_Q13_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q18_Stx == '1') {
                    BTG_LS_Q18_Sty = 'Closed';
                    $("#BTG_LS_Q18_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q18_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q18_Sty = 'Open';
                    $("#BTG_LS_Q18_St").addClass('col_bg_open');
                    $("#BTG_LS_Q18_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q20_Stx == '1') {
                    BTG_LS_Q20_Sty = 'Closed';
                    $("#BTG_LS_Q20_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q20_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q20_Sty = 'Open';
                    $("#BTG_LS_Q20_St").addClass('col_bg_open');
                    $("#BTG_LS_Q20_St").removeClass('col_bg_closed');//
                }
                
                if (BTG_LS_Q21_Stx == '1') {
                    BTG_LS_Q21_Sty = 'Closed';
                    $("#BTG_LS_Q21_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q21_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q21_Sty = 'Open';
                    $("#BTG_LS_Q21_St").addClass('col_bg_open');
                    $("#BTG_LS_Q21_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q22_Stx == '1') {
                    BTG_LS_Q22_Sty = 'Closed';
                    $("#BTG_LS_Q22_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q22_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q22_Sty = 'Open';
                    $("#BTG_LS_Q22_St").addClass('col_bg_open');
                    $("#BTG_LS_Q22_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_Q26_Stx == '1') {
                    BTG_LS_Q26_Sty = 'Closed';
                    $("#BTG_LS_Q26_St").addClass('col_bg_closed');
                    $("#BTG_LS_Q26_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_Q26_Sty = 'Open';
                    $("#BTG_LS_Q26_St").addClass('col_bg_open');
                    $("#BTG_LS_Q26_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG2_F07_Stx == '1') {
                    BTG_LS_SG2_F07_Sty = 'Closed';
                    $("#BTG_LS_SG2_F07_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG2_F07_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG2_F07_Sty = 'Open';
                    $("#BTG_LS_SG2_F07_St").addClass('col_bg_open');
                    $("#BTG_LS_SG2_F07_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG3_F02_Stx == '1') {
                    BTG_LS_SG3_F02_Sty = 'Closed';
                    $("#BTG_LS_SG3_F02_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG3_F02_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG3_F02_Sty = 'Open';
                    $("#BTG_LS_SG3_F02_St").addClass('col_bg_open');
                    $("#BTG_LS_SG3_F02_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG4A_MV03_Stx == '1') {
                    BTG_LS_SG4A_MV03_Sty = 'Closed';
                    $("#BTG_LS_SG4A_MV03_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG4A_MV03_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG4A_MV03_Sty = 'Open';
                    $("#BTG_LS_SG4A_MV03_St").addClass('col_bg_open');
                    $("#BTG_LS_SG4A_MV03_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG4_F07_Stx == '1') {
                    BTG_LS_SG4_F07_Sty = 'Closed';
                    $("#BTG_LS_SG4_F07_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG4_F07_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG4_F07_Sty = 'Open';
                    $("#BTG_LS_SG4_F07_St").addClass('col_bg_open');
                    $("#BTG_LS_SG4_F07_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG4_F08_Stx == '1') {
                    BTG_LS_SG4_F08_Sty = 'Closed';
                    $("#BTG_LS_SG4_F08_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG4_F08_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG4_F08_Sty = 'Open';
                    $("#BTG_LS_SG4_F08_St").addClass('col_bg_open');
                    $("#BTG_LS_SG4_F08_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG4_F15_Stx == '1') {
                    BTG_LS_SG4_F15_Sty = 'Closed';
                    $("#BTG_LS_SG4_F15_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG4_F15_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG4_F15_Sty = 'Open';
                    $("#BTG_LS_SG4_F15_St").addClass('col_bg_open');
                    $("#BTG_LS_SG4_F15_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG6_F05_Stx == '1') {
                    BTG_LS_SG6_F05_Sty = 'Closed';
                    $("#BTG_LS_SG6_F05_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG6_F05_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG6_F05_Sty = 'Open';
                    $("#BTG_LS_SG6_F05_St").addClass('col_bg_open');
                    $("#BTG_LS_SG6_F05_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG7_F05_Stx == '1') {
                    BTG_LS_SG7_F05_Sty = 'Closed';
                    $("#BTG_LS_SG7_F05_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG7_F05_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG7_F05_Sty = 'Open';
                    $("#BTG_LS_SG7_F05_St").addClass('col_bg_open');
                    $("#BTG_LS_SG7_F05_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG8_F2_Stx == '1') {
                    BTG_LS_SG8_F2_Sty = 'Closed';
                    $("#BTG_LS_SG8_F2_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG8_F2_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG8_F2_Sty = 'Open';
                    $("#BTG_LS_SG8_F2_St").addClass('col_bg_open');
                    $("#BTG_LS_SG8_F2_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SG8_F3_Stx == '1') {
                    BTG_LS_SG8_F3_Sty = 'Closed';
                    $("#BTG_LS_SG8_F3_St").addClass('col_bg_closed');
                    $("#BTG_LS_SG8_F3_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SG8_F3_Sty = 'Open';
                    $("#BTG_LS_SG8_F3_St").addClass('col_bg_open');
                    $("#BTG_LS_SG8_F3_St").removeClass('col_bg_closed');
                }
                
                if (BTG_LS_SS52MV02_Stx == '1') {
                    BTG_LS_SS52MV02_Sty = 'Closed';
                    $("#BTG_LS_SS52MV02_St").addClass('col_bg_closed');
                    $("#BTG_LS_SS52MV02_St").removeClass('col_bg_open');
                } else {
                    BTG_LS_SS52MV02_Sty = 'Open';
                    $("#BTG_LS_SS52MV02_St").addClass('col_bg_open');
                    $("#BTG_LS_SS52MV02_St").removeClass('col_bg_closed');
                }

                $("#BTG_LS_ER51MV02_St").html(BTG_LS_ER51MV02_Sty);
                $("#BTG_LS_ER51MV03_St").html(BTG_LS_ER51MV03_Sty);
                $("#BTG_LS_ER54MV05_St").html(BTG_LS_ER54MV05_Sty);
                $("#BTG_LS_ER55AMV05_St").html(BTG_LS_ER55AMV05_Sty);
                $("#BTG_LS_ER55AMV06_St").html(BTG_LS_ER55AMV06_Sty);
                $("#BTG_LS_ER56MV05_St").html(BTG_LS_ER56MV05_Sty);
                $("#BTG_LS_ER58BMV06_St").html(BTG_LS_ER58BMV06_Sty);
                $("#BTG_LS_ER58BMV12_St").html(BTG_LS_ER58BMV12_Sty);
                $("#BTG_LS_Q03_St").html(BTG_LS_Q03_Sty);
                $("#BTG_LS_Q04_St").html(BTG_LS_Q04_Sty);
                $("#BTG_LS_Q05_St").html(BTG_LS_Q05_Sty);
                $("#BTG_LS_Q10_St").html(BTG_LS_Q10_Sty);
                $("#BTG_LS_Q11_St").html(BTG_LS_Q11_Sty);
                $("#BTG_LS_Q12_St").html(BTG_LS_Q12_Sty);
                $("#BTG_LS_Q13_St").html(BTG_LS_Q13_Sty);
                $("#BTG_LS_Q18_St").html(BTG_LS_Q18_Sty);
                $("#BTG_LS_Q20_St").html(BTG_LS_Q20_Sty);
                $("#BTG_LS_Q21_St").html(BTG_LS_Q21_Sty);
                $("#BTG_LS_Q22_St").html(BTG_LS_Q22_Sty);
                $("#BTG_LS_Q26_St").html(BTG_LS_Q26_Sty);
                $("#BTG_LS_SG2_F07_St").html(BTG_LS_SG2_F07_Sty);
                $("#BTG_LS_SG3_F02_St").html(BTG_LS_SG3_F02_Sty);
                $("#BTG_LS_SG4A_MV03_St").html(BTG_LS_SG4A_MV03_Sty);
                $("#BTG_LS_SG4_F07_St").html(BTG_LS_SG4_F07_Sty);
                $("#BTG_LS_SG4_F08_St").html(BTG_LS_SG4_F08_Sty);
                $("#BTG_LS_SG4_F15_St").html(BTG_LS_SG4_F15_Sty);
                $("#BTG_LS_SG6_F05_St").html(BTG_LS_SG6_F05_Sty);
                $("#BTG_LS_SG7_F05_St").html(BTG_LS_SG7_F05_Sty);
                $("#BTG_LS_SG8_F2_St").html(BTG_LS_SG8_F2_Sty);
                $("#BTG_LS_SG8_F3_St").html(BTG_LS_SG8_F3_Sty);
                $("#BTG_LS_SS52MV02_St").html(BTG_LS_SS52MV02_Sty);
            }
        }).done(function (data) {}).fail(function () {
        });

        //POWER
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tonasa/get_btg_power',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var BTG_LS_ER51MV02_P = parseFloat(dataJson[0].tags[0].props[0].val).toFixed(2);
                var BTG_LS_ER51MV03_P = parseFloat(dataJson[0].tags[1].props[0].val).toFixed(2);
                var BTG_LS_ER54MV05_P = parseFloat(dataJson[0].tags[2].props[0].val).toFixed(2);
                var BTG_LS_ER55AMV05_P = parseFloat(dataJson[0].tags[3].props[0].val).toFixed(2);
                var BTG_LS_ER55AMV06_P = parseFloat(dataJson[0].tags[4].props[0].val).toFixed(2);
                var BTG_LS_ER56MV05_P = parseFloat(dataJson[0].tags[5].props[0].val).toFixed(2);
                var BTG_LS_ER58BMV06_P = parseFloat(dataJson[0].tags[6].props[0].val).toFixed(2);
                var BTG_LS_ER58BMV12_P = parseFloat(dataJson[0].tags[7].props[0].val).toFixed(2);
                var BTG_LS_Q03_P = parseFloat(dataJson[0].tags[8].props[0].val).toFixed(2);
                var BTG_LS_Q04_P = parseFloat(dataJson[0].tags[9].props[0].val).toFixed(2);
                var BTG_LS_Q05_P = parseFloat(dataJson[0].tags[10].props[0].val).toFixed(2);
                var BTG_LS_Q10_P = parseFloat(dataJson[0].tags[11].props[0].val).toFixed(2);
                var BTG_LS_Q11_P = parseFloat(dataJson[0].tags[12].props[0].val).toFixed(2);
                var BTG_LS_Q12_P = parseFloat(dataJson[0].tags[13].props[0].val).toFixed(2);
                var BTG_LS_Q13_P = parseFloat(dataJson[0].tags[14].props[0].val).toFixed(2);
                var BTG_LS_Q18_P = parseFloat(dataJson[0].tags[15].props[0].val).toFixed(2);
                var BTG_LS_Q20_P = parseFloat(dataJson[0].tags[16].props[0].val).toFixed(2);
                var BTG_LS_Q21_P = parseFloat(dataJson[0].tags[17].props[0].val).toFixed(2);
                var BTG_LS_Q22_P = parseFloat(dataJson[0].tags[18].props[0].val).toFixed(2);
                var BTG_LS_Q26_P = parseFloat(dataJson[0].tags[19].props[0].val).toFixed(2);
                var BTG_LS_SG2_F07_P = parseFloat(dataJson[0].tags[20].props[0].val).toFixed(2);
                var BTG_LS_SG3_F02_P = parseFloat(dataJson[0].tags[21].props[0].val).toFixed(2);
                var BTG_LS_SG4A_MV03_P = parseFloat(dataJson[0].tags[22].props[0].val).toFixed(2);
                var BTG_LS_SG4_F07_P = parseFloat(dataJson[0].tags[23].props[0].val).toFixed(2);
                var BTG_LS_SG4_F08_P = parseFloat(dataJson[0].tags[24].props[0].val).toFixed(2);
                var BTG_LS_SG4_F15_P = parseFloat(dataJson[0].tags[25].props[0].val).toFixed(2);
                var BTG_LS_SG6_F05_P = parseFloat(dataJson[0].tags[26].props[0].val).toFixed(2);
                var BTG_LS_SG7_F05_P = parseFloat(dataJson[0].tags[27].props[0].val).toFixed(2);
                var BTG_LS_SG8_F2_P = parseFloat(dataJson[0].tags[28].props[0].val).toFixed(2);
                var BTG_LS_SG8_F3_P = parseFloat(dataJson[0].tags[29].props[0].val).toFixed(2);
                var BTG_LS_SS52MV02_P = parseFloat(dataJson[0].tags[30].props[0].val).toFixed(2);

                $("#BTG_LS_ER51MV02_P").html(BTG_LS_ER51MV02_P);
                $("#BTG_LS_ER51MV03_P").html(BTG_LS_ER51MV03_P);
                $("#BTG_LS_ER54MV05_P").html(BTG_LS_ER54MV05_P);
                $("#BTG_LS_ER55AMV05_P").html(BTG_LS_ER55AMV05_P);
                $("#BTG_LS_ER55AMV06_P").html(BTG_LS_ER55AMV06_P);
                $("#BTG_LS_ER56MV05_P").html(BTG_LS_ER56MV05_P);
                $("#BTG_LS_ER58BMV06_P").html(BTG_LS_ER58BMV06_P);
                $("#BTG_LS_ER58BMV12_P").html(BTG_LS_ER58BMV12_P);
                $("#BTG_LS_Q03_P").html(BTG_LS_Q03_P);
                $("#BTG_LS_Q04_P").html(BTG_LS_Q04_P);
                $("#BTG_LS_Q05_P").html(BTG_LS_Q05_P);
                $("#BTG_LS_Q10_P").html(BTG_LS_Q10_P);
                $("#BTG_LS_Q11_P").html(BTG_LS_Q11_P);
                $("#BTG_LS_Q12_P").html(BTG_LS_Q12_P);
                $("#BTG_LS_Q13_P").html(BTG_LS_Q13_P);
                $("#BTG_LS_Q18_P").html(BTG_LS_Q18_P);
                $("#BTG_LS_Q20_P").html(BTG_LS_Q20_P);
                $("#BTG_LS_Q21_P").html(BTG_LS_Q21_P);
                $("#BTG_LS_Q22_P").html(BTG_LS_Q22_P);
                $("#BTG_LS_Q26_P").html(BTG_LS_Q26_P);
                $("#BTG_LS_SG2_F07_P").html(BTG_LS_SG2_F07_P);
                $("#BTG_LS_SG3_F02_P").html(BTG_LS_SG3_F02_P);
                $("#BTG_LS_SG4A_MV03_P").html(BTG_LS_SG4A_MV03_P);
                $("#BTG_LS_SG4_F07_P").html(BTG_LS_SG4_F07_P);
                $("#BTG_LS_SG4_F08_P").html(BTG_LS_SG4_F08_P);
                $("#BTG_LS_SG4_F15_P").html(BTG_LS_SG4_F15_P);
                $("#BTG_LS_SG6_F05_P").html(BTG_LS_SG6_F05_P);
                $("#BTG_LS_SG7_F05_P").html(BTG_LS_SG7_F05_P);
                $("#BTG_LS_SG8_F2_P").html(BTG_LS_SG8_F2_P);
                $("#BTG_LS_SG8_F3_P").html(BTG_LS_SG8_F3_P);
                $("#BTG_LS_SS52MV02_P").html(BTG_LS_SS52MV02_P);
            }
        }).done(function (data) {}).fail(function () {
        });

        //POWERED BY
        $.ajax({
            url: 'http://par4digma.semenindonesia.com/api/index.php/plant_tonasa/get_btg_pwrdby',
            type: 'GET',
            success: function (data) {
                var data1 = data.replace("<title>Json</title>", "");
                var data2 = data1.replace("(", "[");
                var data3 = data2.replace(");", "]");
                var dataJson = JSON.parse(data3);

                //Value
                var BTG_LS_ER51MV02_Sox = dataJson[0].tags[0].props[0].val;
                var BTG_LS_ER51MV03_Sox = dataJson[0].tags[1].props[0].val;
                var BTG_LS_ER54MV05_Sox = dataJson[0].tags[2].props[0].val;
                var BTG_LS_ER55AMV05_Sox = dataJson[0].tags[3].props[0].val;
                var BTG_LS_ER55AMV06_Sox = dataJson[0].tags[4].props[0].val;
                var BTG_LS_ER56MV05_Sox = dataJson[0].tags[5].props[0].val;
                var BTG_LS_ER58BMV06_Sox = dataJson[0].tags[6].props[0].val;
                var BTG_LS_ER58BMV12_Sox = dataJson[0].tags[7].props[0].val;
                var BTG_LS_Q03_Sox = dataJson[0].tags[8].props[0].val;
                var BTG_LS_Q04_Sox = dataJson[0].tags[9].props[0].val;
                var BTG_LS_Q05_Sox = dataJson[0].tags[10].props[0].val;
                var BTG_LS_Q10_Sox = dataJson[0].tags[11].props[0].val;
                var BTG_LS_Q11_Sox = dataJson[0].tags[12].props[0].val;
                var BTG_LS_Q12_Sox = dataJson[0].tags[13].props[0].val;
                var BTG_LS_Q13_Sox = dataJson[0].tags[14].props[0].val;
                var BTG_LS_Q18_Sox = dataJson[0].tags[15].props[0].val;
                var BTG_LS_Q20_Sox = dataJson[0].tags[16].props[0].val;
                var BTG_LS_Q21_Sox = dataJson[0].tags[17].props[0].val;
                var BTG_LS_Q22_Sox = dataJson[0].tags[18].props[0].val;
                var BTG_LS_Q26_Sox = dataJson[0].tags[19].props[0].val;
                var BTG_LS_SG2_F07_Sox = dataJson[0].tags[20].props[0].val;
                var BTG_LS_SG3_F02_Sox = dataJson[0].tags[21].props[0].val;
                var BTG_LS_SG4A_MV03_Sox = dataJson[0].tags[22].props[0].val;
                var BTG_LS_SG4_F07_Sox = dataJson[0].tags[23].props[0].val;
                var BTG_LS_SG4_F08_Sox = dataJson[0].tags[24].props[0].val;
                var BTG_LS_SG4_F15_Sox = dataJson[0].tags[25].props[0].val;
                var BTG_LS_SG6_F05_Sox = dataJson[0].tags[26].props[0].val;
                var BTG_LS_SG7_F05_Sox = dataJson[0].tags[27].props[0].val;
                var BTG_LS_SG8_F2_Sox = dataJson[0].tags[28].props[0].val;
                var BTG_LS_SG8_F3_Sox = dataJson[0].tags[29].props[0].val;
                var BTG_LS_SS52MV02_Sox = dataJson[0].tags[30].props[0].val;

                var BTG_LS_ER51MV02_Soy, BTG_LS_ER51MV03_Soy, BTG_LS_ER54MV05_Soy, BTG_LS_ER55AMV05_Soy, BTG_LS_ER55AMV06_Soy, BTG_LS_ER56MV05_Soy, BTG_LS_ER58BMV06_Soy, BTG_LS_ER58BMV12_Soy, BTG_LS_Q03_Soy, BTG_LS_Q04_Soy, BTG_LS_Q05_Soy, BTG_LS_Q10_Soy, BTG_LS_Q11_Soy, BTG_LS_Q12_Soy, BTG_LS_Q13_Soy, BTG_LS_Q18_Soy, BTG_LS_Q20_Soy, BTG_LS_Q21_Soy, BTG_LS_Q22_Soy, BTG_LS_Q26_Soy, BTG_LS_SG2_F07_Soy, BTG_LS_SG3_F02_Soy, BTG_LS_SG4A_MV03_Soy, BTG_LS_SG4_F07_Soy, BTG_LS_SG4_F08_Soy, BTG_LS_SG4_F15_Soy, BTG_LS_SG6_F05_Soy, BTG_LS_SG7_F05_Soy, BTG_LS_SG8_F2_Soy, BTG_LS_SG8_F3_Soy, BTG_LS_SS52MV02_Soy;
                if (BTG_LS_ER51MV02_Sox == '1') {
                    BTG_LS_ER51MV02_Soy = 'BTG';
                    $("#BTG_LS_ER51MV02_So").addClass('col_source_btg');
                    $("#BTG_LS_ER51MV02_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_ER51MV02_Soy = 'PLN';
                    $("#BTG_LS_ER51MV02_So").addClass('col_source_pln');
                    $("#BTG_LS_ER51MV02_So").removeClass('col_source_btg');
                }
                if (BTG_LS_ER51MV03_Sox == '1') {
                    BTG_LS_ER51MV03_Soy = 'BTG';
                    $("#BTG_LS_ER51MV03_So").addClass('col_source_btg');
                    $("#BTG_LS_ER51MV03_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_ER51MV03_Soy = 'PLN';
                    $("#BTG_LS_ER51MV03_So").addClass('col_source_pln');
                    $("#BTG_LS_ER51MV03_So").removeClass('col_source_btg');
                }
                if (BTG_LS_ER54MV05_Sox == '1') {
                    BTG_LS_ER54MV05_Soy = 'BTG';
                    $("#BTG_LS_ER54MV05_So").addClass('col_source_btg');
                    $("#BTG_LS_ER54MV05_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_ER54MV05_Soy = 'PLN';
                    $("#BTG_LS_ER54MV05_So").addClass('col_source_pln');
                    $("#BTG_LS_ER54MV05_So").removeClass('col_source_btg');
                }
                if (BTG_LS_ER55AMV05_Sox == '1') {
                    BTG_LS_ER55AMV05_Soy = 'BTG';
                    $("#BTG_LS_ER55AMV05_So").addClass('col_source_btg');
                    $("#BTG_LS_ER55AMV05_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_ER55AMV05_Soy = 'PLN';
                    $("#BTG_LS_ER55AMV05_So").addClass('col_source_pln');
                    $("#BTG_LS_ER55AMV05_So").removeClass('col_source_btg');
                }
                if (BTG_LS_ER55AMV06_Sox == '1') {/////////////////////////////
                    BTG_LS_ER55AMV06_Soy = 'BTG';
                    $("#BTG_LS_ER55AMV06_So").addClass('col_source_btg');
                    $("#BTG_LS_ER55AMV06_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_ER55AMV06_Soy = 'PLN';
                    $("#BTG_LS_ER55AMV06_So").addClass('col_source_pln');
                    $("#BTG_LS_ER55AMV06_So").removeClass('col_source_btg');
                }
                if (BTG_LS_ER56MV05_Sox == '1') {
                    BTG_LS_ER56MV05_Soy = 'BTG';
                    $("#BTG_LS_ER56MV05_So").addClass('col_source_btg');
                    $("#BTG_LS_ER56MV05_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_ER56MV05_Soy = 'PLN';
                    $("#BTG_LS_ER56MV05_So").addClass('col_source_pln');
                    $("#BTG_LS_ER56MV05_So").removeClass('col_source_btg');
                }
                if (BTG_LS_ER58BMV06_Sox == '1') {
                    BTG_LS_ER58BMV06_Soy = 'BTG';
                    $("#BTG_LS_ER58BMV06_So").addClass('col_source_btg');
                    $("#BTG_LS_ER58BMV06_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_ER58BMV06_Soy = 'PLN';
                    $("#BTG_LS_ER58BMV06_So").addClass('col_source_pln');
                    $("#BTG_LS_ER58BMV06_So").removeClass('col_source_btg');
                }
                if (BTG_LS_ER58BMV12_Sox == '1') {
                    BTG_LS_ER58BMV12_Soy = 'BTG';
                    $("#BTG_LS_ER58BMV12_So").addClass('col_source_btg');
                    $("#BTG_LS_ER58BMV12_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_ER58BMV12_Soy = 'PLN';
                    $("#BTG_LS_ER58BMV12_So").addClass('col_source_pln');
                    $("#BTG_LS_ER58BMV12_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q03_Sox == '1') {
                    BTG_LS_Q03_Soy = 'BTG';
                    $("#BTG_LS_Q03_So").addClass('col_source_btg');
                    $("#BTG_LS_Q03_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q03_Soy = 'PLN';
                    $("#BTG_LS_Q03_So").addClass('col_source_pln');
                    $("#BTG_LS_Q03_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q04_Sox == '1') {
                    BTG_LS_Q04_Soy = 'BTG';
                    $("#BTG_LS_Q04_So").addClass('col_source_btg');
                    $("#BTG_LS_Q04_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q04_Soy = 'PLN';
                    $("#BTG_LS_Q04_So").addClass('col_source_pln');
                    $("#BTG_LS_Q04_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q05_Sox == '1') {
                    BTG_LS_Q05_Soy = 'BTG';
                    $("#BTG_LS_Q05_So").addClass('col_source_btg');
                    $("#BTG_LS_Q05_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q05_Soy = 'PLN';
                    $("#BTG_LS_Q05_So").addClass('col_source_pln');
                    $("#BTG_LS_Q05_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q10_Sox == '1') {
                    BTG_LS_Q10_Soy = 'BTG';
                    $("#BTG_LS_Q10_So").addClass('col_source_btg');
                    $("#BTG_LS_Q10_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q10_Soy = 'PLN';
                    $("#BTG_LS_Q10_So").addClass('col_source_pln');
                    $("#BTG_LS_Q10_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q11_Sox == '1') {
                    BTG_LS_Q11_Soy = 'BTG';
                    $("#BTG_LS_Q11_So").addClass('col_source_btg');
                    $("#BTG_LS_Q11_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q11_Soy = 'PLN';
                    $("#BTG_LS_Q11_So").addClass('col_source_pln');
                    $("#BTG_LS_Q11_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q12_Sox == '1') {
                    BTG_LS_Q12_Soy = 'BTG';
                    $("#BTG_LS_Q12_So").addClass('col_source_btg');
                    $("#BTG_LS_Q12_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q12_Soy = 'PLN';
                    $("#BTG_LS_Q12_So").addClass('col_source_pln');
                    $("#BTG_LS_Q12_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q13_Sox == '1') {
                    BTG_LS_Q13_Soy = 'BTG';
                    $("#BTG_LS_Q13_So").addClass('col_source_btg');
                    $("#BTG_LS_Q13_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q13_Soy = 'PLN';
                    $("#BTG_LS_Q13_So").addClass('col_source_pln');
                    $("#BTG_LS_Q13_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q18_Sox == '1') {
                    BTG_LS_Q18_Soy = 'BTG';
                    $("#BTG_LS_Q18_So").addClass('col_source_btg');
                    $("#BTG_LS_Q18_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q18_Soy = 'PLN';
                    $("#BTG_LS_Q18_So").addClass('col_source_pln');
                    $("#BTG_LS_Q18_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q20_Sox == '1') {
                    BTG_LS_Q20_Soy = 'BTG';
                    $("#BTG_LS_Q20_So").addClass('col_source_btg');
                    $("#BTG_LS_Q20_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q20_Soy = 'PLN';
                    $("#BTG_LS_Q20_So").addClass('col_source_pln');
                    $("#BTG_LS_Q20_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q21_Sox == '1') {
                    BTG_LS_Q21_Soy = 'BTG';
                    $("#BTG_LS_Q21_So").addClass('col_source_btg');
                    $("#BTG_LS_Q21_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q21_Soy = 'PLN';
                    $("#BTG_LS_Q21_So").addClass('col_source_pln');
                    $("#BTG_LS_Q21_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q22_Sox == '1') {
                    BTG_LS_Q22_Soy = 'BTG';
                    $("#BTG_LS_Q22_So").addClass('col_source_btg');
                    $("#BTG_LS_Q22_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q22_Soy = 'PLN';
                    $("#BTG_LS_Q22_So").addClass('col_source_pln');
                    $("#BTG_LS_Q22_So").removeClass('col_source_btg');
                }
                if (BTG_LS_Q26_Sox == '1') {
                    BTG_LS_Q26_Soy = 'BTG';
                    $("#BTG_LS_Q26_So").addClass('col_source_btg');
                    $("#BTG_LS_Q26_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_Q26_Soy = 'PLN';
                    $("#BTG_LS_Q26_So").addClass('col_source_pln');
                    $("#BTG_LS_Q26_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG2_F07_Sox == '1') {
                    BTG_LS_SG2_F07_Soy = 'BTG';
                    $("#BTG_LS_SG2_F07_So").addClass('col_source_btg');
                    $("#BTG_LS_SG2_F07_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG2_F07_Soy = 'PLN';
                    $("#BTG_LS_SG2_F07_So").addClass('col_source_pln');
                    $("#BTG_LS_SG2_F07_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG3_F02_Sox == '1') {
                    BTG_LS_SG3_F02_Soy = 'BTG';
                    $("#BTG_LS_SG3_F02_So").addClass('col_source_btg');
                    $("#BTG_LS_SG3_F02_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG3_F02_Soy = 'PLN';
                    $("#BTG_LS_SG3_F02_So").addClass('col_source_pln');
                    $("#BTG_LS_SG3_F02_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG4A_MV03_Sox == '1') {
                    BTG_LS_SG4A_MV03_Soy = 'BTG';
                    $("#BTG_LS_SG4A_MV03_So").addClass('col_source_btg');
                    $("#BTG_LS_SG4A_MV03_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG4A_MV03_Soy = 'PLN';
                    $("#BTG_LS_SG4A_MV03_So").addClass('col_source_pln');
                    $("#BTG_LS_SG4A_MV03_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG4_F07_Sox == '1') {
                    BTG_LS_SG4_F07_Soy = 'BTG';
                    $("#BTG_LS_SG4_F07_So").addClass('col_source_btg');
                    $("#BTG_LS_SG4_F07_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG4_F07_Soy = 'PLN';
                    $("#BTG_LS_SG4_F07_So").addClass('col_source_pln');
                    $("#BTG_LS_SG4_F07_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG4_F08_Sox == '1') {
                    BTG_LS_SG4_F08_Soy = 'BTG';
                    $("#BTG_LS_SG4_F08_So").addClass('col_source_btg');
                    $("#BTG_LS_SG4_F08_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG4_F08_Soy = 'PLN';
                    $("#BTG_LS_SG4_F08_So").addClass('col_source_pln');
                    $("#BTG_LS_SG4_F08_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG4_F15_Sox == '1') {
                    BTG_LS_SG4_F15_Soy = 'BTG';
                    $("#BTG_LS_SG4_F15_So").addClass('col_source_btg');
                    $("#BTG_LS_SG4_F15_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG4_F15_Soy = 'PLN';
                    $("#BTG_LS_SG4_F15_So").addClass('col_source_pln');
                    $("#BTG_LS_SG4_F15_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG6_F05_Sox == '1') {
                    BTG_LS_SG6_F05_Soy = 'BTG';
                    $("#BTG_LS_SG6_F05_So").addClass('col_source_btg');
                    $("#BTG_LS_SG6_F05_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG6_F05_Soy = 'PLN';
                    $("#BTG_LS_SG6_F05_So").addClass('col_source_pln');
                    $("#BTG_LS_SG6_F05_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG7_F05_Sox == '1') {
                    BTG_LS_SG7_F05_Soy = 'BTG';
                    $("#BTG_LS_SG7_F05_So").addClass('col_source_btg');
                    $("#BTG_LS_SG7_F05_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG7_F05_Soy = 'PLN';
                    $("#BTG_LS_SG7_F05_So").addClass('col_source_pln');
                    $("#BTG_LS_SG7_F05_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG8_F2_Sox == '1') {
                    BTG_LS_SG8_F2_Soy = 'BTG';
                    $("#BTG_LS_SG8_F2_So").addClass('col_source_btg');
                    $("#BTG_LS_SG8_F2_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG8_F2_Soy = 'PLN';
                    $("#BTG_LS_SG8_F2_So").addClass('col_source_pln');
                    $("#BTG_LS_SG8_F2_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SG8_F3_Sox == '1') {
                    BTG_LS_SG8_F3_Soy = 'BTG';
                    $("#BTG_LS_SG8_F3_So").addClass('col_source_btg');
                    $("#BTG_LS_SG8_F3_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SG8_F3_Soy = 'PLN';
                    $("#BTG_LS_SG8_F3_So").addClass('col_source_pln');
                    $("#BTG_LS_SG8_F3_So").removeClass('col_source_btg');
                }
                if (BTG_LS_SS52MV02_Sox == '1') {///////////
                    BTG_LS_SS52MV02_Soy = 'BTG';
                    $("#BTG_LS_SS52MV02_So").addClass('col_source_btg');
                    $("#BTG_LS_SS52MV02_So").removeClass('col_source_pln');
                } else {
                    BTG_LS_SS52MV02_Soy = 'PLN';
                    $("#BTG_LS_SS52MV02_So").addClass('col_source_pln');
                    $("#BTG_LS_SS52MV02_So").removeClass('col_source_btg');
                }


                $("#BTG_LS_ER51MV02_So").html(BTG_LS_ER51MV02_Soy);
                $("#BTG_LS_ER51MV03_So").html(BTG_LS_ER51MV03_Soy);
                $("#BTG_LS_ER54MV05_So").html(BTG_LS_ER54MV05_Soy);
                $("#BTG_LS_ER55AMV05_So").html(BTG_LS_ER55AMV05_Soy);
                $("#BTG_LS_ER55AMV06_So").html(BTG_LS_ER55AMV06_Soy);
                $("#BTG_LS_ER56MV05_So").html(BTG_LS_ER56MV05_Soy);
                $("#BTG_LS_ER58BMV06_So").html(BTG_LS_ER58BMV06_Soy);
                $("#BTG_LS_ER58BMV12_So").html(BTG_LS_ER58BMV12_Soy);
                $("#BTG_LS_Q03_So").html(BTG_LS_Q03_Soy);
                $("#BTG_LS_Q04_So").html(BTG_LS_Q04_Soy);
                $("#BTG_LS_Q05_So").html(BTG_LS_Q05_Soy);
                $("#BTG_LS_Q10_So").html(BTG_LS_Q10_Soy);
                $("#BTG_LS_Q11_So").html(BTG_LS_Q11_Soy);
                $("#BTG_LS_Q12_So").html(BTG_LS_Q12_Soy);
                $("#BTG_LS_Q13_So").html(BTG_LS_Q13_Soy);
                $("#BTG_LS_Q18_So").html(BTG_LS_Q18_Soy);
                $("#BTG_LS_Q20_So").html(BTG_LS_Q20_Soy);
                $("#BTG_LS_Q21_So").html(BTG_LS_Q21_Soy);
                $("#BTG_LS_Q22_So").html(BTG_LS_Q22_Soy);
                $("#BTG_LS_Q26_So").html(BTG_LS_Q26_Soy);
                $("#BTG_LS_SG2_F07_So").html(BTG_LS_SG2_F07_Soy);
                $("#BTG_LS_SG3_F02_So").html(BTG_LS_SG3_F02_Soy);
                $("#BTG_LS_SG4A_MV03_So").html(BTG_LS_SG4A_MV03_Soy);
                $("#BTG_LS_SG4_F07_So").html(BTG_LS_SG4_F07_Soy);
                $("#BTG_LS_SG4_F08_So").html(BTG_LS_SG4_F08_Soy);
                $("#BTG_LS_SG4_F15_So").html(BTG_LS_SG4_F15_Soy);
                $("#BTG_LS_SG6_F05_So").html(BTG_LS_SG6_F05_Soy);
                $("#BTG_LS_SG7_F05_So").html(BTG_LS_SG7_F05_Soy);
                $("#BTG_LS_SG8_F2_So").html(BTG_LS_SG8_F2_Soy);
                $("#BTG_LS_SG8_F3_So").html(BTG_LS_SG8_F3_Soy);
                $("#BTG_LS_SS52MV02_So").html(BTG_LS_SS52MV02_Soy);
            }
        }).done(function (data) {}).fail(function () {
        });
    }
    ;
    setInterval(dataUpdate, 1000);
</script>