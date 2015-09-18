<?php
/* @var $this LoaitinController */
/* @var $data Loaitin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_loai_tin')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ma_loai_tin), array('view', 'id'=>$data->ma_loai_tin)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ten_loai_tin')); ?>:</b>
	<?php echo CHtml::encode($data->ten_loai_tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gia_tien')); ?>:</b>
	<?php echo CHtml::encode($data->gia_tien); ?>
	<br />


</div>