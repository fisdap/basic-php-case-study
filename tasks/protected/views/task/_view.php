<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('taskID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->taskID), array('view', 'id'=>$data->taskID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taskName')); ?>:</b>
	<?php echo CHtml::encode($data->taskName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taskDesc')); ?>:</b>
	<?php echo CHtml::encode($data->taskDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('taskStatusID')); ?>:</b>
	<?php echo CHtml::encode($data->taskStatus->statusDesc); ?>
	<br />


</div>