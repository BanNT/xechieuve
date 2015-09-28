<div class="col-md-12">
    <h6>Tìm kiếm khách</h6>
    <form action="<?php echo CHtml::encode(Yii::app()->request->baseUrl) . '/khach_tim_xe/tim_kiem_khach'; ?>" method="post">
        <select name="noi-di">
            <option value="-1">Chọn nơi đi</option>
            <?php $this->widget('application.widgets.provinces'); ?>
        </select>
        <select name="noi-den">
            <option value="-1">Chọn nơi đến</option>
            <?php $this->widget('application.widgets.provinces'); ?>
        </select>
        <input name="ngay-khoi-hanh" type="date"/>
        <input name="tim-kiem" type="submit" value="Tìm kiếm"/>
    </form>
</div>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'question-answer-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));

    $response = new QuestionAnswerForm;
    ?>

    <div class="row">
        <?php
        echo $form->labelEx($response, 'link');
        echo $form->textField($response, 'link');
        echo $form->error($response, 'link');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($response, 'description');
        echo $form->textField($response, 'description');
        echo $form->error($response, 'description');
        ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::ajaxSubmitButton('Reply', 'comment', array(
            'update' => '#comments',
            'type' => 'POST',
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>