<?php

/* @var $this Manage_car_typeController */
/* @var $model Loaixeghep */
/* @var $form CActiveForm */
?>


<?php

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'loaixeghep-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<?php echo $form->labelEx($model, 'loai_xe_ghep'); ?>
<?php

echo $form->textField($model, 'loai_xe_ghep', array(
    'size' => 50,
    'maxlength' => 50,
    'class' => 'form-control'
));
?>
<?php echo $form->error($model, 'loai_xe_ghep'); ?>
<?php

echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
    'class' => 'btn btn-success',
    'style' => 'margin-top:20px'
));
?>

<?php $this->endWidget(); ?>
