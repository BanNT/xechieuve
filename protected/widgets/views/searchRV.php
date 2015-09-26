<div class="col-md-12">
    <h6>Tìm kiếm</h6>
    <form action="<?php echo CHtml::encode(Yii::app()->request->baseUrl) . '/rao_vat/tim_kiem'; ?>" method="post">
        <select name="ma-loai-tin-rv">
            <option value="-1">Loaị tin rao vặt</option>
            <?php $this->widget('application.widgets.kindRV'); ?>
        </select>
        <select name="dia-diem">
            <option value="-1">Chọn địa điểm</option>
            <?php $this->widget('application.widgets.provinces'); ?>
        </select>
        <input name="ngay-dang" type="date"/>
        <input type="submit" value="Tìm kiếm"/>
    </form>
</div>