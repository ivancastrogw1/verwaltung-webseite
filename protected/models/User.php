<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $user_ID
 * @property string $username
 * @property string $password
 * @property integer $role_ID
 * @property integer $user_right_ID
 * @property integer $user_type_ID
 *
 * The followings are the available model relations:
 * @property Bgt[] $bgts
 * @property UserRoles $role
 * @property UserType $userType
 * @property UserRights $userRight
 */
class User extends CActiveRecord
{
	const DATE_FORMAT = 'Y-m-d';
	const DATETIME_FORMAT = 'Y-m-d H:i:s';
	const TIME_FORMAT = 'H:i:s';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, role_ID, user_right_ID, user_type_ID', 'required'),
			array('role_ID, user_right_ID, user_type_ID', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('password', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_ID, username, password, role_ID, user_right_ID, user_type_ID', 'safe', 'on'=>'search'),
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
			'bgts' => array(self::HAS_MANY, 'Bgt', 'username'),
			'role' => array(self::BELONGS_TO, 'UserRoles', 'role_ID'),
			'userType' => array(self::BELONGS_TO, 'UserType', 'user_type_ID'),
			'userRight' => array(self::BELONGS_TO, 'UserRights', 'user_right_ID'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_ID' => 'Benutzer ID',
			'username' => 'Benutzername',
			'password' => 'Password',
			'role_ID' => 'Funktion',
			'user_right_ID' => 'Benutzerrechte',
			'role_name' => 'Role',
			'userRight' => 'Benutzerrecht',
			'user_type_ID' => 'Abteilung',
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

		$criteria->compare('username',$this->username,true);
		$user = User::model()->find('username=?',array(Yii::app()->user->name));
		if($user->user_type_ID == "1"){
			$criteria->condition = "user_type_ID='1'";
		}else if($user->user_type_ID == "2"){
			$criteria->condition = "user_type_ID='2'";
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/*
	*@return boolean validate user		
	*/
	public function validatePassword($password,$username,$user)
	{		
		$hash = $this->hashPassword($password,$username);
		$pass = $user->password;
		if($hash === $pass){
			return true;
		}else{
			return false;
		}		
	}

	public function searchPassword()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('password',$this->password,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));

	}
	/*
	*@return hashed value
	*/
	const SALT_LENGTH = 10;
	public function hashPassword($phrase,$salt=null)
	{
		$key = 'Gf;B&yXL|beJUf-K*PPiU{wf|@9K9j5?d+YW}?VAZOS%e2c -:11ii<}ZM?PO!96';
		if(is_null($salt))
			$salt = substr(hash('sha512', $key), 0, self::SALT_LENGTH);
		else
			$salt = substr($salt, 0, self::SALT_LENGTH);
		$hash = hash('sha512', $salt . $key . $phrase);
		return $hash;
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function date_convert($dateStr)
	{
		$dateStr_exploded = explode(".", $dateStr);
		if(isset($dateStr_exploded[0]) && isset($dateStr_exploded[1]) && $dateStr_exploded[2]){
			$day = $dateStr_exploded[0] ;
			$month = $dateStr_exploded[1];
			$year = $dateStr_exploded[2];
			$converted_date = $year."-".$month."-".$day;
			return $converted_date;
		}else {
			return NULL;
		}
	}

	public static function date_convert_german($dateStr)
	{
		$dateStr_exploded = explode("-", $dateStr);
		if(isset($dateStr_exploded[0]) && isset($dateStr_exploded[1]) && $dateStr_exploded[2]){
			$day = $dateStr_exploded[2] ;
			$month = $dateStr_exploded[1];
			$year = $dateStr_exploded[0];
			$converted_date = $day.".".$month.".".$year;
			return $converted_date;
		}else {
			return $dateStr;
		}
	}

	public static function datetime_convert_german($dateStr)
	{
		$dateTime_exploded = explode(" ", $dateStr);
		if(isset($dateTime_exploded[0]))
		$dateStr_exploded = explode("-", $dateTime_exploded[0]);
		if(isset($dateStr_exploded[0]) && isset($dateStr_exploded[1]) && $dateStr_exploded[2]){
			$day = $dateStr_exploded[2] ;
			$month = $dateStr_exploded[1];
			$year = $dateStr_exploded[0];
			$converted_date = $day.".".$month.".".$year." ".$dateTime_exploded[1];
			return $converted_date;
		}else {
			return $dateStr;
		}
	}
}
