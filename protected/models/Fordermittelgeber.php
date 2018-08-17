<?php

/**
 * This is the model class for table "{{fordermittelgeber}}".
 *
 * The followings are the available columns in table '{{fordermittelgeber}}':
 * @property integer $pk_fordermittelgeber
 * @property string $fordermittelgeber_name
 *
 * The followings are the available model relations:
 * @property Bgt[] $bgts
 */
class Fordermittelgeber extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{fordermittelgeber}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fordermittelgeber_name', 'required'),
			array('fordermittelgeber_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pk_fordermittelgeber, fordermittelgeber_name', 'safe', 'on'=>'search'),
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
			'bgts' => array(self::HAS_MANY, 'Bgt', 'fordermittelgeber_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pk_fordermittelgeber' => 'Pk Fordermittelgeber',
			'fordermittelgeber_name' => 'Fordermittelgeber Name',
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

		$criteria->compare('pk_fordermittelgeber',$this->pk_fordermittelgeber);
		$criteria->compare('fordermittelgeber_name',$this->fordermittelgeber_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fordermittelgeber the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
