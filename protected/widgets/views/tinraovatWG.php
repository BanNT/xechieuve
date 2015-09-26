<?php
// /* @var $this Controller */    
$provinces = Province::listProvinces();
?>
<section id="table-rv">
    <div class="pribox">Tin rao vặt</div>    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr style="color:#2C7BAC;" bgcolor="DAD9D9">
                    <th width="100">Ngày đăng</th>
                    <th width="195">Tiêu đề</th>
                    <th width="87">Địa điểm</th>
                    <th width="120">Liên hệ</th>
                    <th width="80">Giá tiền</th>
                    <th width="79">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->tinraovat as $data):
                    ?>
                    <tr>
                        <td><?php echo CHtml::encode($data['ngay_dang']) ?></td>
                        <td><?php echo CHtml::encode($data['tieu_de_tin']); ?></td>
                        <td><?php echo CHtml::encode($provinces[$data['tinh_thanh']]); ?></td>
                        <td>
                            <?php echo CHtml::encode($data['nguoi_lien_lac']); ?>
                            <?php echo CHtml::encode($data['so_dien_thoai']); ?>
                        </td>
                        <td>
                            <?php echo CHtml::encode($data['gia_rao_vat']); ?>
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
            'paginator' => $this->paginatorRV,
            'urlPaginator' => $this->urlPaginatorRV,
            'ajaxElementId' => $this->ajaxElementId
        ))
        ?>
    </div>
</section><!--end table-car-->