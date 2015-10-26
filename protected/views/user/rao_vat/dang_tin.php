<?php $this->pageTitle = Yii::app()->name . ' - Đăng tin rao vặt'; ?>
<?php
if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>
<div class="pribox">ĐĂNG TIN</div>
<section id="dangtinrv">
    <script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
    <?php echo $form; ?>
</section>
<?php
$this->widget('application.widgets.tinraovatWG', array(
    'tinraovat' => $listTinRV,
    'paginatorRV' => $paginatorRV,
    'urlPaginatorRV' => $urlPaginatorRV,
    'ajaxElementId' => $ajaxElementId
));
?>
<script type="text/javascript">
    CKEDITOR.replace('noi-dung-tin');
</script>

