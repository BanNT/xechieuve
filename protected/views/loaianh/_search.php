<?php
/* @var $this LoaianhController */
/* @var $model Loaianh */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ma_loai_anh'); ?>
		<?php echo $form->textField($model,'ma_loai_anh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ten_loai_anh'); ?>
		<?php echo $form->textField($model,'ten_loai_anh',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->