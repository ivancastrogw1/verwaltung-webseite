<?php
/* @var $this BgtController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projektliste',
	);

$user = User::model()->find('username=?',array(Yii::app()->user->name));
$role_ID = $user->role_ID;
$type_ID = $user->user_type_ID;
$this->menu=array(
	array('label'=>'Projekteingabemaske', 'url'=>array('create')),
	array('label'=>'Projektsuchmaske', 'url'=>array('admin')),
	);

	?>

	<h1>Projektliste: Kurzübersicht</h1>
	<br/>
	<p>Für Gesamtübersicht eines Projektes klicken Sie auf den Button  <i class="glyphicon glyphicon-eye-open"></i></p>	
	<p>Für Aktualisierung eines Projektes klicken Sie auf den Button  <i class="glyphicon glyphicon-pencil"></i></p>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'bgt-index-form',
// Please note: When you enable ajax validation, make sure the corresponding
// controller action is handling ajax validation correctly.
// There is a call to performAjaxValidation() commented in generated controller code.
// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		)); ?>

	<?php		
	
	$dataProvider->setPagination(array(
								'pageSize'=>20,
								)
								);
	$provider = $dataProvider->getData();

	$out = array();
	foreach ($provider as $model) {
//search for projektleiter
		if($model->projekt_leiter != ""){
			$criteria = new CDbCriteria;
			$criteria->select='username';
			$criteria->condition='user_ID='.$model->projekt_leiter;
			$projekt_leiter = User::model()->findAll($criteria)[0]->username;
			$model->projekt_leiter = $projekt_leiter;
		}
		array_push($out, $model);
	}
	$dataProvider->setData($out);		
	$form->widget(
		'booster.widgets.Tb_ExtendedGridView',
		array(
			'id' => 'bgt-index',
			'type' => 'striped bordered',
			'dataProvider' => $dataProvider,
			'template' => "{summary}{limit}{items}{pager}",
			'summaryText'=>'Seite {page} von {pages}',
			'emptyText'=>'Keine Ergebnisse gefunden.',
			'headerOffset' => 40,
			'responsiveTable' =>true,
			'columns'=>array(
				array('name'=>'projekt_name', 'htmlOptions'=>array('style'=>'width: 50px')),
				'interne_nummer',
				'projekt_zuwendungsnummer',
				array('name'=>'projekt_titel', 'htmlOptions'=>array('style'=>'width: 500px')),
				array('name'=>'thematische', 'htmlOptions'=>array('style'=>'width: 50px')),
				'aktuellerstatus_id',
				'projekt_leiter',					
				array(
					'htmlOptions' => array('nowrap'=>'nowrap'),
					'class'=>'booster.widgets.TbButtonColumn',
					'template'=>'{view}{update}',
					),				
				),
			)
			); ?>
			<?php $this->endWidget(); ?>