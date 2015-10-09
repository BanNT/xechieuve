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
		<?php echo $form->label($model,'loai_tin'); ?>
		<?php echo $form->textField($model,'loai_tin',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gia_dang'); ?>
		<?php echo $form->textField($model,'gia_dang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->