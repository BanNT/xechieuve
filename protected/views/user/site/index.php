<?php $this->pageTitle = Yii::app()->name . ' - Trang chủ'; ?>
<section id="indexPage">
    <?php
    /* @var $this Controller */
    if ($xetimkhach) {
        $this->widget('application.widgets.xetimkhach', array(
            'xetimkhach' => $xetimkhach,
            'paginatorKhach' => $paginatorXTK,
            'urlPaginatorKhach' => $urlPaginatorKhach,
            'ajaxElementId' => $ajaxElementId
        ));
    }

    if ($khachtimxe) {
        $this->widget('application.widgets.khachtimxe', array(
            'khachtimxe' => $khachtimxe,
            'paginatorXe' => $paginatorKTX,
            'urlPaginatorXe' => $urlPaginatorXe,
            'ajaxElementId' => $ajaxElementId
        ));
    }
    ?>
</section>