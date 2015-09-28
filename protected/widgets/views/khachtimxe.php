<?php
/* @var Paginate $this->paginatorXe */
$provinces = Province::listProvinces();
?>
<section id="tableKTX">
    <div class="pribox">Khách tìm xe</div>    
    <div class="table-responsive">
        <table class="table table-striped table-hover" id="user">
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
                foreach ($this->khachtimxe as $data):
//                    $urlChiTietTin = Yii::app()->createUrl('khach-tim-xe/xem-chi-tiet', array(
//                        'id' => $data['ma_tin'],
//                        'title' => ConvertURL::refine($data['tieu_de_tin'])
//                    ));
                    $urlChiTietTin = Yii::app()->request->baseUrl . '/khach-tim-xe/xem-chi-tiet/' . ConvertURL::refine($data['tieu_de_tin']) . '/' . $data['ma_tin'];
                    ?>
                    <tr>
                        <td><a title="<?php echo CHtml::encode($data['tieu_de_tin']) ?>" href="<?php echo $urlChiTietTin ?>"><?php echo CHtml::encode($data['tieu_de_tin']); ?></a></td>
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
                        <td><?php echo CHtml::encode($data['nguoi_lien_lac']); ?></td>
                        <td>Đang chờ</td>

                    </tr>
                    <?php
                endforeach;
                ?>  
            </tbody>
        </table>
        <?php
        $this->widget('application.widgets.paginator', array(
            'paginator' => $this->paginatorXe,
            'urlPaginator' => $this->urlPaginatorXe,
            'ajaxElementId' => $this->ajaxElementId
        ))
        ?>
    </div>
</section><!--end table-customer-->