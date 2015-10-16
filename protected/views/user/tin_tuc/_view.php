<?php
/* @var $this TintucController */
/* @var $data Tintuc */
?>

<?php
$this->pageTitle = Yii::app()->name . ' - Tin tức';
$urlChiTietTin = Yii::app()->request->baseUrl . '/tin-tuc/xem-chi-tiet/' . ConvertURL::refine(CHtml::encode($data->tieu_de)) . '/' . CHtml::encode($data->ma_tin);
?>
<section id="tintuc">

    <div class="row">
        <div class="col-md-4">
            <figure>
                <a href="<?php echo $urlChiTietTin; ?>"><img src="<?php echo CHtml::encode($data->anh); ?>" width="220" height="170" /></a>
            </figure>
        </div>
        <div class="col-md-8">
            <header>
                <h4> <a href="<?php echo $urlChiTietTin; ?>"><?php echo CHtml::encode($data->tom_tat); ?></a></h4>
            </header>
<?php echo CHtml::encode($data->getAttributeLabel('ngay_dang')); ?>:
            <time datetime="+07:00" itemprop="datePublished" style="font-style: italic"><?php echo CHtml::encode($data->ngay_dang); ?></time>
            <article>
                <br/><?php echo CHtml::encode($data->tom_tat); ?>
            </article>
        </div>
    </div>
    <hr>
</section>