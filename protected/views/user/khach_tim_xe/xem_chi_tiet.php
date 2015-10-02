<?php
$this->pageTitle = Yii::app()->name . ' - ' . CHtml::encode($tinKTX['tieu_de_tin']);
$provinces = Province::listProvinces();
?>
<section id="chi-tiet-ktx">
    <div class="row">
        <div class="col-md-12">
            <article id="detail-ktx">
                <header><div class="pribox"><?php echo CHtml::encode($tinKTX['tieu_de_tin']); ?></div> </header>
                <section>
                    <span class="blue-text">Tên liên hệ:</span> <span class="red-text"><?php echo Chtml::encode($tinKTX['nguoi_lien_lac']); ?></span><br/>
                    <span class="blue-text">Điện thoại:</span> <span class="red-text"><?php echo Chtml::encode($tinKTX['so_dien_thoai']); ?></span><br/>
                    <span class="blue-text">Lộ trình:</span> <span class="red-text"><?php echo Chtml::encode($tinKTX['dia_chi_di']); ?> - <?php echo CHtml::encode($provinces[$tinKTX['tinh_thanh']]); ?>
                        --> <?php echo Chtml::encode($tinKTX['dia_chi_den']); ?> - <?php echo CHtml::encode($provinces[$tinKTX['noi_den_tinh']]); ?></span> <br/>
                    <h4 class="blue-text">Thông tin thêm: </h4>
                    <?php echo $tinKTX['noi_dung_tin']; ?>
                </section>
            </article>
        </div>
    </div>
</section>