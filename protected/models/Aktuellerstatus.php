<?php

/**
 * This is the model class for table "{{aktuellerstatus}}".
 *
 * The followings are the available columns in table '{{aktuellerstatus}}':
 * @property integer $pk_aktuellerstatus
 * @property string $aktuellerstatus_name
 *
 * The followings are the available model relations:
 * @property Bgt[] $bgts
 * @property Ift[] $ifts
 */
class Aktuellerstatus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{aktuellerstatus}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aktuellerstatus_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_aktuellerstatus, aktuellerstatus_name', 'safe', 'on'=>'search'),
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
			'bgts' => array(self::HAS_MANY, 'Bgt', 'aktuellerstatus_id'),
			'ifts' => array(self::HAS_MANY, 'Ift', 'aktuellerstatus_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_aktuellerstatus' => 'Pk Aktuellerstatus',
			'aktuellerstatus_name' => 'Aktuellerstatus Name',
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

		$criteria->compare('pk_aktuellerstatus',$this->pk_aktuellerstatus);
		$criteria->compare('aktuellerstatus_name',$this->aktuellerstatus_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aktuellerstatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
