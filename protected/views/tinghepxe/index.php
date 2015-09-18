<?php
/* @var $this TinghepxeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tinghepxes',
);

$this->menu=array(
	array('label'=>'Create Tinghepxe', 'url'=>array('create')),
	array('label'=>'Manage Tinghepxe', 'url'=>array('admin')),
);
?>

<h1>Tinghepxes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
