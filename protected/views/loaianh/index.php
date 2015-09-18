<?php
/* @var $this LoaianhController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Loaianhs',
);

$this->menu=array(
	array('label'=>'Create Loaianh', 'url'=>array('create')),
	array('label'=>'Manage Loaianh', 'url'=>array('admin')),
);
?>

<h1>Loaianhs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
