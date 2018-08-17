<?php
/* @var $this IftController */
/* @var $model Ift */

$this->breadcrumbs=array(
	'IFT-Projektliste'=>array('index'),
	'Projekteingabemaske',
);

$this->menu=array(
	array('label'=>'Projektliste', 'url'=>array('index')),
	array('label'=>'Projektsuchmaske', 'url'=>array('admin')),
);
?>

<h1>IFT-Projekteingabemaske</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>