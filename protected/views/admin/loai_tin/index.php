<?php
/* @var $this Manage_customerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Khachhangs',
);

$this->menu=array(
	array('label'=>'Create Khachhang', 'url'=>array('create')),
	array('label'=>'Manage Khachhang', 'url'=>array('admin')),
);
?>

<h1>Khachhangs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
