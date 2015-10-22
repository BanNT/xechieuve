<?php
$this->pageTitle = Yii::app()->name . ' - '. CHtml::encode($tinKTX['tieu_de_tin']);
$provinces = Province::listProvinces();
?>
<div class="row">
    <div class="col-md-12">
        <article id="detail-ktx">
            <header><div class="pribox"><?php echo CHtml::encode($tinKTX['tieu_de_tin']); ?></div> </header>
            <section>
                <p><span class="blue-text">Tên liên hệ: </span>
                    <span class="red-text"> <?php echo Chtml::encode($tinKTX['nguoi_lien_lac']); ?></span></p>
                    <br/>
                <p><span class="blue-text">Điện thoại: </span>
                    <span class="red-text"><?php echo Chtml::encode($tinKTX['so_dien_thoai']); ?></span></p>
                    <br/>
                <p><span class="blue-text">Lộ trình: </span>
                    <span class="red-text"><?php echo Chtml::encode($tinKTX['dia_chi_di']); ?> - <?php echo CHtml::encode($provinces[$tinKTX['tinh_thanh']]); ?>
                    <a class="glyphicon glyphicon-arrow-right red-text"></a>
                    <?php echo Chtml::encode($tinKTX['dia_chi_den']); ?> - <?php echo CHtml::encode($provinces[$tinKTX['noi_den_tinh']]); ?></span></p>
                    <br/>
                <p><strong class="blue-text ">Thông tin thêm:</strong><br/>
                    <span class="red-text"><?php echo $tinKTX['noi_dung_tin']; ?></span></p>
            </section>
        </article>
    </div>
</div>            


 