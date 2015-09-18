<?php
/* @var $this TinghepxeController */
/* @var $model Tinghepxe */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tinghepxe-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ma_khach_hang'); ?>
		<?php echo $form->textField($model,'ma_khach_hang'); ?>
		<?php echo $form->error($model,'ma_khach_hang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'noi_di_tinh'); ?>
		<?php echo $form->textField($model,'noi_di_tinh',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'noi_di_tinh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'noi_di_huyen'); ?>
		<?php echo $form->textField($model,'noi_di_huyen',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'noi_di_huyen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'noi_den_tinh'); ?>
		<?php echo $form->textField($model,'noi_den_tinh',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'noi_den_tinh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'noi_den_huyen'); ?>
		<?php echo $form->textField($model,'noi_den_huyen',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'noi_den_huyen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lich_trinh'); ?>
		<?php echo $form->textField($model,'lich_trinh',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'lich_trinh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ngay_khoi_hanh'); ?>
		<?php echo $form->textField($model,'ngay_khoi_hanh'); ?>
		<?php echo $form->error($model,'ngay_khoi_hanh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gio_khoi_hanh'); ?>
		<?php echo $form->textField($model,'gio_khoi_hanh',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'gio_khoi_hanh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'so_dien_thoai'); ?>
		<?php echo $form->textField($model,'so_dien_thoai',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'so_dien_thoai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nguoi_lien_lac'); ?>
		<?php echo $form->textField($model,'nguoi_lien_lac',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'nguoi_lien_lac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tieu_de_tin'); ?>
		<?php echo $form->textField($model,'tieu_de_tin',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tieu_de_tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'noi_dung'); ?>
		<?php echo $form->textArea($model,'noi_dung',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'noi_dung'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loai_xe'); ?>
		<?php echo $form->textField($model,'loai_xe',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'loai_xe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ngay_dang'); ?>
		<?php echo $form->textField($model,'ngay_dang'); ?>
		<?php echo $form->error($model,'ngay_dang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ma_loai_tin'); ?>
		<?php echo $form->textField($model,'ma_loai_tin'); ?>
		<?php echo $form->error($model,'ma_loai_tin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->