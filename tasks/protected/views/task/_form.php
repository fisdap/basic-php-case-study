<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model,$model2)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'taskName'); ?>
		<?php echo $form->textField($model,'taskName',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'taskName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'taskDesc'); ?>
		<?php echo $form->textArea($model,'taskDesc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'taskDesc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'taskStatusID'); ?>
		<?php echo $form->dropDownList($model,'taskStatusID', CHtml::listData(Status::model()->findAll('statusID'), 'statusID', 'statusDesc'), array('empty'=>'--Select Status--')) ?> 
		<?php echo $form->error($model,'taskStatusID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model2,'listID'); ?>
		<?php echo $form->dropDownList($model2,'listID', CHtml::listData(Lists::model()->findAll('listID'), 'listID', 'listName'), array('empty'=>'--Select List--','multiple'=>'multiple')) ?> 		
		<?php echo $form->error($model2,'listID'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->