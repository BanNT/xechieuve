<?php

/**
 * This is the model class for table "tintuc".
 *
 * The followings are the available columns in table 'tintuc':
 * @property integer $ma_tin
 * @property string $tieu_de
 * @property string $tom_tat
 * @property string $noi_dung
 * @property string $anh
 * @property string $ngay_dang
 * @property integer $trang_thai
 * @property string $meta_keyword
 * @property string $meta_Description
 */
class Tintuc extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tintuc';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tieu_de, tom_tat, noi_dung', 'required'),
            array('trang_thai', 'numerical', 'integerOnly' => true),
            array('tieu_de', 'length', 'max' => 80),
            array('tom_tat', 'length', 'max' => 250),
            array('anh', 'length', 'max' => 255),
            array('meta_keyword', 'length', 'max' => 90),
            array('meta_Description', 'length', 'max' => 110),
            array('ngay_dang', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ma_tin, tieu_de, tom_tat, noi_dung, anh, ngay_dang, trang_thai, meta_keyword, meta_Description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ma_tin' => 'Ma Tin',
            'tieu_de' => 'Tieu De',
            'tom_tat' => 'Tom Tat',
            'noi_dung' => 'Noi Dung',
            'anh' => 'Anh',
            'ngay_dang' => 'Ngay Dang',
            'trang_thai' => 'Trang Thai',
            'meta_keyword' => 'Meta Keyword',
            'meta_Description' => 'Meta Description',
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

        $criteria->compare('ma_tin', $this->ma_tin);
        $criteria->compare('tieu_de', $this->tieu_de, true);
        $criteria->compare('tom_tat', $this->tom_tat, true);
        $criteria->compare('noi_dung', $this->noi_dung, true);
        $criteria->compare('anh', $this->anh, true);
        $criteria->compare('ngay_dang', $this->ngay_dang, true);
        $criteria->compare('trang_thai', $this->trang_thai);
        $criteria->compare('meta_keyword', $this->meta_keyword, true);
        $criteria->compare('meta_Description', $this->meta_Description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tintuc the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}