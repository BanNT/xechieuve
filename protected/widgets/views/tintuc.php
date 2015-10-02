<?php
// /* @var $this Controller */    
$provinces = Province::listProvinces();
?>
<section id="listtintuc">
    <div><h3 style="border-bottom: 1px solid #ccc; padding: 10px 0;">Tin tức</h3></div>
    <?php
    foreach ($this->tintuc as $tintuc):
        $urlChiTietTin = Yii::app()->request->baseUrl . '/tin-tuc/xem-chi-tiet/' . ConvertURL::refine($tintuc['tieu_de']) . '/' . $tintuc['ma_tin'];
        ?>
        <div class="row">
            <div class="col-md-4">
                <figure>
                    <img src="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/images/tintuc/<?php echo CHtml::encode($tintuc['anh']); ?>" alt="skype" width="220" height="170" /></a>
                </figure> 
            </div>
            <div class="col-md-8">
                <header><h4><a href="<?php echo $urlChiTietTin ?>"><?php echo CHtml::encode($tintuc['tieu_de']); ?></a></h4></header>
                Ngày đăng: <time datetime="+07:00" itemprop="datePublished" style="font-style: italic"><?php echo CHtml::encode($tintuc['ngay_dang']); ?></time>
                <article>
                    <br/><?php echo CHtml::encode($tintuc['tom_tat']); ?>
                </article>
            </div>
        </div>
        <hr>
        <?php
    endforeach;
    ?>
</section>
