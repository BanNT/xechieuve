<?php
/* @var $this Manage_car_typeController */
/* @var $model Loaixeghep */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#loaixeghep-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="text-center">
    <h3>
        <a href="<?php echo CHtml::encode(Yii::app()->baseUrl); ?>/admin.php/quan-ly-loai-xe-ghep/them">
            <span class="glyphicon glyphicon-hand-right"></span> Thêm loại xe ghép
        </a>
    </h3>
</div>
<hr/>
<div class="table-responsive">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'loaixeghep-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'template' => '{items}{pager}{summary}',
        'loadingCssClass' => '',
        'itemsCssClass' => 'table table-striped table-hover',
        'columns' => array(
            'ma_loai_xe_ghep',
            'loai_xe_ghep',
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
                        'url' => '$this->grid->controller->createUrl("quan-ly-loai-xe-ghep/xoa", array("id"=>$data->primaryKey, ))',
                        'imageUrl' => false
                    ),
                    'update' => array(
                        'label' => "<span class='glyphicon glyphicon-pencil'></span>",
                        'header' => "<span class='glyphicon glyphicon-pencil'></span>",
                        'url' => '$this->grid->controller->createUrl("quan-ly-loai-xe-ghep/sua", array("id"=>$data->primaryKey,))',
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
