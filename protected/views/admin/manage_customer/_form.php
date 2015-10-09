<?php
/* @var $this Manage_customerController */
/* @var $model Khachhang */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'khachhang-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<div class="row">
    <div class="col-md-6">
        <?php echo $form->labelEx($model, 'ten_khach_hang'); ?>
        <?php
        echo $form->textField($model, 'ten_khach_hang', array(
            'class' => 'btn form-control',
            'size' => 60,
            'maxlength' => 80
        ));
        ?>
        <?php echo $form->error($model, 'ten_khach_hang'); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->labelEx($model, 'ten_dang_nhap'); ?>
        <?php
        echo $form->textField($model, 'ten_dang_nhap', array(
            'size' => 60,
            'maxlength' => 80,
            'class' => 'btn form-control'
        ));
        ?>
        <?php echo $form->error($model, 'ten_dang_nhap'); ?>
    </div>
    <div class="col-md-6">    
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php
        echo $form->passwordField($model, 'password', array(
            'size' => 40,
            'maxlength' => 40,
            'class' => 'btn form-control'
        ));
        ?>
    </div>
    <div class="col-md-6">    
        <?php echo $form->labelEx($model, 'confirmPassword'); ?>
        <?php
        echo $form->passwordField($model, 'confirmPassword', array(
            'size' => 40,
            'maxlength' => 40,
            'class' => 'btn form-control'
        ));
        ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    <div class="col-md-6">   
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php
        echo $form->textField($model, 'email', array(
            'size' => 60,
            'maxlength' => 80,
            'class' => 'btn form-control'
        ));
        ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="col-md-6">   
        <?php echo $form->labelEx($model, 'dia_chi'); ?>
        <?php
        echo $form->dropDownList($model, 'dia_chi', Province::listProvinces(), array(
            'class' => 'btn form-control'
        ));
        ?>
        <?php echo $form->error($model, 'dia_chi'); ?>
    </div>
    <div class="col-md-6">   
        <?php echo $form->labelEx($model, 'so_dien_thoai'); ?>
        <?php
        echo $form->textField($model, 'so_dien_thoai', array(
            'size' => 11,
            'maxlength' => 11,
            'class' => 'btn form-control'
        ));
        ?>
        <?php echo $form->error($model, 'so_dien_thoai'); ?>
    </div>
    <div class="col-md-6">   
        <?php echo $form->labelEx($model, 'so_du_tai_khoan'); ?>
        <?php
        echo $form->textField($model, 'so_du_tai_khoan', array(
            'class' => 'btn form-control'));
        ?>
        <?php echo $form->error($model, 'so_du_tai_khoan'); ?>
    </div>
    <div class="col-md-6">   
        <?php echo $form->labelEx($model, 'anh_dai_dien'); ?>
        <?php
        echo $form->textField($model, 'anh_dai_dien', array(
            'size' => 60,
            'maxlength' => 255,
            'class' => 'btn form-control'
        ));
        ?>
        <?php echo $form->error($model, 'anh_dai_dien'); ?>
    </div>
    <div class="col-md-12 text-center">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'class' => 'btn btn-success',
            'style'=>'margin-top:20px;'
        ));
        ?>
    </div>
<?php $this->endWidget(); ?>
</div>
