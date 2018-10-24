<style>
    .textmenu{
        font-size:10px;
    }
    .btnmenu {
        min-width: 150px;
        max-width: 150px;
    }
    .show_load {
        display: none;
        visibility: visible;
    }
    .hide_load {
        display: none;
        visibility: hidden;
    }
    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>	
<script>
    $(function () {
        $('#loading').show();
        $('#btnUserSelection').removeClass('btn btn-default btnmenu');
        $('#btnUserSelection').addClass('btn btn-info btnmenu active');
        $('#LoadCUserSelection').load("<?php echo site_url('plant_administrator/UserControl'); ?>");

        $('#btnUserSelection').click(function () {
            $('#btnUserSelection').removeClass('btn btn-default btnmenu');
            $('#btnUserSelection').addClass('btn btn-info btnmenu active');
            $('#btnRoleMaintenance').removeClass('btn btn-info btnmenu active');
            $('#btnRoleMaintenance').addClass('btn btn-default btnmenu');
//            $('#btnManageChart').removeClass('btn btn-info btnmenu active');
//            $('#btnManageChart').addClass('btn btn-default btnmenu');
        });
        $('#btnRoleMaintenance').click(function () {
            $('#btnRoleMaintenance').removeClass('btn btn-default btnmenu');
            $('#btnRoleMaintenance').addClass('btn btn-info btnmenu active');
            $('#btnUserSelection').removeClass('btn btn-info btnmenu active');
            $('#btnUserSelection').addClass('btn btn-default btnmenu');
//            $('#btnManageChart').removeClass('btn btn-info btnmenu active');
//            $('#btnManageChart').addClass('btn btn-default btnmenu');
            $('#LoadCRoleMaintenance').load("<?php echo site_url('plant_administrator/UserMenuCreated'); ?>");
        });
//        $('#btnManageChart').click(function () {
//            $('#btnRoleMaintenance').removeClass('btn btn-info btnmenu active');
//            $('#btnRoleMaintenance').addClass('btn btn-default btnmenu');
//            $('#btnUserSelection').removeClass('btn btn-info btnmenu active');
//            $('#btnUserSelection').addClass('btn btn-default btnmenu');
//            $('#btnManageChart').removeClass('btn btn-default btnmenu');
//            $('#btnManageChart').addClass('btn btn-info btnmenu active');
//            $('#LoadCManageChart').load("<?php echo site_url('plant_administrator/editChartSeq'); ?>", function () {
//                $('#loading').addClass('hide_load');
//            });
//        });
    });
</script>
<div class="row" style="padding-left:10px;padding-right:10px;">
    <div class="col-xs-12 col-md-12">
        <ul class="nav nav-tabs">
            <li class="active">
                <button id="btnUserSelection" data-toggle="tab" href="#userSelection" type="button" class="btn btn-default btnmenu ">
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br> <span class="textmenu">User Selection</span>
                </button>
            </li>
            <li>
                <button id="btnRoleMaintenance" data-toggle="tab" href="#roleMaintenance" type="button" class="btn btn-default btnmenu">
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br> <span class="textmenu">Maintenance Role</span>
                </button>
            </li>
<!--            <li>
                <button id="btnManageChart" data-toggle="tab" href="#manageChart" type="button" class="btn btn-default btnmenu">
                    <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span><br> <span class="textmenu">Edit Chart's  X-Y</span>
                </button>
            </li>-->
        </ul>
        <div class="tab-content">
            <div id="userSelection" class="tab-pane fade in active">
                <div id="LoadCUserSelection"></div>
            </div>
            <div id="roleMaintenance" class="tab-pane fade">
                <div id="LoadCRoleMaintenance"></div>
            </div>
<!--            <div id="manageChart" class="tab-pane fade">
                <div id="loading" class="loader" style="text-align: center"></div>
                <div id="LoadCManageChart"></div>
            </div>-->
        </div>
    </div>	
</div>