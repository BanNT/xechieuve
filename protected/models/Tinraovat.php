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
class Tinraovat extends CActiveRecord {

    /**
     * Đường dẫn ảnh tin rao vặt
     */
    const IMAGE_DIR_RV = 'images/tinraovat/';

    /**
     * Mã loại tin rao vặt trong database
     */
    const CODE_RV = 3;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tinraovat';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ma_loai_tin_rv,gia_rao_vat', 'required',
                'message' => 'Bạn chưa nhập thông tin vào ô "{attribute}"'
            ),
            array('ma_tin, ma_loai_tin_rv', 'numerical', 'integerOnly' => true),
            array('anh', 'length', 'max' => 510, 'message' => 'Tên file quá dài'),
            array('anh', 'file', 'allowEmpty' => true, 'safe' => true,
                'types' => 'jpg, jpeg, gif, png',
                'wrongType' => 'Chỉ chấp nhận các file jpg, jpeg, gif, png',
                'maxSize' => 1024 * 1024, // 1MB                
                'tooLarge' => 'Kích cỡ ảnh phải nhỏ hơn 1MB',
                'maxFiles' => 1,
                'tooMany' => 'Bạn chỉ được upload 1 file ảnh duy nhất'
            ),
            array('gia_rao_vat', 'length', 'max' => 30,
                'message' => '{attribute} giới hạn 30 kí tự'
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ma_tin, anh, gia_rao_vat, ma_loai_tin_rv', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
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
    public function attributeLabels() {
        return array(
            'ma_tin' => 'Ma Tin',
            'anh' => 'Ảnh',
            'gia_rao_vat' => 'Giá tiền',
            'ma_loai_tin_rv' => 'Loại tin rao vặt',
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
        $criteria->compare('anh', $this->anh, true);
        $criteria->compare('gia_rao_vat', $this->gia_rao_vat, true);
        $criteria->compare('ma_loai_tin_rv', $this->ma_loai_tin_rv);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tinraovat the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Lấy ra danh sách tin rao vặt
     * @param Paginate $paginator
     * @return array
     */
    public function listTinRV(Paginate $paginator, $condition = NULL) {
        return Yii::app()->db->createCommand()
                        ->select('tinraovat.ma_tin,date(ngay_dang) as ngay_dang_tin,tieu_de_tin,tinh_thanh,gia_rao_vat,nguoi_lien_lac,so_dien_thoai,anh'
                                . ',CASE '
                                . 'WHEN trang_thai=0 THEN "Đang tìm" '
                                . 'WHEN trang_thai=1 THEN "Đã xong" '
                                . 'END AS trang_thai_tin'
                        )
                        ->from('tinraovat')
                        ->where('ma_loai_tin = ' . self::CODE_RV . $condition)
                        ->join('tinkhachhang', 'tinkhachhang.ma_tin = tinraovat.ma_tin')
                        ->order('trang_thai,ngay_dang DESC')
                        ->limit($paginator->limit, $paginator->offset)
                        ->queryAll()
        ;
    }

    /**
     * Lấy ra danh sách mã tin được ngăn cách bởi dấu phẩy dựa theo điều kiện
     * @param type $conditions
     * @return string
     */
    public static function listMaTin($conditions) {
        $matins = Yii::app()->db->createCommand()
                ->select('tinraovat.ma_tin')
                ->from('tinraovat')
                ->join('tinkhachhang', 'tinkhachhang.ma_tin = tinraovat.ma_tin')
                ->where('ma_loai_tin = ' . self::CODE_RV . $conditions)
                ->queryAll();

        $string = '';
        foreach ($matins as $matin) {
            $string .=$matin['ma_tin'] . ',';
        }
        $string .= '0';
        return $string;
    }

    /**
     * @return array
     */
    public static function getStatusTinDang(){
        return [
            '0'=>'Đang tìm',
            '1'=>'Đã xong'
        ];
    }
//
//    /**
//     * @param integer $maTin
//     * @return ?????
//     */
//    public function getTinRaoVat($maTin) {
//        return Yii::app()->db->createCommand()
//                        ->select()
//                        ->from('tinraovat')
//                        ->join('tinkhachhang', 'tinkhachhang.ma_tin = tinraovat.ma_tin')
//                        ->where("tinraovat.ma_tin=:matin", array(':matin' => $maTin))
//                        ->queryRow()
//        ;
//    }
    public static function updateTinRV($maLoaiTinRV, $giaRaoVat, $anh='null', $maTin) {
        $sql = "UPDATE ".Tinraovat::model()->tableName()
                . " SET ma_loai_tin_rv = $maLoaiTinRV,gia_rao_vat= '$giaRaoVat', anh = '$anh'"
                . " WHERE ma_tin =$maTin"
        ;
        Yii::app()->db->createCommand($sql)->execute();
    }

}
