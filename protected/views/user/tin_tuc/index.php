<?php
/* @var $this Tin_tucController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name . ' - Tin tức';

?>

    <div><h3 style="border-bottom: 1px solid #ccc; padding: 10px 0;">Tin tức</h3></div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
