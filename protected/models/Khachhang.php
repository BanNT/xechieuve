<?php

/**
 * This is the model class for table "khachhang".
 *
 * The followings are the available columns in table 'khachhang':
 * @property integer $ma_khach_hang
 * @property string $ten_khach_hang
 * @property string $ten_dang_nhap
 * @property string $password
 * @property string $email
 * @property string $so_dien_thoai
 * @property integer $so_du_tai_khoan
 * @property string $anh_dai_dien
 *
 * The followings are the available model relations:
 * @property Tinkhachhang[] $tinkhachhangs
 */
class Khachhang extends CActiveRecord {
    const AVARTAR_DIR = 'images/avartars';
    
    /**
     *Xác nhận password
     * @var string
     */
    public $confirmPassword;
    public $diachi;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'khachhang';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ten_khach_hang, ten_dang_nhap, password,email, so_dien_thoai, confirmPassword,diachi', 'required',
                'message' => 'Bạn không được bỏ trống "{attribute}"'// đây required là bắt buộc, cái này là tên hàm của yii viết sẵn
            ),
            array('password', 'compare', 'compareAttribute' => 'confirmPassword',
                'message' => 'password không khớp'
            ),
            array('so_du_tai_khoan', 'numerical', 'integerOnly' => true),
            array('ten_khach_hang, ten_dang_nhap, email', 'length', 'max' => 80,
                'message' => '{attribute} phải dưới 80 kí tự'
            ),
            array('email', 'email', 'message' => 'Email không hợp lệ'),
            array('password', 'length', 'max' => 40),
            array('so_dien_thoai', 'length', 'max' => 11),
            array('anh_dai_dien', 'length', 'max' => 255),
            array('anh_dai_dien', 'file', 'allowEmpty' => true, 'safe' => true, 
                'types' => 'jpg, jpeg, gif, png',
                'wrongType'=>'Chỉ chấp nhận các file jpg, jpeg, gif, png',
                'maxSize' => 1024*1024, // 1MB                
                'tooLarge' => 'Kích cỡ ảnh phải nhỏ hơn 1MB',
                'maxFiles'=>1,
                'tooMany'=>'Bạn chỉ được upload 1 file ảnh duy nhất'
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ma_khach_hang, ten_khach_hang, ten_dang_nhap, password, email, so_dien_thoai, so_du_tai_khoan, anh_dai_dien', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tinkhachhangs' => array(self::HAS_MANY, 'Tinkhachhang', 'ma_khach_hang'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ma_khach_hang' => 'Ma Khach Hang',
            'ten_khach_hang' => 'Tên khách hàng:',
            'ten_dang_nhap' =>'Tên đăng nhập:',
            'password' => 'Password:',
            'email' => 'Email:',
            'so_dien_thoai' =>'Số điện thoại:',
            'so_du_tai_khoan' =>'Số dư tài khoản:',
            'anh_dai_dien'=>'Ảnh đại diện:',
            'confirmPassword' => 'Nhập lại password:',
            'diachi'=>'Địa chỉ:'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('ma_khach_hang', $this->ma_khach_hang);
        $criteria->compare('ten_khach_hang', $this->ten_khach_hang, true);
        $criteria->compare('ten_dang_nhap', $this->ten_dang_nhap, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('so_dien_thoai', $this->so_dien_thoai, true);
        $criteria->compare('so_du_tai_khoan', $this->so_du_tai_khoan);
        $criteria->compare('anh_dai_dien', $this->anh_dai_dien, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Khachhang the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
