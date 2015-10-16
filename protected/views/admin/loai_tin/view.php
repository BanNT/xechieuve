<?php

$this->breadcrumbs=array(
	'Khachhangs'=>array('index'),
	$model->ma_loai_tin,
);

$this->menu=array(
	array('label'=>'Update Loaitin', 'url'=>array('update', 'id'=>$model->ma_loai_tin)),
	array('label'=>'Delete Loaitin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ma_loai_tin),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Loaitin', 'url'=>array('admin')),
);
?>

<h1>View Loaitin #<?php echo $model->ma_loai_tin; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ma_loai_tin',
		'loai_tin',
		'gia_dang',
	),
)); ?>
