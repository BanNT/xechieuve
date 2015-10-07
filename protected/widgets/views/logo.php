<div class="col-md-12">
    <div class="logo" >
        <div class="anh_logo" style="float: left">
    <img style="height: 135px; margin-left: -16px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/eximbank_logo.jpg" />
        </div>
    <div id="dang">
        <?php if(Yii::app()->user->isGuest){?>
        <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang-nhap" style="border-right:1px solid #fff;padding-right: 2px;">Đăng nhập</a>
        <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang-ky">Đăng Ký</a>
            <?php } else{ ?>
        <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/sua-thong-tin-khach" style="border-right:1px solid #fff;padding-right: 2px;"><?php echo ucfirst(CHtml::encode(Yii::app()->user->name));?></a>
        <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang-xuat">Đăng xuất</a>
        <?php } ?>
    </div>
    <div>
</div>
