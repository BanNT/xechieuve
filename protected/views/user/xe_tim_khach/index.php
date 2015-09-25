<?php $this->pageTitle=Yii::app()->name . ' - xe tìm khách';?>
<section id="xetimkhach">
    <?php
    /* @var $this Controller */
    $this->widget('application.widgets.xetimkhach', array(
        'xetimkhach' => $xetimkhach,
        'paginatorKhach' => $paginatorXTK,
        'urlPaginatorKhach' => $urlPaginatorKhach,
        'ajaxElementId' => $ajaxElementId
    ));
    ?>
</section>