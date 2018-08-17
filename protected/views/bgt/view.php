<?php
/* @var $this BgtController */
/* @var $model Bgt */

$this->breadcrumbs=array(
	'Projektliste'=>array('index'),
	$model->projekt_id,
	);
$user = User::model()->find('username=?',array(Yii::app()->user->name));
$role_ID = $user->role_ID;
if($role_ID != '4'){
	$this->menu=array(
		array('label'=>'Projektliste', 'url'=>array('index')),
		array('label'=>'Projekteingabemaske', 'url'=>array('create')),
		array('label'=>'Projektesuchmaske', 'url'=>array('admin')),
		array('label'=>'Projektaktualisierung', 'url'=>array('update', 'id'=>$model->projekt_id)),
		);
}else{
	$this->menu=array(
		array('label'=>'Projektliste', 'url'=>array('index')),
		array('label'=>'Projektesuchmaske', 'url'=>array('admin')),
		);
}
?>

<h1><?php echo $model->projekt_name; ?></h1>

<?php 
$model_old = $model;
$model = BGT::formatter($model);

$this->widget('booster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'projekt_name',
		'interne_nummer',
		'projekt_titel',
		'thematische',
		'projekt_skizze',
		'projekt_antrag',
		'aktuellerstatus_id',
		'bemerkungen',
		'projekt_zuwendungsnummer',
		'projektdauer',
		'projektstart',
		'projektende',
		'fordermittelgeber_id',
		'forderungsquote_gwi',
		'projektgesamtvolumen',
		'gwi_anteil',
		'gwi_ko_finanzierung',
		'projektpartner_industrie',
		'projektpartner_forschung',
		'pbg',
		'pba',
		'projekttyp',
		'projekt_leiter',
		'vertreter',
		'kontakt_technisch',
		'kontakt_kaufmanisch',
		'projektkostenabrechnung',
		'projekt_info',
		'link_zur_abschlussbericht',
		'link_zur_projekt_internetseite',
		'letzte_aktualisierung',
		),
	)); 
$model = $model_old;
?>
