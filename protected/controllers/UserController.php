<?php

class UserController extends Controller
{
/**
 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
 * using two-column layout. See 'protected/views/layouts/column2.php'.
 */
public $layout='//layouts/column2';

/**
 * @return array action filters
 */
public function filters()
{
	return array(
		'accessControl', // perform access control for CRUD operations
		'postOnly + delete', // we only allow deletion via POST request
	);
}


/**
 * Displays a particular model.
 * @param integer $id the ID of the model to be displayed
 */
public function actionView($id)
{
	$username = Yii::app()->user->name;
	$user = User::model()->find('username=?',array(Yii::app()->user->name));
	$user_role_Id = $user->role_ID;
	if(isset($username) && $username =="Guest")
	{

		echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen sdfsdf')</script>";
	}
	else
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

}

/**
 * Creates a new model.
 * If creation is successful, the browser will be redirected to the 'view' page.
 */
public function actionCreate()
{
	$username = Yii::app()->user->name;
	$user = User::model()->find('username=?',array(Yii::app()->user->name));
	$user_role_Id = $user->role_ID;
	$user_right_Id = $user->user_right_ID;


	if(isset($username)){

		if($user_role_Id == "2" || $user_role_Id == "5" && $user_right_Id=="2")
		{
			$model=new User;		
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

			if(isset($_POST['User']))
			{
				$model->attributes=$_POST['User'];
				if($model->password !="")
					$model->password=$model->hashPassword($_POST['User']['password'],$_POST['User']['username']);
				if($model->save())
					$this->redirect(array('view','id'=>$model->user_ID));

			}

			$this->render('create',array(
				'model'=>$model,
			));
		}
		else
		{
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}
	}
}

/**
 * Updates a particular model.
 * If update is successful, the browser will be redirected to the 'view' page.
 * @param integer $id the ID of the model to be updated
 */
public function actionUpdate($id)
{
	$model=$this->loadModel($id);
	if(isset($_POST['User'])){
		$model->attributes=$_POST['User'];	
	}
	$selectedUserName = $model->username;
	$username = Yii::app()->user->name;	
	$user = User::model()->find('username=?',array(Yii::app()->user->name));
	$user_role_Id = $user->role_ID;
	$user_right_Id = $user->user_right_ID;
	$user_db = User::model()->find('username=?',array($username));
	$old_password = $user_db->password;

	if(isset($username)){

	/**
	*	The user_right_ID gives the user the possibility to read/write information in the database,
	*   if 2 then the user have read and write permission
	* 
	*	The role_ID defines the user function i.e. (Abteilungsleiter,Projektlieter,Ingenieur,F&E-Koordination or Vorstand)
	*/
	if($user_role_Id == "2" || $user_role_Id == "5" && $user_right_Id=="2")
	{
		if(isset($_POST['User']))
		{
			$password = $_POST['User']['password'];
			if(isset($username) == isset($_POST['User']['username'])){
				if($username ==  $selectedUserName){
					// validation to replace or enter a new password
					if($password != "" && $password != $old_password && strlen($password) <= 30){
						$model->password=$model->hashPassword($_POST['User']['password'],$_POST['User']['username']);	
						if($model->save());
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
					}else if($model->password != ""){
						$model->password = $old_password;
						if($model->save());
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
					}else{
						if($model->save());
					}

				}else{
					if($password != "" && $password != $old_password && strlen($password) <= 30){
						$model->password=$model->hashPassword($_POST['User']['password'],$_POST['User']['username']);	
						if($model->save());							
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
					}else if($model->password != ""){
						$model->password = $old_password;
						if($model->save());
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
					}else{
						if($model->save());
					}

				}		
			}			
		}
		$this->render('update',array('model'=>$model,));
	}else if($username == $selectedUserName )
	{
		if(isset($_POST['User']))
		{
			$password = $_POST['User']['password'];
			if(isset($username) == isset($_POST['User']['username'])){
				if($username ==  $selectedUserName){
					if($password != "" && $password != $old_password && strlen($password) <= 30){
						$model->password=$model->hashPassword($_POST['User']['password'],$_POST['User']['username']);	
						if($model->save());
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
					}else if($model->password != ""){
						$model->password = $old_password;
						if($model->save());
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
					}else{
						if($model->save());
					}

				}else{
					if($password != "" && $password != $old_password && strlen($password) <= 30){
						$model->password=$model->hashPassword($_POST['User']['password'],$_POST['User']['username']);	
						if($model->save());							
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
					}else if($model->password != ""){
						$model->password = $old_password;
						if($model->save());
						Yii::app()->user->logout();
						$this->redirect(Yii::app()->homeUrl);
					}else{
						if($model->save());
					}

				}		
			}			
		}			
		$this->render('update',array('model'=>$model,));

	}else
	{
		echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen: Sie hat keine Schreibrechte')</script>";
	}		
}else{
	throw new CHttpException(500,'HTTPInternalServerError.');
}
}

/**
 * Deletes a particular model.
 * If deletion is successful, the browser will be redirected to the 'admin' page.
 * @param integer $id the ID of the model to be deleted
 */
public function actionDelete($id)
{
	$model=$this->loadModel($id);
	$selectedUserName = $model->username;
	$username = Yii::app()->user->name;
	if(isset($username) && $username =="Guest" || $username != $selectedUserName)
	{
		echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		
	}
	else
	{
		if($selectedUserName == "Admin"){
			
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}
		$this->loadModel($id)->delete();
	// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Admin'));
	}
}

/**
 * Lists all models.
 */
public function actionIndex()
{
	$username = Yii::app()->user->name;
	$user = User::model()->find('username=?',array(Yii::app()->user->name));
	$user_role_Id = $user->role_ID;
	$user_type_ID = $user->user_type_ID;
	if(isset($username) && $username =="Guest")
	{			
		echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
	}
	else
	{
		if($user_role_Id == "5" || $user_role_Id == "6"){
			$dataProvider=new CActiveDataProvider('User');
			$this->render('index',array('dataProvider'=>$dataProvider,));
		}else{
			if($user_role_Id == "2"){
				$criteria=new CDbCriteria;
				$criteria->select = array('user_ID,username');		
				$criteria->condition = "user_type_ID = '".$user_type_ID."'";
				$dataProvider=new CActiveDataProvider('user', array(
					'criteria'=>$criteria,
				));
			}else{
				$criteria=new CDbCriteria;
				$criteria->select = array('user_ID,username');			
				if(isset($username) && $username !="Admin"){
					$criteria->condition = "username = '".$username."'";
				}
				$dataProvider=new CActiveDataProvider('user', array(
					'criteria'=>$criteria,
				));
			}
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));	
		}	
	}
}

