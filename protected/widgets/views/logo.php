<div class="col-md-12">
    <div class="logo" >
        <div class="anh_logo" style="float: left">
    <img style="height: 135px; margin-left: -16px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/eximbank_logo.jpg" />
        </div>
    <div id="dang">
        <?php if(Yii::app()->user->isGuest){?>
        <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang_nhap" style="border-right:1px solid #fff;padding-right: 2px;">Đăng nhập</a>
        <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang-ky">Đăng Ký</a>
            <?php } else{ ?>
            <a href="" style="border-right:1px solid #fff;padding-right: 2px;"><?php echo"hi,". CHtml::encode(Yii::app()->user->name);?></a>
        <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dangxuat">Đăng xuất</a>
        <?php } ?>
    </div>
    <div>
</div>
