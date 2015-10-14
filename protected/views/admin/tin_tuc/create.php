<?php
/* @var $this TintucController */
/* @var $model Tintuc */

$this->breadcrumbs = array(
    'Tintucs' => array('index'),
    'Create',
);
?>
<h1 style="text-align: center">Thêm Tin Tức</h1>
<script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
<?php $this->renderPartial('_form', array('model' => $model)); ?> 
<script type="text/javascript">
  //  CKEDITOR.replace('noi_dung', {
       // filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
       // filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
       // filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
        //filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
        /filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
        //filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash'
   // });
   
   
 CKEDITOR.replace('noi_dung');
</script>
<a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/quan-ly-tin-tuc">
    <span class="glyphicon glyphicon-arrow-left"></span> Quay lại trang quản lý tin tức
</a>