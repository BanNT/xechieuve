<?php $this->pageTitle = Yii::app()->name . ' - Đăng tin'; ?>
<section id="dang-tin">
    <div class="col-md-12">
        <div class="row">
            <hr/>
            <div class="col-sm-6 col-md-4">
                <img class="img-responsive" alt="Đăng tin khách tìm xe" title="Đăng tin khách tìm xe" src="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/images/khach-tim-xe.jpg" alt="Đăng tin khách tìm xe" />
            </div>
            <div class="col-sm-5 col-md-7">
                <h2 class="h3">Bạn là hành khách cần tìm xe?</h2>
                <a title="Đăng tin khách tìm xe" href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/khach-tim-xe/dang-tin" class="text-primary ">
                    Nhấn vào đây để đăng tin tìm xe >>
                </a>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="col-sm-6 col-md-4">
                <img class="img-responsive" alt="Đăng tin xe tìm khách" title="Đăng tin xe tìm khách" src="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/images/xe-tim-khach.jpg" alt="Đăng tin xe tìm khách" />
            </div>
            <div class="col-sm-5 col-md-7">
                <h2 class="h3">Bạn là lái xe bạn muốn nhanh chóng tìm khách?</h2>
                <a title="Đă tin xe tìm khách" href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/xe-tim-khach/dang-tin" class="text-primary">
                    Nhấn vào đây để đăng tin tìm khách >>
                </a>
            </div>
            <div class="clearfix"></div>
            <hr/>
            <div class="col-sm-6 col-md-4">
                <img class="img-responsive" alt="Đăng tin rao vặt" title="Đăng tin rao vặt" src="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/images/rao-vat.jpg" alt="Đăng tin rao vat" />
            </div>
            <div class="col-sm-5 col-md-7">
                <h2 class="h3">Bạn muốn nhanh chóng mua, bán,...?</h2>
                <a title="Đăng tin rao vặt" href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/rao-vat/dang-tin" class="text-primary">
                    Nhấn vào đây để đăng tin rao vặt >>
                </a>
            </div>
            <div class="clearfix"></div>
            <hr/>
        </div>
    </div>
</section>