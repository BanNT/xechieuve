<?php
$this->pageTitle = Yii::app()->name . ' - '. CHtml::encode($tinraovat['tieu_de_tin']);
$provinces = Province::listProvinces();
?>
<div class="row">
    <div class="col-md-12">
        <article id="detail-ktx">
            <header><div class="pribox"><?php echo CHtml::encode($tinraovat['tieu_de_tin']); ?></div> </header>
            <section>
                <address>
                    Ngày đăng: <strong><?php echo Chtml::encode($tinraovat['ngay_dang']); ?></strong><br/>
                    Tên liên hệ: <strong><?php echo Chtml::encode($tinraovat['nguoi_lien_lac']); ?></strong><br/>
                    Điện thoại: <strong><?php echo Chtml::encode($tinraovat['so_dien_thoai']); ?></strong><br/>
                    Email: <strong><?php echo Chtml::encode($tinraovat['email']); ?></strong><br/>
                </address>
                <div>
                <h4 class="blue-text">Thông tin thêm: </h4>
                <?php echo $tinraovat['noi_dung_tin']; ?><br/>
                <img src="<?php echo CHtml::encode($tinraovat['anh']);?>"/>
                </div>
            </section>
        </article>
    </div>
</div>