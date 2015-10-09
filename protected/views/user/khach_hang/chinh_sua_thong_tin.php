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
        <img src="<?php echo Khachhang::AVARTAR_DIR . $anh ?>" alt="" width="300"/>
    </div>
    <?php
    echo $form->render();
    if ($form->submitted('chinhsua') && $form->validate())
        echo '<strong class="ok">Cập nhật thành công</strong>';
    ?>
    <hr/>
    <?php echo $form2->render();
    if ($form2->submitted('doimatkhau') && $form2->validate())
        echo '<strong class="ok">Đổi mật khẩu thành công</strong>';
    ?>
</section>


