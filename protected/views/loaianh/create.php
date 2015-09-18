<?php
/* @var $this LoaianhController */
/* @var $model Loaianh */

$this->breadcrumbs=array(
	'Loaianhs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Loaianh', 'url'=>array('index')),
	array('label'=>'Manage Loaianh', 'url'=>array('admin')),
);
?>

<h1>Create Loaianh</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>