<script src="<?php echo Yii::app()->baseUrl; ?>/js_store/config_tb.js"></script>

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
                  <td><span class="icon mif-cancel" style="color:red;"></span> <?php echo $rss['CheckCode'] ?></td>
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
