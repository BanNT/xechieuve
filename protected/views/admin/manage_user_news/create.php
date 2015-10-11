<?php
/* @var $this Manage_user_newsController */
/* @var $model Tinkhachhang */

$this->breadcrumbs=array(
	'Tinkhachhangs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tinkhachhang', 'url'=>array('index')),
	array('label'=>'Manage Tinkhachhang', 'url'=>array('admin')),
);
?>

<h1>Create Tinkhachhang</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>