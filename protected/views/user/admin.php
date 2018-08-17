<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Benutzerliste'=>array('index'),
	'Benutzersuche',
	);

$this->menu=array(
	array('label'=>'Benutzerliste', 'url'=>array('index')),
	array('label'=>'Benutzererstellen', 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$('#user-grid').yiiGridView('update', {
			data: $(this).serialize()
		});
		return false;
	});
	");
	?>

	<h1>Benutzersuche</h1>

	<?php $this->widget('booster.widgets.TbExtendedGridView', array(
		'id'=>'user-grid',
		'dataProvider'=>$model->search(),
		'template'=>"{items}",
		'type' => 'striped bordered',
		'filter'=>$model,
		'columns'=>array(
			'username',
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
				'template'=>'{view}{update}',						
				),	
			),
		'summaryText'=>'Es werden {start}-{end} von {count} Ergebnissen angezeigt',
		'emptyText'=>'Keine Ergebnisse gefunden.',
		)); ?>
