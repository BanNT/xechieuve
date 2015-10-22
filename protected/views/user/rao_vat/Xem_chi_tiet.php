<?php
$this->pageTitle = Yii::app()->name . ' - ' . CHtml::encode($tinraovat['tieu_de_tin']);
$provinces = Province::listProvinces();
?>
<div class="row">
    <div class="col-md-12">
        <article id="detail-ktx">
            <header><div class="pribox"><?php echo CHtml::encode($tinraovat['tieu_de_tin']); ?></div> </header>
            <section>
                <p><span class="blue-text">Tên liên hệ: </span>
                    <span class="red-text"> <?php echo Chtml::encode($tinraovat['nguoi_lien_lac']); ?></span></p>
                    <br/>
                <p><span class="blue-text">Điện thoại: </span>
                    <span class="red-text"><?php echo Chtml::encode($tinraovat['so_dien_thoai']); ?></span></p>
                    <br/>
                <p><strong class="blue-text ">Nội dung:</strong><br/>
                    <span class="red-text"><?php echo $tinraovat['noi_dung_tin']; ?></span></p>
                    <?php
                    if (empty(CHtml::encode($tinraovat['anh']))) {
                        
                    }
                    else
                    {
                    ?>
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tinraovat/<?php echo CHtml::encode($tinraovat['anh']); ?>" width="650" height="250"/>
                    <?php
                    }
                    ?> 
                </div>
            </section>
        </article>
    </div>
</div>