/**
 * Manages all models.
 */
public function actionAdmin()
{
	$username = Yii::app()->user->name;
	$user = User::model()->find('username=?',array(Yii::app()->user->name));
	$user_role_Id = $user->role_ID;
	if(isset($username) && $username =="Guest" || $username != "Admin")
	{
		if($user_role_Id =="4"){
			
			echo "<script>alert('Sie sind nicht berechtigt, diese Aktion durchzuführen')</script>";
		}else{
			if($user->user_type_ID == "1"){
				$criteria=new CDbCriteria;
				$criteria->condition = "user_type_ID='1'";
				$model=new User('search', array(
					'criteria'=>$criteria,
				));
			}else if($user->user_type_ID == "2"){
				$criteria=new CDbCriteria;
				$criteria->condition = "user_type_ID='2'";
				$model=new User('search', array(
					'criteria'=>$criteria,
				));
			}else{
				$model=new User('search');
			}
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['User'])){
		$model->attributes=$_GET['User'];			
	}

	$this->render('admin',array(
		'model'=>$model,
	));
}
}
else
{
	$model=new User('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['User']))
		$model->attributes=$_GET['User'];

	$this->render('admin',array(
		'model'=>$model,
	));
}
}

/**
 * Returns the data model based on the primary key given in the GET variable.
 * If the data model is not found, an HTTP exception will be raised.
 * @param integer $id the ID of the model to be loaded
 * @return User the loaded model
 * @throws CHttpException
 */
public function loadModel($id)
{
	$model=User::model()->findByPk($id);
	if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
	return $model;
}

/**
 * Performs the AJAX validation.
 * @param User $model the model to be validated
 */
protected function performAjaxValidation($model)
{
	if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
	{
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}
}
}