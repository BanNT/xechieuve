<?php
/* @var $this TinghepxeController */
/* @var $model Tinghepxe */

$this->breadcrumbs=array(
	'Tinghepxes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tinghepxe', 'url'=>array('index')),
	array('label'=>'Manage Tinghepxe', 'url'=>array('admin')),
);
?>

<h1>Create Tinghepxe</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>