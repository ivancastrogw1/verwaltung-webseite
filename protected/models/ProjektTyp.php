<?php

/**
 * This is the model class for table "{{projekt_typ}}".
 *
 * The followings are the available columns in table '{{projekt_typ}}':
 * @property integer $pk_projekt_typ
 * @property string $projekt_typ_name
 *
 * The followings are the available model relations:
 * @property Bgt[] $bgts
 */
class ProjektTyp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{projekt_typ}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('projekt_typ_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_projekt_typ, projekt_typ_name', 'safe', 'on'=>'search'),
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
			'bgts' => array(self::HAS_MANY, 'Bgt', 'projekttyp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_projekt_typ' => 'Pk Projekt Typ',
			'projekt_typ_name' => 'Projekt Typ Name',
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

		$criteria->compare('pk_projekt_typ',$this->pk_projekt_typ);
		$criteria->compare('projekt_typ_name',$this->projekt_typ_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProjektTyp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
