<?php
/* @var $this Manage_car_typeController */
/* @var $model Loaixeghep */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ma_loai_xe_ghep'); ?>
		<?php echo $form->textField($model,'ma_loai_xe_ghep'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loai_xe_ghep'); ?>
		<?php echo $form->textField($model,'loai_xe_ghep',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->