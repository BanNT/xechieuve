<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Log in</title>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <!-- Bootstrap -->
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet"/>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
            <!--[if lt IE 9]>
              <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.min.js"></script>
              <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/respond.min.js"></script>
            <![endif]-->
            <style>
                .content{
                    margin-left: -15px;
                }
                .mo{
                    background: #000;
                    opacity: 0.6;
                    margin-bottom: 7px;
                }
                input{
                    color: #fff !important;
                    height: 38px !important;
                    border-radius: 8px !important;
                }
                input[type="submit"]{
                    background: none;
                    border: none;
                    outline:none;
                    color: #cccccc !important;
                    height: 20px !important;
                }

                input[type="submit"]:hover{
                    color: #fff !important;
                }
                .errorMessage{
                    color: #FFF;
                    background: #000;
                }
            </style>
    </head>
    <body>

        <img src="<?php echo Yii::app()->baseUrl; ?>/images/background/hinh-nen-phong-canh-full-hd-dep.jpg" width="100%" style="position:fixed; z-index:-11111;" />
        <div class="container">
            <div class="row">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'loginAdministrator-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array(
                        'style' => 'padding-top:260px; margin-left:400px'
                    )
                ));
                ?>
                <div class="col-md-5">
                    <?php
                    echo $form->textField($model, 'username', array(
                        'placeholder' => 'Username...',
                        'class' => 'form-control mo'
                    ));
                    ?>
                    <?php echo $form->error($model, 'username'); ?>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-5">
                    <?php
                    echo $form->passwordField($model, 'password', array(
                        'placeholder' => 'Password...',
                        'class' => 'form-control mo'
                    ));
                    ?>
                    <?php echo $form->error($model, 'password'); ?>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-5">
                    <?php
                    echo CHtml::submitButton('Login', array(
                        'class' => 'pull-right'
                    ));
                    ?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </body>
</html>