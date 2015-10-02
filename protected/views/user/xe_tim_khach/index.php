<?php $this->pageTitle=Yii::app()->name . ' - Xe tìm khách';?>
<section id="xetimkhach">
    <?php
    /* @var $this Controller */
    if(!$xetimkhach){
        echo '<h3>'.CHtml::encode('Không tìm thấy dữ liệu bạn cần tìm!').'</h3>';
        return;
    }
    $this->widget('application.widgets.xetimkhach', array(
        'xetimkhach' => $xetimkhach,
        'paginatorKhach' => $paginatorXTK,
        'urlPaginatorKhach' => $urlPaginatorKhach,
        'ajaxElementId' => $ajaxElementId
    ));
    ?>
</section>