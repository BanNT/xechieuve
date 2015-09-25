<?php $this->pageTitle = Yii::app()->name . ' - đăng tin rao vặt'; ?>
<section id="dangtinrv">
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


