<?php
/* @var $this StatusListsController */
/* @var $model StatusLists */

$this->breadcrumbs=array(
	'Status Lists'=>array('index'),
	$model->statusListID,
);

$this->menu=array(
	array('label'=>'List StatusLists', 'url'=>array('index')),
	array('label'=>'Create StatusLists', 'url'=>array('create')),
	array('label'=>'Update StatusLists', 'url'=>array('update', 'id'=>$model->statusListID)),
	array('label'=>'Delete StatusLists', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->statusListID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusLists', 'url'=>array('admin')),
);
?>

<h1>View StatusLists #<?php echo $model->statusListID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'statusListID',
		'listID',
		'statusID',
	),
)); ?>
