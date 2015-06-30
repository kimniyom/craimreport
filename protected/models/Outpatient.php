<?php

/**
 * This is the model class for table "Outpatient".
 *
 * The followings are the available columns in table 'Outpatient':
 * @property integer $Id
 * @property string $Station
 * @property string $Line
 * @property string $AuthCode
 * @property string $DTTran
 * @property string $InvNo
 * @property string $BillNo
 * @property string $HN
 * @property string $MemberNo
 * @property double $AmountPaid
 * @property string $CheckCode
 * @property string $Flag
 * @property string $D_update
 */
class Outpatient extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Outpatient';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('AmountPaid', 'numerical'),
            array('Station, Line, AuthCode, DTTran, InvNo, BillNo, HN, MemberNo, CheckCode', 'length', 'max' => 100),
            array('Flag', 'length', 'max' => 255),
            array('D_update', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, Station, Line, AuthCode, DTTran, InvNo, BillNo, HN, MemberNo, AmountPaid, CheckCode, Flag, D_update', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'Id' => 'ID',
            'Station' => 'Station',
            'Line' => 'Line',
            'AuthCode' => 'Auth Code',
            'DTTran' => 'Dttran',
            'InvNo' => 'Inv No',
            'BillNo' => 'Bill No',
            'HN' => 'Hn',
            'MemberNo' => 'Member No',
            'AmountPaid' => 'Amount Paid',
            'CheckCode' => 'Check Code',
            'Flag' => 'Flag',
            'D_update' => 'D Update',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('Id', $this->Id);
        $criteria->compare('Station', $this->Station, true);
        $criteria->compare('Line', $this->Line, true);
        $criteria->compare('AuthCode', $this->AuthCode, true);
        $criteria->compare('DTTran', $this->DTTran, true);
        $criteria->compare('InvNo', $this->InvNo, true);
        $criteria->compare('BillNo', $this->BillNo, true);
        $criteria->compare('HN', $this->HN, true);
        $criteria->compare('MemberNo', $this->MemberNo, true);
        $criteria->compare('AmountPaid', $this->AmountPaid);
        $criteria->compare('CheckCode', $this->CheckCode, true);
        $criteria->compare('Flag', $this->Flag, true);
        $criteria->compare('D_update', $this->D_update, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Outpatient the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
