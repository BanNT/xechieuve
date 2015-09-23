<?php $this->pageTitle=Yii::app()->name;?>
<section id="indexPage">
    <?php
    /* @var $this Controller */
    $this->widget('application.widgets.xetimkhach', array(
        'xetimkhach' => $xetimkhach,
        'paginatorKhach' => $paginatorXTK,
        'urlPaginatorKhach' => $urlPaginatorKhach,
        'ajaxElementId'=>$ajaxElementId
    ));

    $this->widget('application.widgets.khachtimxe', array(
        'khachtimxe' => $khachtimxe,
        'paginatorXe' => $paginatorKTX,
        'urlPaginatorXe' => $urlPaginatorXe,
        'ajaxElementId'=>$ajaxElementId
    ));
    ?>
</section>