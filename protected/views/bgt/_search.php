<?php
/* @var $this BgtController */
/* @var $model Bgt */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
		'type'=>'horizontal',
		)); ?>
		<fieldset>
			<div class="row">
				<?php echo $form->textFieldGroup($model,'projekt_titel',array('label' => 'Projekttitel/Stichwort', 'wrapperHtmlOptions' => array('class' => 'col-sm-5',),)); ?>
			</div>
			<div class="row">
				<?php echo $form->textFieldGroup($model,'interne_nummer',array('wrapperHtmlOptions' => array('class' => 'col-sm-5','size'=>60),)); ?>
			</div>
			<div class="row">
				<?php echo $form->textFieldGroup($model,'projekt_zuwendungsnummer',array('wrapperHtmlOptions' => array('class' => 'col-sm-5'),)); ?>
			</div>
			<div class="row">
				<?php 
				if(isset(Yii::app()->params['fordermittelgeber_tags'])) {
					$data = Yii::app()->params['fordermittelgeber_tags'];
				}
				echo $form->select2Group($model,'fordermittelgeber_id',array(
					'wrapperHtmlOptions' => array('class' => 'col-sm-5',),
					'widgetOptions' => array(
						'asDropDownList' => false,
						'options' => array(									
							'tags' => $data,
							'tokenSeparators' => array(','),
							),
						),
					)
				);
				?>
				<?php echo $form->error($model,'fordermittelgeber_id'); ?>
			</div>

			<div class="row">		
				<?php 
				$criteria = new CDbCriteria;
				$criteria->select='user_ID,username';
				$criteria->condition="user_type_ID='1' && role_ID='3'";
				echo $form->dropDownListGroup($model,'projekt_leiter',array('wrapperHtmlOptions' => array('class' => 'col-sm-5',),'widgetOptions' => array('data' => CHtml::listData(User::model()->findAll($criteria),'user_ID','username'),'htmlOptions' => array('empty'=>''),))); ?>
				<?php echo $form->error($model,'projekt_leiter'); ?>
			</div>
			<div class="row">
				<?php 
				if(isset(Yii::app()->params['thematische_tags'])) {
					$data = Yii::app()->params['thematische_tags'];
				}
				echo $form->select2Group($model,'thematische',array(
					'wrapperHtmlOptions' => array('class' => 'col-sm-5',),
					'widgetOptions' => array(
						'asDropDownList' => false,
						'options' => array(									
							'tags' => $data,
							'tokenSeparators' => array(','),
							),
						),
					)
				);
				?>
				</div>
				<div class="row">
					<?php echo $form->dropDownListGroup($model,'projekttyp',array('wrapperHtmlOptions' => array('class' => 'col-sm-5',),'widgetOptions' => array('data' => CHtml::listData(ProjektTyp::model()->findAll(),'pk_projekt_typ','projekt_typ_name'),'htmlOptions' => array('empty'=>''),))); ?>
					<?php echo $form->error($model,'projekttyp'); ?>
				</div>	

				<div class="row">
					<?php 
					if(isset(Yii::app()->params['aktuellerstatus_tags'])) {
						$data = Yii::app()->params['aktuellerstatus_tags'];
					}
					echo $form->select2Group($model,'aktuellerstatus_id',array(
						'wrapperHtmlOptions' => array('class' => 'col-sm-5',),
						'widgetOptions' => array(
							'asDropDownList' => false,
							'options' => array(									
								'tags' => $data,
								'tokenSeparators' => array(','),
								),
							),
						)
						);?>
						<?php echo $form->error($model,'aktuellerstatus_id'); ?>
					</div>

					<div class="row">
						<?php echo CHtml::submitButton('Suchen'); ?>		
					</div>

				</fieldset>

				<?php $this->endWidget(); ?>

</div><!-- search-form -->