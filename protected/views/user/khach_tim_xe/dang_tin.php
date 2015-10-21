<?php $this->pageTitle = Yii::app()->name . ' - Đăng tin khách tìm xe'; ?>
<?php
if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>
<div id="dang-tin-ktx">
    <section id="dangtinrv">
        <script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
        <?php echo $form; ?>
    </section>
    <?php
    $this->widget('application.widgets.khachtimxe', array(
        'khachtimxe' => $listTinKTX,
        'paginatorXe' => $paginator,
        'urlPaginatorXe' => $urlPaginatorKTX,
        'ajaxElementId' => $ajaxElementId
    ));
    ?>
</div>
<script type="text/javascript">
    CKEDITOR.replace('noi-dung-tin');
</script>
