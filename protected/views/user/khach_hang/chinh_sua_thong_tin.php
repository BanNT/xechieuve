<?php $this->pageTitle = Yii::app()->name . ' - Chỉnh sửa thông tin người dùng'; ?>
<?php
if ($message) {
    $this->widget('application.widgets.modalShowMessage', array(
        'message' => $message
    ));
}
?>
<section id="chinhsua" >
    <div class="tieude">THÔNG TIN  TÀI KHOẢN</div>
    <div id="anhdaidien" >
        <img src="<?php echo Khachhang::AVARTAR_DIR . $anh ?>" alt="" width="150"/>
    </div>
    <?php
    echo $form->render();
    ?>
    <hr/>
    <?php
    echo $form2->render();
    ?>
</section>


