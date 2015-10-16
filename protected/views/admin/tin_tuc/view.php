<?php
/* @var $this TintucController */
/* @var $model Tintuc */

$this->breadcrumbs=array(
    'Tintucs'=>array('index'),
    $model->ma_tin,
);


?>

<h1>Tin <?php echo $model->tieu_de;?></h1>

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
<a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-tin-tuc">
    <span class="glyphicon glyphicon-arrow-left"></span> Quay lại trang quản lý tin tức
</a>