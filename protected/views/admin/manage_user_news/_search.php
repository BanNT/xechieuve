<?php
/* @var $this Manage_user_newsController */
/* @var $model Tinkhachhang */
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
		<?php echo $form->label($model,'nguoi_lien_lac'); ?>
		<?php echo $form->textField($model,'nguoi_lien_lac',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'so_dien_thoai'); ?>
		<?php echo $form->textField($model,'so_dien_thoai',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tieu_de_tin'); ?>
		<?php echo $form->textField($model,'tieu_de_tin',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noi_dung_tin'); ?>
		<?php echo $form->textArea($model,'noi_dung_tin',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tinh_thanh'); ?>
		<?php echo $form->textField($model,'tinh_thanh',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ngay_dang'); ?>
		<?php echo $form->textField($model,'ngay_dang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ma_loai_tin'); ?>
		<?php echo $form->textField($model,'ma_loai_tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trang_thai'); ?>
		<?php echo $form->textField($model,'trang_thai'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->