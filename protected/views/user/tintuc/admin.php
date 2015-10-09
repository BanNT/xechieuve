<?php
/* @var $this TintucController */
/* @var $model Tintuc */

$this->breadcrumbs=array(
	'Tintucs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tintuc', 'url'=>array('index')),
	array('label'=>'Create Tintuc', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tintuc-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tintucs</h1>

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
	'id'=>'tintuc-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ma_tin',
		'tieu_de',
		'tom_tat',
		'noi_dung',
		'anh',
		'ngay_dang',
		/*
		'trang_thai',
		'meta_keyword',
		'meta_Description',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
