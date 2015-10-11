<?php
/* @var $this Manage_user_newsController */
/* @var $model Tinkhachhang */

$this->breadcrumbs=array(
	'Tinkhachhangs'=>array('index'),
	$model->ma_tin=>array('view','id'=>$model->ma_tin),
	'Update',
);
?>

<h1>Update Tinkhachhang <?php echo $model->ma_tin; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>