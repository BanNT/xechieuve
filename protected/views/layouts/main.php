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
        <div id="main">
            <header><!--BEGIN header-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>LOGO</h1>
                        </div>
                    </div>
                </div>
                <nav><!--BEGIN nav-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
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
                    </div> 
                </nav><!--END nav--> 
            </header><div class="clearfix"></div><!--END header-->

            <div id="content"><!--BEGIN #content-->     
                <div class="container">
                    <div class="row">
                        <aside><!--BEGIN aside-->
                            <div class="col-md-4">
                                <div class="nav"><!--BEGIN .nav-->
                                    <p class="headbox">Lọc theo loại xe</p>
                                    <ul class="list-unstyled">
                                        <li><a href="">Xe tải Suzuki 12 tấn</a></li>
                                        <li><a href="">Xe rơ moóc</a></li>
                                        <li><a href="">Xe container</a></li>
                                        <li><a href="">Xe ba gác</a></li>
                                    </ul>
                                </div><!--END .nav-->
                                <div class="nav support"><!--BEGIN .suport-->
                                    <p class="headbox">Hỗ trợ trực tuyến</p>
                                    <ul class="list-unstyled">
                                        <li>
                                            <p>Hot line: <a href="">0936 212 856</a></p>
                                        </li>
                                        <li>
                                            <p>Yahoo: <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/yahoo.png" alt="skype" /></a></p>
                                        </li>
                                        <li>
                                            <p>Skype: <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/skype.png" alt="skype" /></a></p>
                                        </li>
                                        <li>
                                            <p>Email: <a href="">Contact@hatthaco683.vn</a></p>
                                        </li>
                                    </ul>
                                </div><!--END .support-->
                                <div class="partner"><!--BEGIN .partner-->
                                    <p class="headbox">Đối tác khách hàng</p>
                                    <ul class="list-unstyled">
                                        <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac1.png" alt="skype" /></a></li>
                                        <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac2.png" alt="skype" /></a></li>
                                        <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac3.png" alt="skype" /></a></li>
                                        <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac4.png" alt="skype" /></a></li>
                                        <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac5.png" alt="skype" /></a></li>
                                        <li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/doitac5.png" alt="skype" /></a></li>
                                        
                                    </ul>
                                </div><!--END .partner-->  
                            </div>
                        </aside><!--END aside-->

                        <section><!--BEGIN section-->
                            <div class="col-md-8">
                                <div class="row search">
                                    <div class="pull-left r1">
                                        <h6>Tìm Kiếm Khách</h6>
                                    </div>
                                    <div class="pull-right r2">
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
                                            <button type="button" class="btn">Tìm kiếm</button>
                                        </form>
                                    </div>
                                </div><!--END .search--> 
                            </div>
                            <div class="clearfix"></div>
                            <!--BEGIN silde-->
                            <div class="col-lg-8 slide"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/silde.png" title="slide" /></div><!--END silde-->
                            <div class="clearfix"></div>
                            <div class="pribox"><p>Xe tìm khách</p></div>
                            <table class="table table-striped">
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
                                <tbody  align="justify">
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
                            <div class="col-lg-8 boxpage">
                                <ul class="page">
                                    <li class="selected"><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">4</a></li>
                                    <li><a href="">5</a></li>
                                </ul>
                                <span>Trang</span>
                            </div>
                            <div class="clearfix" style="margin-bottom:10px;"></div>
                            <div class="pribox"><p>Khách tìm xe</p></div>
                            <table class="table table-striped">
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
                                <tbody  align="justify">
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
                            <div class="col-lg-8 boxpage">
                                <ul class="page">
                                    <li class="selected"><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">4</a></li>
                                    <li><a href="">5</a></li>
                                </ul>
                                <span>Trang</span>
                            </div>
                        </section><!--END section-->
                    </div>
                </div>
            </div><div class="clearfix"></div><!--END #content-->

            <footer><!--BEGIN footer-->
                <div class="container">
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
                        <div class="col-md-4 box">
                            <h6>Liên hệ phòng kinh doanh: Mr. Khiếu Sơn</h6>
                            <p><a href="">ĐT: 046. 4846 843 (Ext:101), DĐ: 098 334 4860</a></p>
                            <p><a href="">Email: sale1@xechieuve.vn</a></p>
                            <h6>Liên hệ phòng kinh doanh: Mr. Khiếu Sơn</h6>
                            <p><a href="">ĐT: 046. 4846 843 (Ext:101), DĐ: 098 334 4860</a></p>
                            <p><a href="">Email: sale1@xechieuve.vn</a></p>
                        </div>
                    </div>
                </div>
            </footer><!--END footer-->
        </div>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    </body>
</html>