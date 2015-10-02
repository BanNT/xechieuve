<?php $this->pageTitle = Yii::app()->name . ' - Tin đã đăng'; ?>
<section id="tin-da-dang">
    <div class="pribox">Tin đã đăng: <?php echo $message ?></div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr style="color:#2C7BAC;" bgcolor="DAD9D9">
                    <th width="40">STT</th>
                    <th width="110" class="text-center">Ngày đăng</th>
                    <th width="295" class="text-center">Tiêu đề</th>
                    <th width="" class="text-center">Trạng thái</th>
                    <th colspan="3" class="text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($listTin as $tin):
                    $urlLamMoi = CHtml::encode(Yii::app()->request->baseUrl . '/lam-moi-tin-dang/' . ConvertURL::refine($tin['tieu_de_tin']) . '/' . $tin['ma_tin']);
                    $urlSua = CHtml::encode(Yii::app()->request->baseUrl . '/sua-tin/' . ConvertURL::refine($tin['tieu_de_tin']) . '/' . $tin['ma_tin']);
                    $urlXoa = CHtml::encode(Yii::app()->request->baseUrl . '/xoa-tin/' . ConvertURL::refine($tin['tieu_de_tin']) . '/' . $tin['ma_tin']);
                    ?>
                    <tr>
                        <td><?php echo CHtml::encode($i+=1); ?></td>
                        <td><?php echo CHtml::encode($tin['ngay_dang_tin']); ?></td>
                        <td class="text-left"><?php echo CHtml::encode($tin['tieu_de_tin']); ?></td>
                        <td>Đang chờ</td>
                        <td><a href="javascript:confirmURL('<?php echo $urlLamMoi; ?>')">Làm mới</a></td>
                        <td><a href="<?php echo $urlSua; ?>" >Sửa</a></td>
                        <td><a href="javascript:confirmDelete('<?php echo $urlXoa; ?>')">Xóa</a></td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <?php
        $this->widget('application.widgets.paginator', array(
            'paginator' => $paginator,
            'urlPaginator' => $urlPaginator,
            'ajaxElementId' => $ajaxElementId
        ))
        ?>
    </div>
</section><!--end table-car-->
<script>
    function confirmURL(URL) {
        if (prompt('Khi bạn làm mới, tài khoản của bạn sẽ bị trừ tiền như khi đăng mới. Hãy xác nhận bằng cách gõ "yes" và nhấn nút "OK"') === "yes") {
            document.location = URL;
        }
    }

    function confirmDelete(URLDelete) {
        if (prompt('Bạn có chắc muốn xóa tin này. Hãy xác nhận bằng cách gõ "yes" và nhấn nút "OK"') === "yes") {
            document.location = URLDelete;
        }
    }
</script>