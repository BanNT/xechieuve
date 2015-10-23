<?php $this->pageTitle = Yii::app()->name . ' - Đăng tin xe tìm khách'; ?>
<?php
if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>

<div id="dang-tin-xtk">
    <section id="dangtinrv">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'tinkhachhang-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div id="dang-tin-ktx">
            <div class="col-md-6">
                <label>Địa chỉ nơi xuất phát*</label>
                <?php
                echo $form->textField($xeTimKhach, 'dia_chi_di', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php echo $form->error($xeTimKhach, 'dia_chi_di'); ?>
            </div>

            <div class="col-md-6 pull-right">
                <label>Tỉnh/thành phố</label>
                <?php
                echo $form->dropDownList($tinKhachHang, 'tinh_thanh', Province::listProvinces(), array(
                    'class' => 'form-control'
                ));
                ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <?php echo $form->labelEx($xeTimKhach, 'dia_chi_den'); ?>
                <?php
                echo $form->textField($xeTimKhach, 'dia_chi_den', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php echo $form->error($xeTimKhach, 'dia_chi_den'); ?>
            </div>

            <div class="col-md-6">
                <?php echo $form->labelEx($xeTimKhach, 'noi_den_tinh'); ?>
                <?php
                echo $form->dropDownList($xeTimKhach, 'noi_den_tinh', Province::listProvinces(), array(
                    'class' => 'form-control'
                ));
                ?>
                <?php echo $form->error($xeTimKhach, 'noi_den_tinh'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <?php echo $form->labelEx($xeTimKhach, 'ma_loai_xe_ghep'); ?>
                <?php
                echo $form->dropDownList($xeTimKhach, 'ma_loai_xe_ghep', Loaixeghep::optionLoaiXeGhep(), array(
                    'class' => 'form-control'
                ));
                ?>
                <?php echo $form->error($xeTimKhach, 'ma_loai_xe_ghep'); ?>
            </div>

            <div class="col-md-6">
                <?php echo $form->labelEx($xeTimKhach, 'ngay_khoi_hanh'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'ngay_khoi_hanh',
                    'options' => array(
                        'showAnim' => 'slideDown', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                        'changeMonth' => true,
                        'changeYear' => true,
                        'minDate' => '2015-01-01', // minimum date
                        'dateFormat' => 'yy-mm-dd'
                    ),
                    'htmlOptions' => array(
                        'class' => 'form-control'
                    )
                ));
                ?>
                <?php echo $form->error($xeTimKhach, 'ngay_khoi_hanh'); ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <label>Tiêu đề tin *</label>
                <?php
                echo $form->textField($tinKhachHang, 'tieu_de_tin', array(
                    'class' => 'form-control'
                ));
                ?>
                <?php echo $form->error($tinKhachHang, 'tieu_de_tin'); ?>
            </div>
            <div class="col-md-12">
                <label>Thông tin thêm *</label>
                <?php
                echo $form->textArea($tinKhachHang, 'noi_dung_tin', array(
                    'rows' => 6,
                    'cols' => 50,
                    'id' => 'noi-dung-tin'
                ));
                ?>
                <?php echo $form->error($tinKhachHang, 'noi_dung_tin'); ?>
            </div>


            <div class="col-md-12 text-center">
                <?php
                echo CHtml::submitButton($tinKhachHang->isNewRecord ? 'Create' : 'Save', array(
                    'class' => 'btn btn-success',
                    'name' => 'submit',
                    'style' => 'margin-bottom:20px;margin-top:15px;'
                ));
                ?>
            </div>
            <?php $this->endWidget(); ?>
    </section>
    <div class="clearfix"></div>
    <?php
//echo "<pre>";
//var_dump($urlPaginatorXTK);
//echo "</pre>";die;

    $this->widget('application.widgets.xetimkhach', array(
        'xetimkhach' => $listTinXTK,
        'paginatorKhach' => $paginator,
        'urlPaginatorKhach' => $urlPaginatorXTK,
        'ajaxElementId' => $ajaxElementId
    ));
    ?>
</div>
<script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>        
<script type="text/javascript">
    CKEDITOR.replace('noi-dung-tin');
</script>