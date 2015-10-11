<?php

/**
 * This is the model class for table "khachhang".
 *
 * The followings are the available columns in table 'khachhang':
 * @property integer $ma_khach_hang
 * @property string $ten_khach_hang
 * @property string $ten_dang_nhap
 * @property string $password
 * @property string $email
 * @property string $so_dien_thoai
 * @property integer $so_du_tai_khoan
 * @property string $anh_dai_dien
 *
 * The followings are the available model relations:
 * @property Tinkhachhang[] $tinkhachhangs
 */
class Khachhang extends CActiveRecord {

    const AVARTAR_DIR = 'images/avartars';
    const DEFAULT_AVARTAR='default-avatar.png';
    /**
     * Xác nhận password
     * @var string
     */
    public $confirmPassword;
    public $dieukhoan;
    public $oldPassword;
    public $newPassword;
    public $newconfirmPassword;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'khachhang';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //dang ki
            array('ten_khach_hang, ten_dang_nhap, password,email, so_dien_thoai, dia_chi,confirmPassword,dieukhoan', 'required',
                'message' => 'Bạn không được bỏ trống "{attribute}"', 'on' => 'Dang_ky'
            ),
            array('password', 'compare', 'compareAttribute' => 'confirmPassword',
                'message' => 'Mật khẩu không khớp', 'on' => 'Dang_ky'
            ),
            array('password', 'compare', 'compareAttribute' => 'confirmPassword',
                'message' => 'Mật khẩu không khớp', 'on' => 'update'
            ),
            array('dieukhoan', 'checkb', 'on' => 'Dang_ky'),
            //update thong tin
            array('ten_khach_hang, ten_dang_nhap,email, so_dien_thoai, dia_chi', 'required',
                'message' => 'Bạn không được bỏ trống "{attribute}"', 'on' => 'update'
            ),
            //update pass
            array('oldPassword,newPassword,newconfirmPassword', 'required', 'message' => 'Bạn không được bỏ trống "{attribute}"', 'on' => 'updatepass'),
            array('newPassword', 'compare', 'compareAttribute' => 'newconfirmPassword',
                'message' => 'Mật khẩu không khớp', 'on' => 'updatepass'
            ),
            array('oldPassword', 'checkpass', 'on' => 'updatepass'),
            array('so_du_tai_khoan', 'numerical', 'integerOnly' => true),
            array('ten_khach_hang, ten_dang_nhap, email', 'length', 'max' => 80,
                'message' => '{attribute} phải dưới 80 kí tự'
            ),
            array('email', 'email', 'message' => 'Email không hợp lệ'),
            array('password', 'length', 'max' => 40),
            array('so_dien_thoai', 'length', 'max' => 11),
            array('anh_dai_dien', 'length', 'max' => 255),
            array('anh_dai_dien', 'file', 'allowEmpty' => true, 'safe' => true,
                'types' => 'jpg, jpeg, gif, png',
                'wrongType' => 'Chỉ chấp nhận các file jpg, jpeg, gif, png',
                'maxSize' => 1024 * 1024, // 1MB                
                'tooLarge' => 'Kích cỡ ảnh phải nhỏ hơn 1MB',
                'maxFiles' => 1,
                'tooMany' => 'Bạn chỉ được upload 1 file ảnh duy nhất'
            ),
            array('ten_dang_nhap', 'unique', 'message' => '{attribute} đã tồn tại '),
            array('email', 'unique', 'message' => '{attribute} đã tồn tại '),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('ma_khach_hang, ten_khach_hang, email, so_dien_thoai, so_du_tai_khoan', 'safe', 'on' => 'search'),
        );
    }

    public function checkb($attribute, $params) {
        if (!$this->dieukhoan) {
            $this->addError('dieukhoan', 'Vui lòng đồng ý điều khoản.');
        }
    }

    public function checkpass($attribute, $params) {
        if (md5($this->oldPassword) != $this->password) {
            $this->addError('oldPassword', 'Bạn nhập sai mật khẩu.');
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tinkhachhangs' => array(self::HAS_MANY, 'Tinkhachhang', 'ma_khach_hang'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'ma_khach_hang' => 'Ma Khach Hang',
            'ten_khach_hang' => 'Tên khách hàng:',
            'ten_dang_nhap' => 'Tên đăng nhập:',
            'password' => 'Mật khẩu:',
            'email' => 'Email:',
            'so_dien_thoai' => 'Số điện thoại:',
            'so_du_tai_khoan' => 'Số dư tài khoản:',
            'anh_dai_dien' => 'Ảnh đại diện:',
            'confirmPassword' => 'Nhập lại mật khẩu:',
            'dia_chi' => 'Địa chỉ:',
            'dieukhoan' => '
                <a type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Điều khoản sử dụng.</a>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                                <h2 style="font-family:Times New Roman" class="text-success text-center">Điều khoản sử dụng xe chiều về</h2>
                                <p style="padding:0 50px 0 50px" class="text-info"> &nbsp &nbsp Để sử dụng dịch vụ của XeChieuVe với đầy đủ tính năng bắt buộc người sử dụng phải đăng ký một tài khoản(lần đầu tiên). Nếu không đăng ký tài khoản thì bạn chỉ có thể xem một số thông tin online hạn chế trên website http://xechieve.vn mà quý không thể tra cứu được đầy đủ thông tin hữu ích qua tin nhắn SMS cũng như trên trang web. Việc đăng ký tài khoản có thể thực hiện bằng cách nhắn tin SMS theo cú pháp LX DK (đối với lái xe) hoặc HK DK (đối với hành khách) gửi tới 6274  hoặc truy cập trực tiếp vào website  http://xechieve.vn tại mục đăng ký (hướng dẫn chi tiết bạn có thể xem tại mục hướng dẫn sử dụng dịch vụ trên trang này).
                                Các thông tin đã được đăng ký với XeChieuVe  như số điện thoại, biển số xe, lịch trình,… là phần không thể thiếu của dịch vụ và là công khai. Khi bạn sử dụng dịch vụ XeChieuVe là đã đồng ý về tính công khai của thông tin gửi đi, đăng tải và nhận lại cũng như tra cứu.
                                THỎA THUẬN VỀ ĐĂNG TẢI NỘI DUNG
                                Người sử dụng phải tuân thủ các quy định của nhà nước Việt nam về dịch vụ Internet và chịu trách nhiệm đối với toàn bộ nội dung được gửi. Ngoài ra, người sử dụng cũng không được sử dụng dịch vụ của XeChieuVe để quấy nhiễu hay làm phiền người khác. 
                                Các thành viên sử dụng dịch vụ tại website http://xechieve.vn không được gửi các nội dung:<br/>
                                -	Vi phạm thuần phong mỹ tục Việt Nam.<br/>
                                -	Kinh doanh bất hợp pháp.<br/>
                                -	An ninh - Chính trị - Quân sự.<br/>
                                -	Vi phạm hay hướng dẫn người khác vi phạm pháp luật nước Cộng hòa xã hội chủ nghĩa Việt Nam.<br/>
                                 &nbsp &nbsp Bất cứ vi phạm nào đối với các quy định trên, chúng tôi sẽ huỷ bỏ quyền sử dụng dịch vụ XeChieuVe của người vi phạm mà không cần thông báo trước hoặc thoả thuận. Đồng thời, tuỳ theo mức độ vi phạm mà người sử dụng sẽ phải chịu trách nhiệm trước pháp luật.
                                TUYÊN BỐ TỪ CHỐI
                                CÁC THÔNG TIN CUNG CẤP TRÊN XeChieuVe ĐƯỢC CUNG CẤP DƯỚI DẠNG TƯƠNG ĐỐI MÀ KHÔNG CÓ SỰ ĐẢM BẢO DƯỚI BẤT KỲ HÌNH THỨC NÀO, DÙ NÓI RÕ HAY NGẦM ĐỊNH, BAO GỒM KHÔNG GIỚI HẠN CÁC ĐẢM BÁO VỀ KHẢ NĂNG BÁN, SỰ THÍCH HỢP VỚI MỘT MỤC ĐÍCH RIÊNG VÀ SỰ KHÔNG XÂM PHẠM. XeChieuVe không có bất cứ bảo đảm nào hoặc tuyên bố nào về tính chính xác hay hoàn thiện của bất kỳ thông tin nào trên XeChieuVe. Định kỳ chúng tôi sẽ bổ sung, thay đổi, cải tiến hoặc cập nhật các tính năng và thông tin trên XeChieuVe này mà không cần báo trước. Trong bất kỳ trường hợp nào, chúng tôi sẽ không chịu trách nhiệm về bất cứ mất mát, thiệt hại, trách nhiệm hoặc phí tổn mang lại do việc sử dụng thông tin từ XeChieuVe, cũng như bao gồm không giới hạn bất kỳ lỗi, thiếu sót, gián đoạn hoặc chậm trễ về các thông tin. Việc sử dụng thông tin tại XeChieuVe là hoàn toàn tùy thuộc vào rủi ro riêng của người sử dụng. Trong bất kỳ trường hợp nào, bao gồm nhưng không giới hạn bởi sự sơ xuất, chúng tôi hoặc các đại diện của mình sẽ không chịu trách nhiệm đối với bất kỳ thiệt hại trực tiếp, gián tiếp, ngẫu nhiên, đặc biệt hoặc tất yếu, thậm chí nếu XeChieuVe đã được cảnh báo về khả năng của những thiệt hại như vậy.
                                Người sử dụng rõ ràng nhận thức được và chấp thuận rằng XeChieuVe không chịu trách nhiệm về bất cứ hành vi nào của bất kỳ Người sử dụng nào. XeChieuVe có thể có các lời khuyên, ý kiến và phát biểu của nhiều nguồn thông tin và nội dung khác nhau. XeChieuVe không tuyên bố hoặc chứng thực tính chính xác hay độ tin cậy của bất kỳ lời khuyên, ý kiến và phát biểu hoặc các thông tin từ các nguồn và nội dung khác hoặc bất kỳ người sử dụng nào tại XeChieuVe hoặc thực thể khác. Việc dựa vào các lời khuyên, ý kiến và phát biểu hoặc các thông tin khác CẦN DỰA TRÊN SỰ RỦI RO CỦA CHÍNH NGƯỜI SỬ DỤNG. XeChieuVe hoặc các đại diện của mình hoặc các đại lý, các nhân viên sẽ không phải chịu trách nhiệm đối với bất kỳ Người sử dụng nào về bất kỳ sự thiếu chính xác, sai sót, gián đoạn, sự đúng lúc, tính hoàn thiện, sự xóa bỏ, nhược điểm, mất hiệu năng, virus máy tính, trục trặc đường liên lạc, sự thay đổi hoặc sử dụng bất kỳ thông tin nào ở đây, vì bất kỳ nguyên nhân gì, đối với bất kỳ thiệt hại nào.
                                Là một điều kiện để sử dụng thông tin trên XeChieuVe, Người sử dụng chấp thuận bảo đảm không có bất kỳ hành động nào cũng như yêu cầu về các thiệt hại, mất mát, trách nhiệm và phí tổn (bao gồm cả phí trả cho luật sư) xuất phát từ việc sử dụng thông tin từ XeChieuVe, bao gồm không giới hạn bất kỳ yêu cầu nào cho rằng sự việc nếu đúng sẽ cấu thành sự vi phạm của Người sử dụng về những điều khoản và điều kiện này đối với XeChieuVe và các đại diện của XeChieuVe. Nếu người sử dụng không bằng lòng với bất kỳ thông tin nào trên XeChieuVe hoặc với bất kỳ điều khoản và điều kiện sử dụng thông tin trên XeChieuVe thì phương thức duy nhất Người sử dụng nên thực hiện là chấm dứt sử dụng thông tin trên XeChieuVe.
                                </p>
                            
                    </div>
                  </div>
                </div>'
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

        $criteria->compare('ma_khach_hang', $this->ma_khach_hang);
        $criteria->compare('ten_khach_hang', $this->ten_khach_hang, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('so_dien_thoai', $this->so_dien_thoai, true);
        $criteria->compare('so_du_tai_khoan', $this->so_du_tai_khoan);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function updatepassword($pass) {
        $makhach = Yii::app()->user->userId;
        $sql = "UPDATE " . Khachhang::model()->tableName()
                . " SET password = '$pass'"
                . " WHERE ma_khach_hang =$makhach";

        Yii::app()->db->createCommand($sql)->execute();
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Khachhang the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Nạp tiền cho khách
     */
    public function NapTien($so_du_tai_khoan_new, $ma_khach_hang) {
        $sql = "UPDATE " . Khachhang::model()->tableName()
                . " SET so_du_tai_khoan = so_du_tai_khoan + $so_du_tai_khoan_new"
                . " WHERE ma_khach_hang = $ma_khach_hang";
        Yii::app()->db->createCommand($sql)->execute();
    }

}
