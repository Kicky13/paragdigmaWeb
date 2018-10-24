<script src="<?php echo base_url(); ?>bootstrap/plantView/assets/js/handsontable.full.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/plantView/assets/css/handsontable.full.css"/>

<div id="example"></div>

<script>
    var data = [["Tahun","RM1","FM1"],
    [2016, 100, 200],
    [2015, 200, 400]];
    var container = document.getElementById('example');
    var hot = new Handsontable(container, {
        data: data,
        rowHeaders: true,
        colHeaders: true
    });
</script>