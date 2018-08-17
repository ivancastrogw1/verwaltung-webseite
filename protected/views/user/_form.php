<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('class' => 'well'),
		'type'=>'horizontal',
		)); ?>

		<p class="note">Felder mit <span class="required">*</span> sind pflicht.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<?php echo $form->textFieldGroup($model,'username',array('wrapperHtmlOptions' => array('class' => 'col-sm-4'))); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="row">
			<?php 
			$model->password = "";
			echo $form->passwordFieldGroup($model,'password',array('wrapperHtmlOptions' => array('class' => 'col-sm-4'))); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="row">
			<?php 
			$username = Yii::app()->user->name;
			$user = User::model()->find('username=?',array($username));
			$role_ID = $user->role_ID;
			if($role_ID == "2" || $role_ID == "5"){
				echo $form->dropDownListGroup($model,'role_ID',array(
					'wrapperHtmlOptions' => array('class' => 'col-sm-4'),
					'widgetOptions' => array(
						'data' => CHtml::listData(UserRoles::model()->findAll(),'role_ID','role_name'),
						'htmlOptions' => array('empty'=>'')
						)
					)
				);
			}
			else{
				echo $form->dropDownListGroup($model,'role_ID',array(
					'wrapperHtmlOptions' => array('class' => 'col-sm-4'),
					'widgetOptions' => array(
						'data' => CHtml::listData(UserRoles::model()->findAll(),'role_ID','role_name'),
						'htmlOptions' => array('empty'=>'','disabled'=>'disabled')
						)
					)
				);
			}

			?>
			<?php echo $form->error($model, 'role_ID'); ?>
		</div>

		<div class="row">
			<?php 
			$username = Yii::app()->user->name;
			$user = User::model()->find('username=?',array($username));
			$role_ID = $user->role_ID;
			if($role_ID == "2" || $role_ID == "5"){
				echo $form->dropDownListGroup($model,'user_right_ID',array(
					'wrapperHtmlOptions' => array('class' => 'col-sm-4'),
					'widgetOptions' => array(
						'data' => CHtml::listData(UserRights::model()->findAll(),'user_right_ID','right_name'),
						'htmlOptions' => array('empty'=>'')
						)
					)
				);
			}
			else{
				echo $form->dropDownListGroup($model,'user_right_ID',array(
					'wrapperHtmlOptions' => array('class' => 'col-sm-4'),
					'widgetOptions' => array(
						'data' => CHtml::listData(UserRights::model()->findAll(),'user_right_ID','right_name'),
						'htmlOptions' => array('empty'=>'','disabled'=>'disabled')
						)
					)
				);
			}
			?>
			<?php echo $form->error($model, 'user_right_ID'); ?>
		</div>

		<div class="row">
			<?php 
			$username = Yii::app()->user->name;
			$user = User::model()->find('username=?',array($username));
			$role_ID = $user->role_ID;
			if($role_ID == "2" || $role_ID == "5"){
				echo $form->dropDownListGroup($model,'user_type_ID',array(
					'wrapperHtmlOptions' => array('class' => 'col-sm-4'),
					'widgetOptions' => array(
						'data' => CHtml::listData(UserType::model()->findAll(),'user_type_ID','user_type_name'),
						'htmlOptions' => array('empty'=>'')
						)
					)
				);
			}
			else{
				echo $form->dropDownListGroup($model,'user_type_ID',array(
					'wrapperHtmlOptions' => array('class' => 'col-sm-4'),
					'widgetOptions' => array(
						'data' => CHtml::listData(UserType::model()->findAll(),'user_type_ID','user_type_name'),
						'htmlOptions' => array('empty'=>'','disabled'=>'disabled')
						)
					)
				);
			}
			?>
			<?php echo $form->error($model,'user_type_ID'); ?>
		</div>


		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Speichern' : 'Speichern'); ?>
		</div>
		<?php $this->endWidget(); ?>

	</div><!-- form -->