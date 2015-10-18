<?php

return array(
    'class' => 'chinhsuaTT',
    'elements' => array(
        '<div class="row">',
        '<div class="col-xs-12">',
        'oldPassword' => array(
            'type' => 'password',
            'class' => 'form-input'
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12">',
        'newPassword' => array(
            'type' => 'password',
            'class' => 'form-input'
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12">',
        'newconfirmPassword' => array(
            'type' => 'password',
            'class' => 'form-input'
        ),
        '</div>',
        '</div>',
    ),
    'buttons' => array(
        'doimatkhau' => array(
            'type' => 'submit',
            'label' => 'Đổi mật khẩu',
            'class' => 'btndangki btn',
            'action' => 'dangkitk',
        ),
    )
);
