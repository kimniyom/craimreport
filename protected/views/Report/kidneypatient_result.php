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
              <th>Ep</th>
              <th>DlzNew</th>
              <th>สิทธิ</th>
              <th>อัตราการบริการไตเทียมที่จะเบิกได้จากกรมบัญชีกลาง</th>
              <th>รายการเบิกเพิ่ม</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sumA = array(0, 0);
            $i = 1;
            foreach ($tb as $rs):
              if (substr($rs['Ext'], 0, 1) == 'A'):
                $sumA[0] = $sumA[0] + $rs['Amount'];
                //$sum[1] = $sum[1] + $rs['HdRate'];
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td class="no-br"><?php echo $rs['Ext'] ?></td>
                  <td style="text-align: center;"><span class="icon mif-checkmark" style="color: #009900;"></span></td>
                  <td><?php echo $rs['Hreg'] ?></td>
                  <td><?php echo $rs['HN'] ?></td>
                  <td><?php echo $rs['SessNo'] ?></td>
                  <td><?php echo $rs['BegHd'] ?></td>
                  <td><?php echo $rs['HdMode'] ?></td>
                  <td><?php echo $rs['ClaimAcc'] ?></td>
                  <td><?php echo $rs['Payers'] ?></td>
                  <td><?php echo $rs['Ep'] ?></td>
                  <td><?php echo $rs['DlzNew'] ?></td>
                  <td><?php echo $rs['BF'] ?></td>
                  <td style=" text-align: right;"><?php echo number_format($rs['HdRate'], 2) ?></td>
                  <td style=" text-align: right;"><?php echo number_format($rs['Amount'], 2) ?></td>
                </tr>
                <?php
              endif;
            endforeach;
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="14" style="text-align: center;">
                รวม
              </td>
              <td style=" text-align: right;">
                <?php echo number_format($sumA[0], 2); ?>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>

  <!-- TabC -->
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
        <div class="frame" id="frame_idC" style=" padding: 5px; background: #FFF; padding-bottom: 30px;">
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
                <th>Ep</th>
                <th>DlzNew</th>
                <th>สิทธิ</th>
                <th>อัตราการบริการไตเทียมที่จะเบิกได้จากกรมบัญชีกลาง</th>
                <th>รายการเบิกเพิ่ม</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sumC = array(0, 0);
              $a = 1;
              foreach ($tb as $rss):
                if (substr($rss['Ext'], 0, 1) == 'C'):
                  $sumC[0] = $sumC[0] + $rss['Amount'];
                  //$sumC[1] = $sumC[1] + $rss['HdRate'];
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $rss['Ext'] ?></td>
                    <td><span class="icon mif-cancel" style="color:red;"></span> <?php echo $rss['CheckCode'] ?></td>
                    <td><?php echo $rss['Hreg'] ?></td>
                    <td><?php echo $rss['HN'] ?></td>
                    <td><?php echo $rss['SessNo'] ?></td>
                    <td class="no-br"><?php echo $rss['BegHd'] ?></td>
                    <td><?php echo $rss['HdMode'] ?></td>
                    <td><?php echo $rss['ClaimAcc'] ?></td>
                    <td><?php echo $rss['Payers'] ?></td>
                    <td><?php echo $rss['Ep'] ?></td>
                    <td><?php echo $rss['DlzNew'] ?></td>
                    <td><?php echo $rss['BF'] ?></td>
                    <td style=" text-align: right;"><?php echo number_format($rss['HdRate'], 2) ?></td>
                    <td style=" text-align: right;"><?php echo number_format($rss['Amount'], 2) ?></td>
                  </tr>
                  <?php
                endif;
              endforeach;
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="14" style="text-align: center;">
                  รวม
                </td>
                <td style=" text-align: right;">
                  <?php echo number_format($sumC[0], 2); ?>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

  </div> <!-- End Result -->
