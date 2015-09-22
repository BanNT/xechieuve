<?php

/**
 * This is the model class for table "loaitinraovat".
 *
 * The followings are the available columns in table 'loaitinraovat':
 * @property integer $ma_loai_tin_rv
 * @property string $loai_tin_rv
 *
 * The followings are the available model relations:
 * @property Tinraovat[] $tinraovats
 */
class Loaitinraovat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loaitinraovat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('loai_tin_rv', 'required'),
			array('loai_tin_rv', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ma_loai_tin_rv, loai_tin_rv', 'safe', 'on'=>'search'),
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
			'tinraovats' => array(self::HAS_MANY, 'Tinraovat', 'ma_loai_tin_rv'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ma_loai_tin_rv' => 'Ma Loai Tin Rv',
			'loai_tin_rv' => 'Loai Tin Rv',
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

		$criteria->compare('ma_loai_tin_rv',$this->ma_loai_tin_rv);
		$criteria->compare('loai_tin_rv',$this->loai_tin_rv,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loaitinraovat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
