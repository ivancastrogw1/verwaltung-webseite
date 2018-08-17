<?php
/* @var $this IftController */
/* @var $model Ift */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ift-ift-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Akronym'); ?>
		<?php echo $form->textField($model,'Akronym'); ?>
		<?php echo $form->error($model,'Akronym'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projekttitel'); ?>
		<?php echo $form->textField($model,'projekttitel'); ?>
		<?php echo $form->error($model,'projekttitel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projektziel'); ?>
		<?php echo $form->textField($model,'projektziel'); ?>
		<?php echo $form->error($model,'projektziel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thematische'); ?>
		<?php echo $form->textField($model,'thematische'); ?>
		<?php echo $form->error($model,'thematische'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skizze'); ?>
		<?php echo $form->textField($model,'skizze'); ?>
		<?php echo $form->error($model,'skizze'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'antrag'); ?>
		<?php echo $form->textField($model,'antrag'); ?>
		<?php echo $form->error($model,'antrag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aktueller_status'); ?>
		<?php echo $form->textField($model,'aktueller_status'); ?>
		<?php echo $form->error($model,'aktueller_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bemerkungen'); ?>
		<?php echo $form->textField($model,'bemerkungen'); ?>
		<?php echo $form->error($model,'bemerkungen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gesamt_volumen'); ?>
		<?php echo $form->textField($model,'gesamt_volumen'); ?>
		<?php echo $form->error($model,'gesamt_volumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gwi_anteil'); ?>
		<?php echo $form->textField($model,'gwi_anteil'); ?>
		<?php echo $form->error($model,'gwi_anteil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'forderung'); ?>
		<?php echo $form->textField($model,'forderung'); ?>
		<?php echo $form->error($model,'forderung'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projekt_partner'); ?>
		<?php echo $form->textField($model,'projekt_partner'); ?>
		<?php echo $form->error($model,'projekt_partner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'geplante_laufzeit_begin'); ?>
		<?php echo $form->textField($model,'geplante_laufzeit_begin'); ?>
		<?php echo $form->error($model,'geplante_laufzeit_begin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'geplante_laufzeit_ende'); ?>
		<?php echo $form->textField($model,'geplante_laufzeit_ende'); ?>
		<?php echo $form->error($model,'geplante_laufzeit_ende'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pl'); ?>
		<?php echo $form->textField($model,'pl'); ?>
		<?php echo $form->error($model,'pl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gepruft'); ?>
		<?php echo $form->textField($model,'gepruft'); ?>
		<?php echo $form->error($model,'gepruft'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weitere_info'); ?>
		<?php echo $form->textField($model,'weitere_info'); ?>
		<?php echo $form->error($model,'weitere_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abschlussbericht'); ?>
		<?php echo $form->textField($model,'abschlussbericht'); ?>
		<?php echo $form->error($model,'abschlussbericht'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projekte_status'); ?>
		<?php echo $form->textField($model,'projekte_status'); ?>
		<?php echo $form->error($model,'projekte_status'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->