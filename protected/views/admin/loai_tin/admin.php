<?php

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
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'khachhang-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'template' => '{items}{pager}{summary}',
    'loadingCssClass' => '',
    'itemsCssClass' => 'table table-striped table-hover',
    'nullDisplay' => 'Không tìm thấy dữ liệu bạn cần',
    'columns' => array(
        array(
            'name' => 'ma_loai_tin',
            'value' => '$data->ma_loai_tin',
            'header' => 'Mã',
            'htmlOptions' => array(
                'style' => 'width: 20px !important',
            ),
        ),
        array(
            'name' => 'loai_tin',
            'value' => '$data->loai_tin',
            'header' => 'Loại tin',
        ),
        array(
            'name' => 'gia_dang',
            'value' => '$data->gia_dang',
            'header' => 'Giá đăng'
        ),
        array(
            'header' => '<span class="glyphicon glyphicon-cog" ></span> Tác vụ',
            'htmlOptions' => array(
                'style' => 'width: 100px; text-align: center;',
            ),
            'class' => 'CButtonColumn',
//            'filter'=>'dsds',
            'template' => '{update}',
            'buttons' => array(
                'update' => array(
                    'label' => "<span class='glyphicon glyphicon-pencil'></span>",
                    'header' => "<span class='glyphicon glyphicon-pencil'></span>",
                    'url' => '$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,))',
                    'imageUrl' => false
                ),
            ),
        ),
    ),
));
?>
<input type="submit" class="hidden"/>
<?php $this->endWidget(); ?>

