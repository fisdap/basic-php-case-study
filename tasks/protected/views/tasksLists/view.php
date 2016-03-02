<?php
/* @var $this TasksListsController */
/* @var $model TasksLists */

$this->breadcrumbs=array(
	'Tasks Lists'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List TasksLists', 'url'=>array('index')),
	array('label'=>'Create TasksLists', 'url'=>array('create')),
	array('label'=>'Update TasksLists', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete TasksLists', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TasksLists', 'url'=>array('admin')),
);
?>

<h1>View TasksLists #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'listID',
		'taskID',
	),
)); ?>
