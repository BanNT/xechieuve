<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
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
                            <?php $this->widget('application.widgets.logo') ?>
                        </section><!--end logo-->
                        <section id="menu">
                            <?php $this->widget('application.widgets.menu') ?>
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
                                        <div class="col-md-12">
                                            <h6>Tìm kiếm khách</h6>
                                            <form action="" method="">
                                                <select>
                                                    <option>Chọn nơi đi</option>
                                                    <option value="-1"selected='selected'>Toàn quốc</option>
                                                    <option value="1">Hà Nội</option><option value="2">TP Hồ Chí Minh</option>
                                                    <option value="3">An Giang</option><option value="4">Bà Rịa - Vũng Tàu</option>
                                                    <option value="5">Bình Dương</option><option value="6">Bình Phước</option>
                                                    <option value="7"> Bình Thuận</option><option value="8">Bình Định</option>
                                                    <option value="9">Bạc Liêu</option><option value="10">Bắc Giang</option>
                                                    <option value="11">Bắc Kạn</option><option value="12">Bắc Ninh</option>
                                                    <option value="13">Bến Tre</option><option value="14">Cao Bằng</option>
                                                    <option value="15">Cà Mau</option><option value="16">Cần Thơ</option>
                                                    <option value="17">Điện Biên</option><option value="18">Đà Nẵng</option>
                                                    <option value="19">Đăk Lăk</option><option value="20">Đăk Nông</option>
                                                    <option value="21">Đồng Nai</option><option value="22">Đồng Tháp</option>
                                                    <option value="23">Gia Lai</option><option value="24">Hoà Bình</option>
                                                    <option value="25">Hà Giang</option><option value="26">Hà Nam</option>
                                                    <option value="27">Hà Tĩnh</option><option value="28">Hưng Yên</option>
                                                    <option value="29">Hải Dương</option><option value="30">Hải Phòng</option>
                                                    <option value="31">Hậu Giang</option><option value="32">Khánh Hòa</option>
                                                    <option value="33">Kiên Giang</option><option value="34">Kon Tum</option>
                                                    <option value="35">Lai Châu</option><option value="36">Long An</option>
                                                    <option value="37">Lào Cai</option><option value="38">Lâm Đồng</option>
                                                    <option value="39">Lạng Sơn</option><option value="40">Nam Định</option>
                                                    <option value="41">Nghệ An</option><option value="42">Ninh Bình</option>
                                                    <option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option>
                                                    <option value="45">Phú Yên</option><option value="46">Quảng Bình</option>
                                                    <option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option>
                                                    <option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option>
                                                    <option value="51">Sóc Trăng</option><option value="52">Sơn La</option>
                                                    <option value="53">Thanh Hóa</option><option value="54">Thái Bình</option>
                                                    <option value="55">Thái Nguyên</option><option value="56">Thừa Thiên - Huế</option>
                                                    <option value="57">Tiền Giang</option><option value="58">Trà Vinh</option>
                                                    <option value="59">Tuyên Quang</option><option value="60">Tây Ninh</option>
                                                    <option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option>
                                                    <option value="63">Yên Bái</option>
                                                </select>
                                                <select>
                                                    <option>Chọn nơi đến</option>
                                                    <option value="-1"selected='selected'>Toàn quốc</option>
                                                    <option value="1">Hà Nội</option><option value="2">TP Hồ Chí Minh</option>
                                                    <option value="3">An Giang</option><option value="4">Bà Rịa - Vũng Tàu</option>
                                                    <option value="5">Bình Dương</option><option value="6">Bình Phước</option>
                                                    <option value="7"> Bình Thuận</option><option value="8">Bình Định</option>
                                                    <option value="9">Bạc Liêu</option><option value="10">Bắc Giang</option>
                                                    <option value="11">Bắc Kạn</option><option value="12">Bắc Ninh</option>
                                                    <option value="13">Bến Tre</option><option value="14">Cao Bằng</option>
                                                    <option value="15">Cà Mau</option><option value="16">Cần Thơ</option>
                                                    <option value="17">Điện Biên</option><option value="18">Đà Nẵng</option>
                                                    <option value="19">Đăk Lăk</option><option value="20">Đăk Nông</option>
                                                    <option value="21">Đồng Nai</option><option value="22">Đồng Tháp</option>
                                                    <option value="23">Gia Lai</option><option value="24">Hoà Bình</option>
                                                    <option value="25">Hà Giang</option><option value="26">Hà Nam</option>
                                                    <option value="27">Hà Tĩnh</option><option value="28">Hưng Yên</option>
                                                    <option value="29">Hải Dương</option><option value="30">Hải Phòng</option>
                                                    <option value="31">Hậu Giang</option><option value="32">Khánh Hòa</option>
                                                    <option value="33">Kiên Giang</option><option value="34">Kon Tum</option>
                                                    <option value="35">Lai Châu</option><option value="36">Long An</option>
                                                    <option value="37">Lào Cai</option><option value="38">Lâm Đồng</option>
                                                    <option value="39">Lạng Sơn</option><option value="40">Nam Định</option>
                                                    <option value="41">Nghệ An</option><option value="42">Ninh Bình</option>
                                                    <option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option>
                                                    <option value="45">Phú Yên</option><option value="46">Quảng Bình</option>
                                                    <option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option>
                                                    <option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option>
                                                    <option value="51">Sóc Trăng</option><option value="52">Sơn La</option>
                                                    <option value="53">Thanh Hóa</option><option value="54">Thái Bình</option>
                                                    <option value="55">Thái Nguyên</option><option value="56">Thừa Thiên - Huế</option>
                                                    <option value="57">Tiền Giang</option><option value="58">Trà Vinh</option>
                                                    <option value="59">Tuyên Quang</option><option value="60">Tây Ninh</option>
                                                    <option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option>
                                                    <option value="63">Yên Bái</option>
                                                </select>
                                                <input type="date"/>
                                                <input type="submit" value="Tìm kiếm"/>
                                            </form>
                                        </div>
                                    </section><!--end search-->
                                    <section id="slide">
                                        <?php $this->widget('application.widgets.slide'); ?>
                                    </section><!--end slide-->
                                    <?php echo $content ?>
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