<script type="text/javascript">
    $(document).ready(function () {
        $("#log").dataTable();
    });
</script>

<?php
$this->breadcrumbs = array(
    'ประวัติการส่งไฟล์',
);
?>
<!-- With icon (font) -->
<div class="panel warning">
    <div class="heading">
        <span class="icon mif-history"></span>
        <span class="title">ประวัติการส่งไฟล์</span>
    </div>
    <div class="content" style=" padding-bottom: 50px;">
        <div class=" example">
            <b>*หมายเหตุ : </b>
            <span class="icon mif-checkmark" style=" color: #00cc66;"></span> นำเข้าข้อมูลสำเร็จ
            <span class="icon mif-warning" style=" color: #ff6600;;"></span> นำเข้าข้อมูลไม่ได้
        </div>
        
        <table class="table bordered" id="log" data-role="datatable" data-searching="true" style=" background: #FFF;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>FileName</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($log as $rs):
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $rs['FileName'] ?></td>
                        <td><?php echo $rs['Name'] . ' ' . $rs['Lname']; ?></td>
                        <td>
                            <?php echo $rs['D_update'] ?>
                        </td>
                        <td>
                            <?php if ($rs['Flag'] == 0) { ?>
                                <span class="icon mif-checkmark" style=" color: #00cc66;"></span>
                            <?php } else { ?>
                                <span class="icon mif-warning" style=" color: #ff6600;;"></span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>