<?php
/* @var $this LoaianhController */
/* @var $model Loaianh */

$this->breadcrumbs=array(
	'Loaianhs'=>array('index'),
	$model->ma_loai_anh,
);

$this->menu=array(
	array('label'=>'List Loaianh', 'url'=>array('index')),
	array('label'=>'Create Loaianh', 'url'=>array('create')),
	array('label'=>'Update Loaianh', 'url'=>array('update', 'id'=>$model->ma_loai_anh)),
	array('label'=>'Delete Loaianh', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ma_loai_anh),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Loaianh', 'url'=>array('admin')),
);
?>

<h1>View Loaianh #<?php echo $model->ma_loai_anh; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ma_loai_anh',
		'ten_loai_anh',
	),
)); ?>
