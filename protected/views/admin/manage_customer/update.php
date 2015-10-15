<h1 class="h3">Update tài khoản khách hàng:</h1>
<?php
//Nếu có tồn tại $message thì mới hiển thị modal
if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>
<?php $this->renderPartial('_formUpdate', array('model' => $model)); ?>
<a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/manage_customer/admin">
    <span class="glyphicon glyphicon-arrow-left"></span> Quay lại trang quản lý khách hàng
</a>