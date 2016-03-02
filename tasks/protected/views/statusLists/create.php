<?php
/* @var $this StatusListsController */
/* @var $model StatusLists */

$this->breadcrumbs=array(
	'Status Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusLists', 'url'=>array('index')),
	array('label'=>'Manage StatusLists', 'url'=>array('admin')),
);
?>

<h1>Create StatusLists</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>