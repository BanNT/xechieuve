<?php
/* @var $this TintucController */
/* @var $model Tintuc */

$this->breadcrumbs=array(
	'Tintucs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tintuc', 'url'=>array('index')),
	array('label'=>'Manage Tintuc', 'url'=>array('admin')),
);
?>

<h1>Create Tintuc</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>