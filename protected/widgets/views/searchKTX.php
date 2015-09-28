<div class="col-md-12">
    <h6>Tìm kiếm khách</h6>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <select name="noi-di">
        <option value="-1">Chọn nơi đi</option>
        <?php $this->widget('application.widgets.provinces'); ?>
    </select>
    <select name="noi-den">
        <option value="-1">Chọn nơi đến</option>
        <?php $this->widget('application.widgets.provinces'); ?>
    </select>
    <input name="ngay-khoi-hanh" type="date"/>

    <?php
    echo CHtml::ajaxSubmitButton('Tìm kiếm', Yii::app()->request->baseUrl . '/khach_tim_xe/tim_kiem_khach', array(
        'update' => '#tableKTX',
        'type' => 'POST',
    ));
    ?>
    <?php $this->endWidget(); ?>
</div>
