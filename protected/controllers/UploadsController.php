<!--
#
# Author : kimniyom 
# Email : kimniyomclub@gmail.com
# Date : 2015/06/25 14:44
#
-->

<?php

class UploadsController extends Controller {

    public function actionUploadfile() {
        $this->render("//Uploads/form_uploads");
    }

    public function actionImport_csv() {
        $targetFolder = 'upload_csv/'; // Relative to the root

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetFile = rtrim($targetFolder, '/') . '/' . $_FILES['Filedata']['name'];

            // Validate the file type
            //$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileTypes = array('csv'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                //Insert To Databases 
                $columns = array(
                    "FileName" => $_FILES['Filedata']['name'],
                    "UserId" => Yii::app()->session['userid'],
                    "D_update" => date("Y-m-d H:i:s")
                );

                Yii::app()->db->createCommand()
                        ->insert("Log", $columns);
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function actionImport() {
        //ทำการเปิดไฟล์ CSV เพื่อนำข้อมูลไปใส่ใน MySQL
        //$objCSV = fopen("uploads/test2.csv", "r");

        $result = Yii::app()->db->createCommand("SELECT MAX(Id) AS log_id FROM Log")->queryRow();
        $log_id = $result['log_id'];

        $file = $_POST['files'];

        if (empty($file)) {
            $columns = array("Flag" => "1");
            Yii::app()->db->createCommand()
                    ->update("Log", $columns . "Id = '$log_id'");
        }

        $objCSV = fopen("./upload_csv/" . $file, "r");
        //$total = 0;

        $i = 0;
        while (($objArr = fgetcsv($objCSV, 1000, "|")) !== FALSE) {

            //}
            //นำข้อมูลใส่ในตาราง member
            //$strSQL = "INSERT INTO member ";
            //ข้อมูลใส่ใน field ข้อมูลดังนี้
            //$strSQL .="(id,name,lastname,age,tel) ";
            //$strSQL .="VALUES ";
            //ข้อมูลตามที่อ่านได้จากไฟล์ลงฐานข้อมูล
            //$strSQL .="('" . $objArr[0] . "','" . $objArr[1] . "','" . $objArr[2] . "' ";
            //$strSQL .=",'" . $objArr[3] . "','" . $objArr[4] . "') ";


            if (substr($objArr[0], 0, 2) == "*|") {
                $i++;
                $d[] = $objArr[0];
            }

            //ให้ข้อมูลอยู่ในรูปแบบที่อ่านได้ใน phpmyadmin (By.SlayerBUU Credits พี่ไผ่)
            //mysql_query("SET NAMES UTF8");
            //เพิ่มข้อมูลลงฐานข้อมูล
            //$objQuery = mysql_query($strSQL);
        }
        fclose($objCSV);

        //echo $total . "<br/>";
        $total = $i;
        $db = new Importdatabases();
        $sum = array(0, 0, 0, 0);
        for ($a = 0; $a <= ($total - 1); $a++) {

            //echo $i;
            //echo $datas[$i];

            $start = strpos($d[$a], "*|");
            $replace = trim(str_replace("*|", "", $d[$a]));
            $end = strpos($replace, "|");

            $new_text = substr($replace, $start, $end);
            //echo $i . "-" . $new_text = substr($replace, $start, $end);
            //echo "Record = " . substr_count($new_text, ",") . "<br/>";

            if (substr_count($new_text, ",") == 8) {

                $sum[0] = $sum[0] + 1;
                $Table = "Store_Outpatient";
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

        unlink("./upload_csv/" . $file);

        //CALL FUNCTION IMPORT TO MAS TABLES
        $Call = "CALL sp_outpatient();";
        $Call .= "CALL sp_kidneypatient();";
        $Call .= "CALL sp_healthInsurance();";
        $Call .= "CALL sp_claimInsurance();";

        Yii::app()->db->createCommand($Call)->execute();

        echo "ข้อมูลทั้งหมด " . $total . "<br/><br/>";

        if ($total != 0) {
            echo '<span class="icon mif-thumbs-up"></span>นำเข้าข้อมูลสำเร็จ ...<br/><br/>';
        }

        if ($sum[0] != 0) {
            echo "==> นำเข้าตาราง Store_OutPatient จำนวน " . $sum[0] . "</br>";
        }

        if ($sum[1] != 0) {
            echo "==> นำเข้าตาราง Store_KidneyPatient จำนวน " . $sum[1] . "</br>";
        }

        if ($sum[2] != 0) {
            echo "==> นำเข้าตาราง Store_HealthInsurance จำนวน " . $sum[2] . "</br>";
        }

        if ($sum[3] != 0) {
            echo "==> นำเข้าตาราง Store_ClaimInsurance จำนวน " . $sum[3];
        }

        if ($total == 0) {
            $columns = array("Flag" => "1");
            Yii::app()->db->createCommand()
                    ->update("Log", $columns . "Id = '$log_id'");
            echo "<font style='color:red;'>Error ==> นำเข้าไฟล์ไม่สำเร็จ ...?</font>";
        }
        echo "<br/><br/>***************************";

        /*
          $data['datas'] = $d;
          $data['total'] = $i;
          $this->render('//Uploads/test', $data);
         * *
         */
    }

    public function actionLog_upload() {
        $upload = new Upload();
        $data['log'] = $upload->Getlog_upload_all();

        $this->render("//Uploads/log", $data);
    }

}
