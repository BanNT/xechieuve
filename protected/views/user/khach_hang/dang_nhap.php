<?php $this->pageTitle = Yii::app()->name . ' - Đăng nhập'; ?>
<section id="dangnhap">
    <div class="tieude">ĐĂNG NHẬP HỆ THỐNG</div>
    <?php echo $model; ?> 
    <span style="text-align: center;margin-left: 100px;margin-bottom: 5px;">Bạn chưa có tài khoản bấm <a href="<?php echo CHtml::encode(Yii::app()->request->baseUrl); ?>/dang-ky"> vào đây</a> để đăng ký ngay</span>  
</section>