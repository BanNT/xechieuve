<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="index, follow" name="ROBOTS" />
        <meta http-equiv="Content-Language" content="vi" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="vi_VN" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js"></script>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="wrapper">
                <header id="header">
                    <div class="row">
                        <section id="logo">
                            <?php $this->widget('application.widgets.logo'); ?>
                        </section><!--end logo-->
                        <section id="menu">
                            <?php $this->widget('application.widgets.menu'); ?>
                        </section><!--end menu-->
                    </div>
                </header><!--end header-->

                <section id="content">
                    <div class="row">
                        <aside id="coll-left">
                            <div class="col-md-3">
                                <!--filter-->
                                <section id="filter">
                                    <?php $this->widget('application.widgets.filter'); ?>
                                </section><!--end filter-->
                                <section id="support">
                                    <?php $this->widget('application.widgets.support'); ?>
                                </section><!--end support-->
                                <section id="partner">
                                    <?php $this->widget('application.widgets.partner'); ?>
                                </section><!--end partner-->
                            </div>
                        </aside><!--end col-left-->
                        <section id="coll-right">
                            <div class="col-md-9">
                                <div class="row">
                                    <section id="search">
                                         <?php $this->widget('application.widgets.searchSelect'); ?>
                                    </section><!--end search-->
                                    <section id="main-content">
                                        <section id="slide">
                                            <?php $this->widget('application.widgets.slide'); ?>
                                        </section><!--end slide-->

                                        <?php echo $content ?>
                                    </section><!--end main-content-->
                                </div>
                            </div>
                        </section><!--end coll-right-->
                    </div>
                </section><!--end content-->
                <section id="footer">
                    <div class="row">
                        <div class="col-md-4 box">
                            <h5>Công ty TNHH dịch vụ xe chiều về</h5>
                            <p><a href="">Địa chỉ: Bán đảo Linh Đàm</a></p>
                            <p><a href="">Email: contact@xechieuve.vn</a></p>
                            <p><a href="">Điện thoại: 0983.419.983</a></p>
                            <p><a href="">Fax: 04.63.289.319</a></p>
                        </div>
                        <div class="col-md-4 box">
                            <h6>Liên hệ phòng kinh doanh: Mr. Khiếu Sơn</h6>
                            <p><a href="">ĐT: 046. 4846 843 (Ext:101), DĐ: 098 334 4860</a></p>
                            <p><a href="">Email: sale1@xechieuve.vn</a></p>
                            <h6>Liên hệ phòng kinh doanh: Mr. Khiếu Sơn</h6>
                            <p><a href="">ĐT: 046. 4846 843 (Ext:101), DĐ: 098 334 4860</a></p>
                            <p><a href="">Email: sale1@xechieuve.vn</a></p>
                        </div>
                        <div class=" col-md-4 box">
                            <h6>Liên hệ phòng kinh doanh: Mr. Khiếu Sơn</h6>
                            <p><a href="">ĐT: 046. 4846 843 (Ext:101), DĐ: 098 334 4860</a></p>
                            <p><a href="">Email: sale1@xechieuve.vn</a></p>
                            <h6>Liên hệ phòng kinh doanh: Mr. Khiếu Sơn</h6>
                            <p><a href="">ĐT: 046. 4846 843 (Ext:101), DĐ: 098 334 4860</a></p>
                            <p><a href="">Email: sale1@xechieuve.vn</a></p>
                        </div>
                    </div>
                </section><!--end footer-->
            </div><!--end wrapper-->
        </div>
    </body>
</html>