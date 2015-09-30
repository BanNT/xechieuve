
<?php

return array(
    'id'=>'formdangkytaikhoan',
    'class'=>'form-inline',
    'label'=>'ĐĂNG NHẬP',
    'elements' => array(   
       '<div class="row">',
         '<div class="col-xs-12">',
        'ten_dang_nhap' => array(
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
        '<div class="col-xs-12">',
        'ghinho' => array(
            'type' => "checkbox",
            
        ),
        '</div>',
        '</div>',
        
    ),
    'buttons' => array(
        'dangnhap' => array(
            'type' => 'submit',
            'label' => 'Đăng nhập',
            'class'=>'btndangki',
            
        ),
    ),
    
);


