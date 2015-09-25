<?php
/* @var $this Rao_vatController */
$this->pageTitle=Yii::app()->name . ' - rao vặt';
?>
<section id="tinraovat">
    <?php
    $this->widget('application.widgets.tinraovatWG', array(
        'tinraovat' => $listTinRV,
        'paginatorRV' => $paginatorRV,
        'urlPaginatorRV' => $urlPaginatorRV,
        'ajaxElementId' => $ajaxElementId
    ));
    ?>
</section>