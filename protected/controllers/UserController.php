<?php

class UserController extends Controller {

    public function actionlogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new MasUser();
        $result = $user->find("Username = '" . str_replace("'", '0', str_replace('OR', '0', $username)) . "'");
        if (isset($result)) {
            if ($result->Password == ($password)) {
                $name = $result['Name'];
                $lname = $result['Lname'];
                $status = $result['Status'];
                $userid = $result['Id'];
                Yii::app()->session['name'] = $name;
                Yii::app()->session['lname'] = $lname;
                Yii::app()->session['status'] = $status;
                Yii::app()->session['userid'] = $userid;
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }

    public function actionGetuser() {
        $Use = new MasUser();
        $data['use'] = $Use->findAll();

        $this->render("//User/user", $data);
    }

    public function actionRegister() {
        $column = array(
            "Name" => $_POST['Name'],
            "Lname" => $_POST['Lname'],
            "Card" => $_POST['Card'],
            "Tel" => $_POST['Tel'],
            "Username" => $_POST['Username'],
            "Password" => $_POST['Password']
        );
        Yii::app()->db->createCommand()
                ->insert("MasUser", $column);
    }

}
