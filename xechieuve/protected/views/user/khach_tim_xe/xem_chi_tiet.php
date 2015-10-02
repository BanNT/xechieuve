<?php
$this->pageTitle = Yii::app()->name . ' - '. CHtml::encode($tinKTX['tieu_de_tin']);
$provinces = Province::listProvinces();
?>
<div class="row">
    <div class="col-md-12">
        <article id="detail-ktx">
            <header><div class="pribox"><?php echo CHtml::encode($tinKTX['tieu_de_tin']); ?></div> </header>
            <section>
                <table class="table table-striped ct bord">
                <tr>
                    <td class="ct1"><span class="blue-text">Tên liên hệ:</span></td>
                    <td class="ct2"><span class="red-text"><?php echo Chtml::encode($tinKTX['nguoi_lien_lac']); ?></span></td>
                </tr>
                <tr>
                    <td> <span class="blue-text">Điện thoại:</span></td>
                    <td><span class="red-text"><?php echo Chtml::encode($tinKTX['so_dien_thoai']); ?></span></td>
                </tr>
                <tr>
                    <td><span class="blue-text">Lộ trình:</span></td>
                    <td><span class="red-text"><?php echo Chtml::encode($tinKTX['dia_chi_di']); ?> - <?php echo CHtml::encode($provinces[$tinKTX['tinh_thanh']]); ?>
                --> <?php echo Chtml::encode($tinKTX['dia_chi_den']); ?> - <?php echo CHtml::encode($provinces[$tinKTX['noi_den_tinh']]); ?></span></td>
                </tr>
                <tr>
                    <td><h4 class="blue-text">Thông tin thêm: </h4></td>
                    <td><?php echo $tinKTX['noi_dung_tin']; ?></td>
                </tr>
                </table>
            </section>
        </article>
    </div>
</div>

