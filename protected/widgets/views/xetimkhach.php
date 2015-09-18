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
                    <th width="100">Ngày đi</th>
                    <th width="164">Liên hệ</th>
                    <th width="79">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="text-justify">
                <?php
                foreach ($this->xetimkhach as $data):
                    ?>
                    <tr>
                        <td><?php echo CHtml::encode($data->tieu_de_tin); ?></td>
                        <td><?php
                            echo CHtml::encode($data->noi_di_huyen);
                            echo "<br>" . CHtml::encode($data->noi_di_tinh);
                            ?>
                        </td>
                        <td><?php
                            echo CHtml::encode($data->noi_den_huyen);
                            echo "<br>" . CHtml::encode($data->noi_den_tinh);
                            ?>
                        </td>
                        <td><?php echo CHtml::encode($data->ngay_khoi_hanh); ?></td>
                        <td><?php echo CHtml::encode($data->nguoi_lien_lac); ?></td>
                        <td>Đang chờ</td>
                    </tr>
                    <?php
                endforeach;
                ?>  
            </tbody>
        </table>
        <?php
        $this->widget('application.widgets.paginator');
        ?>
    </div>
</section><!--end table-car-->