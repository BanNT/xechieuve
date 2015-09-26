<?php
$controller = $this->controller;
$sl = 'class="selected"';
?>
<div class="col-md-12">
    <ul class="list-unstyled text-center">
        <li <?php echo ($controller == 'site') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>">Trang chủ</a></li>
        <li <?php echo ($controller == 'xe_tim_khach') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/xe_tim_khach">Xe tìm khách</a></li>
        <li <?php echo ($controller == 'khach_tim_xe') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/khach_tim_xe">Khách tìm xe</a></li>
        <li <?php echo ($controller == 'tin_tuc') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/tin_tuc">Tin tức</a></li>
        <li <?php echo ($controller == 'tro_giup') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/tro_giup">Trợ giúp</a></li>
        <li <?php echo ($controller == 'rao_vat') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/rao_vat">Rao vặt</a></li>
        <li <?php echo ($controller == 'lien_he') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/lien_he">Liên hệ</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->urlDangTin ?>">Đăng tin</a></li>
    </ul>
</div>