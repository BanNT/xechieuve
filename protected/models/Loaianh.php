<?php

/**
 * This is the model class for table "loaianh".
 *
 * The followings are the available columns in table 'loaianh':
 * @property integer $ma_loai_anh
 * @property string $ten_loai_anh
 */
class Loaianh extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loaianh';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ten_loai_anh', 'required'),
			array('ten_loai_anh', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ma_loai_anh, ten_loai_anh', 'safe', 'on'=>'search'),
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
			'ma_loai_anh' => 'Mã loại ảnh',
			'ten_loai_anh' => 'Tên loại ảnh',
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

		$criteria->compare('ma_loai_anh',$this->ma_loai_anh);
		$criteria->compare('ten_loai_anh',$this->ten_loai_anh,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loaianh the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
