<?php
/* @var $this LoaianhController */
/* @var $data Loaianh */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ma_loai_anh')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ma_loai_anh), array('view', 'id'=>$data->ma_loai_anh)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ten_loai_anh')); ?>:</b>
	<?php echo CHtml::encode($data->ten_loai_anh); ?>
	<br />


</div>