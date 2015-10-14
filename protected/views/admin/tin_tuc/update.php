 <?php
/* @var $this TintucController */
/* @var $model Tintuc */

$this->breadcrumbs=array(
    'Tintucs'=>array('index'),
    $model->ma_tin=>array('view','id'=>$model->ma_tin),
    'Update',
);
?>

<h1>Update Tintuc <?php echo $model->ma_tin; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?> 
<a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-tin-tuc">
    <span class="glyphicon glyphicon-arrow-left"></span> Quay lại trang quản lý tin tức
</a>