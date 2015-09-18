<?php
/**
 * according to desgin this wil display both xetimkhach and khachtimxe
 */
/* @var $this Controller */
$this->widget('application.widgets.xetimkhach', array(
    'xetimkhach' => $xetimkhach
));
$this->widget('application.widgets.khachtimxe', array(
    'khachtimxe' => $khachtimxe
));
?>