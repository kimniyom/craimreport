<?php

class ReportController extends Controller {

    //Report ผู้ป่วยนอกรักษาต่อเนื่องทั่วไป ข้าราชการบัญชีกลางและข้าราชการกรุงเทย

    public function actionOutpatient() {
        $TB = new Outpatient();
        $Report = new Report();
        $data['tb'] = $TB->findAll();
        $data['count'] = $Report->Count_all("Outpatient", "Station");
        $this->render("//Report/outpatient", $data);
    }

    public function actionOutpatient_result() {
        $TB = new Outpatient();
        $Report = new Report();

        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];

        $D_S = substr(trim(str_replace("-", "", $date_start)), 0, 2);
        $D_E = substr(trim(str_replace("-", "", $date_end)), 0, 2);

        $M_S = substr(trim(str_replace("-", "", $date_start)), 2, 2);
        $M_E = substr(trim(str_replace("-", "", $date_end)), 2, 2);

        $year_s = substr($date_start, -4) + 543;
        $year_e = substr($date_end, -4) + 543;

        $DS = $year_s . $M_S . $D_S;
        $DE = $year_e . $M_E . $D_E;

        /*
          echo $DS."<br/>".$DE;
          exit;
         */
        $Where = " CONCAT(
                    RIGHT(TRIM(REPLACE(LEFT(t.DTTran,11),'/','')),4),
                    SUBSTR(TRIM(REPLACE(LEFT(t.DTTran,11),'/','')),3,2),
                    SUBSTR(TRIM(REPLACE(LEFT(t.DTTran,11),'/','')),1,2)
                    ) BETWEEN '$DS' AND '$DE' ";
        $data['count'] = $Report->Count_Where("Outpatient", "Station", $Where);

        $data['tb'] = $TB->findAll($Where);
        $data['count'] = $Report->Count_where("Outpatient", "Station", $Where);
        $this->renderPartial("//Report/outpatient_result", $data);
    }

    //รายงานผู้ป่วยโรคไต
    public function actionKidneypatient() {
        $TB = new KidneyPatient();
        $Report = new Report();
        $data['tb'] = $TB->findAll();
        $data['count'] = $Report->Count_all("KidneyPatient", "Ext");
        $this->render("//Report/kidneypatient", $data);
    }

    public function actionKidneypatient_result() {
        $TB = new KidneyPatient();
        $Report = new Report();

        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];



        $D_S = substr(trim(str_replace("-", "", $date_start)), 0, 2);
        $D_E = substr(trim(str_replace("-", "", $date_end)), 0, 2);

        $M_S = substr(trim(str_replace("-", "", $date_start)), 2, 2);
        $M_E = substr(trim(str_replace("-", "", $date_end)), 2, 2);

        $year_s = substr($date_start, -4) + 543;
        $year_e = substr($date_end, -4) + 543;

        $DS = $year_s . $M_S . $D_S;
        $DE = $year_e . $M_E . $D_E;

        /*
          echo $DS."<br/>".$DE;
          exit;
         */

        $Where = " CONCAT(
                    RIGHT(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),4),
                    SUBSTR(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),3,2),
                    SUBSTR(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),1,2)
                    ) BETWEEN '$DS' AND '$DE' ";
        $data['count'] = $Report->Count_Where("KidneyPatient", "Ext", $Where);

        $data['tb'] = $TB->findAll($Where);
        $data['count'] = $Report->Count_where("KidneyPatient", "Ext", $Where);
        $this->renderPartial("//Report/kidneypatient_result", $data);
    }

    //รายงานผู้ป่วยตามสิทธิ์หลักประกันสุขภาพ
    public function actionHealth_insurance() {
        $TB = new HealthInsurance();
        $Report = new Report();
        $data['tb'] = $TB->findAll();
        $data['count'] = $Report->Count_all("HealthInsurance", "Ext");
        $this->render("//Report/health_insurance", $data);
    }

    public function actionHealth_insurance_result() {
        $TB = new HealthInsurance();
        $Report = new Report();

        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];


        $D_S = substr(trim(str_replace("-", "", $date_start)), 0, 2);
        $D_E = substr(trim(str_replace("-", "", $date_end)), 0, 2);

        $M_S = substr(trim(str_replace("-", "", $date_start)), 2, 2);
        $M_E = substr(trim(str_replace("-", "", $date_end)), 2, 2);

        $year_s = substr($date_start, -4) + 543;
        $year_e = substr($date_end, -4) + 543;

        $DS = $year_s . $M_S . $D_S;
        $DE = $year_e . $M_E . $D_E;

        /*
          echo $DS."<br/>".$DE;
          exit;
         */

        $Where = " CONCAT(
                    RIGHT(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),4),
                    SUBSTR(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),3,2),
                    SUBSTR(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),1,2)
                    ) BETWEEN '$DS' AND '$DE' ";
        $data['count'] = $Report->Count_Where("HealthInsurance", "Ext", $Where);

        $data['tb'] = $TB->findAll($Where);
        $data['count'] = $Report->Count_where("HealthInsurance", "Ext", $Where);
        $this->renderPartial("//Report/health_insurance_result", $data);
    }

    //รายงานผู้ป่วยตามสิทธิ์ประกันสังคม
    public function actionClaim_insurance() {
        $TB = new ClaimInsurance();
        $Report = new Report();
        $data['tb'] = $TB->findAll();
        $data['count'] = $Report->Count_all("ClaimInsurance", "Ext");
        $this->render("//Report/claim_insurance", $data);
    }

    public function actionClaim_insurance_result() {
        $TB = new ClaimInsurance();
        $Report = new Report();

        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];



        $D_S = substr(trim(str_replace("-", "", $date_start)), 0, 2);
        $D_E = substr(trim(str_replace("-", "", $date_end)), 0, 2);

        $M_S = substr(trim(str_replace("-", "", $date_start)), 2, 2);
        $M_E = substr(trim(str_replace("-", "", $date_end)), 2, 2);

        $year_s = substr($date_start, -4) + 543;
        $year_e = substr($date_end, -4) + 543;

        $DS = $year_s . $M_S . $D_S;
        $DE = $year_e . $M_E . $D_E;

        /*
          echo $DS."<br/>".$DE;
          exit;
         */

        $Where = " CONCAT(
                    RIGHT(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),4),
                    SUBSTR(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),3,2),
                    SUBSTR(TRIM(REPLACE(LEFT(t.BegHd,11),'/','')),1,2)
                    ) BETWEEN '$DS' AND '$DE' ";
        $data['count'] = $Report->Count_Where("ClaimInsurance", "Ext", $Where);

        $data['tb'] = $TB->findAll($Where);
        $data['count'] = $Report->Count_where("ClaimInsurance", "Ext", $Where);
        $this->renderPartial("//Report/claim_insurance_result", $data);
    }

    public function actionSet_year() {
        Yii::app()->session['Year'] = $_POST['Year'];
    }

    public function actionError_outpatient() {
        $error_code = $_POST['error_code'];
        $r = str_replace(",", "','", $error_code);
        $TB = new Erroroutpatient();
        $result = $TB->findAll("ErrorCode IN ('" . $r . "')");
        $ERROR = "";
        foreach ($result as $rs) {
            $ERROR .= $rs['ErrorName'] . "<br/>";
        }

        echo $ERROR;
    }

}
