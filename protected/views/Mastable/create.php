<script type="text/javascript">
    $(document).ready(function () {
        $("#t").dataTable();
    });

    function save_tables() {

        var url = "<?php echo Yii::app()->createUrl('mastable/save_tablename') ?>";
        var tablename = $("#tablename").val();
        var data = {tablename: tablename};

        if (tablename == '') {
            $("#tablename").focus();
            return false;
        }

        $("#show_table").html("<div data-role=\"preloader\" data-type=\"ring\" data-style=\"dark\"></div>");

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }
</script>

<?php
$this->breadcrumbs = array(
    'ตั้งชื่อตาราง',
);
?>

<!-- With icon (font) -->
<div class="panel success">
    <div class="heading">
        <span class="icon mif-table"></span>
        <span class="title">สร้างชื่อตาราง</span>
    </div>
    <div class="content">
        <div class="grid">
            <div class="row cells12" style=" margin-bottom: 0px;">
                <div class="cell colspan10">
                    <div class="input-control text full-size">
                        <input type="text" id="tablename" name="tablename" placeholder="ชื่อตาราง ..."/>
                    </div>
                </div>
            </div>
            <div class="row cells12" style=" margin-top: 0px;">
                <div class="button" onclick="save_tables()">
                    <span class="mif-checkmark"></span> บันทึกชื่อตาราง
                </div>
            </div>
        </div>
    </div>
</div>

<div class="listview bg-white" id="show_table">
    <table class="table bordered" id="t" data-role="datatable" data-searching="false">
        <thead>
            <tr>
                <th>#</th>
                <th>Tables</th>
                <th>Field</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($tables as $rs):
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $rs['Table_Name'] ?></td>
                    <td>
                        <button class="mini-button button" onclick="showDialog()">
                            <span class="icon mif-table"></span> ฟิวส์
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    $field = Mastables::model()->getMetaData()->columns;
    foreach ($field as $f) {
        $re[] = $f->rawName;
    }

    //echo implode(",", $re);
    ?>

</div>


<div data-role="dialog" id="dialog" class="padding20" data-close-button="true" data-overlay="true" data-overlay-color="op-dark">
    <h1>Simple dialog</h1>
    <p>
        Dialog :: Metro UI CSS - The front-end framework
        for developing projects on the web in Windows Metro Style.
    </p>
</div>
<script>
    function showDialog() {
        var dialog = $("#dialog").data('dialog');
        dialog.open();
    }
</script>







