<style>
    .panel-heading h3 {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: normal;
        width: 75%;
        padding-top: 8px;
    }
</style>
<script>
    $(function () {
        $("#btnTambahMenuDetail").click(function () {
            $("#titleModalMenu").html("Menu Selected..");
            var htmlDetail = "<form id='frmRoleAdd'> <input class='form-control' name='roleName' type='text'></form>";
            $("#footerModalMenu").html('<button type="button" class="btn btn-success" data-dismiss="modal" id="btnfrmRoleAdd">Save</button>');
            $("#bodyModalMenu").html(htmlDetail);
            $('#ModalMenu').modal('show');
        });
        $("#btnTambahMenu").click(function () {
            $("#titleModalMenu").html("Role Created..");
            var htmlDetail = "<form id='frmRoleAdd'> <input class='form-control' name='roleName' type='text'></form>";
            $("#footerModalMenu").html('<button type="button" class="btn btn-success" data-dismiss="modal" id="btnfrmRoleAdd">Save</button>');
            $("#bodyModalMenu").html(htmlDetail);
            $('#ModalMenu').modal('show');
        });
    });
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Role Name</h3>
                <button class="btn btn-success btn-sm pull-right" type="button" style="margin-top:0px;" id="btnTambahMenu" disabled>
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Explanation</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Administrator</td>
                            <td>1</td>
                            <td>All Function (Add user, Edit data, View data)</td>
                        </tr>
                        <tr>
                            <td>Editor</td>
                            <td>2</td>
                            <td>Edit data and viewing</td>
                        </tr>
                        <tr>
                            <td>Viewer</td>
                            <td>3</td>
                            <td>Just viewing, no Edit, no Add any user</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Detail Menu</h3>
                <button class="btn btn-success btn-sm pull-right" type="button" id="btnTambahMenuDetail">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">

            </div>
        </div>
    </div>-->
</div>

<!-- Modal -->
<div class="modal fade" id="ModalMenu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title" id="titleModalMenu"></div>
            </div>
            <div class="modal-body">
                <div id="bodyModalMenu"></div>
            </div>
            <div class="modal-footer">
                <span id="footerModalMenu"></span>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
