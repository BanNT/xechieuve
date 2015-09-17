<?php

/**
 * This is the model class for table "khachhang".
 *
 * The followings are the available columns in table 'khachhang':
 * @property integer $MaKhachHang
 * @property string $TenDangNhap
 * @property string $TenKhachHang
 * @property string $Email
 * @property string $Password
 * @property string $DiaChi
 * @property string $AnhDaiDien
 *
 * The followings are the available model relations:
 * @property Tinghepxe $tinghepxe
 * @property Tinraovat[] $tinraovats
 */
class Khachhang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'khachhang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TenDangNhap, TenKhachHang, Email, Password, DiaChi, AnhDaiDien', 'required'),
			array('TenDangNhap, TenKhachHang, Email, Password', 'length', 'max'=>80),
			array('DiaChi, AnhDaiDien', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('MaKhachHang, TenDangNhap, TenKhachHang, Email, Password, DiaChi, AnhDaiDien', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tinghepxe' => array(self::HAS_ONE, 'Tinghepxe', 'MaKhachHang'),
			'tinraovats' => array(self::HAS_MANY, 'Tinraovat', 'MaKhachHang'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'MaKhachHang' => 'Ma Khach Hang',
			'TenDangNhap' => 'Ten Dang Nhap',
			'TenKhachHang' => 'Ten Khach Hang',
			'Email' => 'Email',
			'Password' => 'Password',
			'DiaChi' => 'Dia Chi',
			'AnhDaiDien' => 'Anh Dai Dien',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('MaKhachHang',$this->MaKhachHang);
		$criteria->compare('TenDangNhap',$this->TenDangNhap,true);
		$criteria->compare('TenKhachHang',$this->TenKhachHang,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('DiaChi',$this->DiaChi,true);
		$criteria->compare('AnhDaiDien',$this->AnhDaiDien,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Khachhang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
