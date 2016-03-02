<?php
/* @var $this StatusListsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Status Lists',
);

$this->menu=array(
	array('label'=>'Create StatusLists', 'url'=>array('create')),
	array('label'=>'Manage StatusLists', 'url'=>array('admin')),
);
?>

<h1>Status Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
