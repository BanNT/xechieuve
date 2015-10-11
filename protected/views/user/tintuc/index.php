<?php
/* @var $this TintucController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tintucs',
);

$this->menu=array(
	array('label'=>'Create Tintuc', 'url'=>array('create')),
	array('label'=>'Manage Tintuc', 'url'=>array('admin')),
);
?>

<h1>Tintucs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
