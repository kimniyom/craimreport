<?php

class MastableController extends Controller {

    public function actionIndex() {
        
    }

    public function actionCreate() {
        $Tables = new Mastables();
        $data['tables'] = $Tables->findAll();
        
        $this->render("//Mastable/create",$data);
    }

    public function actionSave_tablename() {
        $table_name = $_POST['tablename'];
        $Column = array("Table_Name" => $table_name);

        Yii::app()->db->createCommand()
                ->insert("MasTable", $Column);
    }


}
