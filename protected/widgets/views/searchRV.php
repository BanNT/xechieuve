<div class="col-md-12">
    <h6>Tìm kiếm</h6>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <select name="ma-loai-tin-rv">
        <option value="-1">Loaị tin rao vặt</option>
        <?php $this->widget('application.widgets.kindRV'); ?>
    </select>
    <select name="dia-diem">
        <option value="-1">Chọn địa điểm</option>
        <?php $this->widget('application.widgets.provinces'); ?>
    </select>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'ngay-dang',
        'options' => array(
            'showAnim' => 'slideDown', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
            'changeMonth' => true,
            'changeYear' => true,
            'minDate' => '2015-01-01', // minimum date
            'dateFormat' => 'yy-mm-dd'
        ),
    ));
    ?>

    <?php
    echo CHtml::ajaxSubmitButton('Tìm kiếm',Yii::app()->request->baseUrl . '/rao_vat/tim_kiem', array(
        'update' => '#tableRV',
        'type' => 'POST',
    ));
    ?>
    <?php $this->endWidget(); ?>
</div>
