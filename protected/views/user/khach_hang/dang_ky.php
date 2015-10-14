<?php $this->pageTitle = Yii::app()->name . ' - Đăng kí'; ?>
<?php
if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>
<section id="dangki">
    <div class="tieude">ĐĂNG KÍ TÀI KHOẢN</div>
    <?php echo $form; ?>
    
</section>