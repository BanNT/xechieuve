 <?php
/* @var $this TintucController */
/* @var $model Tintuc */

$this->breadcrumbs=array(
    'Tintucs'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label'=>'List Tintuc', 'url'=>array('index')),
    array('label'=>'Manage Tintuc', 'url'=>array('admin')),
);
?>

<h1 style="text-align: center">Thêm Tin Tức</h1>
 <script src="<?php echo Yii::app()->baseUrl . '/admin.php/js/ckeditor/ckeditor.js'; ?>"></script>
<?php $this->renderPartial('_form', array('model'=>$model)); ?> 
 <script type="text/javascript">
        CKEDITOR.replace('noi_dung');