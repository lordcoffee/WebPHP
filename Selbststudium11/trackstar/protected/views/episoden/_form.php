<?php
/* @var $this EpisodenController */
/* @var $model Episoden */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'episoden-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NR_TOTAL'); ?>
		<?php echo $form->textField($model,'NR_TOTAL'); ?>
		<?php echo $form->error($model,'NR_TOTAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NR_STAFFEL'); ?>
		<?php echo $form->textField($model,'NR_STAFFEL'); ?>
		<?php echo $form->error($model,'NR_STAFFEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DEUTSCHER_TITEL'); ?>
		<?php echo $form->textField($model,'DEUTSCHER_TITEL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'DEUTSCHER_TITEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ORIGINAL­TITEL'); ?>
		<?php echo $form->textField($model,'ORIGINAL­TITEL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ORIGINAL­TITEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ERSTAUS­STRAHLUNG_USA'); ?>
		<?php echo $form->textField($model,'ERSTAUS­STRAHLUNG_USA',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ERSTAUS­STRAHLUNG_USA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­_D'); ?>
		<?php echo $form->textField($model,'DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­_D',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'DEUTSCH­SPRACHIGE_ERSTAUS­STRAHLUNG­_D'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REGIE'); ?>
		<?php echo $form->textField($model,'REGIE',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'REGIE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DREHBUCH'); ?>
		<?php echo $form->textField($model,'DREHBUCH',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'DREHBUCH'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'US_QUOTEN'); ?>
		<?php echo $form->textField($model,'US_QUOTEN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'US_QUOTEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'INHALT'); ?>
		<?php echo $form->textArea($model,'INHALT',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'INHALT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->