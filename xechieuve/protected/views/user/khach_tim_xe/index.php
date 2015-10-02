<?php $this->pageTitle=Yii::app()->name . ' - khách tìm xe';?>
<section id="khachtimxe">
    <?php
    if(!$khachtimxe){
        echo '<h3>'.CHtml::encode('Không tìm thấy dữ liệu bạn cần tìm!').'</h3>';
        return;
    }
    $this->widget('application.widgets.khachtimxe', array(
        'khachtimxe' => $khachtimxe,
        'paginatorXe' => $paginatorKTX,
        'urlPaginatorXe' => $urlPaginatorXe,
        'ajaxElementId'=>$ajaxElementId
    ));
    ?>
</section>