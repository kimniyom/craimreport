<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />

  <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metro/css/metro.css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metro/css/metro-icons.css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metro/css/docs.css" rel="stylesheet"/>
  <link href="<?php echo Yii::app()->baseUrl; ?>/css/style_project.css" rel="stylesheet"/>

  <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metro/js/jquery-2.1.3.min.js"></script>
  <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metro/js/metro.js"></script>
  <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metro/js/docs.js"></script>
  <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metro/js/prettify/run_prettify.js"></script>

  <!-- DataTable -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
  <script src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/media/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/Responsive/css/dataTables.responsive.css"/>
  <script src="<?php echo Yii::app()->baseUrl; ?>/assets/DataTables-1.10.7/extensions/Responsive/js/dataTables.responsive.min.js"></script>

  <!--
  Uploadify
-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/uploadify.css">
<script src="<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/jquery.uploadify-3.1.js"></script>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<script type="text/javascript">
function login() {
  var url = "<?php echo Yii::app()->createUrl('user/login') ?>";
  var username = $("#username").val();
  var password = $("#password").val();
  var data = {username: username, password: password};
  if (username == '' || password == '') {
    $.Notify({
      caption: 'Wrong ...',
      content: 'คุณกรอกข้อมูลไม่ครบ ...',
      type: 'warning'
    });

    return false;
  }
  $.post(url, data, function (success) {
    if (success == 1) {
      window.location.reload();
      //alert("Login Success ...");
    } else {
      $.Notify({
        caption: 'Wrong ...',
        content: 'ไม่มีข้อมูล ...',
        type: 'alert'
      });
    }
  });
}
</script>

</head>

<body>

  <div class="app-bar fixed-top bg-dark" data-role="appbar">
    <div class="container full-size">
      <a class="app-bar-element branding bg-brown">
        <span class="icon mif-hotel mif-3x" style="margin-bottom: 5px; color:#33ff33; margin-right: 0px;"></span>
        <span class="icon mif-calculator2 mif-2x" style="margin-bottom: 5px; color:#ffff00; margin-left: 0px;"></span>
        SystemStatisticClaim v 1.0</a>

        <ul class="app-bar-menu">
            <li><a href="<?php echo Yii::app()->createUrl('Site')?>"><span class="icon mif-home" style=" margin-bottom: 8px;"></span> หน้าหลัก</a></li>
          <li>
            <a href="" class="dropdown-toggle">ตรวจสอบข้อมูล</a>
            <ul class="d-menu" data-role="dropdown">
              <li><a href="<?php echo Yii::app()->createUrl('report/outpatient'); ?>">ผู้ป่วยนอกรักษาต่อเนื่องทั่วไป</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('report/kidneypatient'); ?>">ผู้ป่วยโรคไต</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('report/health_insurance'); ?>">ผู้ป่วยตามหลักประกันสุขภาพ</a></li>
              <li><a href="<?php echo Yii::app()->createUrl('report/claim_insurance');?>">ผู้ป่วยตามสิทธิประกันสังคม</a></li>
              <li class="divider"></li>
              <!--
              <li><a href="" class="dropdown-toggle">Other Products</a>
                <ul class="d-menu" data-role="dropdown">
                  <li><a href="">Internet Explorer 10</a></li>
                  <li><a href="">Skype</a></li>
                  <li><a href="">Surface</a></li>
                </ul>
              </li>
              -->
            </ul>
          </li>
          <li>
            <a href="<?php echo Yii::app()->createUrl('uploads/uploadfile') ?>">
              <span class="icon mif-file-upload"></span>
              นำเข้าไฟล์ข้อมูล</a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->createUrl('uploads/log_upload') ?>">
                <span class="icon mif-history"></span>
                ประวัติการส่งไฟล์</a>
              </li>
            </ul>

            <div class="app-bar-element place-right">
              <?php if ((Yii::app()->session['status']) != '') { ?>

                <a class="dropdown-toggle fg-white">ส่วนตัว</a>
                <div class="app-bar-drop-container bg-white fg-dark place-right" data-role="dropdown" data-no-close="true">

                  <ul class="v-menu">
                    <li class="menu-title" style=" text-align: center;">
                      <span class="icon mif-user mif-4x" style="color: #6600ff;"></span><br/>
                      ยินดีต้อนรับ <br/>
                      คุณ <?php echo Yii::app()->session['name'] . ' ' . Yii::app()->session['lname']; ?><br/>
                    </li>
                    <li><a href=""><span class="mif-user-md icon"></span> ข้อมูลส่วนตัว</a></li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">
                        <span class="mif-switch icon"></span> Logout</a>
                      </li>
                    </ul>
                  </div>


                </div>
                <?php } else { ?>
                  <a class="dropdown-toggle fg-white"><span class="mif-enter"></span> Login</a>
                  <div class="app-bar-drop-container bg-white fg-dark place-right" data-role="dropdown" data-no-close="true">
                    <div class="padding20">

                      <h4 class="text-light">Login ...</h4>
                      <div class="input-control text">
                        <span class="mif-user prepend-icon"></span>
                        <input type="text" id="username"/>
                      </div>
                      <div class="input-control text">
                        <span class="mif-lock prepend-icon"></span>
                        <input type="password" id="password"/>
                      </div>
                      <br/>
                      <div class="form-actions">
                        <button class="button primary full-size" onclick="login()">
                          <span class="icon mif-checkmark"></span> Login
                        </button>
                      </div>

                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>

            <div class="container page-content full-size" style="padding-left:0px; padding-right: 0px;">

              <?php if (isset($this->breadcrumbs)): ?>
                <div class="example" style=" padding: 0px; margin-top: 10px;">
                  <?php
                  $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                  ));
                  ?><!-- breadcrumbs -->
                </div>
              <?php endif ?>

              <?php echo $content; ?>

            </div>
            
            <div class="container page-content" style=" padding-top: 10px; margin-bottom: 20px; text-align: center;">
              <hr/>
              <!--
              <span class="icon mif-hotel"></span>โรงพยาบาลแม่สอด จังหวัดตาก
              <br/>
              &copy;Kimniyom 2015 E-mail : kimniyomclub@gmail.com
              -->
            </div>

            <script src="<?php echo Yii::app()->baseUrl; ?>/js_store/config_tb.js"></script>
            <script src="<?php echo Yii::app()->baseUrl; ?>/assets/chart/highcharts.js"></script>
          </body>
          </html>
