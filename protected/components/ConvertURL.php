<?php

/**
 * Tạo URL đẹp bằng cách chuyển dổi chúng thành dạng non unicode và chữ thường
 * @author Tran Van Hoang <phatradang@gmail.com>
 */
class ConvertURL extends CComponent {

    /**
     * @param string $str
     * @return string
     */
    public static function refine($str) {
        //lọc kí tự tiếng việt và viết hoa
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
        $str = preg_replace("/(đ|Đ)/", 'd', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str);
        $str = strtolower($str);
        
        // lọc một số kí tự đặc biệt thành dấu '-':
        $str = trim($str);
        $str = preg_replace("/\./", '', $str);
        $str = preg_replace("/(\!|\@|\#|\%|\^|\&|\*|\(|\)|\+|\~|\,|\\|\/|\=|\`)/", ' ', $str);
        $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        $str = preg_replace("/-{2,}/", '-', $str);
        $str = trim($str,'-');
        return $str;
    }

}
