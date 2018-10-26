<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Produksi Daily</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        /** meberi animasi pada icon**/
        .glyphicon-refresh-animate {
            -animation: spin .7s infinite linear;
            -webkit-animation: spin2 .7s infinite linear;
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg);}
            to { -webkit-transform: rotate(360deg);}
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg);}
            to { transform: scale(1) rotate(360deg);}
        }
    </style>

</head>
<body>
<div class="container">
    <section class="content-header">
        <h1>
            Upload Data
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-upload"></span>&nbsp; Upload</div>
            <div class="panel-body">
                <form class="form-horizontal" id="profit_lost" enctype="multipart/form-data" method="post">
                    <br>
                    <div style="position:relative;">
                        <a class='btn btn-primary' href='javascript:;'>
                            Choose File...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;bottom:0;cursor:pointer;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" id="file" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-success' id="upload-file-info"></span>
                    </div>
                    <label style="font-size: 10px;">*xls</label>
                    <div>
                        <a target="_black" href="<?=base_url('assets/profit_lost/profit and lost.xls')?>" style="color: black;">Download Template</a>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <button class="btn btn-danger" id="ButtonCogsUpload" onclick="UploadProfitLost()"><span class="glyphicon glyphicon-floppy-disk"></span>&nbspUpload</button>
            </div>
        </div>
    </section>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
<script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript">
    function UploadProfitLost(){
        $("#ButtonCogsUpload").html('<span class="fa fa-spinner glyphicon-refresh-animate"></span>&nbspLoading ...');
        document.getElementById("ButtonCogsUpload").disabled = true;
        $('#profit_lost').form('submit',{
            url:'<?=site_url('cogs_upload/uploading')?>',
            onSubmit: function(){
                return $(this).form('validate');
            },
            success: function(result){
                var callback = eval('('+result+')');
                if(result.status){
                    console.log(result.data);
                    $("#ButtonCogsUpload").html('<i class="fa fa-save"></i>&nbspUpload');
                    alertify.alert('Info',callback.msg);
                    document.getElementById("ButtonCogsUpload").disabled = false;
                } else {
                    console.log(result.data);
                    $("#ButtonCogsUpload").html('<i class="fa fa-save"></i>&nbspUpload');
                    alertify.set('notifier','position', 'top-right');
                    alertify.error(callback.msg);
                    document.getElementById("ButtonCogsUpload").disabled = false;
                }
            },
        });
    }
</script>
</body>
</html>
