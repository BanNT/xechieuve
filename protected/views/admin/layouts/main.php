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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <!-- Bootstrap -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js"></script>
          <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <?php echo $content;?>
    </body>
</html>