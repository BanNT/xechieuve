<?php $this->pageTitle = Yii::app()->name . ' - Đăng tin xe tìm khách'; ?>
<?php
if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>

<div id="dang-tin-xtk">
<section id="dangtinrv">
    <script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
    <?php echo $form; ?>
</section>
    <?php
//echo "<pre>";
//var_dump($urlPaginatorXTK);
//echo "</pre>";die;

    $this->widget('application.widgets.xetimkhach', array(
        'xetimkhach' => $listTinXTK,
        'paginatorKhach' => $paginator,
        'urlPaginatorKhach' => $urlPaginatorXTK,
        'ajaxElementId' => $ajaxElementId
    ));
    ?>
</div>
<script type="text/javascript">
    CKEDITOR.replace('noi-dung-tin');
</script>