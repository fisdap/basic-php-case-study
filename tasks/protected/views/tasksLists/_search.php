<?php
/* @var $this TasksListsController */
/* @var $model TasksLists */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'listID'); ?>
		<?php echo $form->textField($model,'listID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'taskID'); ?>
		<?php echo $form->textField($model,'taskID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->