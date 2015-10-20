<div class="col-md-12">
    <div class="logo" >
        <div class="anh_logo" style="float: left">
            <img style="height: 135px; margin-left: -16px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/eximbank_logo.jpg" />
        </div>
        <div id="dang" class="pull-right">
            <?php if (Yii::app()->user->isGuest): ?>
                <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang-nhap" style="border-right:1px solid #fff;padding-right: 2px;">Đăng nhập</a>
                <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang-ky">Đăng Ký</a>
            <?php else: ?>
                <div class="dropdown" style="position:relative">
                    <a href="#" class="btn btn-block dropdown-toggle" data-toggle="dropdown"><?php echo ucfirst(CHtml::encode(Yii::app()->user->name)); echo "_".CHtml::encode(Yii::app()->user->userId);  ?>&nbsp;<span class="glyphicon glyphicon-cog"></span></a>
                    <ul class="dropdown-menu" style="padding: 0">
                            <li><a style="color: #000" href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/sua-thong-tin-khach">Thông tin cá nhân</a></li>
                                <li>
                                        <a style="color: #000" class="trigger right-caret">Tin đã đăng</a>
                                        <ul style="padding: 0" class="dropdown-menu sub-menu">
                                            <li>
                                                <a style="color: #000" href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/tin-da-dang/tin-xe-tim-khach/"<?php echo Tinghepxe::CODE_KTX?>">
                                                    Tin khách tìm xe
                                                </a>
                                            </li>
                                                <li>
                                                    <a style="color: #000" href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/tin-da-dang/tin-xe-tim-khach/"<?php echo Tinghepxe::CODE_XTK?>>
                                                        Tin xe tìm khách
                                                    </a>
                                                </li>
                                                <li>
                                                    <a style="color: #000" href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/tin-da-dang/tin-rao-vat/"<?php echo Tinraovat::CODE_RV?>">
                                                        Tin rao vặt
                                                    </a>
                                                </li>
                                        </ul>
                                </li>
                                <li><a style="color: #000" href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang-xuat"">Đăng xuất</a></li>
                        </ul>
                </div>
                <style type="text/css">
                    .dropdown-menu>li
{	position:relative;
	-webkit-user-select: none; /* Chrome/Safari */        
	-moz-user-select: none; /* Firefox */
	-ms-user-select: none; /* IE10+ */
	/* Rules below not implemented in browsers yet */
	-o-user-select: none;
	user-select: none;
	cursor:pointer;
        background: #e0e2e5;
}
.dropdown-menu .sub-menu {
    left: 100%;
    position: absolute;
    top: 0;
    display:none;
    margin-top: -1px;
	border-top-left-radius:0;
	border-bottom-left-radius:0;
	border-left-color:#fff;
	box-shadow:none;
}
.right-caret:after,.left-caret:after
 {	content:"";
    border-bottom: 5px solid transparent;
    border-top: 5px solid transparent;
    display: inline-block;
    height: 0;
    vertical-align: middle;
    width: 0;
	margin-left:5px;
}
.right-caret:after
{	border-left: 5px solid #ffaf46;
}
.left-caret:after
{	border-right: 5px solid #ffaf46;
}
                </style>
            <?php endif; ?>
        </div>
    </div>
</div>

