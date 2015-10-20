<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/2ae33caf/jquery.js"></script>
        <!-- Bootstrap -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js"></script>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
        <![endif]-->
        <style>
            body{
                margin-top: 54px;
            }

            .sep{
                /*position: fixed;*/
                bottom: 74px;
                z-index:100000 !important;
                height:3px;
                width:100%;
                background:#FFF;
                box-shadow: 0 0 10px #000;
            }

            .septop{
                clear:both;
                z-index:10000 !important;
                position:fixed;
                top:51px;
                left:0;
                height:3px;
                width:100%;
                background:#FFF;
                box-shadow: 0 0 10px #000;
            }

            #col-left-adm{
                box-shadow: 0px 0px 7px #000;
            }

            #col-left-adm{
                padding-left: 25px;
                color:red;
            }

            #col-left-adm  a{
                display: block;
                padding-top: 25px;
                color:#ccc;
            }

            #col-left-adm  a:hover{
                color:#fff;
            }

            .pager{
                margin-top: -10px !important; 
            }
            .pager .next a{
                margin-top: 3px !important;
                margin-left: 8px;
            }
            .summary{
                /*display: none;*/
            }
            #footer{
                /*position: fixed;*/
                bottom: 0px;
                right:0;
                background: #111;
                height: 55px; 
                color: #0CC;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <header>
                        <nav class="navbar navbar-inverse navbar-fixed-top">
                            <span class="pull-right" style="display: block;line-height: 50px;margin-right:10px;"><a>Xin chào Trần Văn Hoàng |</a><a>Log out</a></span>
                        </nav>
                    </header>
                </div>
                <div class="septop"></div>
                <div class="clearfix"></div>

                <div class="col-md-3" id="col-left-adm" style="background: #444;height: 100%;">
                    <ul>
                        <a href="<?php echo Yii::app()->baseUrl; ?>/admin.php"><span class="h3"><span class='glyphicon glyphicon-globe'></span> Danh mục quản lý:</span></a>
                        <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-khach-hang">Quản lý khách hàng</a></li>
                        <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-quan-tri-vien">Quản lý quản trị viên</a></li>
                        <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-tin-dang-khach-hang">Quản lý tin đăng khách hàng</a></li>
                        <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-tin-tuc">Quản lý tin tức</a></li>
                        <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-loai-xe-ghep">Quản lý loại xe ghép</a></li>
                        <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/tac-vu-khach">Tác vụ khách hàng</a></li>
                        <li><a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-loai-tin">Quản lý loại tin</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <?php echo $content; ?>
                </div>
                <div class="clearfix"></div>
                <div class="sep"></div>
                <div id="footer" class="col-md-12">
                    <footer  class="pull-right" style="margin-top: 5px;">
                        Trang quản trị xeghephang.vn &COPY;
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>