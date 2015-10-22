<?php
/* @var $this Tin_tucController */
/* @var $model Tin_tuc */

/* $this->breadcrumbs=array(
  'Tintucs'=>array('index'),
  'Manage',
  );

  $this->menu=array(
  array('label'=>'List Tintuc', 'url'=>array('index')),
  array('label'=>'Create Tintuc', 'url'=>array('create')),
  ); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#tintuc-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>
<table class="table table-striped" style="margin-bottom: -10px;">
    <thead>
        <tr>
            <th class="text-center">
                <a href="<?php echo CHtml::encode(Yii::app()->baseUrl); ?>/admin.php/them-tin-tuc">
                    <span class="glyphicon glyphicon-hand-right"></span> Thêm Tin Tức
                </a>
            </th>
        </tr>
    </thead>
</table>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'post',
        ));
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'tintuc-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'summaryText' => '',
    'template' => '{items}{pager}{summary}',
    'loadingCssClass' => '',
    'itemsCssClass' => 'table table-striped table-hover',
    'nullDisplay' => 'Không tìm thấy dữ liệu bạn cần',
    'columns' => array(
        array(
            'name' => 'ma_tin',
            'value' => '$data->ma_tin',
            'header' => 'Mã Tin',
            'htmlOptions' => array(
                'style' => 'width: 8px; text-align: center;',)
        ),
        array(
            'name' => 'tieu_de',
            'value' => '$data->tieu_de',
            'header' => '<span ></span> Tiêu Đề',
        ),
        array( 
            'name' => 'ngay_dang',
            'value' => 'date("h:i:sa d-m-Y", strtotime($data->ngay_dang))',
            'header' => '<span ></span> Ngày Đăng',
        ),
        array(
            'name' => 'trang_thai',
            'value' => array($model, 'rendertrangthai'),
            'header' => '<span></span> Trạng thái',
        ),
        array(
            'header' => '<span class="glyphicon glyphicon-cog" ></span> Tác vụ',
            'htmlOptions' => array(
                'style' => 'width: 100px; text-align: center;',
            ),
            'class' => 'CButtonColumn',
//            'filter'=>'dsds',
            'template' => '{view} {update} {delete}',
            'buttons' => array(
                'delete' => array(
                    'label' => '<span class="glyphicon glyphicon-trash"></span>',
                    'url' => '$this->grid->controller->createUrl("quan-ly-tin-tuc/xoa-tin", array("id"=>$data->primaryKey, ))',
                    'imageUrl' => false
                ),
                'update' => array(
                    'label' => "<span class='glyphicon glyphicon-pencil'></span>",
                    'header' => "<span class='glyphicon glyphicon-pencil'></span>",
                    'url' => '$this->grid->controller->createUrl("quan-ly-tin-tuc/sua-tin", array("id"=>$data->primaryKey,))',
                    'imageUrl' => false
                ),
                'view' => array(
                    'label' => '<span class="glyphicon glyphicon-search"></span>',
                    'url' => '$this->grid->controller->createUrl("quan-ly-tin-tuc/thong-tin-tin-tuc", array("id"=>$data->primaryKey,))',
                    'imageUrl' => false,
                ),
            ),
        ),
    ),
));
?>
<input type="submit" class="hidden"/>
<?php $this->endWidget(); ?>


