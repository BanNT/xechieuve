<?php
/* @var $this Manage_administratorController */
/* @var $model Quantrivien */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ma_qtv'); ?>
		<?php echo $form->textField($model,'ma_qtv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ten_qtv'); ?>
		<?php echo $form->textField($model,'ten_qtv',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>80)); ?>
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