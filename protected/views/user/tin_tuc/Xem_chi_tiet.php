<?php
/* @var $this Tin_tucController */
/* @var $model Tintuc */

$this->pageTitle = Yii::app()->name . ' - ' . CHtml::encode($model->tieu_de);

?>

<article>
    <header>
        <h3 style="border-bottom: 1px solid #ccc; padding: 10px 0;"><?php echo CHtml::encode($model->tieu_de); ?></h3>
    </header>
    <section>
        <p><i>Ngày đăng: <?php echo Chtml::encode($model->ngay_dang); ?></i></p>
        <p><strong><?php echo Chtml::encode($model->tom_tat); ?></strong></p>
        <p><?php echo Chtml::encode($model->noi_dung); ?></p>
    </section>
</article>
