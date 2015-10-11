<?php
/* @var $this TintucController */
/* @var $data Tintuc */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_tin')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ma_tin), array('view', 'id'=>$data->ma_tin)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tieu_de')); ?>:</b>
	<?php echo CHtml::encode($data->tieu_de); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tom_tat')); ?>:</b>
	<?php echo CHtml::encode($data->tom_tat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noi_dung')); ?>:</b>
	<?php echo CHtml::encode($data->noi_dung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anh')); ?>:</b>
	<?php echo CHtml::encode($data->anh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ngay_dang')); ?>:</b>
	<?php echo CHtml::encode($data->ngay_dang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trang_thai')); ?>:</b>
	<?php echo CHtml::encode($data->trang_thai); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keyword')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keyword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_Description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_Description); ?>
	<br />

	*/ ?>

</div>