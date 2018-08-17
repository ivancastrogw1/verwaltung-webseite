<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Benutzerliste',
);
$user = User::model()->find('username=?',array(Yii::app()->user->name));
$role_ID = $user->role_ID;
if($role_ID != '4'){
$this->menu=array(
	array('label'=>'Benutzererstellen', 'url'=>array('create')),
	array('label'=>'Benutzersuche', 'url'=>array('admin')),
);
}
?>

<h1>Benutzerliste</h1>

<?php $this->widget('booster.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'summaryText'=>'Seite {page} von {pages}',
	'emptyText'=>'Keine Ergebnisse gefunden.',
	'itemView'=>'_view',
)); ?>

