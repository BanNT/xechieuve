<?php

/**
 * This is the model class for table "tinraovat".
 *
 * The followings are the available columns in table 'tinraovat':
 * @property integer $ma_tin
 * @property string $anh
 * @property string $gia_rao_vat
 * @property integer $ma_loai_tin_rv
 *
 * The followings are the available model relations:
 * @property Loaitinraovat $maLoaiTinRv
 * @property Tinkhachhang $maTin
 */
class Tinraovat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tinraovat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ma_tin, ma_loai_tin_rv', 'required'),
			array('ma_tin, ma_loai_tin_rv', 'numerical', 'integerOnly'=>true),
			array('anh', 'length', 'max'=>510),
			array('gia_rao_vat', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ma_tin, anh, gia_rao_vat, ma_loai_tin_rv', 'safe', 'on'=>'search'),
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
			'maLoaiTinRv' => array(self::BELONGS_TO, 'Loaitinraovat', 'ma_loai_tin_rv'),
			'maTin' => array(self::BELONGS_TO, 'Tinkhachhang', 'ma_tin'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ma_tin' => 'Ma Tin',
			'anh' => 'Anh',
			'gia_rao_vat' => 'Gia Rao Vat',
			'ma_loai_tin_rv' => 'Ma Loai Tin Rv',
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
		$criteria->compare('anh',$this->anh,true);
		$criteria->compare('gia_rao_vat',$this->gia_rao_vat,true);
		$criteria->compare('ma_loai_tin_rv',$this->ma_loai_tin_rv);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tinraovat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
