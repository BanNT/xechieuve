<?php

return array(
    'enctype' => 'multipart/form-data',
    'elements' => array(
        'tinkhachhang' => array(
            'type' => 'form',
            'elements' => array(
                'ma_khach_hang' => array(
                    'type' => 'hidden',
                    'value' => Yii::app()->user->userId
                ),
                '<div class="col-xs-12 col-sm-6 col-md-6">',
                'nguoi_lien_lac' => array(
                    'type' => 'text',
                    'class' => 'form-control'
                ),
                '</div>'
                . '<div class="col-xs-12 col-sm-5 col-md-5 pull-right">',
                'so_dien_thoai' => array(
                    'type' => 'text',
                    'class' => 'form-control'
                ),
                '</div>'
                . '<div class="clearfix"></div>'
                . '<div class="col-xs-12 col-sm-6 col-md-6">',
                'tieu_de_tin' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                ),
                '</div>'
                . '<div class="col-xs-12 col-sm-5 col-md-5 pull-right">',
                'tinh_thanh' => array(
                    'type' => 'dropdownlist',
                    'items' => Province::listProvinces(),
                    'class' => 'form-control'
                ),
                '</div>'
                . '<div class="col-md-12">',
                'noi_dung_tin' => array(
                    'type' => 'textarea',
                    'rows' => '10',
                    'class' => 'form-control',
                    'id' => 'noi-dung-tin'
                ),
                '</div>'
            ),
        ),
        'tinraovat' => array(
            'type' => 'form',
            'elements' => array(
                '<div class="col-xs-12 col-sm-6 col-md-6">',
                'ma_loai_tin_rv' => array(
                    'type' => 'dropdownlist',
                    'items' => Loaitinraovat::optionLoaiTinRV(),
                    'class' => 'form-control'
                ),
                '</div>'
                . '<div class="col-xs-12 col-sm-5 col-md-5 pull-right">',
                'gia_rao_vat' => array(
                    'type' => 'text',
                    'class' => 'form-control'
                ),
                '</div>'
                . '<div class="col-xs-12 col-md-5">',
                'anh' => array(
                    'type' => 'file'
                ),
                '</div>'
            ),
        ),
    ),
    'buttons' => array(
        '<div class="col-md-12 text-center">',
        'dangtin' => array(
            'type' => 'submit',
            'label' => 'Đăng tin',
            'class' => 'btn-success'
        ),
        '</div>'
    ),
);
