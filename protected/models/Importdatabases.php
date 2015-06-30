<?php

class Importdatabases {

    public function Insert($Table = '', $Field = '', $Values = '') {
        $sql = "INSERT INTO $Table $Field VALUE $Values";
        return $sql;
    }

    public function Update() {
        
    }

    public function Render($query = '') {
        $Sql = $query;
        Yii::app()->db->createCommand($Sql)->execute();
    }

}
