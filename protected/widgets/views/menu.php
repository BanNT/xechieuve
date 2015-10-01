<?php
$controller = $this->controller;
$sl = 'class="selected"';
?>
<div class="col-md-12">
    <ul class="list-unstyled text-center">
        <li <?php echo ($controller == 'site') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>">Trang chủ</a></li>
        <li <?php echo ($controller == 'xe-tim-khach') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/xe-tim-khach">Xe tìm khách</a></li>
        <li <?php echo ($controller == 'khach-tim-xe') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/khach-tim-xe">Khách tìm xe</a></li>
        <li <?php echo ($controller == 'tin-tuc') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/tin-tuc">Tin tức</a></li>
        <li <?php echo ($controller == 'tro-giup') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/tro-giup">Trợ giúp</a></li>
        <li <?php echo ($controller == 'rao-vat') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/rao-vat">Rao vặt</a></li>
        <li <?php echo ($controller == 'lien-he') ? $sl : ''; ?>><a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/lien-he">Liên hệ</a></li>
        <li <?php echo ($controller == 'dang-tin') ? $sl : ''; ?>><a href="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $this->urlDangTin ?>">Đăng tin</a></li>
    </ul>
</div>