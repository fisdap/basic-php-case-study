<?php
/* @var $this ListsController */
/* @var $model Lists */

$this->breadcrumbs=array(
	'Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lists', 'url'=>array('index')),
	array('label'=>'Manage Lists', 'url'=>array('admin')),
);
?>

<h1>Create Lists</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>