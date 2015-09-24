

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'frmdangki',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ten_khach_hang'); echo "<h1>Hello</h1>" ?>
		<?php echo $form->textField($model,'ten_khach_hang'); ?>
		<?php echo $form->error($model,'ten_khach_hang'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

