<?php
/* @var $this EpisodenController */
/* @var $data Episoden */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NR_TOTAL')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NR_TOTAL), array('view', 'id'=>$data->NR_TOTAL)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NR_STAFFEL')); ?>:</b>
	<?php echo CHtml::encode($data->NR_STAFFEL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEUTSCHER_TITEL')); ?>:</b>
	<?php echo CHtml::encode($data->DEUTSCHER_TITEL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ORIGINAL­TITEL')); ?>:</b>
	<?php echo CHtml::encode($data->ORIGINAL­TITEL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ERSTAUS­STRAHLUNG_USA')); ?>:</b>
	<?php echo CHtml::encode($data->ERSTAUS­STRAHLUNG_USA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­_D')); ?>:</b>
	<?php echo CHtml::encode($data->DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­_D); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REGIE')); ?>:</b>
	<?php echo CHtml::encode($data->REGIE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('DREHBUCH')); ?>:</b>
	<?php echo CHtml::encode($data->DREHBUCH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('US_QUOTEN')); ?>:</b>
	<?php echo CHtml::encode($data->US_QUOTEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INHALT')); ?>:</b>
	<?php echo CHtml::encode($data->INHALT); ?>
	<br />

	*/ ?>

</div>