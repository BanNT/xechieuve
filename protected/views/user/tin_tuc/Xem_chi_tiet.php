<?php
$this->pageTitle = Yii::app()->name . ' - ' . CHtml::encode($tintuc['tieu_de']);
$provinces = Province::listProvinces();
?>
<article>
    <header>
        <h3><?php echo CHtml::encode($tintuc['tieu_de']); ?></h3>
    </header>
    <section>
        <p><i>Ngày đăng: <?php echo Chtml::encode($tintuc['ngay_dang']); ?></i></p>
        <p><strong><?php echo Chtml::encode($tintuc['tom_tat']); ?></strong></p>
        <p><?php echo $tintuc['noi_dung']; ?></p>
    </section>
</article>