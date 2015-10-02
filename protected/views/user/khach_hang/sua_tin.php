<?php $this->pageTitle = Yii::app()->name . ' -  Sửa tin đã đăng'; ?>
<section>
    <script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
    <?php echo $form->render(); ?>
    <script type="text/javascript">
        CKEDITOR.replace('noi-dung-tin');
    </script>
</section>