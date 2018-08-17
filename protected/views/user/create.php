<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Benutzerliste'=>array('index'),
	'Neuer Benutzer',
);

$this->menu=array(
	array('label'=>'Benutzerliste', 'url'=>array('index')),
	array('label'=>'Benutzersuche', 'url'=>array('admin')),
);
?>

<h1>Neuer Benutzer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>