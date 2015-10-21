<?php $this->pageTitle = Yii::app()->name . ' - Tác vụ khách'; ?>
<?php
if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>
<section id="dangtinkhach">
    <h3 style="margin-left: 370px;color: #369">Nhập ID khách hàng</h3>
    <?php echo $form; ?>
</section>

