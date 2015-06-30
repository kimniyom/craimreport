<?php

class Mastables extends CActiveRecord {

    public function tableName() {
        return "MasTable";
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
