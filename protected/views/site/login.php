
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
        <!--
        <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />
        --->
        <title>Login form</title>

        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metro/css/metro.css" rel="stylesheet"/>
        <link href="<?php echo Yii::app()->baseUrl; ?>/themes/metro/css/metro-icons.css" rel="stylesheet"/>

        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metro/js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/themes/metro/js/metro.js"></script>

        <style>
            .login-form {
                width: 25rem;
                height: 18.75rem;
                position: fixed;
                top: 50%;
                margin-top: -9.375rem;
                left: 50%;
                margin-left: -12.5rem;
                background-color: #ffffff;
                opacity: 0;
                -webkit-transform: scale(.8);
                transform: scale(.8);
            }
        </style>

        <script>
            $(function () {
                var form = $(".login-form");

                form.css({
                    opacity: 1,
                    "-webkit-transform": "scale(1)",
                    "transform": "scale(1)",
                    "-webkit-transition": ".5s",
                    "transition": ".5s"
                });
            });
        </script>
    </head>
    <body class="bg-darkTeal">
        <div class="login-form padding20 block-shadow">

            <h1 class="text-light">Login to service</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">User Username:</label>
                <input type="text" name="username" id="username">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">User password:</label>
                <input type="password" name="password" id="password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="button" class="button primary" onclick="login()">Login to...</button>
                <button type="button" class="button danger" onclick="javascript:window.location.reload()">Cancel</button>
            </div>

        </div>

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
                        window.location = "<?php echo Yii::app()->createUrl('site') ?>";
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

            $(document).keypress(function (e) {
                if (e.which == 13) {
                    login();
                }
            });
        </script>



    </body>
</html>