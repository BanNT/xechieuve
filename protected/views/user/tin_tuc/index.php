<?php
/* @var $this Tin_tucController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name . ' - Tin tức';

?>

    <div><h3 style="border-bottom: 1px solid #ccc; padding: 10px 0;">Tin tức</h3></div>
<<<<<<< HEAD
    <?php
    foreach ($tintuc as $tin):
        $urlChiTietTin = Yii::app()->request->baseUrl . '/tin-tuc/xem-chi-tiet/' . ConvertURL::refine($tin['tieu_de']) . '/' . $tin['ma_tin'];
        ?>
        <div class="row">
            <div class="col-md-4">
                <figure>
                    <img src="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/images/tintuc/avatar/<?php echo CHtml::encode($tin['anh']); ?>" alt="skype" width="220" height="170" /></a>
                </figure> 
            </div>
            <div class="col-md-8">
                <header><h4><a href="<?php echo $urlChiTietTin ?>"><?php echo CHtml::encode($tin['tieu_de']); ?></a></h4></header>
                Ngày đăng: <time datetime="+07:00" itemprop="datePublished" style="font-style: italic"><?php echo CHtml::encode($tin['ngay_dang']); ?></time>
                <article>
                    <br/><?php echo CHtml::encode($tin['tom_tat']); ?>
                </article>
            </div>
        </div>
        <hr>
        <?php
    endforeach;
    ?>
</section>
=======

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
>>>>>>> fa39863de4086e8d1782e6c22ad7a4b403fd933e
