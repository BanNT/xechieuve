<?php

/**
 * This is the model class for table "tinkhachhang".
 *
 * The followings are the available columns in table 'tinkhachhang':
 * @property integer $ma_tin
 * @property integer $ma_khach_hang
 * @property string $nguoi_lien_lac
 * @property string $so_dien_thoai
 * @property string $tieu_de_tin
 * @property string $noi_dung_tin
 * @property string $tinh_thanh
 * @property string $ngay_dang
 * @property integer $ma_loai_tin
 *
 * The followings are the available model relations:
 * @property Tinghepxe[] $tinghepxes
 * @property Khachhang $maKhachHang
 * @property Loaitin $maLoaiTin
 * @property Tinraovat[] $tinraovats
 */
class Tinkhachhang extends CActiveRecord {

//    public $trang_thai;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tinkhachhang';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('trang_thai,nguoi_lien_lac, so_dien_thoai, tieu_de_tin,noi_dung_tin,tinh_thanh', 'required',
                'message' => 'Bạn cần nhập thông tin vào ô "{attribute}"'
            ),
            array('ma_khach_hang, ma_loai_tin,so_dien_thoai', 'numerical', 'integerOnly' => true,
                'message' => '{attribute} không hợp lệ'
            ),
            array('nguoi_lien_lac, tieu_de_tin', 'length', 'max' => 80),
            array('so_dien_thoai', 'length', 'max' => 11,
                'message' => '{attribute} không hợp lệ'
            ),
            array('tinh_thanh', 'length', 'max' => 2),
            array('noi_dung_tin, ngay_dang', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ma_tin, ma_khach_hang, nguoi_lien_lac, so_dien_thoai, tieu_de_tin, noi_dung_tin, tinh_thanh, ngay_dang, ma_loai_tin', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tinghepxes' => array(self::HAS_MANY, 'Tinghepxe', 'ma_tin'),
            'maKhachHang' => array(self::BELONGS_TO, 'Khachhang', 'ma_khach_hang'),
            'maLoaiTin' => array(self::BELONGS_TO, 'Loaitin', 'ma_loai_tin'),
            'tinraovats' => array(self::HAS_MANY, 'Tinraovat', 'ma_tin'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ma_tin' => 'Mã tin',
            'ma_khach_hang' => 'Mã khách hàng',
            'nguoi_lien_lac' => 'Người liên lạc',
            'so_dien_thoai' => 'Số điện thoại',
            'tieu_de_tin' => 'Tiêu đề tin',
            'noi_dung_tin' => 'Nội dung tin',
            'tinh_thanh' => 'Tỉnh/Thành phố',
            'ngay_dang' => 'Ngày đăng tin',
            'ma_loai_tin' => 'Mã loại tin',
            'trang_thai' => 'Trạng thái tin đăng'
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
        $criteria->compare('ma_khach_hang', $this->ma_khach_hang);
        $criteria->compare('nguoi_lien_lac', $this->nguoi_lien_lac, true);
        $criteria->compare('so_dien_thoai', $this->so_dien_thoai, true);
        $criteria->compare('tieu_de_tin', $this->tieu_de_tin, true);
        $criteria->compare('noi_dung_tin', $this->noi_dung_tin, true);
        $criteria->compare('tinh_thanh', $this->tinh_thanh, true);
        $criteria->compare('ngay_dang', $this->ngay_dang, true);
        $criteria->compare('ma_loai_tin', $this->ma_loai_tin);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tinkhachhang the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * trừ tiền dựa theo mã loại tin
     */
    public function trutien($maLoaiTin) {
        //lấy giá tiền cần có để đăng tin rao vặt
        $giaTien = Loaitin::model()->findByPk($maLoaiTin)->gia_dang;
        //lấy tổng số tiền trong tài khoản của khách hàng
        $tongTien = Khachhang::model()->findByPk(Yii::app()->user->userId)->so_du_tai_khoan;

        //Nếu không đủ tiền sẽ không cho đăng tin
        if ($tongTien < $giaTien) {
            return false;
        }

        if (Khachhang::model()->updateByPk(Yii::app()->user->userId, array(
            'so_du_tai_khoan' => ($tongTien - $giaTien)
            ))) {
            return true;
        }
    }

    /**
     * Làm mới tin đăng băng cách cập nhập ngày đăng thành ngày hiện tại và trừ
     * tiền như khi đăn mới
     * @param integer $maTin Mã của tin muốn làm mới
     */
    public function lamMoi($maTin) {
        $maLoaiTin = $this->getMaLoaiTinById($maTin);
        if ($this->trutien($maLoaiTin['ma_loai_tin'])) {
            if ($this->updateByPk($maTin, array('ngay_dang' => new CDbExpression('NOW()')))) {
                return true;
            }
        }
        return false;
    }

    /**
     * Lấy mã loại tin dựa vào mã tin đăng
     * @param integer $maTin
     * @return ?????
     */
    public function getMaLoaiTinById($maTin) {
        return Yii::app()->db->createCommand()
                        ->select('ma_loai_tin')
                        ->from('tinkhachhang')
                        ->where('ma_tin = :id', array(':id' => $maTin))
                        ->queryRow();
    }

    /**
     * Delete tin đăng của khách hàng
     * @param type $maTin
     */
    public function deleteTin($maTin, $maLoaiTin) {
        if ($maLoaiTin == Tinraovat::CODE_RV) {
            //Kiểm tra nếu có tồn tại ảnh thì xóa luôn cùng
            $tinRV = Tinraovat::model()->find("ma_tin = $maTin");
            if ($anh = $tinRV['anh']) {
                unlink(Yii::app()->basePath . "/../" . Tinraovat::IMAGE_DIR_RV . $anh);
            }
            
            $sql = "DELETE FROM tinraovat ";
            Yii::app()->db->createCommand($sql)
                    ->where('ma_tin = :id', array(':id' => $maTin));
        } else {
            $sql = "DELETE FROM tinghepxe ";
            Yii::app()->db->createCommand($sql)
                    ->where('ma_tin = :id', array(':id' => $maTin));
        }

        //xóa tin ở bảng cha(bảng tin khách hàng)
        $this->deleteByPk($maTin);
    }
    
    /**
     * Kiểm tra xem có đúng tin có mã tin là $maTin có phải là của khách hàng này
     * @param integer $maTin
     * @return boolean
     */
    public static function checkBelongToUser($maTin){
        if(Tinkhachhang::model()->findByAttributes(array('ma_tin'=>$maTin), 'ma_khach_hang = '.Yii::app()->user->userId)){
            return true;
        }
        return false;
    }

}
