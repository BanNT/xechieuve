<?php
/* @var $this Manage_administratorController */
/* @var $model Quantrivien */
?>
<h1>Sửa thông tin tài khoản <?php echo $model->ten_qtv; ?></h1>

<?php
/* @var $this Manage_administratorController */
/* @var $model Quantrivien */
/* @var $form CActiveForm */
?>
<div class="form-responsive">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'quantrivien-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="col-md-6">
        <?php echo $form->labelEx($model, 'ten_qtv'); ?>
        <?php
        echo $form->textField($model, 'ten_qtv', array(
            'size' => 60,
            'maxlength' => 80,
            'class' => 'form-control'
        ));
        ?>
        <?php echo $form->error($model, 'ten_qtv'); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php
        echo $form->textField($model, 'email', array(
            'size' => 60,
            'maxlength' => 80,
            'class' => 'form-control'));
        ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php
        echo $form->passwordField($model, 'password', array(
            'size' => 60,
            'maxlength' => 80,
            'class' => 'form-control'));
        ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    <div class="col-md-6">
        <?php echo $form->labelEx($model, 'confirmPassword'); ?>
        <?php
        echo $form->passwordField($model, 'confirmPassword', array(
            'size' => 60,
            'maxlength' => 80,
            'class' => 'form-control'));
        ?>
        <?php echo $form->error($model, 'confirmPassword'); ?>
    </div>
    <div class="clearfix"></div>

    <div class="col-md-6">
        <?php echo $form->labelEx($model, 'trang_thai'); ?>
        <?php
        echo $form->dropDownList($model, 'trang_thai', Quantrivien::getTypeAdminStatus(), array(
            'class' => 'form-control'
        ));
        ?>
        <?php echo $form->error($model, 'trang_thai'); ?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <strong>Phân quyền quản trị:</strong><br/><br/>
        <?php
        $roles = Quyenquantri::getAllRole();
        foreach ($roles as $role):
            $find = false;
            foreach ($phanQuyen as $quyen):
                if ($role->ma_quyen == $quyen->ma_quyen) {
                    $find = true;
                    break;
                }
            endforeach;
            ?>
            <div>
                <input <?php echo ($find) ? "checked" : "" ?> name="role[]" value="<?php echo CHtml::encode($role->ma_quyen); ?>" type="checkbox"/> <label><?php echo CHtml::encode($role->loai_quyen); ?></label>
            </div>
            <?php
        endforeach;
        ?>
    </div>
    <div class="col-md-12  text-center">
        <?php
        echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'class' => "btn btn-success",
            'style' => 'margin-top:20px;'
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>