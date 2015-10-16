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
        <?php echo $form->labelEx($model, 'loai_tin'); ?>
        <?php
        echo $form->textField($model, 'loai_tin', array(
            'class' => 'btn form-control',
            'size' => 60,
            'maxlength' => 80
        ));
        ?>
        <?php echo $form->error($model, 'loai_tin'); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->labelEx($model, 'gia_dang'); ?>
        <?php
        echo $form->textField($model, 'gia_dang', array(
            'size' => 60,
            'maxlength' => 80,
            'class' => 'btn form-control'
        ));
        ?>
        <?php echo $form->error($model, 'gia_dang'); ?>
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
