<?php
/* @var $this ListsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lists',
);

$this->menu=array(
	array('label'=>'Create Lists', 'url'=>array('create')),
	array('label'=>'Manage Lists', 'url'=>array('admin')),
);
?>

<h1>Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
