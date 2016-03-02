<?php
/* @var $this TasksListsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tasks Lists',
);

$this->menu=array(
	array('label'=>'Create TasksLists', 'url'=>array('create')),
	array('label'=>'Manage TasksLists', 'url'=>array('admin')),
);
?>

<h1>Tasks Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
