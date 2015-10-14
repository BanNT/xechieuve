<?php
/* @var $this Manage_user_newsController */
/* @var $model Tinkhachhang */

$this->breadcrumbs=array(
	'Tinkhachhangs'=>array('index'),
	$model->ma_tin,
);

$this->menu=array(
	array('label'=>'List Tinkhachhang', 'url'=>array('index')),
	array('label'=>'Create Tinkhachhang', 'url'=>array('create')),
	array('label'=>'Update Tinkhachhang', 'url'=>array('update', 'id'=>$model->ma_tin)),
	array('label'=>'Delete Tinkhachhang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ma_tin),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tinkhachhang', 'url'=>array('admin')),
);
?>

<h1>View Tinkhachhang #<?php echo $model->ma_tin; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ma_tin',
		'ma_khach_hang',
		'nguoi_lien_lac',
		'so_dien_thoai',
		'tieu_de_tin',
		'noi_dung_tin',
		'tinh_thanh',
		'ngay_dang',
		'ma_loai_tin',
		'trang_thai',
	),
)); ?>
