<?php
/* @var $this TaskController */
/* @var $model Task */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->taskID=>array('view','id'=>$model->taskID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'View Task', 'url'=>array('view', 'id'=>$model->taskID)),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<h1>Update Task <?php echo $model->taskID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2,)); ?>