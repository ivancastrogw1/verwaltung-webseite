<?php
/* @var $this BgtController */
/* @var $model Bgt */

$this->breadcrumbs=array(
	'Projektliste'=>array('index'),
	$model->projekt_id=>array('view','id'=>$model->projekt_id),
	'Projekte Aktualizierung',
);

$this->menu=array(
	array('label'=>'Projektliste', 'url'=>array('index')),
	array('label'=>'Projekteingabemaske', 'url'=>array('create')),
	array('label'=>'Projektesuchmaske', 'url'=>array('admin')),
	array('label'=>'Projekt Ansehen', 'url'=>array('view', 'id'=>$model->projekt_id)),
);
?>

<h1>Projekt Aktualisieren: <?php echo $model->projekt_name; ?></h1>

<?php 

//convert to german date format
if($model->projektstart != ""){
	$model->projektstart = User::date_convert_german($model->projektstart);
}

if($model->projektende != ""){
	$model->projektende = User::date_convert_german($model->projektende);
}

if($model->projekt_skizze != ""){
	$model->projekt_skizze = User::date_convert_german($model->projekt_skizze);
}

if($model->projekt_antrag != ""){
	$model->projekt_antrag = User::date_convert_german($model->projekt_antrag);
}
$this->renderPartial('_form', array('model'=>$model)); ?>