<?php
/* @var $this KhachhangController */
/* @var $data Khachhang */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_khach_hang')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ma_khach_hang), array('view', 'id'=>$data->ma_khach_hang)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ten_khach_hang')); ?>:</b>
	<?php echo CHtml::encode($data->ten_khach_hang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ten_dang_nhap')); ?>:</b>
	<?php echo CHtml::encode($data->ten_dang_nhap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('so_dien_thoai')); ?>:</b>
	<?php echo CHtml::encode($data->so_dien_thoai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('so_du_tai_khoan')); ?>:</b>
	<?php echo CHtml::encode($data->so_du_tai_khoan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('anh_dai_dien')); ?>:</b>
	<?php echo CHtml::encode($data->anh_dai_dien); ?>
	<br />

	*/ ?>

</div>