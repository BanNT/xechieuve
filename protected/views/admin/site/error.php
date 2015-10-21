<?php
/* @var $this SiteController */
/* @var $error array */
$this->pageTitle = Yii::app()->name . ' - Error';
?>



<div class="error">
    <?php if ($message == 'You are not authorized to perform this action.'): ?>
        <h2>Bạn không có quyền truy cập vào chức năng này</h2>
    <?php else: ?>
        <h2>Error <?php echo $code; ?></h2>
        <?php echo CHtml::encode($message); ?>
    <?php endif; ?>
</div>