<?php
/* @var $this LoaianhController */
/* @var $model Loaianh */

$this->breadcrumbs=array(
	'Loaianhs'=>array('index'),
	$model->ma_loai_anh=>array('view','id'=>$model->ma_loai_anh),
	'Update',
);

$this->menu=array(
	array('label'=>'List Loaianh', 'url'=>array('index')),
	array('label'=>'Create Loaianh', 'url'=>array('create')),
	array('label'=>'View Loaianh', 'url'=>array('view', 'id'=>$model->ma_loai_anh)),
	array('label'=>'Manage Loaianh', 'url'=>array('admin')),
);
?>

<h1>Update Loaianh <?php echo $model->ma_loai_anh; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>