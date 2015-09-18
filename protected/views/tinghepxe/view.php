<?php
/* @var $this TinghepxeController */
/* @var $model Tinghepxe */

$this->breadcrumbs=array(
	'Tinghepxes'=>array('index'),
	$model->ma_tin,
);

$this->menu=array(
	array('label'=>'List Tinghepxe', 'url'=>array('index')),
	array('label'=>'Create Tinghepxe', 'url'=>array('create')),
	array('label'=>'Update Tinghepxe', 'url'=>array('update', 'id'=>$model->ma_tin)),
	array('label'=>'Delete Tinghepxe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ma_tin),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tinghepxe', 'url'=>array('admin')),
);
?>

<h1>View Tinghepxe #<?php echo $model->ma_tin; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ma_tin',
		'ma_khach_hang',
		'noi_di_tinh',
		'noi_di_huyen',
		'noi_den_tinh',
		'noi_den_huyen',
		'lich_trinh',
		'ngay_khoi_hanh',
		'gio_khoi_hanh',
		'so_dien_thoai',
		'nguoi_lien_lac',
		'tieu_de_tin',
		'noi_dung',
		'loai_xe',
		'ngay_dang',
		'ma_loai_tin',
	),
)); ?>
