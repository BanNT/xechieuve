<?php
/* @var $this Manage_user_newsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tinkhachhangs',
);

$this->menu=array(
	array('label'=>'Create Tinkhachhang', 'url'=>array('create')),
	array('label'=>'Manage Tinkhachhang', 'url'=>array('admin')),
);
?>

<h1>Tinkhachhangs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
