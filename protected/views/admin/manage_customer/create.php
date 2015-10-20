<?php
/* @var $this Manage_customerController */
/* @var $model Khachhang */

$this->breadcrumbs=array(
	'Khachhangs'=>array('index'),
	'Create',
);
?>



<?php $this->renderPartial('_formCreate', array('model'=>$model)); ?>
<a style="margin-bottom: 20px;" href="<?php echo Yii::app()->baseUrl;?>/admin.php/manage_customer/admin">
    <span class="glyphicon glyphicon-arrow-left"></span> Quay lại trang quản lý khách hàng
</a>