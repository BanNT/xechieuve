<?php
return array(
    'elements' => array(
        'tinkhachhang' => array(
            'type' => 'form',
            'title'=>'Sửa tin đăng:',
            'elements' => array(
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
                .'<div class="clearfix"></div>'
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
                ),'</div>'
                . '<div class="clearfix"></div>'
                . '<div class="col-xs-12 col-sm-6 col-md-6">',
                'trang_thai' => array(
                    'type' => 'dropdownlist',
                    'items' => Tinghepxe::getStatusTinDang(),
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
        'tinghepxe' => array(
            'type' => 'form',
            'elements' => array(
                '<div class ="col-md-6">',
                'dia_chi_di' => [
                    'type' => 'text',
                    'class' => 'form-control'
                ],
                '</div>'
                . '<div class ="col-md-5 pull-right">',
                'dia_chi_den' => [
                    'type' => 'text',
                    'class' => 'form-control'
                ],
                '</div>'
                .'<div class="clearfix"></div>'
                . '<div class ="col-md-6">',
                'noi_den_tinh' => [
                    'type' => 'dropdownlist',
                    'items' => Province::listProvinces(),
                    'class' => 'form-control'
                ],
                '</div>'
                . '<div class ="col-md-5 pull-right">',
                'ma_loai_xe_ghep' => [
                    'type' => 'dropdownlist',
                    'items' => Loaixeghep::optionLoaiXeGhep(),
                    'class' => 'form-control'
                ],
                '</div>'
                .'<div class="clearfix"></div>'
                . '<div class ="col-md-3">',
                'ngay_khoi_hanh' => [
                    'type' => 'date',
                    'class' => 'form-control'
                ],
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