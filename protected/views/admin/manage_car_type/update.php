<?php
/* @var $this Manage_car_typeController */
/* @var $model Loaixeghep */
?>

<h1>Sửa loại xe ghép:</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-loai-xe-ghep">
    <span class="glyphicon glyphicon-arrow-left"></span> Quay lại trang quản lý loại xe ghép
</a>