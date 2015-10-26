<?php
/* @var $form CActiveForm */
$this->pageTitle = Yii::app()->name . ' - Đăng tin khách tìm xe';

if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'tinkhachhang-form',
    'enableAjaxValidation' => false,
));
?>
<header>
    <div class="pribox">ĐĂNG TIN</div>
</header>
<div class="box-dangtin">

    <table class="dangtin">
        <tr>
            <td colspan="4" id="error">

                <div>
                    <p><?php echo $form->error($khachTimXe, 'dia_chi_di'); ?></p>
                    <p><?php echo $form->error($khachTimXe, 'dia_chi_den'); ?> </p>
                    <p><?php echo $form->error($khachTimXe, 'ngay_khoi_hanh'); ?> </p>
                </div>

            </td>
        </tr>
        <tr>
            <td>
                <p class="la">Địa chỉ nơi xuất phát </p>
            </td>
            <td><?php
                echo $form->textField($khachTimXe, 'dia_chi_di', array(
                    'class' => 'form-control ma',
                ));
                ?>
            </td>
            <td>
                <p class="la">Tỉnh/thành phố</p>
            </td>
            <td> <?php
                echo $form->dropDownList($tinKhachHang, 'tinh_thanh', Province::listProvinces(), array(
                    'class' => 'form-control ma'
                ));
                ?></td>
        </tr>
        <tr>
            <td>
                <p class="la">Địa chỉ nơi đến </p>
            </td>
            <td><?php
                echo $form->textField($khachTimXe, 'dia_chi_den', array(
                    'class' => 'form-control ma'
                ));
                ?>
            </td>
            <td>
                <p class="la">Tỉnh/Thành phố</p>
            </td>
            <td><?php
                echo $form->dropDownList($khachTimXe, 'noi_den_tinh', Province::listProvinces(), array(
                    'class' => 'form-control ma'
                ));
                ?>
                <?php echo $form->error($khachTimXe, 'noi_den_tinh'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <p class="la">Loại xe ghép</p>
            </td>
            <td><?php
                echo $form->dropDownList($khachTimXe, 'ma_loai_xe_ghep', Loaixeghep::optionLoaiXeGhep(), array(
                    'class' => 'form-control ma'
                ));
                ?>
                <?php echo $form->error($khachTimXe, 'ma_loai_xe_ghep'); ?>
            </td>
            <td>
                <p class="la">Ngày khởi hành</p>
            </td>
            <td><?php
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
                        'class' => 'form-control ma'
                    )
                ));
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <p class="la">Tiêu đề tin</p>
            </td>
            <td colspan="3"><?php
                echo $form->textField($tinKhachHang, 'tieu_de_tin', array(
                    'class' => 'form-control ma'
                ));
                ?>
                <?php echo $form->error($tinKhachHang, 'tieu_de_tin'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <p class="la">Thông tin thêm</p>
            </td>
            <td colspan="3"><?php
                echo $form->textArea($tinKhachHang, 'noi_dung_tin', array(
                    'class' => 'form-control ma',
                    'id' => 'noi-dung-tin'
                ));
                ?>
                <?php echo $form->error($tinKhachHang, 'noi_dung_tin'); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3"><?php
                echo CHtml::submitButton($tinKhachHang->isNewRecord ? 'ĐĂNG' : 'Save', array(
                    'class' => 'but',
                    'name' => 'submit',
                    'style' => 'margin-bottom:20px;margin-top:15px;',
                ));
                ?></td>
        </tr>
    </table>
    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
    <?php
    $this->widget('application.widgets.khachtimxe', array(
        'khachtimxe' => $listTinKTX,
        'paginatorXe' => $paginator,
        'urlPaginatorXe' => $urlPaginatorKTX,
        'ajaxElementId' => $ajaxElementId
    ));
    ?>
</div>
<script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
<script type="text/javascript">
    CKEDITOR.replace('noi-dung-tin');
</script>

