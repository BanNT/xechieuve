<?php

return array(
    'enctype' => 'multipart/form-data',
    'id'=>'formdangki',
    'class'=>'form-inline',
    'elements' => array(
          '<div class="row">',
         '<div class="col-xs-12">',
        'ten_khach_hang' => array(
            'type' => 'text',
            'class' => 'form-input'
            ),
        '</div>',
        '</div>',
        '<div class="row">',
         '<div class="col-xs-12 ">',
        'ten_dang_nhap' => array(
            'type' => 'text',
            'class' => 'form-input'
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12  ">',
        'password' => array(
            'type' => "password",
            'class' => 'form-input'
        ),
        '</div>',
        '</div>',
        '<div class="row">',
         '<div class="col-xs-12 ">',
            'confirmPassword' => array(
                'type' => "password",
            'class' => 'form-input'
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12  ">',
            'so_dien_thoai' => array(
                'type' => 'text',
            'class' => 'form-input',
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12  ">',
        'email' => array(
            'type' => 'text',
            'class' => 'form-input',
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12  ">',
        'diachi' => array(
                    'type' => 'dropdownlist',
                    'items' => Province::listProvinces(),
                    'class' => 'form-input',
                ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12  ">',
        'anh_dai_dien' => array(
            'type' => 'file',
            'class' => 'anh',
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12  ">',
         'dieukhoan' => array(
            'type' => 'checkbox',
        ),
        '</div>',
        '</div>',
    ),
    'buttons' => array(
        'dangki' => array(
            'type' => 'submit',
            'label' => 'Đăng kí',
            'class'=>'btndangki'
        ),
    ),
    
);


