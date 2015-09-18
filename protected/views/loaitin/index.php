<?php
/* @var $this LoaitinController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Loaitins',
);

$this->menu=array(
	array('label'=>'Create Loaitin', 'url'=>array('create')),
	array('label'=>'Manage Loaitin', 'url'=>array('admin')),
);
?>

<h1>Loaitins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
