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
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js"></script>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <header id="header"><!--BEGIN header-->
                            <div class="row">
                                <div id="logo" class="col-md-12">
                                    <h1>LOGO</h1>
                                </div>
                                <div id="menu" class="col-md-12">
                                    <ul class="list-unstyled text-center">
                                        <li class="selected"><a href="index.html">Trang chủ</a></li>
                                        <li><a href="xetimkhach.html">Xe tìm khách</a></li>
                                        <li><a href="khachtimxe.html">Khách tìm xe</a></li>
                                        <li><a href="">Tin tức</a></li>
                                        <li><a href="">Trợ giúp</a></li>
                                        <li><a href="">Rao vặt</a></li>
                                        <li><a href="">Liên hệ</a></li>
                                        <li><a href="">Đăng tin</a></li>
                                    </ul>
                                </div> 
                            </div>
                        </header><!--END header-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <aside id="coll-left">
                            <section id="filter">
                                <div class="row">
                                    <div class="col-md-12 headbox">
                                        <p class="headbox">Lọc theo loại xe</p>
                                    </div>
                                    <div class="col-md-12 box boxfilter">
                                        <ul class="list-unstyled" >
                                            <div class="row">
                                                <li><a href="">Xe tải Suzuki 12 tấn</a></li>
                                                <li><a href="">Xe rơ moóc</a></li>
                                                <li><a href="">Xe container</a></li>
                                                <li><a href="">Xe ba gác</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </section><!-- end filter-->
                            <section id="support">
                                <div class="row">
                                    <div class="col-md-12 headbox">
                                        <p class="headbox">Hỗ trợ trực tuyến</p>
                                    </div>
                                    <div class="col-md-12 box">
                                        <ul class="list-unstyled">
                                            <div class="row">
                                                <li><p>Hot line: <a href="">0936 212 856</a></p></li>
                                                <li><p>Yahoo: <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/yahoo.png" alt="skype" /></a></p></li>
                                                <li><p>Skype: <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/skype.png" alt="skype" /></a></p></li>
                                                <li><p>Email: <a href="">Contact@hatthaco683.vn</a></p></li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </section><!-- end support-->
                            <section id="partner">
                                <div class="row">
                                    <div class="col-md-12 headbox">
                                        <p class="headbox">Đối tác khách hàng</p>
                                    </div>
                                    <div class="col-md-12 box">
                                        <ul class="list-unstyled text-center">
                                            <div class="row">
                                                <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac1.png" alt="skype" /></a>
                                                <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac2.png" alt="skype" /></a>
                                                <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac3.png" alt="skype" /></a>
                                                <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac4.png" alt="skype" /></a>
                                                <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac5.png" alt="skype" /></a>    
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </section><!-- end partner-->
                        </aside><!--end col-left-->
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <section id="search">
                                <div class="col-md-12">
                                    <h6>Tìm kiếm khách</h6>
                                    <form action="" method="" name="frm" class="form-horizontal">
                                        <select>
                                            <option>Chọn nơi đi</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <select>
                                            <option>Chọn nơi đến</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                        <input type="date"/>
                                        <input type="submit" value="Tìm kiếm"/>
                                    </form>
                                </div>
                            </section><!--end search-->
                            <section id="slide">
                                <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slide.png" title="slide" />
                            </section><!--end slide-->
                            <section id="table-car">
                                <div class="pribox">Xe tìm khách</div>    
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="user">
                                        <thead>
                                            <tr style="color:#2C7BAC;" bgcolor="DAD9D9">
                                                <th width="195">Tiêu đề</th>
                                                <th width="77">Nơi đi</th>
                                                <th width="83">Nơi đến</th>
                                                <th width="84">Ngày đi</th>
                                                <th width="164">Liên hệ</th>
                                                <th width="79">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-justify">
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="paginator" style="padding-bottom: 30px;">
                                        <ul class="list-unstyled list-inline pull-right">
                                            <span>Trang</span>
                                            <li class="selected"><a href="">1</a></li>
                                            <li><a href="">2</a></li>
                                            <li><a href="">3</a></li>
                                            <li><a href="">4</a></li>
                                            <li><a href="">5</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--end table-car-->

                            <section id="table-customer">
                                <div class="pribox">Xe tìm khách</div>    
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="user">
                                        <thead>
                                            <tr style="color:#2C7BAC;" bgcolor="DAD9D9">
                                                <th width="195">Tiêu đề</th>
                                                <th width="77">Nơi đi</th>
                                                <th width="83">Nơi đến</th>
                                                <th width="84">Ngày đi</th>
                                                <th width="164">Liên hệ</th>
                                                <th width="79">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-justify">

                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                            <tr>
                                                <td>Xe khách Tân Việt- Thanh Hà- Hải Dương- Phú Thọ </td>
                                                <th>Cầu Giấy Hà Nội</th>
                                                <th>Thanh Hà Phú Thọ</th>
                                                <th>22/6/2015</th>
                                                <th>Mr. Lâm (0986.263.301)</th>
                                                <th>Đang chờ</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="paginator" style="padding-bottom: 30px;">
                                        <ul class="list-unstyled list-inline pull-right">
                                            <span>Trang</span>
                                            <li class="selected"><a href="">1</a></li>
                                            <li><a href="">2</a></li>
                                            <li><a href="">3</a></li>
                                            <li><a href="">4</a></li>
                                            <li><a href="">5</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </section><!--end table-customer-->
                        </div>
                    </div>
                </div>


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
                </section>
            </div><!--end wrapper-->
        </div>
    </body>
</html>