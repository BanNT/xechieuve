<h1 class="h3">Update tài khoản khách hàng:</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<a href="<?php echo Yii::app()->baseUrl;?>/admin.php/manage_customer/admin">
    <span class="glyphicon glyphicon-arrow-left"></span> Quay lại trang quản lý khách hàng
</a>