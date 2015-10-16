<?php

/**
 * This is the model class for table "quyenquantri".
 *
 * The followings are the available columns in table 'quyenquantri':
 * @property integer $ma_quyen
 * @property string $loai_quyen
 *
 * The followings are the available model relations:
 * @property Phanquyenquantri[] $phanquyenquantris
 */
class Quyenquantri extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'quyenquantri';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('loai_quyen', 'required'),
            array('loai_quyen', 'length', 'max' => 80),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ma_quyen, loai_quyen', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'phanquyenquantris' => array(self::HAS_MANY, 'Phanquyenquantri', 'ma_quyen'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ma_quyen' => 'Ma Quyen',
            'loai_quyen' => 'Loai Quyen',
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

        $criteria->compare('ma_quyen', $this->ma_quyen);
        $criteria->compare('loai_quyen', $this->loai_quyen, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * @return CActiveRecord
     */
    public static function getAllRole() {
        return Quyenquantri::model()->findAll();
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Quyenquantri the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
