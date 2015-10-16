<?php
/* @var $this Manage_customerController */
/* @var $model Khachhang */
/* @var $form CActiveForm */
?>

<div class="wide form">
<?php
$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ma_khach_hang'); ?>
		<?php echo $form->textField($model,'ma_khach_hang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ten_khach_hang'); ?>
		<?php echo $form->textField($model,'ten_khach_hang',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ten_dang_nhap'); ?>
		<?php echo $form->textField($model,'ten_dang_nhap',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dia_chi'); ?>
		<?php echo $form->textField($model,'dia_chi',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'so_dien_thoai'); ?>
		<?php echo $form->textField($model,'so_dien_thoai',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'so_du_tai_khoan'); ?>
		<?php echo $form->textField($model,'so_du_tai_khoan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anh_dai_dien'); ?>
		<?php echo $form->textField($model,'anh_dai_dien',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->