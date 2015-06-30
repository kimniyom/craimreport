<style type="text/css">
    .uploadify-button {
        background-color: transparent;
        padding: 5px;
        border:3px #999999 dashed;

    }
    .uploadify:hover .uploadify-button {
        background-color: transparent;
        padding: 5px;
        border:3px #999999 dashed;

    }
</style>

<script type="text/javascript">
   
    $(function () {
        $('#file_upload').uploadify({
            'buttonImage': 'images/upload.png',
            'swf ': '<?php echo Yii::app()->baseUrl; ?>/assets/uploadify/uploadify.swf',
            'uploader': "<?php echo Yii::app()->createUrl('upload_txt/import_txt') ?>",
            'fileSizeLimit': '100MB',
            'fileTypeExts': '*.txt;',
            'multi': false,
            'width': '250',
            'height': '118',
            'wmode': 'transparent',
            'uploadLimit': 1,
            'onUploadSuccess': function (file, data, response) {
                //alert(file.name);
                $("#work").html('<center><div data-role="preloader" data-type="ring"></div>กำลังนำเข้าข้อมูลอาจใช้เวลานาน ...</center>');
                var url = "<?php echo Yii::app()->createUrl('upload_txt/import') ?>";
                var datas = {files: file.name};

                $.post(url, datas, function (success) {
                    $("#work").html(success);
                    $("#up_load").html('<center><span class="icon mif-loop2 mif-4x" onclick="javascript:window.location.reload();"></span><br/><br/>Refresh</center>');
                });
            }
        });
    });
</script>

<?php
$this->breadcrumbs = array(
    'อัพโหลดไฟล์ข้อมูล',
);
?>

<!-- With icon (font) -->
<div class="panel info">
    <div class="heading">
        <span class="icon mif-file-upload"></span>
        <span class="title">อัพโหลดไฟล์</span>
    </div>
    <div class="content">
        <div class="example" style=" padding: 5px;">
            <div class="grid">
                <div class="row cells12">

                    <div class="cell colspan6">

                        <ul>
                            <li>.txt ไฟล์เท่านั้น</li>
                            <li>ไฟล์ขนาดไม่เกิน 100 MB</li>
                            <li>รูปแบบไฟล์ส่งมาจาก สกส. เท่านั้น</li>
                            <li style="color:#ff3300;">เปิดหน้านี้ค้างไว้จนกว่าจะทำการนำข้อมูลสำเร็จ</li>
                        </ul>

                    </div>

                    <div class="cell colspan6" id="up_load">
                        <input type="file" name="file_upload" id="file_upload"/>

                    </div>


                </div>
            </div>

            <div class="panel success">
                <div class="heading">
                    <span class="icon mif-history"></span>
                    <span class="title">การทำงาน</span>
                </div>
                <div class="content bg-dark" id="work" style=" color: #ccff00; height: 200px;">
                    ...
                </div>
            </div>

        </div>
    </div>
</div>






