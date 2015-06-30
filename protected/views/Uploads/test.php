<?php
$this->breadcrumbs = array(
    'นำเข้าข้อมูล',
);
?>

<!-- With icon (font) -->
<div class="panel success">
    <div class="heading">
        <span class="icon mif-database"></span>
        <span class="title">นำเข้าข้อมูล</span>
    </div>
    <div class="content">
        <?php
        echo $total . "<br/>";
        $db = new Importdatabases();
        $a = 0;
        $j = 0;

        $sum = array("", "", "", "");
        for ($i = 0; $i <= ($total - 1); $i++) {

            //echo $i;
            //echo $datas[$i];

            $start = strpos($datas[$i], "*|");
            $replace = trim(str_replace("*|", "", $datas[$i]));
            $end = strpos($replace, "|");

            $new_text = substr($replace, $start, $end);
            //echo $i . "-" . $new_text = substr($replace, $start, $end);
            //echo "Record = " . substr_count($new_text, ",") . "<br/>";

            if (substr_count($new_text, ",") == 8) {

                $sum[0] = $sum[0] + 1;
                $Table = "Store_OutPatient";
                $Field = "(Station, Line, AuthCode, DTTran, InvNo, BillNo, HN, MemberNo, AmountPaid,CheckCode)";
                //$replace = trim(str_replace("*|", "", $datas[$i]));
                //echo substr($replace,-1)."<br/>";
                //$new_conver = str_replace("|", ",", $replace);
                //echo $new_conver . "<br/>";
                //echo $new_text."<br/>";

                if (substr(ltrim($new_text), 0, 1) == "C") {
                    $val = str_replace(",", "','", $new_text);
                    $error_code = substr($replace, $end + 1, $end + 50);
                    $Values = "('" . $val . "','" . str_replace(",,,,", "", $error_code) . "');";
                    $sql = $db->Insert($Table, $Field, $Values);
                    //$sql = "INSERT INTO $Table $Field VALUE $values";
                } else {
                    $val = str_replace(",", "','", $new_text);
                    $Values = "('" . $val . "','');";
                    $sql = $db->Insert($Table, $Field, $Values);
                    //$sql = "INSERT INTO $Table $Field VALUE $values";
                }
                //$db->Render($sql);
            }


            if (substr_count($new_text, ",") == 13) {
                $sum[1] = $sum[1] + 1;
                $Table = "Store_KidneyPatient";
                $Field = "(Ext, Line, Hreg, HN, SessNo, BegHd, HdMode, ClaimAcc, Payers, Ep, DlzNew, Amount, HdRate, BF,CheckCode)";

                if (substr(ltrim($new_text), 0, 1) == "C") {
                    $val = str_replace(",", "','", $new_text);
                    $error_code = substr($replace, $end + 1, $end + 50);
                    $Values = "('" . $val . "','" . str_replace(",,,,", "", $error_code) . "');";
                    $sql = $db->Insert($Table, $Field, $Values);
                } else {
                    $val = str_replace(",", "','", $new_text);
                    $Values = "('" . $val . "','');";
                    $sql = $db->Insert($Table, $Field, $Values);
                }

                //$db->Render($sql);
            }


            if (substr_count($new_text, ",") == 20) {
                $sum[2] = $sum[2] + 1;
                $Table = "Store_HealthInsurance";
                $Field = "(Ext, Line, Hreg, HN, SessNo, BegHd, HdMode, ClaimAcc, Payers, DlzNew, EpoTn, Epounit, Hct, Paychk, Amount, HDCharge, Payrate, AddiPay, Payable, EHS, BF, CheckCode)";

                if (substr(ltrim($new_text), 0, 1) == "C") {
                    $val = str_replace(",", "','", $new_text);
                    $error_code = substr($replace, $end + 1, $end + 50);
                    $Values = "('" . $val . "','" . str_replace(",,,,", "", $error_code) . "');";
                    $sql = $db->Insert($Table, $Field, $Values);
                } else {
                    $val = str_replace(",", "','", $new_text);
                    $Values = "('" . $val . "','');";
                    $sql = $db->Insert($Table, $Field, $Values);
                }

                //$db->Render($sql);
            }

            if (substr_count($new_text, ",") == 17) {
                $sum[3] = $sum[3] + 1;
                $Table = "Store_ClaimInsurance";
                $Field = "(Ext, Line, Hreg, HN, SessNo, BegHd, HdMode, ClaimAcc, Payers, DlzNew, EpoTn, Epounit, Hct, Paychk, Amount, HDCharge, Payrate, BF, CheckCode)";

                if (substr(ltrim($new_text), 0, 1) == "C") {
                    $val = str_replace(",", "','", $new_text);
                    $error_code = substr($replace, $end + 1, $end + 50);
                    $Values = "('" . $val . "','" . str_replace(",,,,", "", $error_code) . "');";
                    $sql = $db->Insert($Table, $Field, $Values);
                } else {
                    $val = str_replace(",", "','", $new_text);
                    $Values = "('" . $val . "','');";
                    $sql = $db->Insert($Table, $Field, $Values);
                }

                //$db->Render($sql);
            }

            $db->Render($sql);
        }

        echo "นำเข้าตาราง Store_OutPatient จำนวน" . $sum[0] . "</br>";
        echo "นำเข้าตาราง Store_KidneyPatient จำนวน" . $sum[1] . "</br>";
        echo "นำเข้าตาราง Store_HealthInsurance จำนวน" . $sum[2] . "</br>";
        echo "นำเข้าตาราง Store_ClaimInsurance จำนวน" . $sum[3];
//print_r($datas);
        ?>
    </div>
</div>
