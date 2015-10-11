<?php
/* @var $this TintucController */
/* @var $model Tintuc */

$this->breadcrumbs=array(
    'Tintucs'=>array('index'),
    $model->ma_tin,
);

$this->menu=array(
    array('label'=>'List Tintuc', 'url'=>array('index')),
    array('label'=>'Create Tintuc', 'url'=>array('create')),
    array('label'=>'Update Tintuc', 'url'=>array('update', 'id'=>$model->ma_tin)),
    array('label'=>'Delete Tintuc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ma_tin),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Tintuc', 'url'=>array('admin')),
);
?>

<h1>View Tintuc #<?php echo $model->ma_tin; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'ma_tin',
        'tieu_de',
        'tom_tat',
        'noi_dung',
        'anh',
        'ngay_dang',
        'trang_thai',
        'meta_keyword',
        'meta_Description',
    ),
)); ?> 