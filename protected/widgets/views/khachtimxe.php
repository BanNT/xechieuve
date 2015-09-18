<?php /* @var $this Controller */ ?>
<section id="table-car">
    <div class="pribox">Xe tìm khách</div>    
    <div class="table-responsive">
        <table class="table table-striped table-hover" id="user">
            <thead>
                <tr style="color:#2C7BAC;" bgcolor="DAD9D9">
                    <th width="195">Tiêu đề</th>
                    <th width="77">Nơi đi</th>
                    <th width="83">Nơi đến</th>
                    <th width="84">Ngày đi</th>
                    <th width="164">Liên hệ</th>
                    <th width="79">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="text-justify">
                <?php
                foreach ($khachtimxe as $data):
                    ?>
                    <tr>
                        <td><?php echo CHtml::encode($data->tieu_de_tin); ?></td>
                        <td><?php echo CHtml::encode($data->noi_di_huyen) . ' ' . CHtml::encode($data->noi_di_tinh); ?></td>
                        <td><?php echo CHtml::encode($data->noi_den_huyen) . ' ' . CHtml::encode($data->noi_den_tinh); ?></td>
                        <td><?php echo CHtml::encode($data->ngay_khoi_hanh); ?></td>
                        <td><?php echo CHtml::encode($data->nguoi_lien_lac); ?> (<?php echo CHtml::encode($data->so_dien_thoai); ?>)</td>
                        <td>Đang chờ</td>
                    </tr>
                    <?php
                endforeach;
                ?>  
            </tbody>
        </table>
        <?php $this->widget('application.widgets.paginator'); ?>
        <?php $this->widget('application.widgets.khachtimxe', $khachtimxe) ?>
    </div>
</section><!--end table-car-->