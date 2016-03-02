<?php
/* @var $this StatusListsController */
/* @var $model StatusLists */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'statusListID'); ?>
		<?php echo $form->textField($model,'statusListID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'listID'); ?>
		<?php echo $form->textField($model,'listID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'statusID'); ?>
		<?php echo $form->textField($model,'statusID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->