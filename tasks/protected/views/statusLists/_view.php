<?php
/* @var $this StatusListsController */
/* @var $data StatusLists */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('statusListID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->statusListID), array('view', 'id'=>$data->statusListID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listID')); ?>:</b>
	<?php echo CHtml::encode($data->listID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('statusID')); ?>:</b>
	<?php echo CHtml::encode($data->statusID); ?>
	<br />


</div>