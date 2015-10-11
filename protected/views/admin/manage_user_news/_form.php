<?php
/* @var $this Manage_user_newsController */
/* @var $model Tinkhachhang */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'tinkhachhang-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php // echo $form->labelEx($model, 'ma_khach_hang'); ?>
<?php // echo $form->textField($model, 'ma_khach_hang'); ?>
<?php // echo $form->error($model, 'ma_khach_hang'); ?>
<div class="col-md-6">
    <?php echo $form->labelEx($model, 'nguoi_lien_lac'); ?>
    <?php
    echo $form->textField($model, 'nguoi_lien_lac', array(
        'size' => 60,
        'maxlength' => 80,
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($model, 'nguoi_lien_lac'); ?>
</div>
<div class="col-md-6  pull-right">
    <?php echo $form->labelEx($model, 'so_dien_thoai'); ?>
    <?php
    echo $form->textField($model, 'so_dien_thoai', array(
        'size' => 11,
        'maxlength' => 11,
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($model, 'so_dien_thoai'); ?>
</div>
<div class="col-md-6">
    <?php echo $form->labelEx($model, 'tieu_de_tin'); ?>
    <?php
    echo $form->textField($model, 'tieu_de_tin', array(
        'size' => 60,
        'maxlength' => 80,
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($model, 'tieu_de_tin'); ?>
</div>
<div class="col-md-6 pull-right">
    <?php echo $form->labelEx($model, 'tinh_thanh'); ?>
    <?php
    echo $form->dropDownList($model, 'tinh_thanh', Province::listProvinces(), array(
        'class' => 'form-control'
    ));
    ?>
</div>
<div class="col-md-12">
    <?php echo $form->labelEx($model, 'noi_dung_tin'); ?>
    <?php
    echo $form->textArea($model, 'noi_dung_tin', array(
        'rows' => 6,
        'cols' => 50,
        'id' => 'noi-dung-tin'
    ));
    ?>
    <?php echo $form->error($model, 'noi_dung_tin'); ?>
</div>

<div class="col-md-6 pull-right">
    <?php echo $form->labelEx($model, 'ma_loai_tin'); ?>
    <?php
    echo $form->textField($model, 'ma_loai_tin', array(
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($model, 'ma_loai_tin'); ?>
</div>
<div class="col-md-6">
    <?php echo $form->labelEx($model, 'trang_thai'); ?>
    <?php
    echo $form->textField($model, 'trang_thai', array(
        'class' => 'form-control'
    ));
    ?>
    <?php echo $form->error($model, 'trang_thai'); ?>
</div>
<div class="col-md-12 text-center">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>
<?php $this->endWidget(); ?>

<script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
<script type="text/javascript">
    CKEDITOR.replace('noi-dung-tin');
</script>