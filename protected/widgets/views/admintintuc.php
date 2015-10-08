<?php
// /* @var $this Controller */    
$provinces = Province::listProvinces();
?>
<style>
    td
    {
        text-align: center;
    }
    #adminlistTT
    {
        width: 900px;
        margin: auto;
    }
</style>
<section id="adminlistTT">
    <h1 style="color: #0000cc;text-align: center;">Danh sách tin tức đã đăng</h1>
    <table width="857" border="1">
        <tr>
            <td width="84">Mã tin</td>
            <td width="135">Tiêu đề</td>
            <td width="196">Nội dung</td>
            <td width="105">Ngày đăng</td>
            <td width="87">Tóm tắt</td>
            <td width="110">Trạng thái</td>
            <td width="100" colspan="2">Thêm mới</td>
        </tr>
        <?php
        foreach ($this->tintuc as $tintuc):
            $urlChiTietTin = Yii::app()->request->baseUrl . '/tin-tuc/xem-chi-tiet/' . ConvertURL::refine($tintuc['tieu_de']) . '/' . $tintuc['ma_tin'];
            ?>
            <tr>
                <td><?php echo CHtml::encode($tintuc['ma_tin']); ?></td>
                <td><?php echo CHtml::encode($tintuc['tieu_de']); ?></td>
                <td><?php echo CHtml::encode($tintuc['noi_dung']); ?></td>
                <td><?php echo CHtml::encode($tintuc['ngay_dang']); ?></td>
                <td><?php echo CHtml::encode($tintuc['tom_tat']); ?></td>
                <td><?php echo CHtml::encode($tintuc['trang_thai']); ?></td>
                <td width="50"><a href="?action=<?php echo CHtml::encode($tintuc['ma_tin']); ?>">Sửa</a></td>
                <td width="50">Xóa</td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
</section>
