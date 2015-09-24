<?php

return array(
    'enctype' => 'multipart/form-data',
    'elements' => array(
        'khachhang' => array(
            'type' => 'form',
            'title' => 'Đăng kí:',
                '<div class="col-md-12 text-center">',
                'ten_dang_nhap' => array(
                    'type' => 'text',
                    'class' => 'form-control'
                ),
                '</div>'
            ),
        ),
    'buttons' => array(
        '<div class="col-md-12 text-center">',
        'dangki' => array(
            'type' => 'submit',
            'label' => 'Đăng kí',
            'class' => 'btn-success'
        ),
        '</div>'
    ),
);


