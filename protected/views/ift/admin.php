<?php
/* @var $this IftController */
/* @var $model Ift */

$this->breadcrumbs=array(
	'Projektliste'=>array('index'),
	'Projektsuchmaske',
	);

$this->menu=array(
	array('label'=>'Projektliste', 'url'=>array('index')),
	array('label'=>'Projekteingabemaske', 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$('#ift-grid').yiiGridView('update', {
			data: $(this).serialize()
		});
		return false;
	});
	");
	?>

	<div class="search-form">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
			)); ?>
		</div><!-- search-form -->
		<div class="CGridViewContainer">
			<?php 
			$model_old = $model;
			$dataProvider = $model->search();
			$dataProvider->setPagination(array('pageSize' => 10));
			$provider = $dataProvider->getData();
			$out = array();
			foreach ($provider as $model) {
				$model = IFT::formatter($model);
				array_push($out, $model);
			}
			$dataProvider->setData($out);
			$this->widget(
				'booster.widgets.TbExtendedGridView',
				array(
					'id'=>'ift-grid',
					'type' => 'striped bordered',
					'responsiveTable' => true,
					'sortableRows' => true,
					'dataProvider' => $dataProvider,
					'template' => "{items}{pager}",
					'selectableRows'=>2,
					'summaryText'=>'Seite {page} von {pages}',
					'emptyText'=>'Keine Ergebnisse gefunden.',	
					'columns'=>array(
						array(
							'htmlOptions' => array('nowrap'=>'nowrap'),
							'class'=>'booster.widgets.TbButtonColumn',
							'template'=>'{view}{update}',						
							),
						array('name'=>'projekt_name', 'htmlOptions'=>array('style'=>'min-width: 50px')),
						'interne_nummer',
						'projekt_zuwendungsnummer',
						array('name'=>'projekt_titel', 'htmlOptions'=>array('style'=>'min-width: 500px')),
						array('name'=>'thematische', 'htmlOptions'=>array('style'=>'min-width: 50px')),
						'aktuellerstatus_id',
						'projekt_leiter',	
						),
					'bulkActions' => array(
						'actionButtons' => array(
							array(
								'buttonType' => 'button',
								'context' => 'primary',
								'size' => 'small',
								'label' => 'PDF Exportieren',								
								'click' => 'js:function(projekt_id)
								{
									$.ajax({
										type: "POST",
										url: "PDF",
										header:"Content-type: application/pdf",
										data: {selectedIDs : projekt_id},
										success: function(data) {
										    var a = document.createElement("a");
											var pdfAsDataUri = "data:application/pdf;base64,"+data;
											a.download = "projekte.pdf";
											a.type = "application/pdf";
											a.href = pdfAsDataUri;
											a.click();
										  }
									});
								}',
								'id' => 'bgt-bulk',

								),
							),								
						'align' => 'left',
						'checkBoxColumnConfig' => array(
							'name' => 'projekt_id'
							), 						
						), 	
					)
					);?>
				</div>
