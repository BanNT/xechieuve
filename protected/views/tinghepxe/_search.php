<?php
/* @var $this TinghepxeController */
/* @var $model Tinghepxe */
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
		<?php echo $form->label($model,'ma_khach_hang'); ?>
		<?php echo $form->textField($model,'ma_khach_hang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noi_di_tinh'); ?>
		<?php echo $form->textField($model,'noi_di_tinh',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noi_di_huyen'); ?>
		<?php echo $form->textField($model,'noi_di_huyen',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noi_den_tinh'); ?>
		<?php echo $form->textField($model,'noi_den_tinh',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noi_den_huyen'); ?>
		<?php echo $form->textField($model,'noi_den_huyen',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lich_trinh'); ?>
		<?php echo $form->textField($model,'lich_trinh',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ngay_khoi_hanh'); ?>
		<?php echo $form->textField($model,'ngay_khoi_hanh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gio_khoi_hanh'); ?>
		<?php echo $form->textField($model,'gio_khoi_hanh',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'so_dien_thoai'); ?>
		<?php echo $form->textField($model,'so_dien_thoai',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nguoi_lien_lac'); ?>
		<?php echo $form->textField($model,'nguoi_lien_lac',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tieu_de_tin'); ?>
		<?php echo $form->textField($model,'tieu_de_tin',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noi_dung'); ?>
		<?php echo $form->textArea($model,'noi_dung',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loai_xe'); ?>
		<?php echo $form->textField($model,'loai_xe',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ngay_dang'); ?>
		<?php echo $form->textField($model,'ngay_dang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ma_loai_tin'); ?>
		<?php echo $form->textField($model,'ma_loai_tin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->