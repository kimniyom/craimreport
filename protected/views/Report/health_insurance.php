<script type="text/javascript">

    function send_param() {
        var date_start = $("#date_start").val();
        var date_end = $("#date_end").val();

        if (date_start == '' || date_end == '') {
            alert("ยังไม่ได้เลือกเงื่อนไข ...");
            return false;
        }

        var url = "<?php echo Yii::app()->createUrl('report/health_insurance_result') ?>";
        var data = {date_start: date_start, date_end: date_end};
        $("#result").html('<center><span class="icon mif-spinner4 mif-5x mif-ani-spin"></span> <br/>กำลังประมวลผล ...</center>');
        $.post(url, data, function (result) {
            $("#result").html(result);
        });
    }

</script>

<?php
$this->breadcrumbs = array(
    'ผู้ป่วยตามหลักประกันสุขภาพ',
);
?>
<!-- With icon (font) -->
<div class="panel warning">
    <div class="heading">
        <span class="icon mif-history"></span>
        <span class="title">ผู้ป่วยตามหลักประกันสุขภาพ</span>
    </div>
    <div class="content" style=" padding-bottom: 50px;">
        <div class="example" style=" padding-left: 5px;">
            ตั้งแต่
            <div class="input-control text" data-role="datepicker" data-format="dd-mm-yyyy">
                <input type="text" id="date_start">
                <button class="button"><span class="mif-calendar"></span></button>
            </div>
            ถึง
            <div class="input-control text" data-role="datepicker" data-format="dd-mm-yyyy">
                <input type="text" id="date_end">
                <button class="button"><span class="mif-calendar"></span></button>
            </div>

            <div class="button success" onclick="send_param()"><span class="icon mif-checkmark"></span> ตกลง</div><br/>
            <font style='font-size: 12px; color: #ff3333;'>* เงื่อนไขวันที่ใช้ฟิวส์ BegHd</font>
        </div>

        <hr>

        <div id="result">
            <div class="tabcontrol" data-role="tabControl">
                <ul class="tabs">
                    <li><a href="#frame_idA" id="id_a"><span class="icon mif-checkmark"></span>
                            <?php
                            if (!empty($count['A'])) {
                                echo "ผ่าน = " . $count['A'];
                            } else {
                                echo "ผ่าน = " . "0";
                            };
                            ?></a>
                    </li>
                </ul>
                <div class="frames">
                    <div class="" id="frame_idA" style=" padding: 5px; background: #FFF; padding-bottom: 30px;">
                        <table class="display bordered hover" id="a"  style=" background: #FFF; border: solid 1px #999999;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ext</th>
                                    <th>CheckCode</th>
                                    <th>Hreg</th>
                                    <th>HN</th>
                                    <th>SessNo</th>
                                    <th>BegHd</th>
                                    <th>HdMode</th>
                                    <th>ClaimAcc</th>
                                    <th>Payers</th>
                                    <th>DlzNew</th>
                                    <th>EpoTn</th>
                                    <th>Epounit</th>
                                    <th>Hct</th>
                                    <th>Paychk</th>
                                    <th>อัตราเบิกค่าฟอกเลือดของ สปสช.</th>
                                    <th>อัตราเบิกเพิ่ม กรณี EHS</th>
                                    <th>อัตราบริการไตเทียมที่เบิกได้ใน สปสช.</th>
                                    <th>EHS</th>
                                    <th>สิทธิผู้ป่วย</th>
                                    <th>จำนวนเงิน ร.พ. ขอเบิก</th>
                                    <th>เบิกเพิ่ม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sumA = array(0, 0);
                                $i = 1;
                                foreach ($tb as $rs):
                                    if (substr($rs['Ext'], 0, 1) == 'A'):
                                        $sumA[0] = $sumA[0] + $rs['HDCharge'];
                                        $sumA[1] = $sumA[1] + $rs['Amount'];
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td class="no-br"><?php echo $rs['Ext'] ?></td>
                                            <td>
                                                <span class="icon mif-checkmark" style="color:green;"></span>
                                                <?php echo $rs['CheckCode'] ?>
                                            </td>
                                            <td><?php echo $rs['Hreg'] ?></td>
                                            <td><?php echo $rs['HN'] ?></td>
                                            <td><?php echo $rs['SessNo'] ?></td>
                                            <td><?php echo $rs['BegHd'] ?></td>
                                            <td><?php echo $rs['HdMode'] ?></td>
                                            <td><?php echo $rs['ClaimAcc'] ?></td>
                                            <td><?php echo $rs['Payers'] ?></td>
                                            <td><?php echo $rs['DlzNew'] ?></td>
                                            <td><?php echo $rs['EpoTn'] ?></td>
                                            <td><?php echo $rs['Epounit'] ?></td>
                                            <td><?php echo $rs['Hct'] ?></td>
                                            <td><?php echo $rs['Paychk'] ?></td>
                                            <td class="t_center"><?php echo number_format($rs['Payrate']) ?></td>
                                            <td class="t_center"><?php echo number_format($rs['AddiPay']) ?></td>
                                            <td class="t_center"><?php echo number_format($rs['Payable']) ?></td>
                                            <td><?php echo $rs['EHS'] ?></td>
                                            <td><?php echo $rs['BF'] ?></td>
                                            <td class="t_right"><?php echo number_format($rs['HDCharge'], 2) ?></td>
                                            <td class="t_right"><?php echo number_format($rs['Amount'], 2) ?></td>
                                        </tr>
                                        <?php
                                    endif;
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="20" id="t_center">
                                        รวม
                                    </td>
                                    <td id="t_right">
                                        <?php echo number_format($sumA[0], 2); ?>
                                    </td>
                                    <td id="t_right">
                                        <?php echo number_format($sumA[1], 2); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>


            <hr/>

            <div class="tabcontrol" data-role="tabControl">
                <ul class="tabs">
                    <li><a href="#frame_idC" id="id_c"><span class="icon mif-warning"></span>
                            <?php
                            if (!empty($count['C'])) {
                                echo "ไม่ผ่าน = " . $count['C'];
                            } else {
                                echo "ไม่ผ่าน = " . "0";
                            };
                            ?></a></li>
                </ul>
                <div class="frames">
                    <div class="" id="frame_idC" style=" padding: 5px; background: #FFF; padding-bottom: 30px;">
                        <table class="display bordered hover" id="c" style=" background: #FFF; border: solid 1px #999999;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ext</th>
                                    <th>CheckCode</th>
                                    <th>Hreg</th>
                                    <th>HN</th>
                                    <th>SessNo</th>
                                    <th>BegHd</th>
                                    <th>HdMode</th>
                                    <th>ClaimAcc</th>
                                    <th>Payers</th>
                                    <th>DlzNew</th>
                                    <th>EpoTn</th>
                                    <th>Epounit</th>
                                    <th>Hct</th>
                                    <th>Paychk</th>
                                    <th>อัตราเบิกค่าฟอกเลือดของ สปสช.</th>
                                    <th>อัตราเบิกเพิ่ม กรณี EHS</th>
                                    <th>อัตราบริการไตเทียมที่เบิกได้ใน สปสช.</th>
                                    <th>EHS</th>
                                    <th>สิทธิผู้ป่วย</th>
                                    <th>จำนวนเงิน ร.พ. ขอเบิก</th>
                                    <th>เบิกเพิ่ม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sumC = array(0, 0);
                                $a = 1;
                                foreach ($tb as $rss):
                                    if (substr($rss['Ext'], 0, 1) == 'C'):
                                        $sumC[0] = $sumC[0] + $rss['HDCharge'];
                                        $sumC[1] = $sumC[1] + $rss['Amount'];
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td class="no-br"><?php echo $rss['Ext'] ?></td>
                                            <td>
                                                <span class="icon mif-cancel" style="color:red;"></span>
                                                <?php echo $rss['CheckCode'] ?>
                                            </td>
                                            <td><?php echo $rss['Hreg'] ?></td>
                                            <td><?php echo $rss['HN'] ?></td>
                                            <td><?php echo $rss['SessNo'] ?></td>
                                            <td class="no-br"><?php echo $rss['BegHd'] ?></td>
                                            <td><?php echo $rss['HdMode'] ?></td>
                                            <td><?php echo $rss['ClaimAcc'] ?></td>
                                            <td><?php echo $rss['Payers'] ?></td>
                                            <td><?php echo $rss['DlzNew'] ?></td>
                                            <td><?php echo $rss['EpoTn'] ?></td>
                                            <td><?php echo $rss['Epounit'] ?></td>
                                            <td><?php echo $rss['Hct'] ?></td>
                                            <td><?php echo $rss['Paychk'] ?></td>
                                            <td class="t_center"><?php echo number_format($rss['Payrate']) ?></td>
                                            <td class="t_center"><?php echo number_format($rss['AddiPay']) ?></td>
                                            <td class="t_center"><?php echo number_format($rss['Payable']) ?></td>
                                            <td><?php echo $rss['EHS'] ?></td>
                                            <td><?php echo $rss['BF'] ?></td>
                                            <td class="t_right"><?php echo number_format($rss['HDCharge'], 2) ?></td>
                                            <td class="t_right"><?php echo number_format($rss['Amount'], 2) ?></td>
                                        </tr>
                                        <?php
                                    endif;
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="20" id="t_center">
                                        รวม
                                    </td>
                                    <td id="t_right">
                                        <?php echo number_format($sumC[0], 2); ?>
                                    </td>
                                    <td id="t_right">
                                        <?php echo number_format($sumC[1], 2); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
