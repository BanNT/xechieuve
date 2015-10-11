<?php
/* @var $this LoaitinController */
/* @var $model Loaitin */

$this->breadcrumbs=array(
	'Loaitins'=>array('index'),
	$model->ma_loai_tin=>array('view','id'=>$model->ma_loai_tin),
	'Update',
);

$this->menu=array(
	array('label'=>'List Loaitin', 'url'=>array('index')),
	array('label'=>'Create Loaitin', 'url'=>array('create')),
	array('label'=>'View Loaitin', 'url'=>array('view', 'id'=>$model->ma_loai_tin)),
	array('label'=>'Manage Loaitin', 'url'=>array('admin')),
);
?>

<h1>Update Loaitin <?php echo $model->ma_loai_tin; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>