<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_ID), array('update', 'id'=>$data->user_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />
</div>