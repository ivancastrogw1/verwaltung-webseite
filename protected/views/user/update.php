<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Benutzerliste'=>array('index'),
	'Benutzeraktualizierung',
	);
$user = User::model()->find('username=?',array(Yii::app()->user->name));
$role_ID = $user->role_ID;
if($role_ID != '4'){
	$this->menu=array(
		array('label'=>'Benutzerliste', 'url'=>array('index')),
		array('label'=>'Benutzererstellen', 'url'=>array('create')),
	//array('label'=>'Benutzer ansehen', 'url'=>array('view', 'id'=>$model->user_ID)),
		array('label'=>'Benutzersuchen', 'url'=>array('admin')),
		);
}
?>

<h1>Benutzer: <?php echo $model->username; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>