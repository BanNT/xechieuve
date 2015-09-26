<div class="col-md-12">
    <h6>Tìm kiếm khách</h6>
    <form action="<?php echo CHtml::encode(Yii::app()->request->baseUrl) . '/khach_tim_xe/tim_kiem_khach'; ?>" method="post">
        <select name="noi-di">
            <option value="-1">Chọn nơi đi</option>
            <?php $this->widget('application.widgets.provinces'); ?>
        </select>
        <select name="noi-den">
            <option value="-1">Chọn nơi đến</option>
            <?php $this->widget('application.widgets.provinces'); ?>
        </select>
        <input name="ngay-khoi-hanh" type="date"/>
        <input type="submit" value="Tìm kiếm"/>
    </form>
</div>