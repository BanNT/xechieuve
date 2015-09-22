<?php

/**
 * This is the model class for table "tinghepxe".
 *
 * The followings are the available columns in table 'tinghepxe':
 * @property integer $ma_tin
 * @property string $dia_chi_di
 * @property string $dia_chi_den
 * @property string $noi_den_tinh
 * @property string $ngay_khoi_hanh
 * @property integer $ma_loai_xe_ghep
 *
 * The followings are the available model relations:
 * @property Loaixeghep $maLoaiXeGhep
 * @property Tinkhachhang $maTin
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
			array('ma_tin, dia_chi_di, dia_chi_den, noi_den_tinh, ma_loai_xe_ghep', 'required'),
			array('ma_tin, ma_loai_xe_ghep', 'numerical', 'integerOnly'=>true),
			array('dia_chi_di, dia_chi_den', 'length', 'max'=>200),
			array('noi_den_tinh', 'length', 'max'=>2),
			array('ngay_khoi_hanh', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ma_tin, dia_chi_di, dia_chi_den, noi_den_tinh, ngay_khoi_hanh, ma_loai_xe_ghep', 'safe', 'on'=>'search'),
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
			'maLoaiXeGhep' => array(self::BELONGS_TO, 'Loaixeghep', 'ma_loai_xe_ghep'),
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
			'dia_chi_di' => 'Dia Chi Di',
			'dia_chi_den' => 'Dia Chi Den',
			'noi_den_tinh' => 'Noi Den Tinh',
			'ngay_khoi_hanh' => 'Ngay Khoi Hanh',
			'ma_loai_xe_ghep' => 'Ma Loai Xe Ghep',
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
		$criteria->compare('dia_chi_di',$this->dia_chi_di,true);
		$criteria->compare('dia_chi_den',$this->dia_chi_den,true);
		$criteria->compare('noi_den_tinh',$this->noi_den_tinh,true);
		$criteria->compare('ngay_khoi_hanh',$this->ngay_khoi_hanh,true);
		$criteria->compare('ma_loai_xe_ghep',$this->ma_loai_xe_ghep);

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
}
