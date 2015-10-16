<?php

/**
 * This is the model class for table "quantrivien".
 *
 * The followings are the available columns in table 'quantrivien':
 * @property integer $ma_qtv
 * @property string $ten_qtv
 * @property string $email
 * @property string $password
 * @property integer $trang_thai
 *
 * The followings are the available model relations:
 * @property Phanquyenquantri[] $phanquyenquantris
 */
class Quantrivien extends CActiveRecord {

    /**
     * @var string 
     */
    public $confirmPassword;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'quantrivien';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('ten_qtv,email,password,confirmPassword', 'required', 'message' => 'Bạn không được bỏ trống "{attribute}"', 'on' => 'create'),
            array('ten_qtv,email', 'required', 'message' => 'Bạn không được bỏ trống "{attribute}"', 'on' => 'update'),
            array('email', 'email', 'message' => 'Email không hợp lệ'),
            array('trang_thai', 'numerical', 'integerOnly' => true),
            array('password', 'compare', 'compareAttribute' => 'confirmPassword', 'message' => 'Mật khẩu không khớp'),
            array('ten_qtv, email, password', 'length', 'max' => 80),
            array('ma_qtv, ten_qtv, email, password, trang_thai', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'phanquyenquantris' => array(self::HAS_MANY, 'Phanquyenquantri', 'ma_qtv'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ma_qtv' => 'Mã',
            'ten_qtv' => 'Tên quản trị viên',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Xác nhận mật khẩu',
            'trang_thai' => 'Trạng thái',
        );
    }

    /**
     * Lấy các loại trạng nthái của admi
     * @return array
     */
    public static function getTypeAdminStatus() {
        return array(
            '0' => 'Vô hiệu',
            '1' => 'Hoạt động'
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

        $criteria->compare('ma_qtv', $this->ma_qtv);
        $criteria->compare('ten_qtv', $this->ten_qtv, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('trang_thai', $this->trang_thai);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Quantrivien the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
