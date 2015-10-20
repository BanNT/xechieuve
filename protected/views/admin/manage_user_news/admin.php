<?php
/* @var $this Manage_user_newsController */
/* @var $model Tinkhachhang */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tinkhachhang-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="table-responsive">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'tinkhachhang-grid',
        'dataProvider' => $model->search(),
        'itemsCssClass' => 'table table-striped table-hover',
        'filter' => $model,
        'template' => '{items}{pager}{summary}',
        'columns' => array(
            'ma_tin',
            array(
                'name' => 'ma_loai_tin',
                'value' => array($model, 'renderTenLoaiTin'),
                'header' => 'Loại tin',
                'filter'=>false
            ),
            'ma_khach_hang',
            'tieu_de_tin',
            'nguoi_lien_lac',
            'so_dien_thoai',
            'ngay_dang',
            array(
                'name' => 'trang_thai',
                'header' => 'Trạng thái',
                'filter'=>false
            ),
            array(
                'header' => '<span class="glyphicon glyphicon-cog" ></span> Tác vụ',
                'htmlOptions' => array(
                    'style' => 'width: 100px; text-align: center;',
                ),
                'class' => 'CButtonColumn',
                'template' => '{update} {delete}',
                'buttons' => array(
                    'delete' => array(
                        'label' => '<span class="glyphicon glyphicon-trash"></span>',
                        'url' => '$this->grid->controller->createUrl("quan-ly-tin-dang-khach-hang/xoa", array("id"=>$data->primaryKey,"type"=>$data->ma_loai_tin ))',
                        'imageUrl' => false
                    ),
                    'update' => array(
                        'label' => "<span class='glyphicon glyphicon-pencil'></span>",
                        'header' => "<span class='glyphicon glyphicon-pencil'></span>",
                        'url' => '$this->grid->controller->createUrl("quan-ly-tin-dang-khach-hang/sua", array("id"=>$data->primaryKey,"type"=>$data->ma_loai_tin))',
                        'imageUrl' => false
                    ),
                ),
            ),
        ),
    ));
    ?>
    <input type="submit" class="hidden"/>
    <?php $this->endWidget(); ?>
</div>
