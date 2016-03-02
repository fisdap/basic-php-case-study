<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php //echo $form->label($model,'taskID'); ?>
		<?php //echo $form->textField($model,'taskID'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'taskName'); ?>
		<?php echo $form->textField($model,'taskName',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'taskDesc'); ?>
		<?php echo $form->textArea($model,'taskDesc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_search'); ?>
		<?php //echo $form->textField($model,'status_search'); ?>
		<?php echo $form->dropDownList($model,'status_search', CHtml::listData(Status::model()->findAll('statusID'), 'statusDesc', 'statusDesc'), array('empty'=>'--Select Status--')) ?> 
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->