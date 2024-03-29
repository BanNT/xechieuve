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
class Tinghepxe extends CActiveRecord {

    /**
     * Mã loại tin 'xe tìm khách' trong database
     */
    const CODE_XTK = 1;

    /**
     * Mã loại tin 'khách tìm xe' trong database
     */
    const CODE_KTX = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tinghepxe';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('dia_chi_di,ngay_khoi_hanh,dia_chi_den', 'required',
                'message' => 'Bạn cần nhập thông tin vào ô "{attribute}"'
            ),
            array('ma_tin, ma_loai_xe_ghep', 'numerical', 'integerOnly' => true),
            array('dia_chi_di, dia_chi_den', 'length', 'max' => 200,
                'message' => '"{attribute}" của bạn vượt quá 200 kí tự cho phép'
            ),
            array('noi_den_tinh', 'length', 'max' => 2),
            array('ngay_khoi_hanh', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ma_tin, dia_chi_di, dia_chi_den, noi_den_tinh, ngay_khoi_hanh, ma_loai_xe_ghep', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
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
    public function attributeLabels() {
        return array(
            'ma_tin' => 'Ma Tin',
            'dia_chi_di' => 'Địa chỉ đi',
            'dia_chi_den' => 'Địa chỉ đến',
            'noi_den_tinh' => 'Địa chỉ đến(Tỉnh)',
            'ngay_khoi_hanh' => 'Ngày khởi hành',
            'ma_loai_xe_ghep' => 'Loại xe ghép',
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
        $criteria->compare('dia_chi_di', $this->dia_chi_di, true);
        $criteria->compare('dia_chi_den', $this->dia_chi_den, true);
        $criteria->compare('noi_den_tinh', $this->noi_den_tinh, true);
        $criteria->compare('ngay_khoi_hanh', $this->ngay_khoi_hanh, true);
        $criteria->compare('ma_loai_xe_ghep', $this->ma_loai_xe_ghep);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Tinghepxe the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Lấy danh sách xe tìm khách hoặc khách tìm xe dựa vào mã loại tin
     * @param Paginate $paginator
     * @param integer $maLoaiTin
     * @param string $condition Điều kiện thêm vào
     * @return array
     */
    public function listTinGhepXeByType(Paginate $paginator, $maLoaiTin, $condition = null) {
        return Yii::app()->db->createCommand()
                        ->select('tinghepxe.ma_tin,tieu_de_tin,date(ngay_dang) as ngay_dang_tin,tinh_thanh,dia_chi_di,dia_chi_den,noi_den_tinh,ngay_khoi_hanh,khachhang.ten_khach_hang as nguoi_lien_lac,khachhang.so_dien_thoai,'
                                . 'CASE '
                                    . 'WHEN trang_thai=0 THEN "Đang chờ" '
                                    . 'WHEN trang_thai=1 THEN "Đã tìm được" '
                                . 'END AS trang_thai_tin'
                        )
                        ->from('tinkhachhang')
                        ->where('ma_loai_tin = ' . $maLoaiTin . $condition)
                        ->join('tinghepxe', 'tinkhachhang.ma_tin = tinghepxe.ma_tin')
                        ->join('khachhang', 'khachhang.ma_khach_hang = tinkhachhang.ma_khach_hang')
                        ->limit($paginator->limit, $paginator->offset)
                        ->order('trang_thai,ngay_dang DESC')
                        ->queryAll()
        ;
    }

    public function getTinGhepXe($maTin) {
        return Yii::app()->db->createCommand()
                        ->select('tieu_de_tin,nguoi_lien_lac,so_dien_thoai,dia_chi_di,tinh_thanh,dia_chi_den,noi_den_tinh,noi_dung_tin')
                        ->from('tinghepxe')
                        ->join('tinkhachhang', 'tinkhachhang.ma_tin = tinghepxe.ma_tin')
                        ->where("tinghepxe.ma_tin=:matin", array(':matin' => $maTin))
                        ->queryRow()
        ;
    }

    /**
     * Lấy ra danh sách mã loại tin theo điều kiện
     * @param string $maLoaiTin
     * @param string $conditions
     * @return string
     */
    public static function listMaTin($maLoaiTin, $conditions) {
        return Yii::app()->db->createCommand()
                        ->select('tinghepxe.ma_tin')
                        ->from('tinghepxe')
                        ->join('tinkhachhang', 'tinkhachhang.ma_tin = tinghepxe.ma_tin')
                        ->where('ma_loai_tin = ' . $maLoaiTin . $conditions)
                        ->queryAll();
    }

    /**
     * @return array
     */
    public static function getStatusTinDang() {
        return [
            '0' => 'Đang chờ',
            '1' => 'Đã tìm được'
        ];
    }

    /**
     * Update tin ghép xe
     * @param string $diaChiDi Địa chỉ đi
     * @param string $diaChiDen Địa chỉ đến
     * @param integer $noiDenTinh Mã tỉnh
     * @param integer $maLoaiXeGhep Mã loại xe muốn ghép
     * @param string $ngayKhoiHanh Ngày khởi hành
     * @param integer $maTin Mã tin đăng
     */
    public static function updateTinGhepXe($diaChiDi, $diaChiDen, $noiDenTinh,
            $maLoaiXeGhep, $ngayKhoiHanh, $maTin) {
        $sql = "UPDATE " . Tinghepxe::model()->tableName()
                . " SET dia_chi_di = '$diaChiDi',dia_chi_den= '$diaChiDen',"
                . " noi_den_tinh = $noiDenTinh,ma_loai_xe_ghep = $maLoaiXeGhep,"
                . " ngay_khoi_hanh = '$ngayKhoiHanh'"
                . " WHERE ma_tin =$maTin"
        ;
        Yii::app()->db->createCommand($sql)->execute();
    }

}
