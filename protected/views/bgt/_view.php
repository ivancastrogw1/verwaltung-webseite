<?php
/* @var $this BgtController */
/* @var $data Bgt */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('projekt_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->projekt_id), array('view', 'id'=>$data->projekt_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projekt_titel')); ?>:</b>
	<?php echo CHtml::encode($data->projekt_titel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projekt_name')); ?>:</b>
	<?php echo CHtml::encode($data->projekt_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projekt_zuwendungsnummer')); ?>:</b>
	<?php echo CHtml::encode($data->projekt_zuwendungsnummer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projekt_leiter')); ?>:</b>
	<?php echo CHtml::encode($data->projekt_leiter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thematische')); ?>:</b>
	<?php echo CHtml::encode($data->thematische); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('projekt_skizze')); ?>:</b>
	<?php echo CHtml::encode($data->projekt_skizze); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projekt_antrag')); ?>:</b>
	<?php echo CHtml::encode($data->projekt_antrag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aktuellerstatus_id')); ?>:</b>
	<?php echo CHtml::encode($data->aktuellerstatus_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bemerkungen')); ?>:</b>
	<?php echo CHtml::encode($data->bemerkungen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fordermittelgeber_id')); ?>:</b>
	<?php echo CHtml::encode($data->fordermittelgeber_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forderungsquote_gwi')); ?>:</b>
	<?php echo CHtml::encode($data->forderungsquote_gwi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projektgesamtvolumen')); ?>:</b>
	<?php echo CHtml::encode($data->projektgesamtvolumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gwi_anteil')); ?>:</b>
	<?php echo CHtml::encode($data->gwi_anteil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gwi_ko_finanzierung')); ?>:</b>
	<?php echo CHtml::encode($data->gwi_ko_finanzierung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projektpartner_industrie')); ?>:</b>
	<?php echo CHtml::encode($data->projektpartner_industrie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pbg')); ?>:</b>
	<?php echo CHtml::encode($data->pbg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pba')); ?>:</b>
	<?php echo CHtml::encode($data->pba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projekttyp')); ?>:</b>
	<?php echo CHtml::encode($data->projekttyp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projektdauer')); ?>:</b>
	<?php echo CHtml::encode($data->projektdauer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projektstart')); ?>:</b>
	<?php echo CHtml::encode($data->projektstart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projektende')); ?>:</b>
	<?php echo CHtml::encode($data->projektende); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projekt_info')); ?>:</b>
	<?php echo CHtml::encode($data->projekt_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_zur_abschlussbericht')); ?>:</b>
	<?php echo CHtml::encode($data->link_zur_abschlussbericht); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_zur_projekt_internetseite')); ?>:</b>
	<?php echo CHtml::encode($data->link_zur_projekt_internetseite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('andere_thematische')); ?>:</b>
	<?php echo CHtml::encode($data->andere_thematische); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('andere_projektpartner')); ?>:</b>
	<?php echo CHtml::encode($data->andere_projektpartner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projektpartner_forschung')); ?>:</b>
	<?php echo CHtml::encode($data->projektpartner_forschung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('letzte_aktualisierung')); ?>:</b>
	<?php echo CHtml::encode($data->letzte_aktualisierung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontakt_technisch')); ?>:</b>
	<?php echo CHtml::encode($data->kontakt_technisch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontakt_kaufmanisch')); ?>:</b>
	<?php echo CHtml::encode($data->kontakt_kaufmanisch); ?>
	<br />

	*/ ?>

</div>