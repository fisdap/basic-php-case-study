<?php
/* @var $this StatusListsController */
/* @var $model StatusLists */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'status-lists-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'listID'); ?>
		<?php echo $form->textField($model,'listID'); ?>
		<?php echo $form->error($model,'listID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'statusID'); ?>
		<?php echo $form->textField($model,'statusID'); ?>
		<?php echo $form->error($model,'statusID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->