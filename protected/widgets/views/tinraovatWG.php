<?php
// /* @var $this Controller */    
$provinces = Province::listProvinces();
?>
<section id="tableRV">
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
                    $urlChiTietTin = Yii::app()->request->baseUrl . '/rao-vat/xem-chi-tiet/' . ConvertURL::refine($data['tieu_de_tin']) . '/' . $data['ma_tin'];
                    ?>
                    <tr>
                        <td><?php echo CHtml::encode(date("d-m-Y", strtotime($data['ngay_dang_tin']))) ?></td>
                        <td><a href="<?php echo $urlChiTietTin ?>"><?php echo CHtml::encode($data['tieu_de_tin']); ?></a></td>
                        <td><?php echo CHtml::encode($provinces[$data['tinh_thanh']]); ?></td>
                        <td>
                            <?php echo CHtml::encode($data['nguoi_lien_lac']); ?>
                            <?php echo CHtml::encode($data['so_dien_thoai']); ?>
                        </td>
                        <td>
                            <?php echo CHtml::encode($data['gia_rao_vat']); ?>
                        </td>
                        <td><?php echo CHtml::encode($data['trang_thai_tin']); ?></td>
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