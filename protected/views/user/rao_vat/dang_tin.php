<?php $this->pageTitle = Yii::app()->name . ' - Đăng tin rao vặt'; ?>
<section id="dangtinrv">
    <script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
    <?php echo $noticeMessage ?>
    <?php echo $form; ?>
    <script type="text/javascript">
        CKEDITOR.replace('noi-dung-tin');
    </script>
</section>
<?php
$this->widget('application.widgets.tinraovatWG', array(
    'tinraovat' => $listTinRV,
    'paginatorRV' => $paginatorRV,
    'urlPaginatorRV' => $urlPaginatorRV,
    'ajaxElementId' => $ajaxElementId
));
?>


