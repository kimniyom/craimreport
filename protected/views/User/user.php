
<script type="text/javascript">
    function Register() {
        var url = "<?php echo Yii::app()->createUrl('user/register') ?>";
        var Name = $("#Name").val();
        var Lname = $("#Lname").val();
        var Card = $("#Card").val();
        var Tel = $("#Tel").val();
        var Username = $("#Username").val();
        var Password = $("#Password").val();
        var data = {
            Name: Name,
            Lname: Lname,
            Card: Card,
            Tel: Tel,
            Username: Username,
            Password: Password
        };
        if (Name == '' || Lname == '' || Card == '' || Tel == '' || Username == '' || Password == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });

    }
</script>

<script>
    function showDialog(id) {
        var dialog = $(id).data('dialog');
        dialog.open();
    }

    function Edit_user(Id) {
        var url = "<?php echo Yii::app()->createUrl('user/edit') ?>";
        var data = {Id: Id};
        $.post(url, data, function (result) {
            $("#load_from_edit").html(result);
            var dialog = $("#edit_user").data('dialog');
            dialog.open();
        });

    }

    function Save_edit(Id) {
        var url = "<?php echo Yii::app()->createUrl('user/save_edit') ?>";
        var Name = $("#Name").val();
        var Lname = $("#Lname").val();
        var Card = $("#Card").val();
        var Tel = $("#Tel").val();
        var Username = $("#Username").val();
        var Password = $("#Password").val();
        var data = {
            Id: Id,
            Name: Name,
            Lname: Lname,
            Card: Card,
            Tel: Tel,
            Username: Username,
            Password: Password
        };
        if (Name == '' || Lname == '' || Card == '' || Tel == '' || Username == '' || Password == '') {
            alert("กรอกข้อมูลไม่ครบ ...");
            return false;
        }

        $.post(url, data, function (success) {
            window.location.reload();
        });
    }

    function Delate(Id) {
        var r = confirm("ต้องการลบข้อมูลนี้ ใช่ หรือ ไม่ ..?");
        if (r == true) {
            var url = "<?php echo Yii::app()->createUrl('user/delete') ?>";
            var data = {Id: Id};

            $.post(url, data, function (success) {
                window.location.reload();
            });
        }
    }
</script>

<?php
$this->breadcrumbs = array(
    'จัดการผู้ใช้งาน',
);
?>

<!-- edit -->
<div data-role="dialog" id="edit_user" data-close-button="true" class="success padding20" data-overlay="true" data-overlay-color="op-dark">
    <div id="load_from_edit"></div>
</div>

<!-- Insert -->
<div data-role="dialog" id="dialog" data-close-button="true" class="success padding20" data-overlay="true" data-overlay-color="op-dark">

    <div class="grid">
        <div class="row cells2">
            <div class="cell">
                <label>Name</label>
                <div class="input-control text full-size">
                    <input type="text" id="Name">
                </div>
            </div>
            <div class="cell">
                <label>Lname</label>
                <div class="input-control text full-size">
                    <input type="text" id="Lname">
                </div>
            </div>
        </div>
        <div class="row cells2">
            <div class="cell">
                <label>Card</label>
                <div class="input-control text full-size">
                    <input type="text" id="Card">
                </div>
            </div>
            <div class="cell">
                <label>Tel</label>
                <div class="input-control text full-size">
                    <input type="text" id="Tel">
                </div>
            </div>
        </div>
        <div class="row cells2">
            <div class="cell">
                <label>Username</label>
                <div class="input-control text full-size">
                    <input type="text" id="Username">
                </div>
            </div>
            <div class="cell">
                <label>Password</label>
                <div class="input-control password full-size">
                    <input type="password" id="Password">
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <center>
        <button class="button info block-shadow-info text-shadow" onclick="Register()">
            <span class="icon mif-checkmark"></span>
            เพิ่มผู้ใช้งาน
        </button>
    </center>

</div>



<button class="image-button" onclick="showDialog('#dialog')">
    เพิ่มผู้ใช้งาน
    <span class="icon mif-plus"></span>
</button>

<div class="panel success">
    <div class="heading">
        <span class="icon mif-users"></span>
        <span class="title">
            ข้อมูลสมาชิก
        </span>
    </div>
    <div class="content">
        <table class="table bordered hover" id="user" data-role="datatable" style=" border: solid 2px #808080; background: #FFF;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Lname</th>
                    <th>Card</th>
                    <th>Tel</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($use as $rs): $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rs['Name'] ?></td>
                        <td><?php echo $rs['Lname'] ?></td>
                        <td><?php echo $rs['Card'] ?></td>
                        <td><?php echo $rs['Tel'] ?></td>
                        <td><?php echo $rs['Username'] ?></td>
                        <td><?php echo $rs['Password'] ?></td>
                        <td><?php echo $rs['Status'] ?></td>
                        <td>
                            <a href="#" onclick="Edit_user('<?php echo $rs['Id'] ?>')"><span class="icon mif-pencil"></span>Edit</a>&nbsp;
                            <a href="#" onclick="Delate('<?php echo $rs['Id'] ?>');"><span class="icon mif-cancel"></span>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>