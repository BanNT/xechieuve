<?php
/* @var $this KhachhangController */
/* @var $model Khachhang */

$this->breadcrumbs=array(
	'Khachhangs'=>array('index'),
	$model->ma_khach_hang=>array('view','id'=>$model->ma_khach_hang),
	'Update',
);

$this->menu=array(
	array('label'=>'List Khachhang', 'url'=>array('index')),
	array('label'=>'Create Khachhang', 'url'=>array('create')),
	array('label'=>'View Khachhang', 'url'=>array('view', 'id'=>$model->ma_khach_hang)),
	array('label'=>'Manage Khachhang', 'url'=>array('admin')),
);
?>

<h1>Update Khachhang <?php echo $model->ma_khach_hang; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>