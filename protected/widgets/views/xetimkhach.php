<?php // /* @var $this Controller */    
$provinces = Province::listProvinces();
?>
<section id="table-car">
    <div class="pribox">Xe tìm khách</div>    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr style="color:#2C7BAC;" bgcolor="DAD9D9">
                    <th width="195">Tiêu đề</th>
                    <th width="77">Nơi đi</th>
                    <th width="83">Nơi đến</th>
                    <th width="100">Ngày đi</th>
                    <th width="164">Liên hệ</th>
                    <th width="79">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->xetimkhach as $data):
                    ?>
                    <tr>
                        <td><?php echo CHtml::encode($data['tieu_de_tin']); ?></td>
                        <td><?php
                            echo CHtml::encode($data['dia_chi_di']);
                            echo "<br>" . CHtml::encode($provinces[$data['tinh_thanh']]);
                            ?>
                        </td>
                        <td><?php
                            echo CHtml::encode($data['dia_chi_den']);
                            echo "<br>" . CHtml::encode($provinces[$data['noi_den_tinh']]);
                            ?>
                        </td>
                        <td><?php echo CHtml::encode($data['ngay_khoi_hanh']); ?></td>
                        <td>
                            <?php echo CHtml::encode($data['nguoi_lien_lac']); ?>
                            <?php echo CHtml::encode($data['so_dien_thoai']); ?>
                        </td>
                        <td>Đang chờ</td>
                    </tr>
                    <?php
                endforeach;
                ?>  
            </tbody>
        </table>
        <?php
        $this->widget('application.widgets.paginator', array(
            'paginator' => $this->paginatorKhach,
            'urlPaginator' => $this->urlPaginatorKhach,
            'ajaxElementId' => $this->ajaxElementId
        ))
        ?>
    </div>
</section><!--end table-car-->