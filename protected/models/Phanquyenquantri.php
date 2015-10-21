<?php

/**
 * This is the model class for table "phanquyenquantri".
 *
 * The followings are the available columns in table 'phanquyenquantri':
 * @property integer $ma_quyen
 * @property integer $ma_qtv
 *
 * The followings are the available model relations:
 * @property Quantrivien $maQtv
 * @property Quyenquantri $maQuyen
 */
class Phanquyenquantri extends CActiveRecord {

    const ADMINISTRATOR = 1;
    const CUSTOMER = 2;
    const CUSTOMER_NEWS = 3;
    const NEWS = 4;
    const CAR_TYPE = 5;
    const CUSTOMER_TASK = 6;
    const MANAGE_ADMIN = 7;
    const CUSTOMER_NEWS_TYPE = 8;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'phanquyenquantri';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ma_quyen, ma_qtv', 'required'),
            array('ma_quyen, ma_qtv', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ma_quyen, ma_qtv', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'maQtv' => array(self::BELONGS_TO, 'Quantrivien', 'ma_qtv'),
            'maQuyen' => array(self::BELONGS_TO, 'Quyenquantri', 'ma_quyen'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ma_quyen' => 'Ma Quyen',
            'ma_qtv' => 'Ma Qtv',
        );
    }

    public function getAllAuthorizationById($maQTV) {
        return $this->findAllByAttributes(array('ma_qtv' => $maQTV));
    }

    /**
     * @param integer $roleId
     * @return array
     */
    public static function getALlAdminByRole($roleId) {
        $condition = 'ma_quyen=' . self::ADMINISTRATOR . ' OR ma_quyen=' . $roleId;
        $admins = Phanquyenquantri::model()->findAll($condition);
        $adm = array();

        foreach ($admins as $admin) {
            array_push($adm, $admin->ma_qtv);
        }

        return $adm;
    }
    
    public static function getALlAdminId(){
        $admins = Phanquyenquantri::model()->findAll();
        $adm = array();

        foreach ($admins as $admin) {
            array_push($adm, $admin->ma_qtv);
        }

        return $adm;
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
        $criteria->compare('ma_qtv', $this->ma_qtv);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Phanquyenquantri the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
