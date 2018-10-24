<script src="<?= base_url() ?>bootstrap/plantView/assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>bootstrap/plantView/master_opc/js/opc-lib-min.js"></script>
<script>
    OPC_config = {
        token: '7e61b230-481d-4551-b24b-ba9046e3d8f2',
        serverURL: 'http://10.15.3.146:58725'
    };
</script>
<div id="test" opc-tag-txt='{"tag":"TLCC.CM1_Emisi.Value"}'>
    0
</div>
<div id="test2">
    0
</div>
<div id="test3">
    0
</div>
<!--<script>
    $(document).ready(function () {
        var e_rm1 = OPC.get_value("FM8_Tuban_Feed.Value");
        console.log(e_rm1);
    });

    document.getElementById('test').innerHTML = e_rm1;
</script>-->
<script>
    var e_cm1 =  document.getElementById("test").value;
    console.log(e_cm1);
    function tes() {
//        var e_rm1 = OPC.get_value("FM8_Tuban_Feed.Value");
//        var e_cm1 = OPC.get_value("TLCC.CM1_Emisi.Value");
var e_cm1 =  document.getElementById("test");

        console.log($("#test").val());
        $("#test3").html(e_cm1)
    }
    function update() {
//        var e_rm1 = OPC.get_value("FM8_Tuban_Feed.Value");
        var e_cm1 = OPC.get_value("TLCC.CM1_Emisi.Value");
console.log($("#test").val());
//        console.log(e_cm1);
        $("#test2").html(e_cm1)
    }
    setInterval(update, 1000);
</script>