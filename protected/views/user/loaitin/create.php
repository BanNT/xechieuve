<?php
/* @var $this LoaitinController */
/* @var $model Loaitin */

$this->breadcrumbs=array(
	'Loaitins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Loaitin', 'url'=>array('index')),
	array('label'=>'Manage Loaitin', 'url'=>array('admin')),
);
?>

<h1>Create Loaitin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>