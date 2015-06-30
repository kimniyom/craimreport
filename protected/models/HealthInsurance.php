<?php

/**
 * This is the model class for table "HealthInsurance".
 *
 * The followings are the available columns in table 'HealthInsurance':
 * @property integer $Id
 * @property string $Ext
 * @property string $Line
 * @property string $Hreg
 * @property string $HN
 * @property string $SessNo
 * @property string $BegHd
 * @property string $HdMode
 * @property string $ClaimAcc
 * @property string $Payers
 * @property string $DlzNew
 * @property string $EpoTn
 * @property string $Epounit
 * @property string $Hct
 * @property string $Paychk
 * @property string $Amount
 * @property string $HDCharge
 * @property string $Payrate
 * @property string $AddiPay
 * @property string $Payable
 * @property string $EHS
 * @property string $BF
 * @property string $CheckCode
 * @property string $Flag
 * @property string $D_update
 */
class HealthInsurance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'HealthInsurance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('D_update', 'required'),
			array('Ext, Line, Hreg, HN, SessNo, BegHd, HdMode, ClaimAcc, Payers, DlzNew, EpoTn, Epounit, Hct, Paychk, Amount, HDCharge, Payrate, AddiPay, Payable, EHS, BF, CheckCode', 'length', 'max'=>255),
			array('Flag', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Ext, Line, Hreg, HN, SessNo, BegHd, HdMode, ClaimAcc, Payers, DlzNew, EpoTn, Epounit, Hct, Paychk, Amount, HDCharge, Payrate, AddiPay, Payable, EHS, BF, CheckCode, Flag, D_update', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Ext' => 'Ext',
			'Line' => 'Line',
			'Hreg' => 'Hreg',
			'HN' => 'Hn',
			'SessNo' => 'Sess No',
			'BegHd' => 'Beg Hd',
			'HdMode' => 'Hd Mode',
			'ClaimAcc' => 'Claim Acc',
			'Payers' => 'Payers',
			'DlzNew' => 'Dlz New',
			'EpoTn' => 'Epo Tn',
			'Epounit' => 'Epounit',
			'Hct' => 'Hct',
			'Paychk' => 'Paychk',
			'Amount' => 'Amount',
			'HDCharge' => 'Hdcharge',
			'Payrate' => 'Payrate',
			'AddiPay' => 'Addi Pay',
			'Payable' => 'Payable',
			'EHS' => 'Ehs',
			'BF' => 'Bf',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Ext',$this->Ext,true);
		$criteria->compare('Line',$this->Line,true);
		$criteria->compare('Hreg',$this->Hreg,true);
		$criteria->compare('HN',$this->HN,true);
		$criteria->compare('SessNo',$this->SessNo,true);
		$criteria->compare('BegHd',$this->BegHd,true);
		$criteria->compare('HdMode',$this->HdMode,true);
		$criteria->compare('ClaimAcc',$this->ClaimAcc,true);
		$criteria->compare('Payers',$this->Payers,true);
		$criteria->compare('DlzNew',$this->DlzNew,true);
		$criteria->compare('EpoTn',$this->EpoTn,true);
		$criteria->compare('Epounit',$this->Epounit,true);
		$criteria->compare('Hct',$this->Hct,true);
		$criteria->compare('Paychk',$this->Paychk,true);
		$criteria->compare('Amount',$this->Amount,true);
		$criteria->compare('HDCharge',$this->HDCharge,true);
		$criteria->compare('Payrate',$this->Payrate,true);
		$criteria->compare('AddiPay',$this->AddiPay,true);
		$criteria->compare('Payable',$this->Payable,true);
		$criteria->compare('EHS',$this->EHS,true);
		$criteria->compare('BF',$this->BF,true);
		$criteria->compare('CheckCode',$this->CheckCode,true);
		$criteria->compare('Flag',$this->Flag,true);
		$criteria->compare('D_update',$this->D_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HealthInsurance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
