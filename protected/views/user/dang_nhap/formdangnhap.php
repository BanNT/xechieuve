
<?php

return array(
    'class'=>'formdangkytaikhoan',
    'label'=>'ĐĂNG NHẬP',
    'elements' => array(   
       '<div class="row">',
         '<div class="col-xs-12">',
        'username' => array(
            'type' => 'text',
            'class' => 'form-input'
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12">',
        'password' => array(
            'type' => "password",
            'class' => 'form-input'
        ),
        '</div>',
        '</div>',
        '<div class="row">',
        '<div class="col-xs-12 ckb">',
        'rememberMe' => array(
            'type' => "checkbox",   
        ),
        '</div>',
        '</div>',
        
    ),
    'buttons' => array(
        'Login' => array(
            'type' => 'submit',
            'label' => 'Đăng nhập',
            'class'=>'btndangki btn',
            'action'=>'Login',
            
        ),
    ),
    
);


