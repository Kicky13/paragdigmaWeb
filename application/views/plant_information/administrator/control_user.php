<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><div class="panel-title">1. Search User to Add</div></div>
            <div class="panel-body">
                <input id="namaPegawai" type="text" name="input[nama]"class="form-control" placeholder="Search By Nama Pegawai.." onkeypress = "search_namaPegawai(this.value);">
                <input id="noPegawai" type="text" name="input[nopeg]"class="form-control" placeholder="Search By Nopeg Pegawai.." onkeypress = "search_noPegawai(this.value);">
                <span id="loading" style="display:none;"><i  class="fa fa-spinner fa-spin fa-2x" ></i> Loading..</span>
                <div class="panel-title" style="padding-top: 10px; padding-bottom: 10px;">2. Assign Role to New User</div>
                <div style="padding-bottom: 10px;">
                    <form action="" method="post">
                        <div class="col-md-4"><input type="radio" name="radio" id="RadioRole" onclick="get_role()" value="1">&nbsp;&nbsp;1 - Administrator</div>
                        <div class="col-md-4"><input type="radio" name="radio" id="RadioRole" onclick="get_role()" value="2">&nbsp;&nbsp;2 - Editor</div>
                        <div class="col-md-4"><input type="radio" name="radio" id="RadioRole" onclick="get_role()" value="3">&nbsp;&nbsp;3 - Viewer</div>
                    </form>
                </div>
                <div style="padding-top: 15px; padding-bottom: 10px;">&nbsp;You have selected :
                    <span id="role_number"></span>
                    <span id="roles_selected" style="font-weight: bold;"></span>
                </div>
                <div class="panel-title" style="padding-top: 10px; padding-bottom: 10px;">3. Click on the orange button</div>
                <?php
                $role = $this->input->post('radio');
                ?>
                <div id="DivKaryawan"></div>                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default" style="height:600px;overflow-x:auto;">
            <div class="panel-heading"><div class="panel-title">User Terpilih</div></div>
            <div class="panel-body">
                <table class="table table-bordered" style="font-size:12px;">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>No. Pegawai</th>
                            <th>Role</th>
                            <th>Flag</th>
                        </tr>
                    </thead>
                    <tbody id="user_terdaftar">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function get_role() {
        var radios = document.getElementsByName('radio');
        var roles, role_sel;

        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                roles = parseInt(radios[i].value);
                break;
            }
        }
        if (roles === 1) {
            role_sel = "Administrator";
        }
        if (roles === 2) {
            role_sel = "Editor";
        }
        if (roles === 3) {
            role_sel = "Viewer";
        }
        document.getElementById('roles_selected').innerHTML = role_sel;
        document.getElementById('role_number').innerHTML = roles;
        console.log("Result : " + roles);
    }
    $(function () {

        $('#user_terdaftar').load("<?php echo site_url('plant_administrator/GetKaryawanTerdaftar'); ?>");

    });
    function search_noPegawai(data) {
        var total = $('#noPegawai').val().length;
        if (total > 2 && total < 5) {
            var nama = '%' + $('#namaPegawai').val() + '%';
            $('#loading').show();
            var nopeg = '%' + data + '%';
            $.ajax({
                url: 'plant_administrator/GetKaryawan',
                type: 'POST',
                data: {'input[nopeg]': nopeg, 'input[nama]': nama},
                async: false,
                success: function (data) {
                    $('#DivKaryawan').html(data);
                    $('#loading').hide();
                }
            });
        }
    }
    function search_namaPegawai(data) {

        var total = $('#namaPegawai').val().length;
        if (total > 3 && total < 10) {
            var nopeg = '%' + $('#noPegawai').val() + '%';
            $('#loading').show();
            var nama = '%' + data + '%';
            $.ajax({
                url: 'plant_administrator/GetKaryawan',
                type: 'POST',
                data: {'input[nama]': nama, 'input[nopeg]': nopeg},
                async: false,
                success: function (data) {
                    $('#DivKaryawan').html(data);
                    $('#loading').hide();
                }
            });
        }
    }

    function load_toform(seq) {
        $('#loading').show();
        var a = $('#a' + seq).html();
        var b = $('#b' + seq).html();
        var c = $('#c' + seq).html();
        var d = $('#d' + seq).html();
        var e = $("#role_number").text();

        $.ajax({
            url: 'plant_administrator/SimpanUser',
            type: 'POST',
            data: {nopeg: a, nama: b, email: c, opco: d, role: e},
            async: false,
            success: function (data) {
                $('#user_terdaftar').load("<?php echo site_url('plant_administrator/GetKaryawanTerdaftar'); ?>");
                $('#loading').hide();
                $('#button' + seq).removeClass('btn btn-warning');
                $('#button' + seq).addClass('btn btn-success');
            }
        });
    }

    function delete_list(seq) {
        $('#loading').show();
        //var a=$('#del'+seq).html();
        $.ajax({
            url: 'plant_administrator/HapusUser',
            type: 'POST',
            data: {ldapname: seq},
            async: false,
            success: function (data) {
                $('#user_terdaftar').load("<?php echo site_url('plant_administrator/GetKaryawanTerdaftar'); ?>");
                $('#loading').hide();
            }
        });
    }
</script>
