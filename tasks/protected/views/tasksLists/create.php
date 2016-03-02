<?php
/* @var $this TasksListsController */
/* @var $model TasksLists */

$this->breadcrumbs=array(
	'Tasks Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TasksLists', 'url'=>array('index')),
	array('label'=>'Manage TasksLists', 'url'=>array('admin')),
);
?>

<h1>Create TasksLists</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>