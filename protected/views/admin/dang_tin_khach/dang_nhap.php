<?php $this->pageTitle = Yii::app()->name . ' - Đăng tin cho khách'; ?>
<section id="dangtinkhach">
    <h3>Bạn cần nhập id khách hàng có dạng tendangnhap_madangnhap </h3>
    <?php echo $form; ?>
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/dang-tin">Quay trở về trang đăng tin</a>;
</section>

