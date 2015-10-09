 <?php
/* @var $this TintucController */
/* @var $model Tintuc */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model,'ma_tin'); ?>
        <?php echo $form->textField($model,'ma_tin'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'tieu_de'); ?>
        <?php echo $form->textField($model,'tieu_de',array('size'=>60,'maxlength'=>80)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'tom_tat'); ?>
        <?php echo $form->textField($model,'tom_tat',array('size'=>60,'maxlength'=>250)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'noi_dung'); ?>
        <?php echo $form->textArea($model,'noi_dung',array('rows'=>6, 'cols'=>50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'anh'); ?>
        <?php echo $form->textField($model,'anh',array('size'=>60,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'ngay_dang'); ?>
        <?php echo $form->textField($model,'ngay_dang'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'trang_thai'); ?>
        <?php echo $form->textField($model,'trang_thai'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'meta_keyword'); ?>
        <?php echo $form->textField($model,'meta_keyword',array('size'=>60,'maxlength'=>90)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'meta_Description'); ?>
        <?php echo $form->textField($model,'meta_Description',array('size'=>60,'maxlength'=>110)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form --> 