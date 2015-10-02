<?php
$this->pageTitle = Yii::app()->name . ' - '. CHtml::encode($tinXTK['tieu_de_tin']);
$provinces = Province::listProvinces();
?>
<div class="row">
    <div class="col-md-12">
        <article id="detail-ktx">
            <header>
            <div class="pribox"><?php echo CHtml::encode($tinXTK['tieu_de_tin']); ?></div> </header>
            <section>
                <table class="table table-striped ct bord">
                <tr>
                    <td class="ct1"><span class="blue-text">Tên liên hệ:</span></td>
                    <td class="ct2"><span class="red-text"><?php echo Chtml::encode($tinXTK['nguoi_lien_lac']); ?></span></td>
                </tr>
                <tr>
                    <td> <span class="blue-text">Điện thoại:</span></td>
                    <td><span class="red-text"><?php echo Chtml::encode($tinXTK['so_dien_thoai']); ?></span></td>
                </tr>
                <tr>
                    <td><span class="blue-text">Lộ trình:</span></td>
                    <td><span class="red-text"><?php echo Chtml::encode($tinXTK['dia_chi_di']); ?> - <?php echo CHtml::encode($provinces[$tinXTK['tinh_thanh']]); ?>
                --> <?php echo Chtml::encode($tinXTK['dia_chi_den']); ?> - <?php echo CHtml::encode($provinces[$tinXTK['noi_den_tinh']]); ?></span></td>
                </tr>
                <tr>
                    <td><h4 class="blue-text">Thông tin thêm: </h4></td>
                    <td><?php echo $tinXTK['noi_dung_tin']; ?></td>
                </tr>
                </table>
            </section>
        </article>
    </div>
</div>            



 