<?php
/* @var $this TinraovatController */
/* @var $model Tinraovat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinraovat-dangtin-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ma_tin'); ?>
		<?php echo $form->textField($model,'ma_tin'); ?>
		<?php echo $form->error($model,'ma_tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ma_loai_tin_rv'); ?>
		<?php echo $form->textField($model,'ma_loai_tin_rv'); ?>
		<?php echo $form->error($model,'ma_loai_tin_rv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'anh'); ?>
		<?php echo $form->textField($model,'anh'); ?>
		<?php echo $form->error($model,'anh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gia_rao_vat'); ?>
		<?php echo $form->textField($model,'gia_rao_vat'); ?>
		<?php echo $form->error($model,'gia_rao_vat'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->