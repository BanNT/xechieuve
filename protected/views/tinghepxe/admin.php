<?php
/* @var $this TinghepxeController */
/* @var $model Tinghepxe */

$this->breadcrumbs=array(
	'Tinghepxes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tinghepxe', 'url'=>array('index')),
	array('label'=>'Create Tinghepxe', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tinghepxe-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tinghepxes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tinghepxe-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ma_tin',
		'ma_khach_hang',
		'noi_di_tinh',
		'noi_di_huyen',
		'noi_den_tinh',
		'noi_den_huyen',
		/*
		'lich_trinh',
		'ngay_khoi_hanh',
		'gio_khoi_hanh',
		'so_dien_thoai',
		'nguoi_lien_lac',
		'tieu_de_tin',
		'noi_dung',
		'loai_xe',
		'ngay_dang',
		'ma_loai_tin',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
