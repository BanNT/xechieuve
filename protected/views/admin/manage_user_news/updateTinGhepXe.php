<?php
/* @var $this Manage_user_newsController */
/* @var $tinKhachHang Tinkhachhang */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'tinkhachhang-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php // echo $form->labelEx($tinKhachHang, 'ma_khach_hang'); ?>
<?php // echo $form->textField($tinKhachHang, 'ma_khach_hang'); ?>
<?php // echo $form->error($tinKhachHang, 'ma_khach_hang'); ?>
<div class="col-md-6">
    <?php echo $form->labelEx($tinKhachHang, 'nguoi_lien_lac'); ?>
    <?php
    echo $form->textField($tinKhachHang, 'nguoi_lien_lac', array(
        'size' => 60,
        'maxlength' => 80,
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($tinKhachHang, 'nguoi_lien_lac'); ?>
</div>
<div class="col-md-6  pull-right">
    <?php echo $form->labelEx($tinKhachHang, 'so_dien_thoai'); ?>
    <?php
    echo $form->textField($tinKhachHang, 'so_dien_thoai', array(
        'size' => 11,
        'maxlength' => 11,
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($tinKhachHang, 'so_dien_thoai'); ?>
</div>
<div class="col-md-6">
    <?php echo $form->labelEx($tinKhachHang, 'tieu_de_tin'); ?>
    <?php
    echo $form->textField($tinKhachHang, 'tieu_de_tin', array(
        'size' => 60,
        'maxlength' => 80,
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($tinKhachHang, 'tieu_de_tin'); ?>
</div>
<div class="col-md-6 pull-right">
    <?php echo $form->labelEx($tinKhachHang, 'tinh_thanh'); ?>
    <?php
    echo $form->dropDownList($tinKhachHang, 'tinh_thanh', Province::listProvinces(), array(
        'class' => 'form-control'
    ));
    ?>
</div>
<div class="col-md-12">
    <?php echo $form->labelEx($tinKhachHang, 'noi_dung_tin'); ?>
    <?php
    echo $form->textArea($tinKhachHang, 'noi_dung_tin', array(
        'rows' => 6,
        'cols' => 50,
        'id' => 'noi-dung-tin'
    ));
    ?>
    <?php echo $form->error($tinKhachHang, 'noi_dung_tin'); ?>
</div>

<div class="col-md-6">
    <?php echo $form->labelEx($tinKhachHang, 'trang_thai'); ?>
    <?php
    echo $form->dropDownList($tinKhachHang, 'trang_thai', Tinghepxe::getStatusTinDang(), array(
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($tinKhachHang, 'trang_thai'); ?>
</div>

<div class="col-md-6">
    <?php echo $form->labelEx($tinGhepXe, 'dia_chi_di'); ?>
    <?php
    echo $form->textField($tinGhepXe, 'dia_chi_di', array(
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($tinGhepXe, 'dia_chi_di'); ?>
</div>

<div class="col-md-6">
    <?php echo $form->labelEx($tinGhepXe, 'dia_chi_den'); ?>
    <?php
    echo $form->textField($tinGhepXe, 'dia_chi_den', array(
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($tinGhepXe, 'dia_chi_den'); ?>
</div>

<div class="col-md-6">
    <?php echo $form->labelEx($tinGhepXe, 'noi_den_tinh'); ?>
    <?php
    echo $form->dropDownList($tinGhepXe, 'noi_den_tinh', Province::listProvinces(), array(
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($tinGhepXe, 'noi_den_tinh'); ?>
</div>

<div class="col-md-6">
    <?php echo $form->labelEx($tinGhepXe, 'ma_loai_xe_ghep'); ?>
    <?php
    echo $form->dropDownList($tinGhepXe, 'ma_loai_xe_ghep', Loaixeghep::optionLoaiXeGhep(), array(
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($tinGhepXe, 'ma_loai_xe_ghep'); ?>
</div>

<div class="col-md-6">
    <?php echo $form->labelEx($tinGhepXe, 'ngay_khoi_hanh'); ?>
    <?php
    echo $form->dateField($tinGhepXe, 'ngay_khoi_hanh', array(
        'class' => 'form-control'
    ));
    ?>
</div>
<div class="col-md-12 text-center">
    <?php
    echo CHtml::submitButton($tinKhachHang->isNewRecord ? 'Create' : 'Save', array(
        'class' => 'btn btn-success',
        'style' => 'margin-bottom:20px;'
    ));
    ?>
</div>
<?php $this->endWidget(); ?>
<a  style="margin-bottom: 20px;" href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-tin-dang-khach-hang">
    <span class="glyphicon glyphicon-arrow-left"></span> Quay lại trang quản lý tin đăng khách hàng
</a>
<script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
<script type="text/javascript">
    CKEDITOR.replace('noi-dung-tin');
</script>