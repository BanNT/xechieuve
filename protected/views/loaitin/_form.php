<?php
/* @var $this LoaitinController */
/* @var $model Loaitin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loaitin-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ten_loai_tin'); ?>
		<?php echo $form->textField($model,'ten_loai_tin',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'ten_loai_tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gia_tien'); ?>
		<?php echo $form->textField($model,'gia_tien'); ?>
		<?php echo $form->error($model,'gia_tien'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->