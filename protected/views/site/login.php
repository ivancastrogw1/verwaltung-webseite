<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
	);
	?>

	<h1>Login</h1>

	<p>Bitte füllen Sie das folgende Formular mit Ihren Anmeldeinformationen aus:</p>
	<p class="note">Felder mit <span class="required">*</span> sind erforderlich.</p>
	<div class="form">
		<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'htmlOptions' => array('class' => 'well'),
			'type'=>'horizontal',
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				),
				)); ?>				
				<div class="row">					
					<?php echo $form->textFieldGroup($model,'username',array('wrapperHtmlOptions' => array('class' => 'col-md-4'))); ?>
					<?php echo $form->error($model,'username'); ?>

					<?php echo $form->passwordFieldGroup($model,'password',array('wrapperHtmlOptions' => array('class' => 'col-sm-4','hint'=>'Hinweis: Beispiel demo/demo oder admin/admin.',))); ?>
					<?php echo $form->error($model,'password'); ?>

					<div class="row rememberMe">
						<?php echo $form->checkBox($model,'rememberMe'); ?>
						<?php echo $form->label($model,'rememberMe'); ?>
						<?php echo $form->error($model,'rememberMe'); ?>
					</div>

					<div class="row buttons">
						<?php echo CHtml::submitButton('Login'); ?>
					</div>
				</div>

				<?php $this->endWidget(); ?>
			</div><!-- form -->
