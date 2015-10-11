<?php
/* @var $this Manage_user_newsController */
/* @var $data Tinkhachhang */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_tin')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ma_tin), array('view', 'id'=>$data->ma_tin)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_khach_hang')); ?>:</b>
	<?php echo CHtml::encode($data->ma_khach_hang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nguoi_lien_lac')); ?>:</b>
	<?php echo CHtml::encode($data->nguoi_lien_lac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('so_dien_thoai')); ?>:</b>
	<?php echo CHtml::encode($data->so_dien_thoai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tieu_de_tin')); ?>:</b>
	<?php echo CHtml::encode($data->tieu_de_tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noi_dung_tin')); ?>:</b>
	<?php echo CHtml::encode($data->noi_dung_tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tinh_thanh')); ?>:</b>
	<?php echo CHtml::encode($data->tinh_thanh); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ngay_dang')); ?>:</b>
	<?php echo CHtml::encode($data->ngay_dang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_loai_tin')); ?>:</b>
	<?php echo CHtml::encode($data->ma_loai_tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trang_thai')); ?>:</b>
	<?php echo CHtml::encode($data->trang_thai); ?>
	<br />

	*/ ?>

</div>