<?php

/**
 * This is the model class for table "MasUser".
 *
 * The followings are the available columns in table 'MasUser':
 * @property integer $Id
 * @property string $Name
 * @property string $Lname
 * @property string $Username
 * @property string $Password
 * @property string $Card
 * @property string $Tel
 * @property string $Status
 * @property string $D_update
 */
class MasUser extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'MasUser';
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
