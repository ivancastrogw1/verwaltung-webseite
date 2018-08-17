<?php
/* @var $this BgtController */
/* @var $model Bgt */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'id'=>'bgt-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('class' => 'well'),
		'type'=>'horizontal',
		)); ?>

		<p class="note">Felder mit <span class="required">*</span> sind pflicht.</p>

		<?php echo $form->errorSummary($model); ?>


		<div class="row">
			<?php echo $form->textFieldGroup($model,'projekt_name',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
			<?php echo $form->error($model,'projekt_name'); ?>
		</div>
		<div class="row">
			<?php echo $form->textFieldGroup($model,'interne_nummer',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
			<?php echo $form->error($model,'interne_nummer'); ?>
		</div>

		<div class="row">
			<?php echo $form->textFieldGroup($model,'projekt_zuwendungsnummer',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
			<?php echo $form->error($model,'projekt_zuwendungsnummer'); ?>
		</div>

		<div class="row">
			<?php echo $form->textAreaGroup($model,'projekt_titel',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
			<?php echo $form->error($model,'projekt_titel'); ?>
		</div>

		<div class="row">
			<?php 
			if(isset(Yii::app()->params['thematische_tags'])) {
				$data = Yii::app()->params['thematische_tags'];
			}
			echo $form->select2Group($model,'thematische',array(
				'wrapperHtmlOptions' => array('class' => 'col-sm-6',),
				'widgetOptions' => array(
					'asDropDownList' => false,
					'options' => array(
						'name' => 'thematische_list',
						'tags' => $data,
						'htmlOptions' => array(
							'multiple' => 'multiple',
						),

					),
				),
			)
		);
		?>
		<?php echo $form->error($model,'thematische'); ?>
	</div>

	<fieldset>
		<legend>Einreichungsdatum</legend>

		<div class="row">
			<?php echo $form->datePickerGroup($model,'projekt_skizze',array('widgetOptions' => array('options' => array('language' => 'de',),),'wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
			<?php echo $form->error($model,'projekt_skizze'); ?>
		</div>

		<div class="row">
			<?php echo $form->datePickerGroup($model,'projekt_antrag',array('widgetOptions' => array('options' => array('language' => 'de',),),'wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
			<?php echo $form->error($model,'projekt_antrag'); ?>
		</div>

	</fieldset>

	<div class="row">
		<?php 
		if(isset(Yii::app()->params['aktuellerstatus_tags'])) {
			$data = Yii::app()->params['aktuellerstatus_tags'];
		}
		echo $form->select2Group($model,'aktuellerstatus_id',array(
			'wrapperHtmlOptions' => array('class' => 'col-sm-6',),
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
		<?php echo $form->textAreaGroup($model,'bemerkungen',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
		<?php echo $form->error($model,'bemerkungen'); ?>
	</div>



	<div class="row">
		<?php echo $form->textFieldGroup($model,'projektdauer',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
		<?php echo $form->error($model,'projektdauer'); ?>
	</div>

	<div class="row">
		<?php echo $form->datePickerGroup($model,'projektstart',array('widgetOptions' => array('options' => array('language' => 'de',),),'wrapperHtmlOptions' => array('class' => 'col-sm-6',),)); ?>
		<?php echo $form->error($model,'projektstart'); ?>
	</div>

	<div class="row">
		<?php echo $form->datePickerGroup($model,'projektende',array('widgetOptions' => array('options' => array('language' => 'de',),),'wrapperHtmlOptions' => array('class' => 'col-sm-6',),)); ?>
		<?php echo $form->error($model,'projektende'); ?>
	</div>


	<div class="row">
		<?php 
		if(isset(Yii::app()->params['fordermittelgeber_tags'])) {
			$data = Yii::app()->params['fordermittelgeber_tags'];
		}
		echo $form->select2Group($model,'fordermittelgeber_id',array(
			'wrapperHtmlOptions' => array('class' => 'col-sm-6',),
			'widgetOptions' => array(
				'asDropDownList' => false,
				'options' => array(									
					'tags' => $data,
					'tokenSeparators' => array(','),
				),
			),
		)
		);?>
		<?php echo $form->error($model,'fordermittelgeber_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->textAreaGroup($model,'forderungsquote_gwi',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
		<?php echo $form->error($model,'forderungsquote_gwi'); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldGroup($model,'projektgesamtvolumen',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
		<?php echo $form->error($model,'projektgesamtvolumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldGroup($model,'gwi_anteil',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
		<?php echo $form->error($model,'gwi_anteil'); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldGroup($model,'gwi_ko_finanzierung',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
		<?php echo $form->error($model,'gwi_ko_finanzierung'); ?>
	</div>
	<fieldset>
		<legend>Projektpartner</legend>
		<div class="row">
			<?php 
			if(isset(Yii::app()->params['projektpartner_industrie_tags'])) {
				$data = Yii::app()->params['projektpartner_industrie_tags'];
			}
			echo $form->select2Group($model,'projektpartner_industrie',array(
				'wrapperHtmlOptions' => array('class' => 'col-sm-6',),
				'widgetOptions' => array(
					'asDropDownList' => false,
					'options' => array(
						'tags' => $data,
						'tokenSeparators' => array(',')
					),
				)
			)
			);?>
			<?php echo $form->error($model,'projektpartner_industrie'); ?>
		</div>
		<div class="row">
			<?php 
			if(isset(Yii::app()->params['projektpartner_forschung_tags'])) {
				$data = Yii::app()->params['projektpartner_forschung_tags'];
			}
			echo $form->select2Group($model,'projektpartner_forschung',array(
				'wrapperHtmlOptions' => array('class' => 'col-sm-6',),
				'widgetOptions' => array(
					'asDropDownList' => false,
					'options' => array(
						'tags' => $data,
						'tokenSeparators' => array(',')
					),
				)
			)
			);?>
			<?php echo $form->error($model,'projektpartner_forschung'); ?>
		</div>
	</fieldset>

	<fieldset>
		<legend>Projektbegleitgruppe bzw. PbA:</legend>
		<div class="row">
			<?php echo $form->textAreaGroup($model,'pbg',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
			<?php echo $form->error($model,'pbg'); ?>
		</div>

		<div class="row">
			<?php echo $form->textAreaGroup($model,'pba',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
			<?php echo $form->error($model,'pba'); ?>
		</div>
	</fieldset>


	<div class="row">
		<?php echo $form->dropDownListGroup($model,'projekttyp',array('wrapperHtmlOptions' => array('class' => 'col-sm-6',),'widgetOptions' => array('data' => CHtml::listData(ProjektTyp::model()->findAll(),'pk_projekt_typ','projekt_typ_name'),'htmlOptions' => array('empty'=>''),))); ?>
		<?php echo $form->error($model,'projekttyp'); ?>
	</div>	
	<div class="row">
		<?php 
		$criteria = new CDbCriteria;
		$criteria->select='user_ID,username';
		$criteria->condition="user_type_ID='1' && role_ID='3'";
		echo $form->dropDownListGroup($model,'projekt_leiter',array('wrapperHtmlOptions' => array('class' => 'col-sm-6',),'widgetOptions' => array('data' => CHtml::listData(User::model()->findAll($criteria),'user_ID','username'),'htmlOptions' => array('empty'=>''),))); ?>
		<?php echo $form->error($model,'projekt_leiter'); ?>
	</div>	

	<div class="row">
		<?php 
		$criteria = new CDbCriteria;
		$criteria->select='user_ID,username';
		$criteria->condition="user_type_ID='1' AND role_ID != '5' AND role_ID != '6' ";
		echo $form->dropDownListGroup($model,'vertreter',array('wrapperHtmlOptions' => array('class' => 'col-sm-6',),'widgetOptions' => array('data' => CHtml::listData(User::model()->findAll($criteria),'user_ID','username'),'htmlOptions' => array('empty'=>''),))); ?>
		<?php echo $form->error($model,'vertreter'); ?>
	</div>

	<fieldset>
		<legend>Kontaktperson bei Fördermittel-/Auftraggeber</legend>

		<div class="row">
			<?php echo $form->textAreaGroup($model,'kontakt_technisch',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
			<?php echo $form->error($model,'kontakt_technisch'); ?>
		</div>

		<div class="row">
			<?php echo $form->textAreaGroup($model,'kontakt_kaufmanisch',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
			<?php echo $form->error($model,'kontakt_kaufmanisch'); ?>
		</div>

	</fieldset>

	<div class="row">
		<?php echo $form->textFieldGroup($model,'projektkostenabrechnung',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'),)); ?>
		<?php echo $form->error($model,'projektkostenabrechnung'); ?>
	</div>

	<div class="row">
		<?php echo $form->textAreaGroup($model,'projekt_info',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
		<?php echo $form->error($model,'projekt_info'); ?>
	</div>


	<div class="row">
		<?php echo $form->textAreaGroup($model,'link_zur_abschlussbericht',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
		<?php echo $form->error($model,'link_zur_abschlussbericht'); ?>
	</div>

	<div class="row">
		<?php echo $form->textAreaGroup($model,'link_zur_projekt_internetseite',array('wrapperHtmlOptions' => array('class' => 'col-sm-6'))); ?>
		<?php echo $form->error($model,'link_zur_projekt_internetseite'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Speichern' : 'Speichern'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->