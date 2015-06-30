<?php

class Report {

    public function Count_all($Table = '', $Field = '') {
        $query = "SELECT SUM(IF(LEFT(LTRIM($Field),1) = 'A',1,0)) AS A,
    SUM(IF(LEFT(LTRIM($Field),1) = 'C',1,0)) AS C
    FROM $Table ";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs;
    }

    public function Count_where($Table = '', $Field = '', $Where = '') {
        $query = "SELECT SUM(IF(LEFT(LTRIM($Field),1) = 'A',1,0)) AS A,
    SUM(IF(LEFT(LTRIM($Field),1) = 'C',1,0)) AS C
    FROM $Table t WHERE $Where";
        $rs = Yii::app()->db->createCommand($query)->queryRow();
        return $rs;
    }

    public function Outpatient($where = '') {
        $query = "SELECT * FROM Outpatient WHERE $where ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function Sumamount($Table = '',$SumField = '', $FieldDate = '', $FieldType = '', $Year = '') {
        $query = "SELECT
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '01',t.$SumField,0)) AS TOTAL1,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '02',t.$SumField,0)) AS TOTAL2,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '03',t.$SumField,0)) AS TOTAL3,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '04',t.$SumField,0)) AS TOTAL4,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '05',t.$SumField,0)) AS TOTAL5,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '06',t.$SumField,0)) AS TOTAL6,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '07',t.$SumField,0)) AS TOTAL7,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '08',t.$SumField,0)) AS TOTAL8,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '09',t.$SumField,0)) AS TOTAL9,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '10',t.$SumField,0)) AS TOTAL10,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '11',t.$SumField,0)) AS TOTAL11,
    SUM(IF(SUBSTR(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),3,2) = '12',t.$SumField,0)) AS TOTAL12
    FROM $Table t
    WHERE RIGHT(TRIM(REPLACE(LEFT(t.$FieldDate,11),'/','')),4) = '$Year'
    AND LEFT(LTRIM(t.$FieldType),1) = 'A' ";

        $rs = Yii::app()->db->createCommand($query)->queryRow();

        $value = $rs['TOTAL1'] . ",";
        $value .= $rs['TOTAL2'] . ",";
        $value .= $rs['TOTAL3'] . ",";
        $value .= $rs['TOTAL4'] . ",";
        $value .= $rs['TOTAL5'] . ",";
        $value .= $rs['TOTAL6'] . ",";
        $value .= $rs['TOTAL7'] . ",";
        $value .= $rs['TOTAL8'] . ",";
        $value .= $rs['TOTAL9'] . ",";
        $value .= $rs['TOTAL10'] . ",";
        $value .= $rs['TOTAL11'] . ",";
        $value .= $rs['TOTAL12'];

        return $value;
    }

    public function CategoriesMonth() {
        $month = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $val = implode("','", $month);
        return "'" . $val . "'";
    }

}
