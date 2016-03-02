<?php
/* @var $this StatusListsController */
/* @var $model StatusLists */

$this->breadcrumbs=array(
	'Status Lists'=>array('index'),
	$model->statusListID=>array('view','id'=>$model->statusListID),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusLists', 'url'=>array('index')),
	array('label'=>'Create StatusLists', 'url'=>array('create')),
	array('label'=>'View StatusLists', 'url'=>array('view', 'id'=>$model->statusListID)),
	array('label'=>'Manage StatusLists', 'url'=>array('admin')),
);
?>

<h1>Update StatusLists <?php echo $model->statusListID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>