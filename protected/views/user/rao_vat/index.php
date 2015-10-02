<?php
/* @var $this Rao_vatController */
$this->pageTitle=Yii::app()->name . ' - Rao vặt';
?>
<section id="tinraovat">
    <?php
    if(!$listTinRV){
        echo '<h3>'.CHtml::encode('Không tìm thấy dữ liệu bạn cần tìm!').'</h3>';
        return;
    }
    $this->widget('application.widgets.tinraovatWG', array(
        'tinraovat' => $listTinRV,
        'paginatorRV' => $paginatorRV,
        'urlPaginatorRV' => $urlPaginatorRV,
        'ajaxElementId' => $ajaxElementId
    ));
    ?>
</section>