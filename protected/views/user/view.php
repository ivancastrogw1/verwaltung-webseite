<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Benutzerliste'=>array('index'),
	$model->user_ID,
	);

$this->menu=array(
	array('label'=>'Benutzerliste', 'url'=>array('index')),
	array('label'=>'Benutzererstellen', 'url'=>array('create')),
	array('label'=>'Benutzeraktualisieren', 'url'=>array('update', 'id'=>$model->user_ID)),
	array('label'=>'Benutzersuchen', 'url'=>array('admin')),
	);
	?>

	<h1>Benutzer ansehen <b>(<?php echo $model->username; ?>)</b></h1>

	<?php 

	$criteria = new CDbCriteria;
	$criteria->select='role_name';
	$criteria->condition='role_ID='.$model->role_ID;
	$model->role_ID = UserRoles::model()->findAll($criteria)[0]->role_name;

	$criteria = new CDbCriteria;
	$criteria->select='right_name';
	$criteria->condition='user_right_ID='.$model->user_right_ID;
	$model->user_right_ID = UserRights::model()->findAll($criteria)[0]->right_name;

	$criteria = new CDbCriteria;
	$criteria->select='user_type_name';
	$criteria->condition='user_type_ID='.$model->user_type_ID;
	$model->user_type_ID = UserType::model()->findAll($criteria)[0]->user_type_name;



	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'user_ID',
			'username',
			'role_ID',
			'user_right_ID',
			'user_type_ID',
			),
			)); ?>
