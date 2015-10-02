<?php $this->pageTitle = Yii::app()->name . ' - Tin tức'; ?>
<section id="tintuc">
    <?php
    $this->widget('application.widgets.tintuc', array(
        'tintuc' => $tintuc
    ));
    ?>
</section>
