<?php
/* @var $this TinghepxeController */
/* @var $data Tinghepxe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_tin')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ma_tin), array('view', 'id'=>$data->ma_tin)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_khach_hang')); ?>:</b>
	<?php echo CHtml::encode($data->ma_khach_hang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noi_di_tinh')); ?>:</b>
	<?php echo CHtml::encode($data->noi_di_tinh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noi_di_huyen')); ?>:</b>
	<?php echo CHtml::encode($data->noi_di_huyen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noi_den_tinh')); ?>:</b>
	<?php echo CHtml::encode($data->noi_den_tinh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noi_den_huyen')); ?>:</b>
	<?php echo CHtml::encode($data->noi_den_huyen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lich_trinh')); ?>:</b>
	<?php echo CHtml::encode($data->lich_trinh); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ngay_khoi_hanh')); ?>:</b>
	<?php echo CHtml::encode($data->ngay_khoi_hanh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gio_khoi_hanh')); ?>:</b>
	<?php echo CHtml::encode($data->gio_khoi_hanh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('so_dien_thoai')); ?>:</b>
	<?php echo CHtml::encode($data->so_dien_thoai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nguoi_lien_lac')); ?>:</b>
	<?php echo CHtml::encode($data->nguoi_lien_lac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tieu_de_tin')); ?>:</b>
	<?php echo CHtml::encode($data->tieu_de_tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noi_dung')); ?>:</b>
	<?php echo CHtml::encode($data->noi_dung); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loai_xe')); ?>:</b>
	<?php echo CHtml::encode($data->loai_xe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ngay_dang')); ?>:</b>
	<?php echo CHtml::encode($data->ngay_dang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_loai_tin')); ?>:</b>
	<?php echo CHtml::encode($data->ma_loai_tin); ?>
	<br />

	*/ ?>

</div>