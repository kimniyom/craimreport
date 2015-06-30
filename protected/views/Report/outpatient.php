<script type="text/javascript">

    function send_param() {
        var date_start = $("#date_start").val();
        var date_end = $("#date_end").val();

        if (date_start == '' || date_end == '') {
            alert("ยังไม่ได้เลือกเงื่อนไข ...");
            return false;
        }

        var url = "<?php echo Yii::app()->createUrl('report/outpatient_result') ?>";
        var data = {date_start: date_start, date_end: date_end};
        $("#result").html('<center><span class="icon mif-spinner4 mif-5x mif-ani-spin"></span> <br/>กำลังประมวลผล ...</center>');
        $.post(url, data, function (result) {
            $("#result").html(result);
        });
    }

    function GetError(Error) {
        var url = "<?php echo Yii::app()->createUrl('report/error_outpatient') ?>";
        var data = {error_code: Error};
        $.post(url, data, function (result) {
            //alert(result);
            $("#get_error").html(result);
            var dialog = $("#error").data('dialog');
            dialog.open();
        });
    }
</script>

<div data-role="dialog" id="error" data-close-button="true" class="padding20" data-overlay="true" data-overlay-color="op-dark">
    <b>รหัสความผิดพลาด</b><br/><br/>
    <div id="get_error"></div>
</div>

<?php
$this->breadcrumbs = array(
    'ผู้ป่วยนอกรักษาต่อเนื่องทั่วไป (ข้าราชการบัญชีกลาง และข้าราชการกรุงเทพ)',
);
?>
<!-- With icon (font) -->
<div class="panel warning">
    <div class="heading">
        <span class="icon mif-history"></span>
        <span class="title">ผู้ป่วยนอกรักษาต่อเนื่องทั่วไป (ข้าราชการบัญชีกลาง และข้าราชการกรุงเทพ)</span>
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
            <font style='font-size: 12px; color: #ff3333;'>* เงื่อนไขวันที่ใช้ฟิวส์ DTTran</font>
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
                    <div class="frame" id="frame_idA" style=" padding: 5px; background: #FFF; padding-bottom: 30px;">
                        <table class="display bordered hover" id="table_a"  style=" background: #FFF; border: solid 1px #999999;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Station</th>
                                    <th>Line</th>
                                    <th>ข้อผิดพลาด</th>
                                    <th>AuthCode</th>
                                    <th>DTTran</th>
                                    <th>InvNo</th>
                                    <th>BillNo</th>
                                    <th>HN</th>
                                    <th>MemberNo</th>
                                    <th>Amount-Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sum = 0;
                                $i = 1;
                                foreach ($tb as $rs):
                                    if (substr($rs['Station'], 0, 1) == 'A'):
                                        $sum = $sum + $rs['AmountPaid'];
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $rs['Station'] ?></td>
                                            <td><?php echo $rs['Line'] ?></td>
                                            <td style="text-align: center;"><span class="icon mif-checkmark" style="color:green;"></span></td>
                                            <td><?php echo $rs['AuthCode'] ?></td>
                                            <td><?php echo $rs['DTTran'] ?></td>
                                            <td><?php echo $rs['InvNo'] ?></td>
                                            <td><?php echo $rs['BillNo'] ?></td>
                                            <td><?php echo $rs['HN'] ?></td>
                                            <td><?php echo $rs['MemberNo'] ?></td>
                                            <td style=" text-align: right;"><?php echo number_format($rs['AmountPaid'], 2) ?></td>
                                        </tr>
                                        <?php
                                    endif;
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                        รวมค่า
                                    </td>
                                    <td style=" text-align: right;">
                                        <?php echo number_format($sum, 2); ?>
                                    </td>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


            <!-- TabC-->
            <div class="tabcontrol" data-role="tabControl">
                <ul class="tabs">
                    <li><a href="#frame_idC" id="id_c"><span class="icon mif-warning"></span>
                            <?php
                            if (!empty($count['C'])) {
                                echo "ไม่ผ่าน = " . $count['C'];
                            } else {
                                echo "ไม่ผ่าน = " . "0";
                            };
                            ?></a>
                    </li>
                </ul>
                <div class="frames">
                    <div class="frame" id="frame_idC" style=" padding: 5px; background: #FFF; padding-bottom: 30px;">
                        <table class="display bordered" id="table_c" style=" background: #FFF; border: solid 1px #999999;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Station</th>
                                    <th>Line</th>
                                    <th>ข้อผิดพลาด</th>
                                    <th>AuthCode</th>
                                    <th>DTTran</th>
                                    <th>InvNo</th>
                                    <th>BillNo</th>
                                    <th>HN</th>
                                    <th>MemberNo</th>
                                    <th>Amount-Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sum2 = 0;
                                $a = 1;
                                foreach ($tb as $rss):
                                    if (substr($rss['Station'], 0, 1) == 'C'):
                                        $sum2 = $sum2 + $rss['AmountPaid'];
                                        ?>
                                        <tr>
                                            <td><?php echo $a++; ?></td>
                                            <td><?php echo $rss['Station'] ?></td>
                                            <td><?php echo $rss['Line'] ?></td>
                                            <td><span class="icon mif-cancel" style="color:red;"></span> 
                                                <?php
                                                $COUNT_ERROR = strlen(trim($rss['CheckCode']));
                                                $ERRORCODE = substr($rss['CheckCode'], 1, $COUNT_ERROR - 1);
                                                echo $ERRORCODE;
                                                ?>
                                                <a href="javascript:void(0)" onclick="GetError('<?php echo $ERRORCODE ?>')">
                                                    <span class="icon mif-list" style=" float: right;"></span>
                                                </a>
                                            </td>
                                            <td><?php echo $rss['AuthCode'] ?></td>
                                            <td><?php echo $rss['DTTran'] ?></td>
                                            <td><?php echo $rss['InvNo'] ?></td>
                                            <td><?php echo $rss['BillNo'] ?></td>
                                            <td><?php echo $rss['HN'] ?></td>
                                            <td><?php echo $rss['MemberNo'] ?></td>
                                            <td style=" text-align: right;"><?php echo number_format($rss['AmountPaid'], 2) ?></td>
                                        </tr>
                                        <?php
                                    endif;
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10" style="text-align: center;">
                                        รวมค่ารักษา
                                    </td>
                                    <td style=" text-align: right;">
                                        <?php echo number_format($sum2, 2); ?>
                                    </td>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- EndResult -->

    </div>
</div>
