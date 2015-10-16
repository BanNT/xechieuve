<?php
/* @var $this TintucController */
/* @var $model Tintuc */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tintuc-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Không được để trống ô có dấu <span class="required">*</span></p>

   
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'tieu_de'); ?>
            <?php
            echo $form->textField($model, 'tieu_de', array(
                'size' => 60,
                'maxlength' => 80,
                'class' => ' form-control',));
            ?>
            <?php echo $form->error($model, 'tieu_de'); ?>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'tom_tat'); ?>
            <?php
            echo $form->textField($model, 'tom_tat', array(
                'size' => 60,
                'maxlength' => 250,
                'class' => ' form-control',
            ));
            ?>
            <?php echo $form->error($model, 'tom_tat'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'anh'); ?>
            <?php
            echo $form->fileField($model, 'anh', array(
                'size' => 60,
                'maxlength' => 255,
                ));
            ?>
            <?php echo $form->error($model, 'anh'); ?>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'ngay_dang'); ?>
            <?php
            echo $form->dateField($model, 'ngay_dang', array(
                'size' => 60,
                'maxlength' => 255,
                'class' => ' form-control',));
            ?>
            <?php echo $form->error($model, 'ngay_dang'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <?php echo $form->labelEx($model, 'trang_thai'); ?>
            <?php
            echo $form->dropDownList($model, 'trang_thai', Tintuc::trangthai(), array(
                'class' => ' form-control',
            ));
            ?>
            <?php echo $form->error($model, 'trang_thai'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php echo $form->labelEx($model, 'noi_dung'); ?>
            <?php
            echo $form->textArea($model, 'noi_dung', array(
                'rows' => 6,
                'cols' => 50,
                'id' => 'noi_dung',
                'class' => ' form-control',
            ))
            ;
            ?>
            <?php echo $form->error($model, 'noi_dung'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php echo $form->labelEx($model, 'meta_keyword'); ?>
            <?php
            echo $form->textField($model, 'meta_keyword', array(
                'size' => 60,
                'maxlength' => 90,
                'class' => ' form-control'));
            ?>
            <?php echo $form->error($model, 'meta_keyword'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php echo $form->labelEx($model, 'meta_Description'); ?>
            <?php
            echo $form->textField($model, 'meta_Description', array(
                'size' => 60,
                'maxlength' => 110,
                'class' => ' form-control'));
            ?>
            <?php echo $form->error($model, 'meta_Description'); ?>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'class' => 'btn btn-success',
            'style'=>'margin-top:20px;'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->