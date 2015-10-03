<?php
$this->pageTitle = Yii::app()->name . ' - ' . CHtml::encode($tintuc['tieu_de']);
$provinces = Province::listProvinces();
?>
<div class="row">
    <div class="col-md-12">
        <article id="detail-ktx">
            <header>
                <div><h3 style="border-bottom: 1px solid #ccc; padding: 10px 0;"><?php echo CHtml::encode($tintuc['tieu_de']); ?></h3></div></div> </header>
            <section>
                <div class="col-md-12">
                    <p>Ngày đăng: <?php echo Chtml::encode($tintuc['ngay_dang']); ?></p>
                    <p><strong><?php echo Chtml::encode($tintuc['tom_tat']); ?></strong></p>
                    <p>BÀI VIẾT LIÊN QUAN</p>
                    <p><a>Bài viết ví dụ</a></p>
                    <p><?php echo $tintuc['noi_dung']; ?></p>
                </div>
            </section>
        </article>
    </div>
</div>