<?php
$Report = new Report();
$Categories = $Report->CategoriesMonth();

$year = date("Y") + 543;

$Chart = new Chart();
//Putpatient
$ValueOutpatient = $Report->Sumamount("Outpatient", "AmountPaid", "DTTran", "Station", $year);
echo $Chart->ChartBar("outpatient", "bar", $Categories, $ValueOutpatient, "จำนวนเงินที่ขอเบิก", "ประจำปี พ.ศ. " . $year, "#0267fe");

//KidneyPatient
$ValueKidney = $Report->Sumamount("KidneyPatient", "Amount", "BegHd", "Ext", $year);
echo $Chart->ChartBar("kidney", "bar", $Categories, $ValueKidney, "จำนวนเงินที่ขอเบิก", "ประจำปี พ.ศ. " . $year, "#018f04");

//HealthInsurance
$ValueHealth = $Report->Sumamount("HealthInsurance", "HDCharge", "BegHd", "Ext", $year);
echo $Chart->ChartBar("HealthInsurance", "bar", $Categories, $ValueHealth, "จำนวนเงินที่ขอเบิก", "ประจำปี พ.ศ. " . $year, "#ffa800");

//ClaimInsurance
$ValueClaim = $Report->Sumamount("ClaimInsurance", "HDCharge", "BegHd", "Ext", $year);
echo $Chart->ChartBar("ClaimInsurance", "bar", $Categories, $ValueClaim, "จำนวนเงินที่ขอเบิก", "ประจำปี พ.ศ. " . $year, "red");
?>

<div class="example">
    <div class="grid">
        <div class="row cells12">
            <div class="cell colspan6">
                <div class="panel success">
                    <div class="heading">
                        <span class="icon mif-user-md"></span>
                        <span class="title">ผู้ป่วยนอกรักษาต่อเนื่องทั่วไป</span>
                    </div>
                    <div class="content" style=" padding-right: 18px;">
                        <div id="outpatient"></div>
                        <font style=" color: #ff6600;">*คำนวนเฉพาะคนที่ผ่านการตรวจสอบแล้ว</font>
                    </div>

                </div>
            </div>
            <div class="cell colspan6">
                <div class="cell colspan6">
                    <div class="panel warning">
                        <div class="heading">
                            <span class="icon mif-heartbeat"></span>
                            <span class="title">ผู้ป่วยโรคไต</span>
                        </div>
                        <div class="content">
                            <div id="kidney"></div>
                            <font style=" color: #ff6600;">*คำนวนเฉพาะคนที่ผ่านการตรวจสอบแล้ว</font>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="grid">
        <div class="row cells12">
            <div class="cell colspan6">
                <div class="panel danger">
                    <div class="heading">
                        <span class="icon mif-medkit"></span>
                        <span class="title">ผู้ป่วยตามหลักประกันสุขภาพ</span>
                    </div>
                    <div class="content">
                        <div id="HealthInsurance"></div>
                        <font style=" color: #ff6600;">
                        *คำนวนเฉพาะคนที่ผ่านการตรวจสอบแล้ว<br/>
                        ใช้ฟิวส์ HDCharge ในการคำนวณ
                        </font>
                    </div>
                </div>
            </div>
            <div class="cell colspan6">
                <div class="cell colspan6">
                    <div class="panel info">
                        <div class="heading">
                            <span class="icon mif-mastercard"></span>
                            <span class="title">ผู้ป่วยตามสิทธิประกันสังคม</span>
                        </div>
                        <div class="content">
                            <div id="ClaimInsurance"></div>
                            <font style=" color: #ff6600;">
                            *คำนวนเฉพาะคนที่ผ่านการตรวจสอบแล้ว<br/>
                            ใช้ฟิวส์ HDCharge ในการคำนวณ
                            </font>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
