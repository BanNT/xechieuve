<?php
/* @var $this TintucController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Tintucs',
);

$this->menu = array(
    array('label' => 'Create Tintuc', 'url' => array('create')),
    array('label' => 'Manage Tintuc', 'url' => array('admin')),
);
?>
<style>
    td
    {
        text-align: center;
    }
    #adminlistTT
    {
        width: 900px;
        margin: auto;
    }
</style>
<section id="adminlistTT">
    <h1 style="color: #0000cc;text-align: center;">Danh sách tin tức đã đăng</h1>
    <table width="857" border="1">
        <tr>
            <td width="84">Mã tin:</td>
            <td width="135">Tiêu đề:</td>
            <td width="196">Tóm tắt:</td>
            <td width="105">Ngày đăng:</td>
            <td width="87">Ảnh:</td>
            <td width="110">Trạng thái</td>

        </tr>
        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
           
        ));
        ?> 
    </table>
</section>
