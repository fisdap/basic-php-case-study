<?php
/* @var $this ListsController */
/* @var $data Lists */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('listID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->listID), array('view', 'id'=>$data->listID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listName')); ?>:</b>
	<?php echo CHtml::encode($data->listName); ?>
	<br />


</div>