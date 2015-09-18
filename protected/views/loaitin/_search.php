<?php
/* @var $this LoaitinController */
/* @var $model Loaitin */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ma_loai_tin'); ?>
		<?php echo $form->textField($model,'ma_loai_tin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ten_loai_tin'); ?>
		<?php echo $form->textField($model,'ten_loai_tin',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gia_tien'); ?>
		<?php echo $form->textField($model,'gia_tien'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->