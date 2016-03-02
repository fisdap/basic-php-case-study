<?php
/* @var $this TasksListsController */
/* @var $model TasksLists */

$this->breadcrumbs=array(
	'Tasks Lists'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TasksLists', 'url'=>array('index')),
	array('label'=>'Create TasksLists', 'url'=>array('create')),
	array('label'=>'View TasksLists', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage TasksLists', 'url'=>array('admin')),
);
?>

<h1>Update TasksLists <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>