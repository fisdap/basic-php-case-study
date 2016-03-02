<?php
/* @var $this TasksListsController */
/* @var $data TasksLists */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listID')); ?>:</b>
	<?php echo CHtml::encode($data->listID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taskID')); ?>:</b>
	<?php echo CHtml::encode($data->taskID); ?>
	<br />


</div>