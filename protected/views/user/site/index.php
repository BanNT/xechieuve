<section id="indexPage">
    <?php
    /* @var $this Controller */
    $this->widget('application.widgets.xetimkhach', array(
        'xetimkhach' => $xetimkhach,
        'paginatorKhach' => $paginatorKhach,
        'urlPaginatorKhach' => $urlPaginatorKhach,
        'ajaxElementId'=>$ajaxElementId
    ));

    $this->widget('application.widgets.khachtimxe', array(
        'khachtimxe' => $khachtimxe,
        'paginatorXe' => $paginatorXe,
        'urlPaginatorXe' => $urlPaginatorXe,
        'ajaxElementId'=>$ajaxElementId
    ));
    ?>
</section>