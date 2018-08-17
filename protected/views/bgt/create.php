<?php
/* @var $this BgtController */
/* @var $model Bgt */

$this->breadcrumbs=array(
	'Projektliste'=>array('index'),
	'Projekteingabemaske',
);

$this->menu=array(
	array('label'=>'Projektliste', 'url'=>array('index')),
	array('label'=>'Projektsuchmaske', 'url'=>array('admin')),
);
?>

<h1>BGT-Projekteingabemaske</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>