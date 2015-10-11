<?php
/* @var $this TintucController */
/* @var $model Tintuc */

$this->breadcrumbs=array(
	'Tintucs'=>array('index'),
	$model->ma_tin=>array('view','id'=>$model->ma_tin),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tintuc', 'url'=>array('index')),
	array('label'=>'Create Tintuc', 'url'=>array('create')),
	array('label'=>'View Tintuc', 'url'=>array('view', 'id'=>$model->ma_tin)),
	array('label'=>'Manage Tintuc', 'url'=>array('admin')),
);
?>

<h1>Update Tintuc <?php echo $model->ma_tin; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>