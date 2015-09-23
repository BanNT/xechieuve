<?php
/* @var $this KhachhangController */
/* @var $model Khachhang */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'khachhang-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ten_khach_hang'); ?>
		<?php echo $form->textField($model,'ten_khach_hang',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'ten_khach_hang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ten_dang_nhap'); ?>
		<?php echo $form->textField($model,'ten_dang_nhap',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'ten_dang_nhap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'so_dien_thoai'); ?>
		<?php echo $form->textField($model,'so_dien_thoai',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'so_dien_thoai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'so_du_tai_khoan'); ?>
		<?php echo $form->textField($model,'so_du_tai_khoan'); ?>
		<?php echo $form->error($model,'so_du_tai_khoan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anh_dai_dien'); ?>
		<?php echo $form->textField($model,'anh_dai_dien',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'anh_dai_dien'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->