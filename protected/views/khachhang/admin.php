<?php
/* @var $this KhachhangController */
/* @var $model Khachhang */

$this->breadcrumbs=array(
	'Khachhangs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Khachhang', 'url'=>array('index')),
	array('label'=>'Create Khachhang', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#khachhang-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Khachhangs</h1>

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
	'id'=>'khachhang-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ma_khach_hang',
		'ten_dang_nhap',
		'ten_khach_hang',
		'email',
		'password',
		'dia_chi',
		/*
		'so_dien_thoai',
		'so_du_tai_khoan',
		'anh_dai_dien',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
