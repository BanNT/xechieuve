<?php
/* @var $this KhachhangController */
/* @var $model Khachhang */

$this->breadcrumbs=array(
	'Khachhangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Khachhang', 'url'=>array('index')),
	array('label'=>'Manage Khachhang', 'url'=>array('admin')),
);
?>

<h1>Create Khachhang</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>