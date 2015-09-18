<?php

/**
 * This is the model class for table "tinghepxe".
 *
 * The followings are the available columns in table 'tinghepxe':
 * @property integer $ma_tin
 * @property integer $ma_khach_hang
 * @property string $noi_di_tinh
 * @property string $noi_di_huyen
 * @property string $noi_den_tinh
 * @property string $noi_den_huyen
 * @property string $lich_trinh
 * @property string $ngay_khoi_hanh
 * @property string $gio_khoi_hanh
 * @property string $so_dien_thoai
 * @property string $nguoi_lien_lac
 * @property string $tieu_de_tin
 * @property string $noi_dung
 * @property string $loai_xe
 * @property string $ngay_dang
 * @property integer $ma_loai_tin
 */
class Tinghepxe extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tinghepxe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ma_khach_hang, noi_di_tinh, noi_di_huyen, noi_den_tinh, noi_den_huyen, so_dien_thoai, nguoi_lien_lac, tieu_de_tin, ma_loai_tin', 'required'),
			array('ma_khach_hang, ma_loai_tin', 'numerical', 'integerOnly'=>true),
			array('noi_di_tinh, noi_di_huyen, noi_den_tinh, noi_den_huyen', 'length', 'max'=>30),
			array('lich_trinh, loai_xe', 'length', 'max'=>40),
			array('gio_khoi_hanh', 'length', 'max'=>2),
			array('so_dien_thoai', 'length', 'max'=>11),
			array('nguoi_lien_lac', 'length', 'max'=>80),
			array('tieu_de_tin', 'length', 'max'=>100),
			array('ngay_khoi_hanh, noi_dung, ngay_dang', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ma_tin, ma_khach_hang, noi_di_tinh, noi_di_huyen, noi_den_tinh, noi_den_huyen, lich_trinh, ngay_khoi_hanh, gio_khoi_hanh, so_dien_thoai, nguoi_lien_lac, tieu_de_tin, noi_dung, loai_xe, ngay_dang, ma_loai_tin', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ma_tin' => 'Mã tin',
			'ma_khach_hang' => 'Mã khách hàng',
			'noi_di_tinh' => 'Nơi đi(tỉnh)',
			'noi_di_huyen' => 'Nơi đi(huyện)',
			'noi_den_tinh' => 'Nơi đến(tỉnh)',
			'noi_den_huyen' => 'Nơi đến(huyện)',
			'lich_trinh' => 'Lịch trình',
			'ngay_khoi_hanh' => 'Ngày khởi hành',
			'gio_khoi_hanh' => 'Giờ khởi hành',
			'so_dien_thoai' => 'Số điện thoại',
			'nguoi_lien_lac' => 'Người liên lạc',
			'tieu_de_tin' => 'Tiêu đề tin',
			'noi_dung' => 'Nội dung',
			'loai_xe' => 'Loại xe',
			'ngay_dang' => 'Ngày đăng',
			'ma_loai_tin' => 'Mã loại tin',
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

		$criteria->compare('ma_tin',$this->ma_tin);
		$criteria->compare('ma_khach_hang',$this->ma_khach_hang);
		$criteria->compare('noi_di_tinh',$this->noi_di_tinh,true);
		$criteria->compare('noi_di_huyen',$this->noi_di_huyen,true);
		$criteria->compare('noi_den_tinh',$this->noi_den_tinh,true);
		$criteria->compare('noi_den_huyen',$this->noi_den_huyen,true);
		$criteria->compare('lich_trinh',$this->lich_trinh,true);
		$criteria->compare('ngay_khoi_hanh',$this->ngay_khoi_hanh,true);
		$criteria->compare('gio_khoi_hanh',$this->gio_khoi_hanh,true);
		$criteria->compare('so_dien_thoai',$this->so_dien_thoai,true);
		$criteria->compare('nguoi_lien_lac',$this->nguoi_lien_lac,true);
		$criteria->compare('tieu_de_tin',$this->tieu_de_tin,true);
		$criteria->compare('noi_dung',$this->noi_dung,true);
		$criteria->compare('loai_xe',$this->loai_xe,true);
		$criteria->compare('ngay_dang',$this->ngay_dang,true);
		$criteria->compare('ma_loai_tin',$this->ma_loai_tin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tinghepxe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function composite(){
            $data = $this->findAll();
        }
}
