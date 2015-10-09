<?php $this->pageTitle = Yii::app()->name . ' - Đăng tin khách tìm xe'; ?>
<section id="dangtinrv">
    <script src="<?php echo Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js'; ?>"></script>
    <?php echo $form; ?>
    <script type="text/javascript">
        CKEDITOR.replace('noi-dung-tin');
    </script>
</section>
