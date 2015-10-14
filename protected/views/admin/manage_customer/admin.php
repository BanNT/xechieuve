<?php
/* @var $this Manage_customerController */
/* @var $model Khachhang */

//Một vài function có sẵn khi tạo với gii
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#khachhang-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="text-center">
    <h3>
        <a href="<?php echo CHtml::encode(Yii::app()->baseUrl); ?>/admin.php/them-khach-hang">
            <span class="glyphicon glyphicon-hand-right"></span> Thêm khách hàng
        </a>
    </h3>
</div>
<div class="table-responsive">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'khachhang-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{items}{pager}{summary}',
        'loadingCssClass' => '',
        'itemsCssClass' => 'table table-striped table-hover',
        'columns' => array(
            array(
                'name' => 'ma_khach_hang',
                'value' => '$data->ma_khach_hang',
                'header' => 'Mã',
            ),
            array(
                'name' => 'ten_khach_hang',
                'value' => '$data->ten_khach_hang',
                'header' => '<span class="glyphicon glyphicon-user"></span> Họ và tên'
            ),
            array(
                'name' => 'email',
                'value' => '$data->email',
                'header' => '<span class="glyphicon glyphicon-envelope"></span> Email'
            ),
            array(
                'name' => 'so_dien_thoai',
                'value' => '$data->so_dien_thoai',
                'header' => '<span class="glyphicon glyphicon-phone-alt"></span> Số điện thoại'
            ),
            array(
                'name' => 'so_du_tai_khoan',
                'value' => '$data->so_du_tai_khoan',
                'header' => '<span class="glyphicon glyphicon-usd"></span> Số dư tài khoản',
            ),
            array(
                'header' => '<span class="glyphicon glyphicon-cog" ></span> Tác vụ',
                'htmlOptions' => array(
                    'style' => 'width: 100px; text-align: center;',
                ),
                'class' => 'CButtonColumn',
//            'filter'=>'dsds',
                'template' => '{update} {delete}',
                'buttons' => array(
                    'delete' => array(
                        'label' => '<span class="glyphicon glyphicon-trash"></span>',
                        'url' => '$this->grid->controller->createUrl("quan-ly-khach-hang/xoa-khach-hang", array("id"=>$data->primaryKey, ))',
                        'imageUrl' => false
                    ),
                    'update' => array(
                        'label' => "<span class='glyphicon glyphicon-pencil'></span>",
                        'header' => "<span class='glyphicon glyphicon-pencil'></span>",
                        'url' => '$this->grid->controller->createUrl("quan-ly-khach-hang/sua-thong-tin-khach-hang", array("id"=>$data->primaryKey,))',
                        'imageUrl' => false
                    ),
//                'view' => array(
//                    'label' => '<span class="glyphicon glyphicon-search"></span>',
//                    'url' => '$this->grid->controller->createUrl("quan-ly-khach-hang/thong-tin-khach-hang", array("id"=>$data->primaryKey,))',
//                    'imageUrl' => false,
//                ),
                ),
            ),
        ),
    ));
    ?>
    <input type="submit" class="hidden"/>
    <?php $this->endWidget(); ?>
</div>
