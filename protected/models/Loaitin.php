<?php

/**
 * This is the model class for table "loaitin".
 *
 * The followings are the available columns in table 'loaitin':
 * @property integer $ma_loai_tin
 * @property string $ten_loai_tin
 * @property integer $gia_tien
 */
class Loaitin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loaitin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ten_loai_tin, gia_tien', 'required'),
			array('gia_tien', 'numerical', 'integerOnly'=>true),
			array('ten_loai_tin', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ma_loai_tin, ten_loai_tin, gia_tien', 'safe', 'on'=>'search'),
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
			'ma_loai_tin' => 'Ma Loai Tin',
			'ten_loai_tin' => 'Ten Loai Tin',
			'gia_tien' => 'Gia Tien',
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

		$criteria->compare('ma_loai_tin',$this->ma_loai_tin);
		$criteria->compare('ten_loai_tin',$this->ten_loai_tin,true);
		$criteria->compare('gia_tien',$this->gia_tien);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loaitin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
