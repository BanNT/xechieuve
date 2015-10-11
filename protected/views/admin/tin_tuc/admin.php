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
/* $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'tintuc-grid',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'columns'=>array(
  'ma_tin',
  'tieu_de',
  'tom_tat',
  'noi_dung',
  'anh',
  'ngay_dang',
  /*
  'trang_thai',
  'meta_keyword',
  'meta_Description',
 */
//array(
//   'class'=>'CButtonColumn',
//),
// ),
//)); 
?> 
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
    'template' => '{items}{pager}{summary}',
    'loadingCssClass' => '',
    'itemsCssClass' => 'table table-striped table-hover',
    'nullDisplay' => 'Không tìm thấy dữ liệu bạn cần',
    'columns' => array(
        array(
            'name' => 'ma_tin',
            'value' => '$data->ma_tin',
            'header' => '<span class="glyphicon"style="width:10px"></span>Mã Tin',
            'htmlOptions' => array(
                'style' => 'width: 20px !important',
            ),
        ),
        array(
            'name' => 'tieu_de',
            'value' => '$data->tieu_de',
            'header' => '<span class="glyphicon glyphicon-user"></span> Tiêu Đề',
        ),
        
        array(
            'name' => 'ngay_dang',
            'value' => '$data->ngay_dang',
            'header' => '<span class="glyphicon style="width:100px""></span> Ngày Đăng',
        ),
        array(
            'name' => 'trang_thai',
            'value' => '$data->trang_thai',
            'header' => '<span class="glyphicon "></span> Trạng thái',
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
                    'url' => '$this->grid->controller->createUrl("delete", array("id"=>$data->primaryKey, ))',
                    'imageUrl' => false
                ),
                'update' => array(
                    'label' => "<span class='glyphicon glyphicon-pencil'></span>",
                    'header' => "<span class='glyphicon glyphicon-pencil'></span>",
                    'url' => '$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,))',
                    'imageUrl' => false
                ),
                'view' => array(
                    'label' => '<span class="glyphicon glyphicon-search"></span>',
                    'url' => '$this->grid->controller->createUrl("quan-ly-khach-hang/thong-tin-khach-hang", array("id"=>$data->primaryKey,))',
                    'imageUrl' => false,
                ),
            ),
        ),
    ),
));
?>
<input type="submit" class="hidden"/>
<?php $this->endWidget(); ?>


