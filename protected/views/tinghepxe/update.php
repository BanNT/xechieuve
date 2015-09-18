<?php
/* @var $this TinghepxeController */
/* @var $model Tinghepxe */

$this->breadcrumbs=array(
	'Tinghepxes'=>array('index'),
	$model->ma_tin=>array('view','id'=>$model->ma_tin),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tinghepxe', 'url'=>array('index')),
	array('label'=>'Create Tinghepxe', 'url'=>array('create')),
	array('label'=>'View Tinghepxe', 'url'=>array('view', 'id'=>$model->ma_tin)),
	array('label'=>'Manage Tinghepxe', 'url'=>array('admin')),
);
?>

<h1>Update Tinghepxe <?php echo $model->ma_tin; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>