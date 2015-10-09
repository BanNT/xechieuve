<?php
/* @var $this Manage_customerController */
/* @var $model Khachhang */

$this->breadcrumbs=array(
	'Khachhangs'=>array('index'),
	$model->ma_khach_hang,
);

$this->menu=array(
	array('label'=>'List Khachhang', 'url'=>array('index')),
	array('label'=>'Create Khachhang', 'url'=>array('create')),
	array('label'=>'Update Khachhang', 'url'=>array('update', 'id'=>$model->ma_khach_hang)),
	array('label'=>'Delete Khachhang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ma_khach_hang),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Khachhang', 'url'=>array('admin')),
);
?>

<h1>View Khachhang #<?php echo $model->ma_khach_hang; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ma_khach_hang',
		'ten_khach_hang',
		'ten_dang_nhap',
		'password',
		'email',
		'dia_chi',
		'so_dien_thoai',
		'so_du_tai_khoan',
		'anh_dai_dien',
	),
)); ?>
